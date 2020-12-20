<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::ignoreRoutes();

        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::loginView(fn () => view('usersite.login'));
        Fortify::registerView(fn () => view('usersite.register'));
        Fortify::requestPasswordResetLinkView(function () {
            return view('usersite.forgot_password');
        });
        Fortify::resetPasswordView(function ($request) {
            return view('usersite.reset-passwordView', ['request' => $request]);
        });

        Fortify::verifyEmailView(fn () => view('usersite.email_varify'));
    }
}
