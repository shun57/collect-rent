<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;

class Lent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'lend_money',
        'interval',
    ];

    public function createdAt(): Attribute
    {
        return new Attribute(
            // アクセサ
            get: fn ($value) => Carbon::parse($value)->timezone('Asia/Tokyo')->format('Y-m-d')
        );
    }
}
