<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Client extends Model
{
    use HasFactory;

    public function add($data) {
        DB::table('client')->insert([
            'username' => $data[0],
            'account' => $data[1],
            'password' => $data[2],
        ]);
    }
    public function getAll() {
        return DB::select('SELECT * FROM client
        LEFT JOIN (
            SELECT order_sub.client_id,
            sum(order_sub.amount * products.price) as total_price
            from (SELECT * FROM mediamart.order WHERE mediamart.order.status = 0) as order_sub
            LEFT JOIN products on order_sub.product_id = products.id
            GROUP BY order_sub.client_id
        ) as order_sub on order_sub.client_id = client.id
        GROUP BY client.id
        ');
    }
    public function checkLogin($data) {
        return DB::table('client')
        ->where('account',$data[0])
        ->where('password',$data[1])
        ->get();
    }
    public function getById($id) {
        return DB::table('client')
        ->where('id',$id)
        ->get();
    }
    public function updateProfile($id, $data) {
        DB::table('client')->where('id',$id)->update([
            'address' => $data[0],
            'tel' => $data[1],
            'email' => $data[2],
            'path' => $data[3]
        ]);
    }
    public function editPassword($id, $password_new) {
        DB::table('client')->where('id',$id)->update([
            'password' => $password_new,
        ]);
    }
    
}
