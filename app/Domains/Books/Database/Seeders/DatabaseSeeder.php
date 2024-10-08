<?php

namespace App\Domains\Books\Database\Seeders;


use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    // use WithoutModelEvents;

    /**
     * Seed the application's database.
     *
     * php artisan db:seed --class="\App\Domains\Books\Database\Seeders\DatabaseSeeder"
     */
    public function run(): void
    {
        $this->call([
            BookSeeder::class,
        ]);
    }
}
