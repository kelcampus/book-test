<?php

namespace Tests\Feature\Books;

use App\Domains\Books\Models\Author;
use App\Domains\Users\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthorTest extends TestCase
{
    use RefreshDatabase;

    public function test_author_list_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/authors');

        $response->assertOk();
    }

    public function test_author_create_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/authors/create');

        $response->assertOk();
    }

    public function test_author_information_can_be_stored(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post('/authors', [
                'Nome' => 'Test Author'
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('authors');

        $author = Author::first();

        $this->assertSame('Test Author', $author->Nome);
    }

    public function test_author_update_page_is_displayed(): void
    {
        $user = User::factory()->create();
        $author = Author::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("/authors/$author->CodAu/edit");

        $response->assertOk();
    }

    public function test_author_information_can_be_updated(): void
    {
        $user = User::factory()->create();
        $author = Author::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch("/authors/$author->CodAu", [
                'Nome' => 'Test Author Updated'
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('authors');

        $author->refresh();

        $this->assertSame('Test Author Updated', $author->Nome);
    }

    public function test_author_without_books_can_be_deleted(): void
    {
        $user = User::factory()->create();
        $author = Author::factory()->create();

        $response = $this
            ->actingAs($user)
            ->from('/authors')
            ->delete("/authors/$author->CodAu", [
                'password' => 'wrong-password',
            ]);

        $response->assertRedirect('/authors');

        $this->assertNull($author->fresh());
    }
}
