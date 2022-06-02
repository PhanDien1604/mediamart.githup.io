<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class OrderController extends Controller
{
    public function __construct() {
        $this->order = new Order();
    }
    public function orderWaitConfirm() {
        $orderByCode = $this->order->getOrderByCode(0);
        $orders = [];
        foreach($orderByCode as $item) {
            $orders[] = [
                $item->code,
                $this->order->getOrderByStatus($item->code,0),
                $this->order->totalPriceOrder($item->code)[0]->total_price,
                $item->username,
                $item->tel,
                $item->address,
                $item->status
            ];
        }
        // dd($orders);
        return view('admin.orderWaitConfirm',compact('orders'));
    }
    public function orderWaitForTheGood() {
        $orderByCode = $this->order->getOrderByCode(1);
        $orders = [];
        foreach($orderByCode as $item) {
            $orders[] = [
                $item->code,
                $this->order->getOrderByStatus($item->code,1),
                $this->order->totalPriceOrder($item->code)[0]->total_price,
                $item->username,
                $item->tel,
                $item->address,
                $item->status
            ];
        }
        return view('admin.orderWaitForTheGood',compact('orders'));
    }
    public function orderDelivering() {
        $orderByCode = $this->order->getOrderByCode(2);
        $orders = [];
        foreach($orderByCode as $item) {
            $orders[] = [
                $item->code,
                $this->order->getOrderByStatus($item->code,2),
                $this->order->totalPriceOrder($item->code)[0]->total_price,
                $item->username,
                $item->tel,
                $item->address,
                $item->status
            ];
        }
        return view('admin.orderDelivering',compact('orders'));
    }
    public function orderDeliveySuccess() {
        $orderByCode = $this->order->getOrderByCode(3);
        $orders = [];
        foreach($orderByCode as $item) {
            $orders[] = [
                $item->code,
                $this->order->getOrderByStatus($item->code,3),
                $this->order->totalPriceOrder($item->code)[0]->total_price,
                $item->username,
                $item->tel,
                $item->address,
                $item->status
            ];
        }
        return view('admin.orderDeliveySuccess',compact('orders'));
    }

    public function editStatusOrder($orderId, $status) {
        if($status<3) {
            $status++;
            $this->order->editStatusOrder($orderId, $status);
        }else {

        }
        return back()->with('msg','Xác nhận đơn hàng thành công');
    }
}
