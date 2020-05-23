<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Post;

class PostTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function shows_post(){

        create('App\User');
        $post = create('App\Models\Post');

        $response = $this->json('GET', $this->baseUrl . "posts/{$post->id}");
        $response->assertStatus(200);

        $response->assertJson([
            'data' => [
                'id' => $post->id,
                'title' => $post->title
            ]
        ]);
    }

    /**
     * @test
     */
    public function stores_post(){

        $user = create('App\User');

        $data = [
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'content' => $this->faker->text($maxNbChars = 40),
            'user_id' => $user->id
        ];

        // baseUrl se encuentra dentro de TestCase.php
        $response = $this->json('POST', $this->baseUrl . "posts", $data);

        // Valida que se esten retornando datos con codigo de estado 201
        $response->assertStatus(201);

        // Verificar que el post se halla guardado en la DB
        // (DB_Table, data)
        $this->assertDatabaseHas('posts', $data);

        // Varificar el retorno del objeto
        $post = Post::all()->first();

        $response->assertJson([
            'data' => [
                'id' => $post->id,
                'title' => $post->title
            ]
        ]);

    }

    /**
     * @test
     */
    public function delete_post(){

        create('App\User');
        $post = create('App\Models\Post');

        $this->json('DELETE', $this->baseUrl . "posts/{$post->id}")
                ->assertStatus(204);

        // CONFIRMAR LA ELIMINACION DEL USUARIO
        $this->assertNull(Post::find($post->id));
    }

    /**
     * @test
     */
    public function update_post(){

        $data = [
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'content' => $this->faker->text($maxNbChars = 40)
        ];

        create('App\User');
        $post = create('App\Models\Post');

        $response = $this->json('PUT', $this->baseUrl . "posts/{$post->id}", $data);
        $response->assertStatus(200);

        //El metodo fresh() retornara al mismo objeto pero actualizado
        $post = $post->fresh();

        // Validar que el contenido de $post sea igual al contenido de $data
        $this->assertEquals($post->title, $data['title']);
        $this->assertEquals($post->content, $data['content']);
    }
}
