<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Dataset;

class DatasetApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_dataset()
    {
        $dataset = Dataset::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/datasets', $dataset
        );

        $this->assertApiResponse($dataset);
    }

    /**
     * @test
     */
    public function test_read_dataset()
    {
        $dataset = Dataset::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/datasets/'.$dataset->id
        );

        $this->assertApiResponse($dataset->toArray());
    }

    /**
     * @test
     */
    public function test_update_dataset()
    {
        $dataset = Dataset::factory()->create();
        $editedDataset = Dataset::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/datasets/'.$dataset->id,
            $editedDataset
        );

        $this->assertApiResponse($editedDataset);
    }

    /**
     * @test
     */
    public function test_delete_dataset()
    {
        $dataset = Dataset::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/datasets/'.$dataset->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/datasets/'.$dataset->id
        );

        $this->response->assertStatus(404);
    }
}
