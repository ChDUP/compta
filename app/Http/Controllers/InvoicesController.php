<?php

namespace App\Http\Controllers;

use App\Company;
use App\Invoice;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class InvoicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoices.index', ['invoices' => $invoices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $user = auth()->user();
        return view('invoices.create', compact('user'), compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($invoice = $request->file('invoice')) {
            $path = Storage::putFile(storage_path('uploads'), $invoice);
            $attributes = $this->validateInvoice();
            // $attributes['hash'] = pathinfo($invoice,PATHINFO_FILENAME);
            $attributes['hash'] = $path;
            $attributes['original_name'] = $invoice->getClientOriginalName();
            $attributes['user_id'] = auth()->id();

            $project = Invoice::create($attributes);

            return redirect('/home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        $invoice['month'] = $invoice->date->formatLocalized('%B');
        $invoice['year'] = $invoice->date->formatLocalized('%Y');

        return view('invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }

    protected function validateInvoice() {
        return request()->validate([
            'title' => ['required', 'min:3'],
            'amount' => ['required'],
            'date' => ['required'],
            'company_id' => ['required']
        ]);
    }

    public function download(Invoice $invoice) {
        abort_unless(auth()->user()->id == $invoice->user_id, 403);

        return (Storage::download($invoice->hash, $invoice->original_name));
    }
}
