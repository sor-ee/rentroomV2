<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomrent extends Model
{
    use HasFactory;
    protected $table = 'roomrent';
    public function category() {
        return $this->belongsTo('App\Models\Category');
    }
}