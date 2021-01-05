<?php

namespace App\Exports;

use App\Model\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Carbon\Carbon;
class OrdersExportView implements FromView
{
	public function __construct($template){
        $this->template = $template;
    }

    public function view(): View
    {
    	$order = Order::whereMonth('created_at','=',Carbon::now()->month)->get();
        return view($this->template,compact('order'));
    }

}
