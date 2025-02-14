<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardDeck extends Model
{
    use HasFactory;
    protected $table = 'cardsdeck';

    public function deck()
    {
        return $this->belongsTo(Deck::class,'deck_id','id');
    }
}
