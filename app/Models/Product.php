<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primary_key = 'id';
    protected $fillable = ['product_name', 'price', 'quantity'];
    protected $hidden = ['created_at', 'updated_at'];
    public function storeLocation()
    {
        return $this->hasMany(Store::class);
    }
    public function company()
    {
        return $this->belongsToMany(Company::class);
    }
}
