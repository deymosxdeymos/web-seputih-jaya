<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'event';
    protected $fillable = [
        'nama_event',
        'foto',
        'original_tgl',
        'tgl',
    ];
}
