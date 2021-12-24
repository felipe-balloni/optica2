<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientPhone extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'phone',
        'ext'
    ];

}
