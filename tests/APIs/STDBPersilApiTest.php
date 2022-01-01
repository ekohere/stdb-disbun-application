<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\STDBPersil;

class STDBPersilApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_s_t_d_b_persil()
    {
        $sTDBPersil = STDBPersil::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/s_t_d_b_persils', $sTDBPersil
        );

        $this->assertApiResponse($sTDBPersil);
    }

    /**
     * @test
     */
    public function test_read_s_t_d_b_persil()
    {
        $sTDBPersil = STDBPersil::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/s_t_d_b_persils/'.$sTDBPersil->id
        );

        $this->assertApiResponse($sTDBPersil->toArray());
    }

    /**
     * @test
     */
    public function test_update_s_t_d_b_persil()
    {
        $sTDBPersil = STDBPersil::factory()->create();
        $editedSTDBPersil = STDBPersil::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/s_t_d_b_persils/'.$sTDBPersil->id,
            $editedSTDBPersil
        );

        $this->assertApiResponse($editedSTDBPersil);
    }

    /**
     * @test
     */
    public function test_delete_s_t_d_b_persil()
    {
        $sTDBPersil = STDBPersil::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/s_t_d_b_persils/'.$sTDBPersil->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/s_t_d_b_persils/'.$sTDBPersil->id
        );

        $this->response->assertStatus(404);
    }
}
