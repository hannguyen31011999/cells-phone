<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Order;
use App\Model\User;
use App\Model\ProductDetail;
use Carbon\Carbon;
class StatisticalController extends Controller
{
	private $module = "backend.statistical";

	public function statisticalRevenue(Request $request)
	{
		if($request->ajax()){
			if(!empty($request->month)){
				$revenue = Order::where('status',2)
		                        ->select(
		                            DB::raw('sum(total_price) as total'),
		                            DB::raw('DAY(created_at) as day'))
		                        ->whereMonth('created_at','=',$request->month)
		                        ->whereYear('created_at','=',$request->year)
		                        ->groupBy('day')
		                        ->get();
		        return $revenue;
			}else{
				$revenue = Order::where('status',2)
		                        ->select(
		                            DB::raw('sum(total_price) as total'),
		                            DB::raw('MONTH(created_at) as month'))
		                        ->whereYear('created_at','=',$request->year)
		                        ->groupBy('month')
		                        ->get();
		        return $revenue;                
			}
		}else{
			$revenue = Order::where('status',2)
	                        ->select(
	                            DB::raw('sum(total_price) as total'),
	                            DB::raw('MONTH(created_at) as month'))
	                        ->whereYear('created_at','=',Carbon::now()->year)
	                        ->groupBy('month')
	                        ->get();
	        return view($this->module.'.statistical_revenue',compact('revenue'));
		}
	}

	public function statisticalOrder(Request $request)
	{
		if($request->ajax()){
			if(!empty($request->month)){
				$revenue = Order::select(
		                            DB::raw('count(*) as total'),
		                            DB::raw('DAY(created_at) as day'))
		                        ->whereMonth('created_at','=',$request->month)
		                        ->whereYear('created_at','=',$request->year)
		                        ->groupBy('day')
		                        ->get();
		        return $revenue;
			}else{
				$revenue = Order::select(
		                            DB::raw('count(*) as total'),
		                            DB::raw('MONTH(created_at) as month'))
		                        ->whereYear('created_at','=',$request->year)
		                        ->groupBy('month')
		                        ->get();
		        return $revenue;                
			}
		}else{
			$revenue = Order::select(
	                            DB::raw('count(*) as total'),
	                            DB::raw('MONTH(created_at) as month'))
	                        ->whereYear('created_at','=',Carbon::now()->year)
	                        ->groupBy('month')
	                        ->get();
	        return view($this->module.'.statistical_order',compact('revenue'));
		}
	}

	public function statisticalUser(Request $request)
	{
		if($request->ajax()){
			if(!empty($request->month)){
				$revenue = User::where('role',0)
								->select(
		                            DB::raw('count(*) as total'),
		                            DB::raw('DAY(created_at) as day'))
		                        ->whereMonth('created_at','=',$request->month)
		                        ->whereYear('created_at','=',$request->year)
		                        ->groupBy('day')
		                        ->get();
		        return $revenue;
			}else{
				$revenue = User::where('role',0)
								->select(
		                            DB::raw('count(*) as total'),
		                            DB::raw('MONTH(created_at) as month'))
		                        ->whereYear('created_at','=',$request->year)
		                        ->groupBy('month')
		                        ->get();
		        return $revenue;                
			}
		}else{
			$revenue = User::where('role',0)
							->select(
	                            DB::raw('count(*) as total'),
	                            DB::raw('MONTH(created_at) as month'))
	                        ->whereYear('created_at','=',Carbon::now()->year)
	                        ->groupBy('month')
	                        ->get();
	        return view($this->module.'.statistical_user',compact('revenue'));
		}
	}

	public function statisticalProduct(Request $request)
	{
		if($request->ajax()){
			if(!empty($request->month)){
				$revenue = ProductDetail::select(
		                            DB::raw('count(*) as total'),
		                            DB::raw('DAY(created_at) as day'))
		                        ->whereMonth('created_at','=',$request->month)
		                        ->whereYear('created_at','=',$request->year)
		                        ->groupBy('day')
		                        ->get();
		        return $revenue;
			}else{
				$revenue = ProductDetail::select(
		                            DB::raw('count(*) as total'),
		                            DB::raw('MONTH(created_at) as month'))
		                        ->whereYear('created_at','=',$request->year)
		                        ->groupBy('month')
		                        ->get();
		        return $revenue;                
			}
		}else{
			$revenue = ProductDetail::select(
	                            DB::raw('count(*) as total'),
	                            DB::raw('MONTH(created_at) as month'))
	                        ->whereYear('created_at','=',Carbon::now()->year)
	                        ->groupBy('month')
	                        ->get();
	        return view($this->module.'.statistical_product',compact('revenue'));
		}
	}
}
