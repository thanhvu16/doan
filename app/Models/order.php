<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'order';
    protected $fillable = [
        'id_sp',
        'id_customer',
        'stt'
];
    public function khachhang()
    {
        return $this->hasOne(customer::class, 'id', 'id_customer');
    }
    public function orderDetail()
    {
        return $this->hasMany(order_detail::class, 'id_order', 'id');
    }
}
