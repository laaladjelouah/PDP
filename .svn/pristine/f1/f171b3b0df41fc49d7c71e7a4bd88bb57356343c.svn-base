<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeControllerTest extends TestCase {

    use DatabaseTransactions;

    public function testIndex() {

        // The user is non authenticated
        $this->action('GET', 'HomeController@index');
        $this->assertRedirectedTo('/login');

        // The user is now authenticated
        $user = factory(App\User::class)->make();
        $this->actingAs($user);
        $this->action('GET', 'HomeController@index');
        $this->seePageIs('/home');
    }

    public function testSubscription() {
        // The user is non authenticated
        $this->action('GET', 'HomeController@subscription');
        $this->assertRedirectedTo('/login');

        // The user is now authenticated
        $user = factory(App\User::class)->make();
        $this->actingAs($user);
        $this->action('GET', 'HomeController@subscription');
        $this->seePageIs('/subscription');
    }

    public function testUnsubscribe() {
        // The user is non authenticated
        $this->action('GET', 'HomeController@unsubscribe');
        $this->assertRedirectedTo('/login');

        // The user is now authenticated
        $user = factory(App\User::class)->make();
        $this->actingAs($user);
        $this->action('GET', 'HomeController@unsubscribe');
        $this->assertRedirectedTo('/subscription');
    }

    public function testUnsubscribe1() {
        // The user is non authenticated
        $this->action('GET', 'HomeController@unsubscribe');
        $this->assertRedirectedTo('/login');

        // The user is now authenticated
        $user = factory(App\User::class)->create();
        //Auth::shouldReceive('user')->andReturn($user = m::mock('User'));
        //$user->shouldReceive('posts')->once()->andReturn(array('posts'));
        //dd($user->id);
        // var_dump($user->id);
        /* Auth::shouldReceive('user->id')
          ->andReturn($user->id); */
        /* $mock = \Mockery::mock('Auth');
          $mock->shouldReceive('user->id')->andReturn($user->id); */
        // $this->be($user)->unsubscribe();
        //  $this->unsubscribe();
        /* $this->actingAs($user);
          $this->action('GET', 'HomeController@unsubscribe');
          $this->assertRedirectedTo('/subscription'); */
    }

}
