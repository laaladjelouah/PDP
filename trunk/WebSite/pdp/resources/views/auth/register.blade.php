@extends('layouts.app')

@section('title')
Inscription
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
                <div class="panel-heading">Inscription</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" 
                          action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('lastname') ? ' 
has-error' : '' }}">
                            <label class="col-md-4 control-label">Nom <span 
                                    class="required">*</span></label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" 
                                       name="lastname" value="{{ old('lastname') }}">

                                @if ($errors->has('lastname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lastname') 
                                        }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('firstname') ? ' 
has-error' : '' }}">
                            <label class="col-md-4 control-label">Prénom <span 
                                    class="required">*</span> </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" 
                                       name="firstname" value="{{ old('firstname') }}">

                                @if ($errors->has('firstname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('firstname') 
                                        }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('birthdate') ? ' 
has-error' : '' }}">
                            <label class="col-md-4 control-label">Date de 
                                naissance <span class="required">*</span> </label>

                            <div class="col-md-6">
                                <input type="date" class="form-control" 
                                       name="birthdate" value="{{ old('birthdate') }}">

                                @if ($errors->has('birthdate'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('birthdate') 
                                        }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' 
has-error' : '' }}">
                            <label class="col-md-4 control-label">Adresse 
                                e-mail <span class="required">*</span> </label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" 
                                       name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') 
                                        }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' 
has-error' : '' }}">
                            <label class="col-md-4 control-label">Mot de passe 
                                <span class="required">*</span> </label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" 
                                       name="password">

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') 
                                        }}</strong>
                                </span>
                                @endif
                            </div>
                            <span class="text-muted"><em>Minimum 6 
                                    caractères</em></span>
                        </div>

                        <div class="form-group{{ 
$errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirmation 
                                du mot de passe <span class="required">*</span> </label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" 
                                       name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ 
$errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phoneNumber') ? 
' has-error' : '' }}">
                            <label class="col-md-4 control-label">Numéro de 
                                téléphone <span class="required">*</span> </label>

                            <div class="col-md-6">
                                <input type="tel" class="form-control" 
                                       name="phoneNumber" value="{{ old('phoneNumber') }}"  >

                                @if ($errors->has('phoneNumber'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phoneNumber') 
                                        }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ 
$errors->has('credit_card_number') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Numéro de 
                                carte <span class="required">*</span> </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" 
                                       name="credit_card_number" value="{{ 
                                           old('credit_card_number') }}">

                                @if ($errors->has('credit_card_number'))
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
                                       name="card_owner" value="{{ old('card_owner') }}">

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
                                           old('expiration_date') }}">

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
                                       name="cvv_code" value="{{ old('cvv_code') }}">
                                @if ($errors->has('cvv_code'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cvv_code') 
                                        }}</strong>
                                </span>
                                @endif
                            </div>
                            <span class="text-muted"><em>Les trois derniers 
                                    chiffres situés au dos de votre
                                    carte bancaire</em></span>
                        </div>
                        <div class="form-group">
                            <span class="text-muted col-xs-12"><em>Les champs 
                                    indiqués par une <span class="required">*</span>
                                    sont obligatoires </em></span>
                            <span class="text-muted col-xs-12"><em>En cliquant 
                                    sur Inscription, vous acceptez <a href='#'>la charte</a> 
                                    d'utilisation</em></span>
                        </div> 

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Inscription
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection