@extends('layouts.app')

@section('title')
Créditer votre compte
@endsection
<link rel="stylesheet" href="{{ URL::asset('css/Form.css') }}">
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
                <div class="panel-heading">Créditer votre compte</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" 
                          action="{{ url('payment/'.Auth::user()->id) }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('amount') ? ' 
has-error' : '' }}">
                            <label class="col-md-4 control-label">Montant <span 
                                    class="required">*</span> </label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" 
                                       name="amount" value="{{ old('amount') }}">

                                @if ($errors->has('amount'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('amount') 
                                        }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <span class="text-muted col-xs-12">
                                <em>Indiquez le montant que vous souhaitez
                                    créditer. Par exemple si vous souhaitez 
                                    créditer 20€, saisissez 20 dans le champ 
                                    ci-dessus.
                                </em>
                            </span>                           
                        </div>

                        <div class="form-group">
                            <span class="text-muted col-xs-12"><em>Les champs 
                                    indiqués par une <span class="required">*</span>
                                    sont obligatoires 
                                </em></span>                           
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Créditer
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