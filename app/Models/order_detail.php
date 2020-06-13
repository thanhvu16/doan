<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    protected $table = 'detail_order';
    protected $fillable = [
        'id_sp',
        'id_order',
        'gia',
        'sl',
        'tongtien',
        'stt',
];
    public function product()
    {
        return $this->hasOne(products::class, 'id', 'id_sp');
    }
    public function ordersp()
    {
        return $this->hasOne(order::class, 'id', 'id_order');
    }

}
