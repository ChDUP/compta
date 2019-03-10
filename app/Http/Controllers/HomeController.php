<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $user['latests_invoices'] = $user->getLastInvoices(10);
        $user['total_month_invoices'] = $user->getTotalMonthInvoices();
        return view('home', compact('user'));
    }
}
