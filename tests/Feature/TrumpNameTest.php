<?php

namespace Tests\Feature;

use App\Models\TrumpName;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TrumpNameTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_create_trump_name(): void
    {
        $trumpName = new TrumpName();
        $trumpName->name = 'Test';
        $trumpName->author = 'Test';
        $trumpName->save();

        $this->assertDatabaseHas('main.trump_names', [
            'name' => 'Test',
            'author' => 'Test',
        ]);
    }
}
