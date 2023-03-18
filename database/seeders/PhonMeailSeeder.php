<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PhonMeailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('phnemail')->delete();
        $phnemail = [[

            'name' => 'الرقم الأول',
            'content' => '711111111',
            'type' => 'P',
            'state' => 1,


        ], [
            'name' => 'الرقم الثاني',
            'content' => '72222222',
            'type' => 'P',
            'state' => 1,
        ], [
            'name' => 'الرقم الثالث',
            'content' => '72222222',
            'type' => 'P',
            'state' => 1,
        ], [

            'name' => 'الإيميل الأول',
            'content' => 'email1@mail.com',
            'type' => 'M',
            'state' => 1,


        ], [
            'name' => 'الإيميل الثاني',
            'content' => 'email2@mail.com',
            'type' => 'M',
            'state' => 1,
        ], [
            'name' => 'الإيميل الثالث',
            'content' => 'email3@mail.com',
            'type' => 'M',
            'state' => 1,
        ]];

        foreach ($phnemail as $key) {
            DB::table('phnemail')->insert([
                'name' => $key['name'],
                'content' => $key['content'],
                'type' => $key['type'],
                'state' => $key['state'],
            ]);
        }
    }
}
