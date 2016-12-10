@extends('layouts.app')

@section('title')
Bienvenue
@endsection

@section('content')
<div class="container">
    <h1 >Bienvenue {{ Auth::user()->firstname }}</h1>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-heading">Espace personnel</div>

                <div class="panel-body">
                    <div class="list-group">
                        <a id="espace-personnel" href="profile" 
                           class="list-group-item list-group-item-info">
                            Profil
                        </a>                      
                        <a  href="subscription" 
                            class="list-group-item list-group-item-info">
                            Abonnement
                        </a>                      
                        <a  href="userBalanceManagement"
                            class="list-group-item list-group-item-info">
                            Gestion du solde
                        </a>                      
                        <a  href="history/payment" 
                            class="list-group-item list-group-item-info">
                            Historique de virement
                        </a>                      
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection