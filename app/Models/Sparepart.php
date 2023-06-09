<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    protected $table = 'spareparts';

    protected $fillable = [
        'namaitem', 
        'stok', 
        'harga',
    ];

    // Jika ada timestamp (created_at, updated_at), tambahkan property ini
    public $timestamps = false;

    public function service()
    {
        return $this->hasMany(Service::class);
    }
}
