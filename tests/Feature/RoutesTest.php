<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    use RefreshDatabase;

    public function testMainPage(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testSendsFilesToDownload(): void
    {
        $response = $this->post('/api/to-queue', ['src' => 'https://das.dasd']);
        $response->assertStatus(200);
    }

    public function testThrowsBadRequestWhenSrcWasNotPassed(): void
    {
        $response = $this->post('/api/to-queue');
        $response->assertStatus(400);
    }

    public function testGetListOfFiles(): void
    {
        $response = $this->get('/api/files');
        $response->assertStatus(200);
        $this->assertSame(
            ['id', 'src', 'url', 'status', 'created_at', 'updated_at'],
            array_keys(json_decode($response->getContent(), true)[0])
        );
    }
}
