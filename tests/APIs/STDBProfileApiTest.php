<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\STDBProfile;

class STDBProfileApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_s_t_d_b_profile()
    {
        $sTDBProfile = STDBProfile::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/s_t_d_b_profiles', $sTDBProfile
        );

        $this->assertApiResponse($sTDBProfile);
    }

    /**
     * @test
     */
    public function test_read_s_t_d_b_profile()
    {
        $sTDBProfile = STDBProfile::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/s_t_d_b_profiles/'.$sTDBProfile->id
        );

        $this->assertApiResponse($sTDBProfile->toArray());
    }

    /**
     * @test
     */
    public function test_update_s_t_d_b_profile()
    {
        $sTDBProfile = STDBProfile::factory()->create();
        $editedSTDBProfile = STDBProfile::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/s_t_d_b_profiles/'.$sTDBProfile->id,
            $editedSTDBProfile
        );

        $this->assertApiResponse($editedSTDBProfile);
    }

    /**
     * @test
     */
    public function test_delete_s_t_d_b_profile()
    {
        $sTDBProfile = STDBProfile::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/s_t_d_b_profiles/'.$sTDBProfile->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/s_t_d_b_profiles/'.$sTDBProfile->id
        );

        $this->response->assertStatus(404);
    }
}
