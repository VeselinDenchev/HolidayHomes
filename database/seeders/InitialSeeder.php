<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dateTimeNow = Carbon::now();
        $dateTimeString = $dateTimeNow->toDateTimeString();

        $populatedPlaces = array(
            1 => 'Aytos',
            2 => 'Asenovgrad',
            3 => 'Balchik',
            4 => 'Bankya',
            5 => 'Bansko',
            6 => 'Belogradchik',
            7 => 'Berkovitsa',
            8 => 'Blagoevgrad',
            9 => 'Botevgrad',
            10 => 'Burgas',
            11 => 'Byala Slatina',
            12 => 'Varna',
            13 => 'Veliki Preslav',
            14 => 'Veliko Tarnovo',
            15 => 'Velingrad',
            16 => 'Vidin',
            17 => 'Vratsa',
            18 => 'Gabrovo',
            19 => 'Gorna Oryahovitsa',
            20 => 'Goce Delchev',
            21 => 'Devin',
            22 => 'Dimitrovgrad',
            23 => 'Dobrich',
            24 => 'Dolna Oryahovitsa',
            25 => 'Dryanovo',
            26 => 'Dupnitsa',
            27 => 'Elhovo',
            28 => 'Etropole',
            29 => 'Ivaylovgrad',
            30 => 'Isperih',
            31 => 'Ihtiman',
            32 => 'Kavarna',
            33 => 'Kazanlak',
            34 => 'Kalofer',
            35 => 'Karlovo',
            36 => 'Karnobat',
            37 => 'Koprivshtitsa',
            38 => 'Kostinbrod',
            39 => 'Kotel',
            40 => 'Kubrat',
            41 => 'Kardzhali',
            42 => 'Kyustendil',
            43 => 'Levski',
            44 => 'Lovech',
            45 => 'Lom',
            46 => 'Lukovit',
            47 => 'Lyaskovets',
            48 => 'Malko Tarnovo',
            49 => 'Melnik',
            50 => 'Mezdra',
            51 => 'Montana',
            52 => 'Nesebar',
            53 => 'Nova Zagora',
            54 => 'Obzor',
            55 => 'Omurtag',
            56 => 'Pavlikeni',
            57 => 'Pazardzhik',
            58 => 'Panagyurishte',
            59 => 'Pernik',
            60 => 'Petrich',
            61 => 'Peshtera',
            62 => 'Pirdop',
            63 => 'Pleven',
            64 => 'Pliska',
            65 => 'Plovdiv',
            66 => 'Pomorie',
            67 => 'Pravets',
            68 => 'Provadiya',
            69 => 'Parvomay',
            70 => 'Radnevo',
            71 => 'Razgrad',
            72 => 'Razlog',
            73 => 'Rakovski',
            74 => 'Ruse',
            75 => 'Sandanski',
            76 => 'Sveti Vlas',
            77 => 'Svilengrad',
            78 => 'Svishtov',
            79 => 'Svoge',
            80 => 'Sevlievo',
            81 => 'Silistra',
            82 => 'Simeonovgrad',
            83 => 'Sliven',
            84 => 'Slivnitsa',
            85 => 'Smolyan',
            86 => 'Sofia',
            87 => 'Sozopol',
            88 => 'Stamboliyski',
            89 => 'Stara Zagora',
            90 => 'Saedinenie',
            91 => 'Tervel',
            92 => 'Troyan',
            93 => 'Tryavna',
            94 => 'Tutrakan',
            95 => 'Targovishte',
            96 => 'Harmanli',
            97 => 'Haskovo',
            98 => 'Hisarya',
            99 => 'Tsarevo',
            100 => 'Chepelare',
            101 => 'Cherven Bryag',
            102 => 'Chernomorets',
            103 => 'Chiprovtsi',
            104 => 'Chirpan',
            105 => 'Shabla',
            106 => 'Shipka',
            107 => 'Shumen',
            108 => 'Yambol'
        );

        for ($populatedPlaceId = 1; $populatedPlaceId <= count($populatedPlaces); $populatedPlaceId++)
        {
            DB::table('populated_places')->insert([
                'id' => $populatedPlaceId,
                'populated_place_name' => $populatedPlaces[$populatedPlaceId],
                'created_at' => $dateTimeString,
                'updated_at' => $dateTimeString,
            ]);
        }

        //  ============================================================================
        // Object types
        $objectTypes = array(
            1 => 'Spa',
            2 => 'Rural tourism',
            3 => 'Hut'
        );

        for ($objectTypeId = 1; $objectTypeId <= count($objectTypes); $objectTypeId++)
        {
            DB::table('object_types')->insert([
                'id' => $objectTypeId,
                'object_type_name' => $objectTypes[$objectTypeId],
                'created_at' => $dateTimeString,
                'updated_at' => $dateTimeString,
            ]);
        }
    }
}
