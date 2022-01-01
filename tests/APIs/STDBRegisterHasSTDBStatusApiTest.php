<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\STDBRegisterHasSTDBStatus;

class STDBRegisterHasSTDBStatusApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_s_t_d_b_register_has_s_t_d_b_status()
    {
        $sTDBRegisterHasSTDBStatus = STDBRegisterHasSTDBStatus::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/s_t_d_b_register_has_s_t_d_b_statuses', $sTDBRegisterHasSTDBStatus
        );

        $this->assertApiResponse($sTDBRegisterHasSTDBStatus);
    }

    /**
     * @test
     */
    public function test_read_s_t_d_b_register_has_s_t_d_b_status()
    {
        $sTDBRegisterHasSTDBStatus = STDBRegisterHasSTDBStatus::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/s_t_d_b_register_has_s_t_d_b_statuses/'.$sTDBRegisterHasSTDBStatus->id
        );

        $this->assertApiResponse($sTDBRegisterHasSTDBStatus->toArray());
    }

    /**
     * @test
     */
    public function test_update_s_t_d_b_register_has_s_t_d_b_status()
    {
        $sTDBRegisterHasSTDBStatus = STDBRegisterHasSTDBStatus::factory()->create();
        $editedSTDBRegisterHasSTDBStatus = STDBRegisterHasSTDBStatus::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/s_t_d_b_register_has_s_t_d_b_statuses/'.$sTDBRegisterHasSTDBStatus->id,
            $editedSTDBRegisterHasSTDBStatus
        );

        $this->assertApiResponse($editedSTDBRegisterHasSTDBStatus);
    }

    /**
     * @test
     */
    public function test_delete_s_t_d_b_register_has_s_t_d_b_status()
    {
        $sTDBRegisterHasSTDBStatus = STDBRegisterHasSTDBStatus::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/s_t_d_b_register_has_s_t_d_b_statuses/'.$sTDBRegisterHasSTDBStatus->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/s_t_d_b_register_has_s_t_d_b_statuses/'.$sTDBRegisterHasSTDBStatus->id
        );

        $this->response->assertStatus(404);
    }
}
