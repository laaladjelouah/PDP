@extends('layouts.app')

@section('title')
Carte de crédit
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
                <div class="panel-heading">Carte de crédit</div>
                <div class="panel-body">
                    <h4>Numéro de carte</h4>
                    <p>{{$credit_card_data['attributes']['credit_card_number']}}</p>

                    <h4>Nom du porteur</h4>
                    <p>{{$credit_card_data['attributes']['card_owner']}}</p>

                    <h4>Date d'expiration</h4>
                    <p>{{$credit_card_data['attributes']['expiration_date']}}</p>

                    <h4>Code de sécurité</h4>
                    <p>{{$credit_card_data['attributes']['cvv_code']}}</p>

                    <div class="col-md-6 col-md-offset-4">
                        <form action="{{ url('credit-card/edit/'.Auth::user()->id) }}">
                            <input type="submit" class="btn btn-primary" value="Modifier">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
