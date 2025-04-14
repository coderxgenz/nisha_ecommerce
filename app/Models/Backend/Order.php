<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'order_number',
        'billing_address_id',
        'shipping_address_id',
        'tax',
        'discount',
        'shipping_charge',
        'total_amount',
        'order_date',
        'shipping_date',
        'delivery_date',
        'cancel_date',
        'return_date',
        'cancel_reason',
        'return_reason',
        'delivery_status',
        'payment_mode',
        'razorpay_id',
        'payment_status'
    ];

    public function getOrderProducts(){
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public function getShippingAddress(){
        return $this->belongsTo(ShippingDetail::class, 'shipping_address_id');
    }
    public function getBillingAddress(){
        return $this->belongsTo(BillingDetail::class, 'billing_address_id');
    }
    public function getUser(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
