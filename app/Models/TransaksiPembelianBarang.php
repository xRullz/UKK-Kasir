<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class TransaksiPembelianBarang extends Model
{
    protected $table = 'transaksi_pembelian_barang';
    protected $fillable = ["transaksi_pembelian_id", "master_barang_id", "jumlah", "harga_satuan"];
    use HasFactory;

    public function master_barang()
    {
        return $this->belongsTo('App\Models\Barang');
    }

    public function transaksi_pembelian()
    {
        return $this->belongsTo('App\Models\TransaksiPembelian');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y H:i:s');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->translatedFormat('l, d F Y H:i:s');
    }
}
