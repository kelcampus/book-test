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
        $this->authorRoutes();
        $this->subjectRoutes();
    }

    protected function bookRoutes(): void
    {
        $this->router->resource('books', 'BookController')->except(['show']);
        $this->router->get('books/report', 'BookReportController@index')->name('books.report');
    }

    protected function authorRoutes(): void
    {
        $this->router->resource('authors', 'AuthorController')->except(['show']);
    }

    protected function subjectRoutes(): void
    {
        $this->router->resource('subjects', 'SubjectController')->except(['show']);
    }
}
