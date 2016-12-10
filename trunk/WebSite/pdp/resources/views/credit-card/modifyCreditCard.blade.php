@extends('layouts.app')

@section('title')
carte de credit
@endsection
<link rel="stylesheet" href="{{ URL::asset('css/Form.css') }}">
@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Modification de la carte de 
                    crédit</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" 
                          action="{{ url('/credit-card/update/'.Auth::user()->id) }}">
                        {!! csrf_field() !!}


                        <div class="form-group{{ 
$errors->has('credit_card_number') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Numéro de 
                                carte <span class="required">*</span> </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" 
                                       name="credit_card_number" value="{{ 
                                           old('credit_card_number', 
$credit_card_data['attributes']['credit_card_number']) }}">

                                @if ($errors->has('card_number'))
                                <span class="help-block">
                                    <strong>{{ 
$errors->first('credit_card_number') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('card_owner') ? ' 
has-error' : '' }}">
                            <label class="col-md-4 control-label">Nom du 
                                porteur <span class="required">*</span> </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" 
                                       name="card_owner" value="{{ old('card_owner',  
$credit_card_data['attributes']['card_owner']) }}">

                                @if ($errors->has('card_owner'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('card_owner') 
                                        }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ 
$errors->has('expiration_date') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Date 
                                d'expiration <span class="required">*</span> </label>

                            <div class="col-md-4">
                                <input type="month" class="form-control" 
                                       name="expiration_date" value="{{ 
                                           old('expiration_date',  
$credit_card_data['attributes']['expiration_date']) }}">

                                @if ($errors->has('expiration_date'))
                                <span class="help-block">
                                    <strong>{{ 
$errors->first('expiration_date') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cvv_code') ? ' 
has-error' : '' }}">
                            <label class="col-md-4 control-label">Code de 
                                sécurité <span class="required">*</span> </label>

                            <div class="col-md-2">
                                <input type="text" class="form-control" 
                                       name="cvv_code" value="{{ old('cvv_code',  
$credit_card_data['attributes']['cvv_code']) }}">

                                @if ($errors->has('security_code'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cvv_code') 
                                        }}</strong>
                                </span>
                                @endif
                            </div>
                            <span class="text-muted"><em>Les trois derniers 
                                    chiffres situés au dos de votre
                                    carte bancaire</em></span>
                            <div class="form-group">
                                <span class="text-muted col-xs-12"><em>Les 
                                        champs indiqués par une 
                                        <span class="required">*</span>
                                        sont obligatoires 
                                    </em></span>                               
                            </div> 
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn 
                                            btn-primary">
                                        <i class="fa fa-btn 
                                           fa-user"></i>Modifier
                                    </button>
                                </div>
                            </div>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection