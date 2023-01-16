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
        $partners = Partner::with('customers')->whereHas('customers')->orderBy('id', 'desc')->get();
        return view('admin.report.leadspartner.index', compact('partners'));
    }

    public function showleadspartner($id){
        $partner = Partner::where('id', $id)->first();
        $customers = Customer::with('partners')->whereHas('partners', function($query) use ($id){
            $query->where('partner_id', $id);
        })->get();
        return view('admin.report.leadspartner.showleads', compact('partner', 'customers'));
    }
}