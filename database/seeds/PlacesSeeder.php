<?php

use Illuminate\Database\Seeder;
use App\Place;

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
        $file = new SplFileObject('database/seeds/places.csv');
        $file->setFlags(SplFileObject::READ_CSV);

        $ary = array();
        foreach($file as $data) {
          array_push($ary, $data);
        }

        array_shift($ary);
        foreach($ary as $data) {
          Place::create(
            array(
              'place_ja' => $data[1],
              'place_en' => $data[2],
              'longitude' => $data[3],
              'latitude' => $data[4],
              'area_id' => $data[7],
              'img_src' => $data[8],
              'link' => $data[9],
              'insta1' => $data[10],
              'insta2' => $data[11],
              'instaname' => $data[12],
            )
          );
        }
    }
}
