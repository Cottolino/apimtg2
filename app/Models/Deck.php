<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    use HasFactory;

    public function CardDeck()
    {
        return $this->hasMany(CardDeck::class,'deck_id','id');
    }
}
