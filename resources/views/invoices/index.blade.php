@extends('layouts.app')

@section('title')
les factures
@endsection

@section('content')
<div class="columns">
        <div class="column is-10">
                <div class="content is-medium">
                        <ul>
                                @foreach ($invoices as $invoice)
                                        <li><a href="/invoices/{{ $invoice->id }}">{{ ucfirst($invoice->name) }}</a></li>
                                @endforeach
                        </ul>
                </div>
        </div>
</div>
@endsection
