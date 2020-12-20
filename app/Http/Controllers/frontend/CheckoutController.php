<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Province;
use App\Model\District;
use App\Model\Ward;
class CheckoutController extends Controller
{
    private $module = "frontend.checkout";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!empty($request->id_province)){
            $district = Province::findOrFail((int)$request->id_province)
                                    ->Districts()
                                    ->get();
            return response()->json(['district'=>$district],200);
        }else if(!empty($request->id_district)){
            $ward = District::findOrFail((int)$request->id_district)
                                ->Wards()
                                ->get();
            return response()->json(['ward'=>$ward],200);
        }else if(!empty($request->id_ward)){
            $priceShip = Ward::findOrFail((int)$request->id_ward)->price_shipping;
            $totalPrice = Session('cart')->totalPrice + $priceShip;
            return response()->json(['priceShip'=>$priceShip,'totalPrice'=>$totalPrice],200);
        }else{
            $province = Province::all();
            return view($this->module.".page_checkout",compact('province'));
        }
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
