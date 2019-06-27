<?php

use Illuminate\Database\Seeder;
use App\Review;

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
        $file = new SplFileObject('database/seeds/reviews.csv');
        $file->setFlags(SplFileObject::READ_CSV);

        $ary = array();
        foreach($file as $data) {
          array_push($ary, $data);
        }

        array_shift($ary);
        foreach($ary as $data) {
          Review::create(
            array(
              'id' => $data[0],
              'nickname' => $data[1],
              'text' => $data[2],
              'country' => $data[3],
              'feeling' => $data[4],
              'place_id' => $data[5],
            )
          );
        }
    }
}
