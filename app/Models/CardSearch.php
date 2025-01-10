<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardSearch extends Model
{
    use HasFactory;
    protected $table = 'cardssearch';

    public function session()
    {
        return $this->belongsTo(Session::class,'session_id','id');
    }
}
