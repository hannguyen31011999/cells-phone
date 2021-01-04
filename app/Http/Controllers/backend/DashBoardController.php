<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Order;
use App\Model\User;
use App\Model\Review;
use App\Model\Post;
use App\Model\Visitor;
use Carbon\Carbon;
class DashBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timeDay = date('Y-m-d 0:0:0');

        $countReview = Review::count();
        $countUser = User::count();
        $countPost = Post::count();
        $countOrder = Order::count();

        $revenue = Order::where('status',2)
                        ->select(
                            DB::raw('sum(total_price) as total'),
                            DB::raw('MONTH(created_at) as month'))
                        ->whereMonth('created_at','=',Carbon::now()->month)
                        ->groupBy('month')
                        ->first();
        $countNewUser = User::where('created_at','>', $timeDay)->count();
        $countNewOrder = Order::where('created_at','>',$timeDay)
                            ->where('status',0)
                            ->orWhere('status',1)
                            ->count();
        $visitor = Visitor::count();
        return view('backend.dashboard.index',compact('countReview','countUser','countPost','countOrder','revenue','countNewUser','countNewOrder','visitor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
