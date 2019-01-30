@extends('layouts.app')

@section('title')
utilisateur : {{ ucfirst($user->firstname) }} {{ strtoupper($user->lastname) }}
@endsection

@section('content')
<div class="columns">
    <div class="column is-10">
        <div class="columns is-marginless">
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
        </div>
    </div>
</div>
@endsection
