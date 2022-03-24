<?php

namespace Database\Seeders;

use App\Common\Constants;
use Illuminate\Database\Seeder;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Exception;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=5;$i++){
            Categories::create([
                'name'=> Str::random(10),
                'status' =>Constants::STATUS[rand(0, 1)],
            ]);
        }
    }
}
