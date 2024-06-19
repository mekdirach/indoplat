<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pch1 extends Model
{
    use HasFactory;
    protected $table = 'pch1';

    protected $fillable = ['_token', 'itemcode', 'itemname', 'price'];

    public function opch()
    {
        return $this->belongsTo(opch::class, 'docentry');
    }
}
