@extends('layouts.app')

@section('title')
{{ ucfirst($user->firstname) }} {{ strtoupper($user->lastname) }}
@endsection

@section('subtitle')
Bienvenue !
@endsection

@section('content')
@include('layouts.tiles')
<div class="columns is-marginless">
    <!--
        <div class="column is-5">
        <div class="card">
            <header class="card-header">
                    <p class="card-header-title">Identité</p>
            </header>
            <div class="card-content">
                <ul>
                    <li>Rôle : <a href="/roles/{{ $user->role_id }}">{{ ucfirst($user->role->name) }}</a></li>
                    @if ($user->company_id)
                        <li>Société : {{ $user->company_id }}</li>
                    @endif
                    <li>Email : {{ $user->email }}</li>
                </ul>
            </div>
        </div>

        @if ($user->invoices->count())
            <br/>
            <div class="card">
                <header class="card-header">
                        <p class="card-header-title">Factures de {{ ucfirst($user->firstname) }}</p>
                </header>
                <div class="card-content">
                    <ul>
                        @foreach ($user->invoices as $invoice)
                            <li><a href="/invoices/{{ $invoice->id }}">{{ $invoice->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    </div>
-->
    @if ($user->latests_invoices->count())
    <div class="column is-6">
        <div class="card events-card latests-invoices">
            <header class="card-header">
                <p class="card-header-title">
                    Dernières factures
                </p>
                <a href="#" class="card-header-icon" aria-label="more options">
                <span class="icon">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                </span>
                </a>
            </header>
            <div class="card-table">
                <div class="content">
                    <table class="table is-fullwidth is-striped">
                        <tbody>
                            @foreach ($user->latests_invoices as $invoice)
                            <tr>
                                <td width="80%">{{ $invoice->title }}</td>
                                <td width="5%"><a href="/invoices/{{ $invoice->id }}/download" title="télécharger"><i class="fa fa-download"></i></a></td>
                                <td width="15%"><a class="button is-small is-primary" href="/invoices/{{ $invoice->id }}">Voir</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="card-footer">
                <a href="/invoices" class="card-footer-item">Voir toutes les factures</a>
            </footer>
        </div>
    </div>
    <div class="column is-6">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    Recherche
                </p>
                <a href="#" class="card-header-icon" aria-label="more options">
                    <span class="icon">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </span>
                </a>
            </header>
            <div class="card-content">
                <div class="content">
                    <form method="post" action="/invoices/search">
                        {{ csrf_field() }}
                        <div class="field control has-icons-left">
                            <input class="input is-large" type="text" name="search_term" placeholder="votre recherche" required autofocus>
                            <span class="icon is-medium is-left">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                        <div class="field is-grouped">
                            <div class="control">
                                <button name="search" value=1 class="button is-success">Rechercher</button>
                            </div>
                            <div class="control">
                                <button class="button is-text">Vider</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
