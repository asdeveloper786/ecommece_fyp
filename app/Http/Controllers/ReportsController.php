<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;
use Carbon\Carbon;

class ReportsController extends Controller
{
    public function index(){
return view('admin.reports.sales_reports');

    }

    public function checkReport(Request $request){
       if($request->week){
        $week=$request->week;
        $previous_week = strtotime("-1 week +1 day");
       $start_week = strtotime("last sunday midnight",$previous_week);
       $end_week = strtotime("next saturday",$start_week);
       $start_week = date("Y-m-d",$start_week);
       $end_week = date("Y-m-d",$end_week);

       $orders= DB::table('orders')->whereBetween('created_at', [$start_week, $end_week])->get();
        $sum= DB::table('orders')->whereBetween('created_at', [$start_week, $end_week])->sum('grand_total');
        return view('admin.reports.results',compact('orders','sum','start_week'));
       }elseif($request->month && $request->year){
           $month=$request->month;
           $year=$request->year;
        $orders= DB::table('orders')->whereYear('created_at', '=',$year)
        ->whereMonth('created_at', '=', $month)
        ->get();
        $sum= DB::table('orders')->whereYear('created_at', '=',$year)
        ->whereMonth('created_at', '=', $month)->sum('grand_total');
        return view('admin.reports.results',compact('orders','sum','month','year'));

       }elseif($request->year){

        $year=$request->year;
     $orders= DB::table('orders')->whereYear('created_at', '=',$year)

     ->get();
     $sum= DB::table('orders')->whereYear('created_at', '=',$year)
     ->sum('grand_total');
     return view('admin.reports.results',compact('orders','sum','year'));

       }else{
        $from=$request->from;
        $to=$request->to;
        $orders= DB::table('orders')->whereBetween('created_at', [$from, $to])->get();
        $sum= DB::table('orders')->whereBetween('created_at', [$from, $to])->sum('grand_total');
        return view('admin.reports.results',compact('orders','sum','from','to'));
       }


            }


}
