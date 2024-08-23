<?php

namespace Modules\Attendances\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AttendancesDatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
    }
}
