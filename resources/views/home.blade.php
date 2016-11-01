@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Tic Tac Toe</div>
                    <div class="panel-body">
                        <div class="col-md-12 col-md-offset-1">
                        <div class="row">
                            <button id="button-1" class="btn btn-game"></button>
                            <button id="button-2" class="btn btn-game"></button>
                            <button id="button-3" class="btn btn-game"></button>
                        </div>
                        <div class="row">
                            <button id="button-4" class="btn btn-game"></button>
                            <button id="button-5" class="btn btn-game"></button>
                            <button id="button-6" class="btn btn-game"></button>
                        </div>
                        <div class="row">
                            <button id="button-7" class="btn btn-game"></button>
                            <button id="button-8" class="btn btn-game"></button>
                            <button id="button-9" class="btn btn-game"></button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Online users</div>
                    <div class="panel-body">
                        <ul>
                            @foreach($users as $user)
                                <li>{{ $user->user->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
