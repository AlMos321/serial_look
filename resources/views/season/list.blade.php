@extends('layouts.app')

@section('content')

    <style>
        .wind{
            height: 50px;
            width: 145px;
            position: relative;
            display: inline-block;
            margin-left: 25px;
            margin-bottom: 30px;
            cursor: pointer;
        }
        .wind-img:hover{
            border: 2px solid #f39a5a;
            -moz-box-shadow: 0px 0px 1px #f39a5a;
            -webkit-box-shadow: 0px 0px 1px #f39a5a;
            box-shadow: 0px 0px 1px #f39a5a;
        }
        .wind-img{
            height: 130px;
            width: 140px;
        }
        .wind-name{
            margin-left: 4px;
            margin-right: 4px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            text-align: center;
        }
        .wind-name:hover{
            text-decoration: underline;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">List Seasons</div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <p class="alert alert-info">{{ Session::get('message') }}</p>
                        @endif
                        @foreach($seasons as $season)
                            <div class="wind">
                                <div class="wind-name">Num: {{$season->number}}. Serial: {{$season->serial_id}}</div>
                                @if (1 == Auth::check() && Auth::user()->id == 1)
                                    <div class="description">
                                        <a href="/delete/season/{{$season->slug}}">
                                            <button type="button" style="align-self: center" class="btn btn-danger">Delete</button>
                                        </a>
                                        <a href="/update/season/{{$season->slug}}">
                                            <button type="button" style="align-self: center" class="btn btn-primary">Edit...</button>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        @endforeach

                </div>
            </div>
        </div>
    </div>

@endsection

