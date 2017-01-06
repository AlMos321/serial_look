@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Add new serial</div>
                    <div class="panel-body">

                        <form action="/post/create/season" method="post">

                            <input type="hidden" class="form-control" name="id" id="id" value="@if(isset($season)){{$season->id}}@endif">

                            <input type="hidden" class="form-control" name="slug" id="slug" value="@if(isset($season)){{$season->slug}}@endif">
                            <div class="form-group">
                                <label for="">Serial</label>
                                {{--<input type="text" class="form-control" name="serial_id" id="serial_id"  value="@if(isset($serial)){{$serial->name}}@endif">--}}
                                <select class="form-control" name="serial_id">
                                    @foreach($serials as $serial)
                                    <option value="{{$serial->id}}">{{$serial->name}}</option>
                                    @endforeach
                                </select>
                                <p class="">{{$errors->first('serial_id')}}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Number</label>
                                <input type="text" class="form-control" name="number" id="number" value="@if(isset($season)){{$season->number}}@endif">
                                <p class="">{{$errors->first('number')}}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Epizodes count</label>
                                <input type="text" class="form-control" name="count_epizdes" id="count_epizdes" value="@if(isset($season)){{$season->count_epizdes}}@endif">
                                <p class="">{{$errors->first('count_epizdes')}}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Country</label>
                                <input type="text" class="form-control" name="country" id="country" value="@if(isset($season)){{$season->country}}@endif">
                                <p class="">{{$errors->first('country')}}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Date Startr</label>
                                <input type="text" class="form-control" name="date_start" id="date_start" value="@if(isset($season)){{$season->date_start}}@endif">
                                <p class="">{{$errors->first('date_start')}}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Date_end</label>
                                <input type="text" class="form-control" name="date_end" id="date_end" value="@if(isset($season)){{$season->date_end}}@endif">
                                <p class="">{{$errors->first('date_end')}}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description" id="description" >@if(isset($season)){{$season->description}}@endif</textarea>
                                <p class="">{{$errors->first('description')}}</p>
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
@endsection