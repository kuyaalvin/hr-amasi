<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Auth\AuthManager;
use App\Models\Login;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(AuthManager $auth)
    {
        $this->registerPolicies();

$auth->provider('login', function($app, array $config) {
    return new class($app->make('hash'), Login::class) extends EloquentUserProvider {
        
        public function updateRememberToken(Authenticatable $user, $token) { }
        
    };
});
    }
}
