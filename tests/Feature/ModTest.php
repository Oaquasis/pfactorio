<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ModTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function a_user_can_browse_mods()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
