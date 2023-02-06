<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Partner;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class ReportController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        return view('admin.report.index');
    }

    public function indexleads(){

        $chart_options = [
            'chart_title' => 'Users by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Partner',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];

        $chart = new LaravelChart($chart_options);

        $partners = Partner::with('customers')->whereHas('customers')->orderBy('id', 'desc')->get();

        return view('admin.report.leadspartner.index', compact('chart', 'partners'));
    }

    public function showleadspartner($id){
        $partner = Partner::where('id', $id)->first();
        $customers = Customer::with('partners')->whereHas('partners', function($query) use ($id){
            $query->where('partner_id', $id);
        })->get();
        return view('admin.report.leadspartner.showleads', compact('partner', 'customers'));
    }
}