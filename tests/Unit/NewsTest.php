<?php
namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    /*----------------------------------------------Выборка все новостей-----------------------------------------------*/
    public function testNews()
    {
        $response = $this->get('api/news');
        $response->assertStatus(200);
    }
    /*----------------------------------------------Выборка одной новости-----------------------------------------------*/
    public function testFullNews()
    {
        $response = $this->post('api/fullNews', ['id' => '2']);
        $response->assertStatus(200);
    }

    /*----------------------------------------------Создание новости / загрузка файла-----------------------------------*/
    public function testCreateNews()
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->create('document.jpg', 500);

        $response = $this->post('/createNews', [
            'title' => 'testTitle',
            'description' => 'testDescription',
            'text' => 'testText',
            'publication_date' => 'testPublicationDate',
            'img' => $file,
        ]);

        Storage::disk('public')->assertMissing('missing.jpg');
    }

}
