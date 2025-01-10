<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardGot extends Model
{
    use HasFactory;
    protected $table = 'cardsgot';

    public function session()
    {
        return $this->belongsTo(Session::class,'session_id','id');
    }
}
