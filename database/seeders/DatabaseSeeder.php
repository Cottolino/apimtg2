<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\GotCard;
use App\Models\Session;
use App\Models\SearchCard;

use App\Models\CardGot;
use App\Models\CardSearch;
use App\Models\CardTradeIn;
use App\Models\CardTradeOut;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        
        User::truncate();
        // GotCard::truncate();
        // SearchCard::truncate();
        CardGot::truncate();
        CardSearch::truncate();
        CardTradeIn::truncate();
        CardTradeOut::truncate();
        Session::truncate();
        

        User::factory(3)->create();

        // \App\Models\Session::factory(5)->has(
        //     GotCard::factory(10)
        // )->has(
        //     SearchCard::factory(10)
        // )->create();

        // \App\Models\Session::factory(5)->has(
        //     CardGot::factory(10)
        // )->has(
        //     CardSearch::factory(10)
        // )->create();
        
        // \App\Models\GotCard::factory(30)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


    }
}
