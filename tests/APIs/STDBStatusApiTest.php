<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\STDBStatus;

class STDBStatusApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_s_t_d_b_status()
    {
        $sTDBStatus = STDBStatus::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/s_t_d_b_statuses', $sTDBStatus
        );

        $this->assertApiResponse($sTDBStatus);
    }

    /**
     * @test
     */
    public function test_read_s_t_d_b_status()
    {
        $sTDBStatus = STDBStatus::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/s_t_d_b_statuses/'.$sTDBStatus->id
        );

        $this->assertApiResponse($sTDBStatus->toArray());
    }

    /**
     * @test
     */
    public function test_update_s_t_d_b_status()
    {
        $sTDBStatus = STDBStatus::factory()->create();
        $editedSTDBStatus = STDBStatus::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/s_t_d_b_statuses/'.$sTDBStatus->id,
            $editedSTDBStatus
        );

        $this->assertApiResponse($editedSTDBStatus);
    }

    /**
     * @test
     */
    public function test_delete_s_t_d_b_status()
    {
        $sTDBStatus = STDBStatus::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/s_t_d_b_statuses/'.$sTDBStatus->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/s_t_d_b_statuses/'.$sTDBStatus->id
        );

        $this->response->assertStatus(404);
    }
}
