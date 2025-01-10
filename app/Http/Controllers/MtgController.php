<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\CardGot;
use App\Models\CardSearch;
use App\Models\CardDeck;
use App\Models\Deck;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MtgController extends Controller
{
    public function cardsSession(Request $request)
    {
        $id = $request->input('id');
        
        $res = [
            'result' => $id,
            'error' => '',
            'message' => '',
            'cardsGot' => array(),
            'cardsSearch' => array(),
            'cardsTradeIn' => array(),
            'cardsTradeOut' => array()
        ];
        
        $res['cardsGot'] = DB::table('cardsgot')->where('session_id','=',$id)->get();
        $res['cardsSearch'] = DB::table('cardssearch')->where('session_id','=',$id)->get();
        $res['cardsTradeIn'] = DB::table('cardstradein')->where('session_id','=',$id)->get();
        $res['cardsTradeOut'] = DB::table('cardstradeout')->where('session_id','=',$id)->get();

        
        return $res;

    }
    public function deleteSession(Request $request)
    {
        $id = $request->input('id');

        $res = [
            'result' => $id,
            'error' => '',
            'message' => 'Errore delete',
            'cardsGot' => array(),
            'cardsSearch' => array(),
            'cardsTradeIn' => array(),
            'cardsTradeOut' => array()
        ];

        $result = DB::table('sessions')->where('id','=',$id)->delete();
        if($result)
        {
            $res['message'] = 'OK delete';
        }
        // return DB::table('sessions')->get();
        return $res;
    }

    public function saveSession(Request $request)
    {
        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);

        $res = [
            'result' => 0,
            'error' => 0,
            'message' => 'Creato!'
          ];

        $session = $request->input('nameSession');

        if(DB::table('sessions')->where('name',$session)->exists())
        {
            $res['message'] = 'Sessione già esistente!Cambia nome per preseguire!';
            $res['error']++;
        }
        else
        {
            // dd($request->all());
            DB::table('sessions')->insert(['name' => $session]);

            $row = DB::table('sessions')->where('name',$session)->first();
            $session_id = $row->id;

            $cardsgot = $request->input('cardsGot');
            $cardssearch = $request->input('cardsSearch');
            $cardstradein = $request->input('cardsTradeIn');
            $cardstradeout = $request->input('cardsTradeOut');

            foreach($cardsgot as $item)
            {
                $item['session_id'] = $session_id;

                // $flavor = ($item['flavor'] == null) ? '' : $item['flavor'];
                // $item['flavor'] = filter_var($flavor,FILTER_SANITIZE_ADD_SLASHES);
                
                $item['created_at'] = \Carbon\Carbon::now();

                DB::table('cardsgot')->insert($item);
                $res['result']++;
            }
            foreach($cardssearch as $item)
            {
                $item['session_id'] = $session_id;
                $item['created_at'] = \Carbon\Carbon::now();
                DB::table('cardssearch')->insert($item);
                $res['result']++;
            }
            foreach($cardstradein as $item)
            {
                $item['session_id'] = $session_id;
                $item['created_at'] = \Carbon\Carbon::now();
                DB::table('cardstradein')->insert($item);
                $res['result']++;
            }
            foreach($cardstradeout as $item)
            {
                $item['session_id'] = $session_id;
                $item['created_at'] = \Carbon\Carbon::now();
                DB::table('cardstradeout')->insert($item);
                $res['result']++;
            }
            
        }
        return $res;

    }
    public function saveDeck(Request $request)
    {
        $res = [
            'result' => 0,
            'error' => 0,
            'message' => 'Creato!'
          ];

        $deck = $request->input('nameDeck');

        $res['nameDeck'] = $deck;

        
        if(DB::table('decks')->where('name',$deck)->exists())
        {
            $res['message'] = 'Deck già esistente!Cambia nome per preseguire!';
            $res['error']++;
        }
        else
        {
            // dd($request->all());
            DB::table('decks')->insert(['name' => $deck]);

            $row = DB::table('decks')->where('name',$deck)->first();
            $deck_id = $row->id;

            // $cardsdeck = $request->input('cardsDeck');
            $creature = $request->input('creature');

            foreach($creature as $item)
            {
                $item['deck_id'] = $deck_id;
                $item['created_at'] = \Carbon\Carbon::now();
                DB::table('cardsdeck')->insert($item);
                $res['result']++;
            }

            $instant = $request->input('instant');

            foreach($instant as $item)
            {
                $item['deck_id'] = $deck_id;
                $item['created_at'] = \Carbon\Carbon::now();
                DB::table('cardsdeck')->insert($item);
                $res['result']++;
            }

            $sorcery = $request->input('sorcery');

            foreach($sorcery as $item)
            {
                $item['deck_id'] = $deck_id;
                $item['created_at'] = \Carbon\Carbon::now();
                DB::table('cardsdeck')->insert($item);
                $res['result']++;
            }

            $artifact = $request->input('artifact');

            foreach($artifact as $item)
            {
                $item['deck_id'] = $deck_id;
                $item['created_at'] = \Carbon\Carbon::now();
                DB::table('cardsdeck')->insert($item);
                $res['result']++;
            }

            $other = $request->input('other');

            foreach($other as $item)
            {
                $item['deck_id'] = $deck_id;
                $item['created_at'] = \Carbon\Carbon::now();
                DB::table('cardsdeck')->insert($item);
                $res['result']++;
            }
            
        }
        return $res;
    }
    
    public function sessions()
    {
        return Session::get();
    }
    public function decks()
    {
        return Deck::get();
    }
    public function deck($id)
    {
        return Deck::find($id)->CardDeck()->get();
    }

    // BelongsTo
    public function cardGotSession($id)
    {
        return CardGot::findOrFail($id)->session()->get();
    }
    public function cardSearchSession($id)
    {
        return CardSearch::findOrFail($id)->session()->get();
    }
    public function cardDeck($id)
    {
        return CardDeck::findOrFail($id)->deck()->get();
    }

}
