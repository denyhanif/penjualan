<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    protected $table= 'transaksi_detail';
    protected $primaryKey ='kd_transaksi_detail';
    protected $fillabe=[
        'kd_transaksi_detail',
        'no_faktur',
        'kd_produk',
        'jumlah',
        'harga'
    ];

    public function produk(){
        return $this->belongsTo('App\Produk','kd_produk');
    }
}
