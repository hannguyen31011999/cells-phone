<?php

namespace App\Exports;

use App\Model\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Carbon\Carbon;
class OrdersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::whereMonth('created_at','=',Carbon::now()->month)->get();
    }

    public function headings(): array {
        return [
        	'ID',
            'Customer_ID',
            'Email',
            'Name',
            'Phone',
            'Address',
            'Payment',
            'Note',
            'Status',
            'Price_ship',
            'Total_price',
            'Created',
            'Updated'
        ];
    }
 
    public function map($order): array {
        return [
            $order->id,
            $order->customer_id,
            $order->email,
            $order->name,
            $order->phone,
            $order->address,
            $order->payment,
            $order->note,
            $order->status,
            $order->price_ship,
            $order->total_price,
            $order->created_at,
            $order->updated_at
        ];
    }

}
