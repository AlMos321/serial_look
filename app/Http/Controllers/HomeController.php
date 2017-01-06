<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Serial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Validator;


class HomeController extends Controller
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
     * Show epizod
     *
     * @return Response
     */
    public function createSerial()
    {
        return view('serial.create');
    }

    /**
     * Show serial for update
     *
     * @return Response
     */
    public function updateSerial($slug)
    {
        $serial = DB::select('select * from serials WHERE slug = ?', [$slug]);
        return view('serial.create', ['serial' => $serial[0]]);
    }

    /**
     * Show serials
     *
     * @return Response
     */
    public function showSerials()
    {
        $serials = Serial::where([['user_id', '=', Auth::user()->id]])->paginate(10);
        return view('serial.index', ['serials' => $serials]);
    }


    /**
     * Create or update serial.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $v = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'description' => 'required|max:255',
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
        $serial = Serial::findBySlugOrFail($request->input('slug'));
        $imageName = $this->saveImage($request);
        if (!isset($imageName)) {
            $imageName = $serial->images;
        }
        if (isset($request->is_active)) {
            $isActive = 1;
        } else {
            $isActive = 0;
        }
        $serial->update([
            'name' => $request->input('name'),
            'country' => $request->input('country'),
            'production' => $request->input('production'),
            'producer' => $request->input('producer'),
            'actors' => $request->input('actors'),
            'description' => $request->input('description'),
            'images' => $imageName,
            'released' => '1994-01-25',
            'user_id' => Auth::user()->id,
            'is_active' => $isActive,
        ]);
    }

    /**
     * Create serial
     * @param Request $request
     */
    private function create(Request $request)
    {
        $imageName = $this->saveImage($request);
        if (isset($request->is_active)) {
            $isActive = 1;
        } else {
            $isActive = 0;
        }
        $question = new Serial([
            'name' => $request->input('name'),
            'country' => $request->input('country'),
            'production' => $request->input('production'),
            'producer' => $request->input('producer'),
            'actors' => $request->input('actors'),
            'description' => $request->input('description'),
            'images' => $imageName,
            'released' => '1994-01-25',
            'user_id' => Auth::user()->id,
            'is_active' => $isActive,
        ]);
        $question->save();
    }

    /**
     * Delete serial
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function deleteSerial($slug)
    {
        $serial = Serial::findBySlugOrFail($slug);
        if (isset($serial) && $serial->user_id == Auth::user()->id) {
            if ($serial->delete()) {
                return redirect('/show/serial')->with('message', 'Serial delete!');
            }
        } else {
            return redirect('/show/serial')->with('message', 'Serial no delete!');
        }
    }

    /**
     * @param Request $request
     * @return string
     */
    private function saveImage(Request $request)
    {
        $imageName = null;
        if (isset($request->images)) {
            $imageName = time() . '.' .
                $request->file('images')->getClientOriginalExtension();

            $request->file('images')->move(
                base_path() . '/public/uploads/serial/icon/', $imageName
            );
            return $imageName;
        }
        return $imageName;
    }


}
