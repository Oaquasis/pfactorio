<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ModTest extends TestCase
{
    use DatabaseMigrations;

    protected $mod;

    public function setUp()
    {
        parent::setUp();

        $this->mod = factory('pfactorio\Mod')->create();
    }

    /** @test */
    public function a_guest_cannot_view_all_mods()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->get('/mod/')
             ->assertSee($this->mod->name);
    }

    /** @test */
    public function an_authenticated_user_can_view_all_mods()
    {
        $this->signIn();

        $this->get('/mod')
             ->assertSee($this->mod->name);
    }

    /** @test */
    public function a_guest_cannot_view_a_single_mod()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->get('/mod/'.$this->mod->id)
             ->assertSee($this->mod->name);
    }

    /** @test */
    public function an_authenticated_can_view_a_single_mod()
    {
        $this->signIn();

        $this->get('/mod/'.$this->mod->id)
             ->assertSee($this->mod->name);
    }


}
