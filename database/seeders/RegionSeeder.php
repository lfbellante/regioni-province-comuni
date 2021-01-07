<?php

namespace Lfbellante\RegioniProvinceComuni;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regioni = file_get_contents(json_decode(config('regioni_province_comuni.json_source')));

        foreach ($regioni as $regione){
            DB::table('regions')->insert([
                'name' => $regione->regione->nome,
                'code' => $regione->regione->code,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
