@extends('layouts.app')

@section('title')
Historique de virement
@endsection

@section('content')

<div class="container">
    <h2>Historique de virement</h2>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>Numéro de facture</th>
                <th>Ancien solde</th>
                <th>Nouveau solde</th>
                <th>Montant crédité</th>
                <th>Nom du porteur</th>
                <th>Numéro de carte</th>
                <th>Code de sécurité</th>
                <th>Date d'expiration</th>
                <th>Date du virement</th>
                <th>Référence de facture</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($data); $i++)
            <tr>
                <td>{{ $data[$i]->id }}</td>
                <td>{{ $data[$i]->old_amount }}</td>
                <td>{{ $data[$i]->new_amount }}</td>
                <td>{{ $data[$i]->added_money }}</td>
                <td>{{ $data[$i]->card_owner }}</td>
                <td>{{ $data[$i]->credit_card_number }}</td>
                <td>{{ $data[$i]->cvv_code }}</td>
                <td>{{ $data[$i]->expiration_date }}</td>
                <td>{{ $data[$i]->created_at }}</td>
                <td>{{ $data[$i]->invoice_number }}</td>
            </tr>
            @endfor
        </tbody>
    </table>
</div>
@endsection