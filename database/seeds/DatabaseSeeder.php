<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
Use Carbon\Carbon;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run() {














        DB::table('users')->insert([  //admin è il concessionario in realtà
            [ 'name' => 'Admin', 'cognome' => 'Admin',  'username' => 'concconc', 'password' => Hash::make('concconc'), 'livello' => 'concessionario','auto' => 'concconc','targa' => 'concconc','datavendita' =>  Carbon::create('2000','02','01') ,'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],

        ]);


    }

}
