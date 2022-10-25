<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    public $term;

    protected $fillable = [
        'trash_id',
        'user_id',
        'quantity',
        'total',
        'status',
        'payment_url'
    ];

    // protected $table = 'transactions';

    public function trash()
    {
        return $this->hasOne(Trash::class, 'id', 'trash_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    // public function users()
    // {
    //     return $this->belongsTo(User::class, 'name');
    // }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
        // return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d m Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }
}
