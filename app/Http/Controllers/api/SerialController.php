<?php

namespace App\Http\Controllers;

use App\Epizod;
use App\Http\Requests;
use App\Season;
use App\Serial;
use DB;
use Illuminate\Support\Facades\Auth;

class SerialController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $questions = Question::all();

        return response()->json($questions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:150',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        } else {
            $question = new Question([
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => Auth::user()->id
            ]);

            $question->save();

            return response()->json($question, 201);
        }
    }




}
