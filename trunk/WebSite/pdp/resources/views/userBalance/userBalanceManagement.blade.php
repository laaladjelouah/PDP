@extends('layouts.app')

@section('title')
Gestion du solde
@endsection

@section('content')
<div class="container">
    <h1 >Bienvenue {{ Auth::user()->firstname }}</h1>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-heading">Gestion du solde</div>

                <div class="panel-body">
                    <div class="list-group">                     
                        <a  href="balance" 
                            class="list-group-item list-group-item-info">
                            Solde actuel
                        </a>                      
                        <a  href="credit-card"
                            class="list-group-item list-group-item-info">
                            Carte de crédit
                        </a>                      
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
