<?php

namespace Database\Seeders;

use App\Common\Constants;
use Illuminate\Database\Seeder;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Exception;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=25;$i++){
            Products::create([
                'name'=> Str::random(10),
                'category_id'=> rand(1, 5),
                'price'=> rand(100, 10000),
                'amount'=> rand(100, 10000),
                'image'=> Str::random(10),
                'status' =>Constants::STATUS[rand(0, 1)],
            ]);
        }
    }
}
