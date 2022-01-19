<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Desa;

class DesaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_desa()
    {
        $desa = Desa::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/desas', $desa
        );

        $this->assertApiResponse($desa);
    }

    /**
     * @test
     */
    public function test_read_desa()
    {
        $desa = Desa::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/desas/'.$desa->id
        );

        $this->assertApiResponse($desa->toArray());
    }

    /**
     * @test
     */
    public function test_update_desa()
    {
        $desa = Desa::factory()->create();
        $editedDesa = Desa::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/desas/'.$desa->id,
            $editedDesa
        );

        $this->assertApiResponse($editedDesa);
    }

    /**
     * @test
     */
    public function test_delete_desa()
    {
        $desa = Desa::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/desas/'.$desa->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/desas/'.$desa->id
        );

        $this->response->assertStatus(404);
    }
}
