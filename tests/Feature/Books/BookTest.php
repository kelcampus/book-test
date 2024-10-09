<?php

namespace Tests\Feature\Books;

use App\Domains\Books\Models\Book;
use App\Domains\Users\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    public function test_book_list_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/books');

        $response->assertOk();
    }

    public function test_book_create_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/books/create');

        $response->assertOk();
    }

    public function test_book_information_can_be_stored(): void
    {
        $this->markTestSkipped('TODO - implementar.');
    }

    public function test_book_update_page_is_displayed(): void
    {
        $user = User::factory()->create();
        $book = Book::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("/books/$book->Codl/edit");

        $response->assertOk();
    }

    public function test_book_information_can_be_updated(): void
    {
        $this->markTestSkipped('TODO - implementar.');
    }

    public function test_book_without_books_can_be_deleted(): void
    {
        $user = User::factory()->create();
        $book = Book::factory()->create();

        $response = $this
            ->actingAs($user)
            ->from('/books')
            ->delete("/books/$book->Codl", [
                'password' => 'wrong-password',
            ]);

        $response->assertRedirect('/books');

        $this->assertNull($book->fresh());
    }
}
