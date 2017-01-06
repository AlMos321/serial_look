@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    <!-- Standard button -->
                    <br>
                    <a href="/show/serial"> <button type="button" class="btn btn-default">Added serials</button></a>
                    <a href="/get/list/seasons"> <button type="button" class="btn btn-default">Added seasons</button></a>
                    <a href="/get/list/epizodes"> <button type="button" class="btn btn-default">Added epizodes</button></a>
                    <hr>
                    <a href="/create/serial"> <button type="button" class="btn btn-default">Add new serial</button></a>
                    <a href="/create/season"> <button type="button" class="btn btn-default">Add new season</button></a>
                    <a href="/create/epizod"> <button type="button" class="btn btn-default">Add new epizod</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
