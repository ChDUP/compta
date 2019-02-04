@extends('layouts.app')

@section('title')
facture : {{ $invoice->title }}
@endsection

@section('content')
    <div class="columns">
        <div class="column is-10">
            <div class="columns is-marginless">
                <div class="column is-7">
                        <div class="card">
                            <header class="card-header">
                                    <p class="card-header-title">Détail</p>
                            </header>
                            <div class="card-content">
                                <ul>
                                    <li>Mois : {{ $invoice->month }}</li>
                                    <li>Année : {{ $invoice->year }}</li>
                                    <li>Montant : {{ $invoice->amount }} €</li>
                                    <li>Concerne : {{ $invoice->company->name }}</li>
                                    <li>Ajoutée par : <a href="/users/{{ $invoice->user_id }}">{{ ucfirst($invoice->user->firstname) }}</a></li>
                                </ul>
                            </div>
                        </div>
                </div>
            </div>
            <div class="columns is-marginless">
                <div class="column is-8">
                    <a href="/invoices/{{ $invoice->id }}/download">Télécharger la facture</a>
                </div>
            </div>
        </div>
    </div>
@endsection
