<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\STDBRegister;

class STDBRegisterApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_s_t_d_b_register()
    {
        $sTDBRegister = STDBRegister::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/s_t_d_b_registers', $sTDBRegister
        );

        $this->assertApiResponse($sTDBRegister);
    }

    /**
     * @test
     */
    public function test_read_s_t_d_b_register()
    {
        $sTDBRegister = STDBRegister::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/s_t_d_b_registers/'.$sTDBRegister->id
        );

        $this->assertApiResponse($sTDBRegister->toArray());
    }

    /**
     * @test
     */
    public function test_update_s_t_d_b_register()
    {
        $sTDBRegister = STDBRegister::factory()->create();
        $editedSTDBRegister = STDBRegister::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/s_t_d_b_registers/'.$sTDBRegister->id,
            $editedSTDBRegister
        );

        $this->assertApiResponse($editedSTDBRegister);
    }

    /**
     * @test
     */
    public function test_delete_s_t_d_b_register()
    {
        $sTDBRegister = STDBRegister::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/s_t_d_b_registers/'.$sTDBRegister->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/s_t_d_b_registers/'.$sTDBRegister->id
        );

        $this->response->assertStatus(404);
    }
}
