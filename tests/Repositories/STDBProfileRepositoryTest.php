<?php namespace Tests\Repositories;

use App\Models\STDBProfile;
use App\Repositories\STDBProfileRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class STDBProfileRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var STDBProfileRepository
     */
    protected $sTDBProfileRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->sTDBProfileRepo = \App::make(STDBProfileRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_s_t_d_b_profile()
    {
        $sTDBProfile = STDBProfile::factory()->make()->toArray();

        $createdSTDBProfile = $this->sTDBProfileRepo->create($sTDBProfile);

        $createdSTDBProfile = $createdSTDBProfile->toArray();
        $this->assertArrayHasKey('id', $createdSTDBProfile);
        $this->assertNotNull($createdSTDBProfile['id'], 'Created STDBProfile must have id specified');
        $this->assertNotNull(STDBProfile::find($createdSTDBProfile['id']), 'STDBProfile with given id must be in DB');
        $this->assertModelData($sTDBProfile, $createdSTDBProfile);
    }

    /**
     * @test read
     */
    public function test_read_s_t_d_b_profile()
    {
        $sTDBProfile = STDBProfile::factory()->create();

        $dbSTDBProfile = $this->sTDBProfileRepo->find($sTDBProfile->id);

        $dbSTDBProfile = $dbSTDBProfile->toArray();
        $this->assertModelData($sTDBProfile->toArray(), $dbSTDBProfile);
    }

    /**
     * @test update
     */
    public function test_update_s_t_d_b_profile()
    {
        $sTDBProfile = STDBProfile::factory()->create();
        $fakeSTDBProfile = STDBProfile::factory()->make()->toArray();

        $updatedSTDBProfile = $this->sTDBProfileRepo->update($fakeSTDBProfile, $sTDBProfile->id);

        $this->assertModelData($fakeSTDBProfile, $updatedSTDBProfile->toArray());
        $dbSTDBProfile = $this->sTDBProfileRepo->find($sTDBProfile->id);
        $this->assertModelData($fakeSTDBProfile, $dbSTDBProfile->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_s_t_d_b_profile()
    {
        $sTDBProfile = STDBProfile::factory()->create();

        $resp = $this->sTDBProfileRepo->delete($sTDBProfile->id);

        $this->assertTrue($resp);
        $this->assertNull(STDBProfile::find($sTDBProfile->id), 'STDBProfile should not exist in DB');
    }
}
