<?php

namespace App\Units\Books\Routes;

use App\Support\Http\Route;

/**
 * Web Routes.
 *
 * This file is where you may define all of the routes that are handled
 * by your application. Just tell Laravel the URIs it should respond
 * to using a Closure or controller method. Build something great!
 */

class Web extends Route
{
    public function routes()
    {
        $this->bookRoutes();
    }

    protected function bookRoutes(): void
    {
        $this->router->resource('books', 'BookController')->except(['show']);

        // $this->router->get('books/statistics', 'BookStatisticController@index')->name('statistics.index');
        // $this->router->post('books/statistics', 'BookStatisticController@filter')->name('statistics.filter');
    }
}
