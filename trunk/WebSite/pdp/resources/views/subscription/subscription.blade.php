@extends('layouts.app')

@section('title')
Abonnement
@endsection

@section('content')


@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
@if (session('status_not_modified'))
<div class="alert alert-danger">
    {{ session('status_not_modified') }}
</div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Abonnement</div>
                <div class="panel-body">
                    <h4>Abonné depuis le :</h4>
                    <p>{{Auth::user()->created_at}}</p>

                    <h4>Abonnement</h4>
                    <p> 

                        @if (Auth::user()->subscriber == 'true')
                        Actif
                        @else
                        Inactif
                        @endif
                    </p>

                    <h4>Se désabonner</h4>
                    <p>Si vous souahitez vous désobonner, cliquez sur le bouton
                        ci-dessous
                        <span class="label label-warning">Attention : si vous
                            cliquez sur ce bouton
                            votre compte sera clos et vous ne pourrez plus vous
                            connecter.</span>
                    </p>

                    <div class="col-md-6 col-md-offset-4">
                        <form action="{{ url('subscription/unsubscribe') }}">
                            <input type="submit" class="btn btn-primary" value="Se désabonner">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection