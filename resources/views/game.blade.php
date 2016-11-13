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
        </div>
    </div>

    <div id="draw-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Draw</h4>
                </div>
                <div class="modal-body">
                    <p>Draw</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Decline</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="winner-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">You won!</h4>
                </div>
                <div class="modal-body">
                    <p>You won!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="loser-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">You lost...</h4>
                </div>
                <div class="modal-body">
                    <p>You lost...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('scripts')
    <script src="/js/tictactoe.js"></script>
@endsection
