<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class usersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = DB::table('users')->where('email','mohammedsamir797@yahoo.com')->first();

        if (!$users){
             \App\User::create([
                'name'=>'mohamed',
                'email'=>'mohammedsamir797@yahoo.com',
                'password'=> Hash::make('mohammedsamir797'),
                'group'=>'admin'
            ]);
        }
    }
}
