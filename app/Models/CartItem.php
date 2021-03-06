<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class CartItem extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = ['product_id','quantity'];
    // protected $guard = ['created_at'];
    protected $hidden = ['updated_at'];
    protected $appends = ['current_price'];

    public function getCurrentPriceAttribute()
    {
        return $this->quantity * 10;
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
