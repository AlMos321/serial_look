@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Add new epizod</div>
                    <div class="panel-body">

                        <form action="/post/create/epizod" method="post">

                            <input type="hidden" class="form-control" name="id" id="id" value="@if(isset($epizod)){{$epizod->id}}@endif">

                            <input type="hidden" class="form-control" name="slug" id="slug" value="@if(isset($epizod)){{$epizod->slug}}@endif">
                            <div class="form-group">
                                <label for="">Serial</label>
                                <select class="form-control target" name="serial_id">
                                    @if(isset($epizod->serial_id))
                                        <option value="{{$epizod->serial_id}}">{{$epizod->serial_name}}</option>
                                    @endif
                                    <option value="">...</option>
                                    @foreach($serials as $serial)
                                        <option value="{{$serial->id}}">{{$serial->name}}</option>
                                    @endforeach
                                </select>
                                <p class="">{{$errors->first('serial_id')}}</p>
                            </div>


                            <div class="form-group">
                                <label for="">Season</label>
                                <select id="season" class="form-control" name="season_id">
                                    @if(isset($epizod->season_id))
                                        <option value="{{$epizod->season_id}}">{{$epizod->season_number}}</option>
                                    @endif
                                </select>
                                <p class="">{{$errors->first('season_id')}}</p>
                            </div>


                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="@if(isset($epizod)){{$epizod->name}}@endif">
                                <p class="">{{$errors->first('name')}}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Number</label>
                                <input type="text" class="form-control" name="number" id="number" value="@if(isset($epizod)){{$epizod->number}}@endif">
                                <p class="">{{$errors->first('number')}}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description" id="description" >@if(isset($epizod)){{$epizod->description}}@endif</textarea>
                                <p class="">{{$errors->first('description')}}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Producer</label>
                                <input type="text" class="form-control" name="producer" id="producer" value="@if(isset($epizod)){{$epizod->producer}}@endif">
                                <p class="">{{$errors->first('producer')}}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Directed</label>
                                <input type="text" class="form-control" name="directed" id="directed" value="@if(isset($epizod)){{$epizod->directed}}@endif">
                                <p class="">{{$errors->first('directed')}}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Running Time</label>
                                <input type="text" class="form-control" name="running_time" id="running_time" value="@if(isset($epizod)){{$epizod->running_time}}@endif">
                                <p class="">{{$errors->first('running_time')}}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Date Start</label>
                                <input type="text" class="form-control" name="date_start" id="date_start" value="@if(isset($epizod)){{$epizod->date_start}}@endif">
                                <p class="">{{$errors->first('date_start')}}</p>
                            </div>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>

                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script>
        $( document ).ready(function() {
            $( ".target" ).mousedown(function() {
        $( "select" ).change(function () {
                    if($(this).hasClass('target')){
                        var str = "";
                        str =  $( "select option:selected").val();
                        $.ajax({
                            url: '/get/seasons',  // указываем URL
                            type: "get",
                            data: ({serial_id : str}),
                            success: function (data, textStatus) {
                                $("#season").empty();
                                $.each(data, function(i) {
                                    console.log(data[i])
                                    $("#season").prepend( $('<option value="'+data[i]['id']+'">'+data[i]['number']+'</option>'));
                                });
                            }
                        });
                    }
                }).change();
        });
        });
    </script>
@endsection
