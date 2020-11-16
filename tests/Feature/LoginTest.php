<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
  public function after_login_user_can_not_access_homepage_until_verified(){

$user=factory(Admin::class)->create();
$this->actingAs($user);
$this->get('/admin/dashboard')->assetRedirect('/');

  }
}
