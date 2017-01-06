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
                    <div class="panel-heading">List Epizodes</div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                            <p class="alert alert-info">{{ Session::get('message') }}</p>
                        @endif
                        @foreach($epizodes as $epizod)
                            <div class="wind">
                                <div class="wind-name">{{$epizod->name}}|Serial: {{$epizod->id}}</div>
                                @if (1 == Auth::check() && Auth::user()->id == 1)
                                    <div class="description">
                                        <a href="/delete/epizod/{{$epizod->slug}}">
                                            <button type="button" style="align-self: center" class="btn btn-danger">Delete</button>
                                        </a>
                                        <a href="/update/epizod/{{$epizod->slug}}">
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

