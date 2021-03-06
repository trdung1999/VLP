<?php

namespace App\Http\Livewire\Admin;

use App\Models\Debt;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Reciept;
use App\Models\Setting;
use Livewire\Component;

class BillComponent extends Component
{
    public $order_id;

    public function mount($order_id){
        $this->order_id = $order_id;
    }

    public function render()
    {
        $site = Setting::first();
        $order = Order::where('id',$this->order_id)->first();
        $items = OrderItem::where('order_id',$order->id)->get();
        $debt = Debt::where('order_id',$order->id)->first();
        $reciept = Reciept::where('order_id',$this->order_id)->first();
        return view('livewire.admin.bill-component',[
            'site' => $site,
            'order' => $order,
            'items' => $items,
            'debt' => $debt
        ])->layout('layouts.base');
    }
}
