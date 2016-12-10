@extends('layouts.app')

@section('title')
Gestion du solde
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
                <div class="panel-heading">Gestion du solde</div>
                <div class="panel-body">
                    <h4>Solde actuel</h4>
                    <p>{{Auth::user()->credit.'€'}}</p>
                    <div class="col-md-6 col-md-offset-4">
                        <form action="{{ url('increase/balance') }}">
                            {!! csrf_field() !!}
                            <input type="submit" class="btn btn-primary" 
                                   value="Créditer">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection