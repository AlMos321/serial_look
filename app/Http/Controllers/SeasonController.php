<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Season;
use App\Serial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Validator;


class SeasonController extends Controller
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
     * View all season created by user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createSeason()
    {
        $serials = DB::table('serials')->select('id', 'name')->where([
            ['user_id', '=', Auth::user()->id],
            ['is_active', '=', '1']
        ])->get();
        return view('season.create', ['serials' => $serials]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showSeason()
    {
        $serials = DB::table('serials')->select('id', 'name')->where([
            ['user_id', '=', Auth::user()->id],
            ['is_active', '=', '1']
        ])->get();
        $season = DB::table('season')->where('serial_id', '=', [1])->get();
        return view('season.create', ['serials' => $serials]);
    }


    /**
     * Create or update serial
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $v = Validator::make($request->all(), [
            'country' => 'required',
            'description' => 'required|max:255',
            'date_start' => 'date',
            'date_end' => 'date|after:date_start',
            'serial_id' => 'required',
            'count_epizodes' => 'integer',
            'number' => 'required|integer|unique:seasons,number,NULL,id,serial_id,' . $request->input('serial_id')
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
     * Update serial
     * @param Request $request
     */
    private function update(Request $request)
    {
        $serial = Season::findBySlugOrFail($request->input('slug'));
        $serial->update([
            'serial_id' => $request->input('serial_id'),
            'number' => $request->input('number'),
            'count_epizdes' => $request->input('count_epizdes'),
            'country' => $request->input('country'),
            'date_start' => $request->input('date_start'),
            'date_end' => $request->input('date_end'),
            'description' => $request->input('description'),
        ]);
    }

    /**
     * Create serial
     * @param Request $request
     */
    private function create(Request $request)
    {
        $question = new Season([
            'serial_id' => $request->input('serial_id'),
            'number' => $request->input('number'),
            'count_epizdes' => $request->input('count_epizdes'),
            'country' => $request->input('country'),
            'date_start' => $request->input('date_start'),
            'date_end' => $request->input('date_end'),
            'description' => $request->input('description'),
        ]);
        $question->save();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function listSeasons()
    {
        $massIds = [];
        $usersSerialId = DB::table('serials')->select('id')->where([
            ['user_id', '=', Auth::user()->id],
            ['is_active', '=', '1']
        ])->get();
        foreach ($usersSerialId as $rows) {
            foreach ($rows as $row) {
                $massIds[] = $row;
            }
        }
        $seasons = DB::table('seasons')->whereIn('serial_id', $massIds)->orderBy('number')->get();
        return view('season.list', ['seasons' => $seasons]);
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateSeason($slug)
    {
        $season = DB::select('select * from seasons WHERE slug = ?', [$slug]);
        $serials = DB::table('serials')->select('id', 'name')->where([
            ['user_id', '=', Auth::user()->id],
            ['is_active', '=', '1']
        ])->get();
        return view('season.create', ['season' => $season[0], 'serials' => $serials]);
    }

    /**
     * Delete season
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function deleteSeason($slug)
    {
        $season = Season::findBySlugOrFail($slug);
        if (isset($season)) {
            if ($season->delete()) {
                return redirect('/get/list/seasons')->with('message', 'Season delete!');
            }
        } else {
            return redirect('/get/list/seasons')->with('message', 'Season no delete!');
        }
    }

}
