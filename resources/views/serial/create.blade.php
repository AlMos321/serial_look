@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Add new serial</div>
                    <div class="panel-body">

                        <form action="/post/create" method="post" enctype="multipart/form-data">

                            <input type="hidden" class="form-control" name="id" id="id"
                                   value="@if(isset($serial)){{$serial->id}}@endif">
                            <input type="hidden" class="form-control" name="slug" id="slug"
                                   value="@if(isset($serial)){{$serial->slug}}@endif">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                       value="@if(isset($serial)){{$serial->name}}@endif">
                                <p class="">{{$errors->first('name')}}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Country</label>
                                <input type="text" class="form-control" name="country" id="country"
                                       value="@if(isset($serial)){{$serial->country}}@endif">
                                <p class="">{{$errors->first('countru')}}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Production Company</label>
                                <input type="text" class="form-control" name="production" id="production"
                                       value="@if(isset($serial)){{$serial->production}}@endif">
                                <p class="">{{$errors->first('production')}}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Producer</label>
                                <input type="text" class="form-control" name="producer" id="producer"
                                       value="@if(isset($serial)){{$serial->producer}}@endif">
                                <p class="">{{$errors->first('producer')}}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Actors</label>
                                <input type="text" class="form-control" name="actors" id="actors"
                                       value="@if(isset($serial)){{$serial->actors}}@endif">
                                <p class="">{{$errors->first('actors')}}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description"
                                          id="description">@if(isset($serial)){{$serial->description}}@endif</textarea>
                                <p class="">{{$errors->first('description')}}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Released</label>
                                <input type="text" class="form-control" name="released" id="released"
                                       value="@if(isset($serial)){{$serial->released}}@endif">
                                <p class="">{{$errors->first('released')}}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Active</label>
                                <input type="checkbox" class="form-control" name="is_active" id="released"
                                       @if(isset($serial) && $serial->is_active == 1) checked @endif>
                                <p class="">{{$errors->first('released')}}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Images</label>
                                <input type="file" name="images"
                                       id="exampleInputFile" @if(isset($serial)){{$serial->images}}@endif>
                                <p class="help-block">Example block-level help text here.</p>
                            </div>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>

                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection