<?php

namespace App\Units\Auth\Routes;

use App\Support\Http\Route;
use \Illuminate\Support\Facades\Route as FacadeRoute;

/**
 * Web Routes.
 *
 * This file is where you may define all of the routes that are handled
 * by your application. Just tell Laravel the URIs it should respond
 * to using a Closure or controller method. Build something great!
 */

class Web extends Route
{
    /**
     * Declare Web Routes.
     */
    public function routes()
    {
        // welcome
        FacadeRoute::get('/', function () {
            return redirect()->route(route: 'login', status: 301);

            // return view('core::welcome', [
                // 'canLogin' => Route::has('login'),
                // 'canRegister' => Route::has('register'),
                // 'laravelVersion' => \Illuminate\Foundation\Application::VERSION,
                // 'phpVersion' => PHP_VERSION,
            // ]);
        });

        // dashboard
        FacadeRoute::get('/dashboard', function () {
            return view('core::dashboard');
        })->middleware(['auth'])->name('dashboard');

        // Authentication routes.
        $this->authenticationRoutes();
    }

    protected function authenticationRoutes()
    {
        $this->router->group(['middleware' => 'guest'], function () {
            $this->router->get('register', 'RegisteredUserController@create')->name('register');

            $this->router->post('register', 'RegisteredUserController@store');
            $this->router->get('login', 'AuthenticatedSessionController@create')->name('login');

            $this->router->post('login', 'AuthenticatedSessionController@store');
            $this->router->get('forgot-password', 'PasswordResetLinkController@create')->name('password.request');

            $this->router->post('forgot-password', 'PasswordResetLinkController@store')->name('password.email');

            $this->router->get('reset-password/{token}', 'NewPasswordController@create')->name('password.reset');

            $this->router->post('reset-password', 'NewPasswordController@store')->name('password.store');
        });

        $this->router->group(['middleware' => 'auth'], function () {
            $this->router->get('verify-email', 'EmailVerificationPromptController@__invoke')
            ->name('verification.notice');

            $this->router->get('verify-email/{id}/{hash}', 'VerifyEmailController@__invoke')
            ->middleware(['signed', 'throttle:6,1'])
            ->name('verification.verify');

            $this->router->post('email/verification-notification', 'EmailVerificationNotificationController@store')
            ->middleware('throttle:6,1')
            ->name('verification.send');

            $this->router->get('confirm-password', 'ConfirmablePasswordController@show')
            ->name('password.confirm');

            $this->router->post('confirm-password', 'ConfirmablePasswordController@store');

            $this->router->put('password', 'PasswordController@update')->name('password.update');

            $this->router->post('logout', 'AuthenticatedSessionController@destroy')->name('logout');
        });
    }
}
