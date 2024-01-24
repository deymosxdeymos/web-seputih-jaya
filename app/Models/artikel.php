<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'artikel';
    protected $fillable = [
        'judul',
        'foto',
        'original_tgl',
        'tgl',
        'day',
        'month',
        'content'
    ];
}
