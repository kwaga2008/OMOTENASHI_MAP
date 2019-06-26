<?php

use Illuminate\Database\Seeder;
use App\Area;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $file = new SplFileObject('database/seeds/areas.csv');
        $file->setFlags(SplFileObject::READ_CSV);

        $ary = array();
        foreach($file as $data) {
          array_push($ary, $data);
        }

        array_shift($ary);
        foreach($ary as $data) {
          Area::create(
            array(
              'area' => $data[1],
              'area_longitude' => $data[2],
              'area_latitude' => $data[3],
              'area_info' => $data[6],
              'area_en' => $data[7],
              
            )
          );
        }
    }
}
