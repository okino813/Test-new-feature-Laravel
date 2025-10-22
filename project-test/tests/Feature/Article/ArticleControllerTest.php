<?php

namespace Feature\Article;

use App\Models\Article;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{

    protected string $title = "Salut à tous le monde ou pas facho";

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_create_article(){
        $response = $this->post('/article/store', [
            'title' => $this->title,
            'content' => 'Ceci est un article de test'
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('articles', ['title' => $this->title]);
    }

    public function test_delete_article(){
        $article = Article::where("title", $this->title)->first();
        $response = $this->delete('/article/delete/'.$article->id);

        $response->assertStatus(302);
        $this->assertDatabaseMissing('articles', ['title' => $this->title]);
    }

}
