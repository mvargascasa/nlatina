<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Partner;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        return view('admin.report.index');
    }

    public function indexleads(){

        $customers = Customer::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count', 'month_name');

        $labels = $customers->keys();
        $data = $customers->values();

        $partners = Partner::with('customers')->whereHas('customers')->orderBy('id', 'desc')->get();

        return view('admin.report.leadspartner.index', compact('partners', 'labels', 'data'));
    }

    public function showleadspartner($id){
        $partner = Partner::where('id', $id)->first();
        $customers = Customer::with('partners')->whereHas('partners', function($query) use ($id){
            $query->where('partner_id', $id);
        })->get();
        return view('admin.report.leadspartner.showleads', compact('partner', 'customers'));
    }
}