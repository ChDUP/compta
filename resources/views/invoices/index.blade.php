@extends('layouts.app')

@section('title')
les factures
@endsection

@section('content')

@if ($search !='')
        <br/>
        <h2>Recherche : {{ $search }}</h2>
@endif

@foreach ($invoices as $year => $invoices)
         <h2 class="invoices_year" id="invoices-{{ $year }}">{{ $year }}</h2>
        @foreach ($invoices as $month => $invoices)

                <h3 class="invoices_month">{{ $month }}</h3>
                <section class="invoices-tiles">
                        @foreach($invoices->chunk(5) as $chunk)
                        <div class="tile is-ancestor has-text-centered">
                                @foreach($chunk as $invoice)
                                        <div class="tile is-parent">
                                                <a class="tile is-child box" href="/invoices/{{ $invoice->id }}">
                                                        <p class="invoice_title title">{{ ucfirst($invoice->title) }}</p>
                                                        <p class="subtitle">{{ $invoice->amount }}€</p>
                                                </a>
                                        </div>
                                @endforeach
                        </div>
                        @endforeach
                </section>
         @endforeach
@endforeach

@endsection
