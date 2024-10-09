<?php

namespace Tests\Feature;

use App\Domains\Users\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthorReporTest extends TestCase
{
    use RefreshDatabase;

    public function test_author_report_page_is_displayed(): void
    {
        $this->markTestSkipped('Necessário implementar testes para views no banco de dados.');

        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/books/report');

        $response->assertOk();
    }
}
