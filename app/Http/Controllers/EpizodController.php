<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Season;
use App\Serial;
use App\Epizod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Validator;


class EpizodController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * View form for create new epizod.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createEpizod()
    {
        $serials = DB::table('serials')->select('id', 'name')->where([
            ['user_id', '=', Auth::user()->id],
            ['is_active', '=', '1']
        ])->get();
        return view('epizod.create', ['serials' => $serials]);
    }


    /**
     * api
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSeasons()
    {
        $seasons = DB::table('seasons')->select('id', 'number')->where('serial_id', '=', $_GET['serial_id'])->get();
        return response()->json($seasons);
    }


    /**
     * Create or update epizod.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required|max:255',
            'season_id' => 'required|integer',
            'serial_id' => 'required|integer',
        ]);

        if ($v->fails()) {
            return redirect()->back()->withErrors($v->errors());
        }

        $slug = $request->input('slug');
        if (!empty($slug)) {
            $this->update($request);
            return redirect('/show/serial')->with('message', 'Thanks for update!');
        } else {
            $this->create($request);
            return redirect('/show/serial')->with('message', 'Thanks for create!');
        }
    }


    /**
     * Update epizod
     * @param Request $request
     */
    private function update(Request $request)
    {
        $serial = Epizod::findBySlugOrFail($request->input('slug'));
        $serial->update([
            'serial_id' => $request->input('serial_id'),
            'season_id' => $request->input('season_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'number' => $request->input('number'),
            'images' => $request->input('images'),
            'producer' => $request->input('producer'),
            'directed' => $request->input('directed'),
            'running_time' => $request->input('running_time'),
            'date_start' => /*$request->input('date_start')*/
                time(1), //todo
        ]);
    }

    /**
     * Create epizod
     * @param Request $request
     */
    private function create(Request $request)
    {
        $question = new Epizod([
            'serial_id' => $request->input('serial_id'),
            'season_id' => $request->input('season_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'number' => $request->input('number'),
            'images' => $request->input('images'),
            'producer' => $request->input('producer'),
            'directed' => $request->input('directed'),
            'running_time' => $request->input('running_time'),
            'date_start' => /*$request->input('date_start')*/
                time(1), //todo
        ]);
        $question->save();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listEpizodes()
    {
        $epizodes = DB::table('epizodes')->select('id', 'name', 'slug')->where('user_id', '=', Auth::user()->id)->get();
        return view('epizod.list', ['epizodes' => $epizodes]);
    }

    /**
     * View form fo update epizod
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateEpizod($slug)
    {
        $epizod = DB::table('epizodes')->select('epizodes.*', 'serials.name as serial_name',
            'seasons.number as season_number')
            ->join('serials', 'serials.id', '=', 'epizodes.serial_id')
            ->join('seasons', 'seasons.id', '=', 'epizodes.season_id')
            ->where([['epizodes.user_id', '=', Auth::user()->id], ['serials.is_active', '=', '1']])->get();

        $serials = DB::table('serials')->select('id', 'name')->where('user_id', '=', Auth::user()->id)->get();
        return view('epizod.create', ['epizod' => $epizod[0], 'serials' => $serials]);
    }

    /**
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function deleteEpizod($slug)
    {
        $epizod = Epizod::findBySlugOrFail($slug);
        if (isset($epizod)) {
            if ($epizod->delete()) {
                return redirect('/get/list/epizodes')->with('message', 'Epizod delete!');
            }
        } else {
            return redirect('/get/list/epizodes')->with('message', 'Epizod no delete!');
        }
    }

}
