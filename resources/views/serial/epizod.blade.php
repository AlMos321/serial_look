@extends('layouts.app')

@section('content')

    <style>
        .wind{
            height: 20px;
            width: 145px;
            position: relative;
            display: inline-block;
            margin-left: 10px;
            margin-bottom: 5px;
            cursor: pointer;
            left: 40%;
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
        .serial{
            align-content: center;
        }
        .description{
            text-align: center;
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Epizod - {{$epizod->name}}</div>
                    <div class="panel-body">
                        <div class="serial">
                            <div class="wind">
                                <div class="wind-img" style='background-image: url("/uploads/epizodes/icon/{{$epizod->images}}");'></div>
                                <div class="wind-name"><b>Epizod name:</b>{{$epizod->name}}</div>
                            </div>
                            <div class="description bg-info"><b>Description:</b> {{$epizod->description}}</div>
                            <div class="description bg-info"><b>Producer:</b> {{$epizod->producer}}</div>
                            <div class="description bg-info"><b>Directed:</b> {{$epizod->directed}}</div>
                            <div class="description bg-info"><b>Running time:</b> {{$epizod->running_time}}</div>
                            <div class="description bg-info"><b>Date start:</b> {{$epizod->running_time}}</div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

