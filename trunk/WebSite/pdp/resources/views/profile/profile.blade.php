@extends('layouts.app')

@section('title')
Profil
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
                <div class="panel-heading">Profil</div>
                <div class="panel-body">
                    <h4>Nom</h4>
                    <p>{{Auth::user()->lastname}}</p>

                    <h4>Prénom</h4>
                    <p>{{Auth::user()->firstname}}</p>

                    <h4>Date de naissance</h4>
                    <p>{{Auth::user()->birthdate}}</p>

                    <h4>Email</h4>
                    <p>{{Auth::user()->email}}</p>

                    <h4>Numéro de téléphone</h4>
                    <p>{{Auth::user()->phoneNumber}}</p>

                    <div class="col-md-6 col-md-offset-4">
                        <form action="{{ url('profile/edit/'.Auth::user()->id) }}">
                            <input type="submit" class="btn btn-primary" value="Modifier">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection