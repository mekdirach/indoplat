<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class opch extends Model
{
    use HasFactory;
    protected $table = 'opch';
    protected $primaryKey = 'docentry';

    protected $fillable = ['docnum', 'docdate'];

    public function pch1()
    {
        return $this->hasMany(pch1::class, 'docentry', 'docentry');
    }
}
