<?php
namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class TestWithDbCase extends TestCase
{

    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
    }
}
