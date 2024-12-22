<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\GotCard;
use App\Models\SearchCard;

use App\Models\CardGot;
use App\Models\CardSearch;
use App\Models\CardTradeIn;
use App\Models\CardTradeOut;

class Session extends Model
{
    use HasFactory;
    // public function gotCard()
    // {
    //     return $this->hasMany(GotCard::class);
    // }
    // public function SearchCard()
    // {
    //     return $this->hasMany(SearchCard::class);
    // }
    public function CardGot()
    {
        return $this->hasMany(CardGot::class,'session_id','id');
    }
    public function CardSearch()
    {
        return $this->hasMany(CardSearch::class,'session_id','id');
    }
    public function CardTradeIn()
    {
        return $this->hasMany(CardTradeIn::class,'session_id','id');
    }
    public function CardTradeOut()
    {
        return $this->hasMany(CardTradeOut::class,'session_id','id');
    }
}
