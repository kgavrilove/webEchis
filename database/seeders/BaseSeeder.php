<?php

namespace Database\Seeders;

use App\Models\AiData;
use App\Models\Asset;
use App\Models\Image;
use App\Models\User;
use Database\Factories\AssetFactory;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Factory::create();


        for ($i=1; $i<2; $i++){

        $user=User::factory()->create();
        $asset=Asset::factory()->create();
        $image=Image::factory()->make();
        $aiData=AiData::factory()->make();
        $asset->image()->save($image);//
        $asset->aiData()->save($aiData);
    }

        }

}
