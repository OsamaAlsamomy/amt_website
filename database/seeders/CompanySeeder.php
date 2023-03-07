<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('company')->delete();
        $company = [

                'name' => 'اسم الشركة',
                'desc' => 'وصف الشركة',
                'address' => 'عنوان الشركة' ,
                'long' => '2334ق34',
                'lat' => '3453453',
                'about' =>'نص تجريبي فقط لا غير وليس له اي علاقة بمحتوى الموقع'

        ];


        DB::table('company')->insert([
            'name' => $company ['name'],
            'desc' => $company ['desc'],
            'address' => $company ['address'],
            'long' => $company ['long'],
            'lat' => $company ['lat'],
            'about' => $company ['about']


        ]);
    }
}
