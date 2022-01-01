<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\STDBDetailRegister;

class STDBDetailRegisterApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_s_t_d_b_detail_register()
    {
        $sTDBDetailRegister = STDBDetailRegister::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/s_t_d_b_detail_registers', $sTDBDetailRegister
        );

        $this->assertApiResponse($sTDBDetailRegister);
    }

    /**
     * @test
     */
    public function test_read_s_t_d_b_detail_register()
    {
        $sTDBDetailRegister = STDBDetailRegister::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/s_t_d_b_detail_registers/'.$sTDBDetailRegister->id
        );

        $this->assertApiResponse($sTDBDetailRegister->toArray());
    }

    /**
     * @test
     */
    public function test_update_s_t_d_b_detail_register()
    {
        $sTDBDetailRegister = STDBDetailRegister::factory()->create();
        $editedSTDBDetailRegister = STDBDetailRegister::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/s_t_d_b_detail_registers/'.$sTDBDetailRegister->id,
            $editedSTDBDetailRegister
        );

        $this->assertApiResponse($editedSTDBDetailRegister);
    }

    /**
     * @test
     */
    public function test_delete_s_t_d_b_detail_register()
    {
        $sTDBDetailRegister = STDBDetailRegister::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/s_t_d_b_detail_registers/'.$sTDBDetailRegister->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/s_t_d_b_detail_registers/'.$sTDBDetailRegister->id
        );

        $this->response->assertStatus(404);
    }
}
