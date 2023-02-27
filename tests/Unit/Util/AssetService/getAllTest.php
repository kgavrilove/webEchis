<?php

namespace Tests\Unit\Util\AssetService;

use App\Models\AiData;
use App\Models\Asset;
use App\Models\Image;
use App\Util\AssetService;
use Database\Seeders\BaseSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class getAllTest extends TestCase
{
    protected AssetService $service;

    use RefreshDatabase;
    use DatabaseMigrations;

    public function testGetAllData(): void
    {
        Artisan::call('db:seed');
        $output=$this->service->getAllAssets();
        self::assertIsArray($output);
        self::assertNotEmpty($output);

    }

    public function testGetEmptyData(): void
    {

        $output=$this->service->getAllAssets();
        self::assertIsArray($output);
        self::assertEmpty($output);
    }


    protected function setUp(): void
    {
        $this->service=new AssetService();
        parent::setUp();
    }


}
