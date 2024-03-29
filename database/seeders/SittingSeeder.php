<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SittingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sittings')->delete();
        $sittings = [

                'site_run' => 1,
                'comment_run' => 1,
                'contact_mail' => 'exampole@mail.com' ,
                'contact_phone' => '7777777777',
                'view_lang' => 'ar'

        ];


        DB::table('sittings')->insert([
            'site_run' => $sittings ['site_run'],
            'comment_run' => $sittings ['comment_run'],
            'contact_mail' => $sittings ['contact_mail'],
            'contact_phone' => $sittings ['contact_phone'],
            'view_lang' => $sittings ['view_lang'],



        ]);
    }
}
