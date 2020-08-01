<?php

namespace App\Providers;

use App\Passport\PkceClient;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;
use Laravel\Passport\RouteRegistrar;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes(function (RouteRegistrar $router) {
            $router->forAuthorization();
            $router->forAccessTokens();
            $router->forTransientTokens();
        });
        Passport::useClientModel(PkceClient::class);
        Passport::tokensExpireIn(now()->addMinutes(5));
        Passport::refreshTokensExpireIn(now()->addDays(10));

//        $user = Auth::loginUsingId(1);
//        $userTokens = $user->tokens;
//        foreach ($userTokens as $token) {
//            $token->revoke();
//        }
//        dd(Auth::user()->tokens);
    }
}
