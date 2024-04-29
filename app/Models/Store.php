<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $table = 'stores';
    protected $primary_key = 'id';
    public $timestamps = false;
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
