@extends('layouts.app')

@section('title')
facture : {{ $invoice->title }}
@endsection

@section('content')
    <div class="columns">
        <div class="column is-12">
            <div class="columns is-marginless">
                <div class="column is-6">
                    <div class="card">
                        <header class="card-header">
                                <p class="card-header-title"><b>Détail</b></p>
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
                <div class="column is-6">
                    <div class="card">
                        <header class="card-header">
                                <p class="card-header-title"><b>Téléchargement</b></p>
                        </header>
                        <div class="card-content">
                            <a id="invoice_dl" href="/invoices/{{ $invoice->id }}/download" title="facture">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
