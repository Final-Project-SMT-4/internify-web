<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $table = 'mst_prodi';
    protected $fillable = [
        'nama_prodi',
        'created_at',
        'updated_at'
    ];
}
