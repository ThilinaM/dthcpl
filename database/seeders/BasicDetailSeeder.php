<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BasicDetail;

class BasicDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        $details = [
            [
                'id'            => 1,
                'name'          => 'Admin',
                'description'   => '',
                'sms_serviceon' => '1',
              
            ],
        ];
        BasicDetail::insert($details);

    }
}
