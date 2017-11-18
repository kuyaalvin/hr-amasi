<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\Browser\Pages\HomePage;

class SingleLoginTest extends DuskTestCase
{
    /**
     * tests that user can only login to one browser at a time.
     *
     * @return void
     */
    public function testSingleLogin()
    {
        $username = env('SYSTEM_ADMIN_USERNAME');
        $password = env('SYSTEM_ADMIN_PASSWORD');
        $tmpUrl = '/hr-amasi/public/';
        $homepage = $tmpUrl . 'home';

        $this->browse(function (Browser $first, Browser $second) use($username, $password, $tmpUrl, $homepage) {
            $login = function(Browser $browser) use($tmpUrl, $username, $password, $homepage) {
    $browser->visit('/')
    ->assertSee('please sign-in')
    ->type('username', $username)
    ->type('password', $password)
    ->press('Login')
    ->assertPathIs($homepage);
};

$login($first);
$login($second);

            $first->refresh()
            ->assertPathIsNot($homepage);
        });
    }
}
