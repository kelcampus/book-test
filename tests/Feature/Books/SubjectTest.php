<?php

namespace Tests\Feature\Books;

use App\Domains\Books\Models\Subject;
use App\Domains\Users\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubjectTest extends TestCase
{
    use RefreshDatabase;

    public function test_subject_list_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/subjects');

        $response->assertOk();
    }

    public function test_subject_create_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/subjects/create');

        $response->assertOk();
    }

    public function test_subject_information_can_be_stored(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post('/subjects', [
                'Descricao' => 'Test subject'
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('subjects');

        $subject = subject::first();

        $this->assertSame('Test subject', $subject->Descricao);
    }

    public function test_subject_update_page_is_displayed(): void
    {
        $user = User::factory()->create();
        $subject = subject::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("/subjects/$subject->CodAs/edit");

        $response->assertOk();
    }

    public function test_subject_information_can_be_updated(): void
    {
        $user = User::factory()->create();
        $subject = subject::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch("/subjects/$subject->CodAs", [
                'Descricao' => 'Test subject Updated'
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('subjects');

        $subject->refresh();

        $this->assertSame('Test subject Updated', $subject->Descricao);
    }

    public function test_subject_without_books_can_be_deleted(): void
    {
        $user = User::factory()->create();
        $subject = subject::factory()->create();

        $response = $this
            ->actingAs($user)
            ->from('/subjects')
            ->delete("/subjects/$subject->CodAs", [
                'password' => 'wrong-password',
            ]);

        $response->assertRedirect('/subjects');

        $this->assertNull($subject->fresh());
    }
}
