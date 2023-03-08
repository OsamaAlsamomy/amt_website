<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SocialmediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('socialmedia')->delete();
        $socialmedia = [[
            'name' => 'facebook',
            'url' => 'amt.com',
            'state' => 1


        ], [
            'name' => 'twitter',
            'url' => 'amt.com',
            'state' => 1
        ], [
            'name' => 'whatsapp',
            'url' => 'amt.com',
            'state' => 1
        ], [

            'name' => 'telegram',
            'url' => 'amt.com',
            'state' => 1
        ], [
            'name' => 'inestgram',
            'url' => 'amt.com',
            'state' => 1
        ], [
            'name' => 'youtup',
            'url' => 'amt.com',
            'state' => 1
        ]];

        foreach ($socialmedia as $key) {
            DB::table('socialmedia')->insert([
                'name' => $key['name'],
                'url' => $key['url'],

                'state' => $key['state'],
            ]);
        }
    }
}
