<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
           ['name'=>'Боевик', 'img_path'=>'https://drive.google.com/uc?export=view&id=16k3ZFbn3e7ecoXBwBZUDSV2UbMZB0UR9'],
            ['name'=>'Детектив', 'img_path'=>'https://drive.google.com/uc?export=view&id=1p8B9O01uMVxQJ2skZ2RYVRx5S9KrDcmr'],
            ['name'=>'Драма', 'img_path'=>'https://drive.google.com/uc?export=view&id=1qlA64RETTKDBAwfncMqdpP49Kn1lZxux'],
            ['name'=>'Исторические', 'img_path'=>'https://drive.google.com/uc?export=view&id=1Ra7-F2hBcmGYJCwTUweYX4-e1HueVsNU'],
            ['name'=>'Комедия', 'img_path'=>'https://drive.google.com/uc?export=view&id=144uxU5y9oG_xAuZ520lkyWSSXXDzLfvE'],
            ['name'=>'Мелодрама', 'img_path'=>'https://drive.google.com/uc?export=view&id=1FJ1KuSC2an_EI5tKnfvB1OcmVyHW716O'],
            ['name'=>'Мюзикл', 'img_path'=>'https://drive.google.com/uc?export=view&id=1xC-QpbAGRAepv0ryhczBtKa-ZqcGeD7Y'],
            ['name'=>'Триллер', 'img_path'=>'https://drive.google.com/uc?export=view&id=1-LZXT5D0hgW5C05tBiDJ3x0h6K6qDwsD'],
            ['name'=>'Ужасы', 'img_path'=>'https://drive.google.com/uc?export=view&id=1ceOPvGTGQZIVUIEIlzcjQEeZ58V7vTCl'],
            ['name'=>'Катастрофы', 'img_path'=>'https://drive.google.com/uc?export=view&id=1AtCNxvKknvmMIOZRZ-eNjhs9ROanEEmH'],
            ['name'=>'Фентези', 'img_path'=>'https://drive.google.com/uc?export=view&id=1yGCsvORnxDGh-3YPR0xWcSTC8DVLHUmP'],
            ['name'=>'Фантастика', 'img_path'=>'https://drive.google.com/uc?export=view&id=1s2pJOBIi-Nt2RB0ltKhKiVQR_xcBPm5z']
        ]);
    }
}
