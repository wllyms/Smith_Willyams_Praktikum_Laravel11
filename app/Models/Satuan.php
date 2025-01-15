<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Satuan extends Model
{
    use HasFactory;

    protected $table = 'satuans';
    protected $fillable = [
        'nik',
        'name',
        'description',
    ];
}
