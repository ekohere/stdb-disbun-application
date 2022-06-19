<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Resources;

class ResourcesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_resources()
    {
        $resources = Resources::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/resources', $resources
        );

        $this->assertApiResponse($resources);
    }

    /**
     * @test
     */
    public function test_read_resources()
    {
        $resources = Resources::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/resources/'.$resources->id
        );

        $this->assertApiResponse($resources->toArray());
    }

    /**
     * @test
     */
    public function test_update_resources()
    {
        $resources = Resources::factory()->create();
        $editedResources = Resources::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/resources/'.$resources->id,
            $editedResources
        );

        $this->assertApiResponse($editedResources);
    }

    /**
     * @test
     */
    public function test_delete_resources()
    {
        $resources = Resources::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/resources/'.$resources->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/resources/'.$resources->id
        );

        $this->response->assertStatus(404);
    }
}
