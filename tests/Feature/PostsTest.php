<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class PostsTest extends TestCase
{
    use RefreshDatabase;

    public function user_can_view_a_post_list(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
       
        $this->assertAuthenticated();

        $this->get('/api/v1/posts')
            ->assertStatus(self::HTTP_OK);
    }

    public function test_create_new_post(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email'    => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $response = $this->postJson(
            '/api/v1/posts',
            [
                "title"          => "Test job post!!! ",
                "description"    => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat vel eaque quod sapiente."
            ]
        )
            ->assertStatus(self::HTTP_OK)
            ->getData();

        //Edit job post
        $this->putJson(
            '/api/v1/posts/' . $response->data->id,
            [
                "title"          => "Test job post Edit",
                "description"    => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat vel eaque quod sapiente."
            ]
        )
            ->assertStatus(self::HTTP_OK)
            ->getData();

        $this->post(route('logout'));
    }

    public function test_delete_post(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email'    => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $response = $this->postJson(
            '/api/v1/posts',
            [
                "title"          => "Test job post!!! ",
                "description"    => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat vel eaque quod sapiente."
            ]
        )
            ->assertStatus(self::HTTP_OK)
            ->getData();

        //Delete job post
        $this->deleteJson('/api/v1/posts/' . $response->data->id)
            ->assertStatus(self::HTTP_OK)
            ->getData();

        $this->post(route('logout'));
    }

    public function test_user_can_not_use_api(): void
    {
        $this->get('/api/v1/posts')
            ->assertStatus(self::HTTP_UNAUTHORIZED);
    }

   
    public function test_create_post_fail_field_is_required(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email'    => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $response = $this->postJson(
            '/api/v1/posts',
            [
                "description"    => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat vel eaque quod sapiente."
            ]
        )
            ->assertStatus(self::HTTP_UNPROCESSABLE_ENTITY);

        $this->post(route('logout'));
    }
}
