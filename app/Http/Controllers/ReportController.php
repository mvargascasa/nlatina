<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Partner;

class ReportController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        return view('admin.report.index');
    }

    public function indexleads(){
        $partners = Partner::with('customers')->orderBy('id', 'desc')->get();
        // $partners = Partner::with(['customers' => function($query){
        //     $query->groupBy('partners.id');
        // }])->get();
        $totalCustomers = Customer::count();
        return view('admin.report.leadspartner.index', compact('partners', 'totalCustomers'));
    }
}
