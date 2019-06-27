<?php

use Illuminate\Database\Seeder;
use App\Info;

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
        $file = new SplFileObject('database/seeds/infos.csv');
        $file->setFlags(SplFileObject::READ_CSV);

        $ary = array();
        foreach($file as $data) {
          array_push($ary, $data);
        }

        array_shift($ary);
        foreach($ary as $data) {
          Info::create(
            array(
              'id' => $data[0],
              'place_id' => $data[1],
              'information' => $data[2],
              
            )
          );
        }
    }
}
