<?php namespace Tests\Repositories;

use App\Models\STDBRegisterHasSTDBStatus;
use App\Repositories\STDBRegisterHasSTDBStatusRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class STDBRegisterHasSTDBStatusRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var STDBRegisterHasSTDBStatusRepository
     */
    protected $sTDBRegisterHasSTDBStatusRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->sTDBRegisterHasSTDBStatusRepo = \App::make(STDBRegisterHasSTDBStatusRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_s_t_d_b_register_has_s_t_d_b_status()
    {
        $sTDBRegisterHasSTDBStatus = STDBRegisterHasSTDBStatus::factory()->make()->toArray();

        $createdSTDBRegisterHasSTDBStatus = $this->sTDBRegisterHasSTDBStatusRepo->create($sTDBRegisterHasSTDBStatus);

        $createdSTDBRegisterHasSTDBStatus = $createdSTDBRegisterHasSTDBStatus->toArray();
        $this->assertArrayHasKey('id', $createdSTDBRegisterHasSTDBStatus);
        $this->assertNotNull($createdSTDBRegisterHasSTDBStatus['id'], 'Created STDBRegisterHasSTDBStatus must have id specified');
        $this->assertNotNull(STDBRegisterHasSTDBStatus::find($createdSTDBRegisterHasSTDBStatus['id']), 'STDBRegisterHasSTDBStatus with given id must be in DB');
        $this->assertModelData($sTDBRegisterHasSTDBStatus, $createdSTDBRegisterHasSTDBStatus);
    }

    /**
     * @test read
     */
    public function test_read_s_t_d_b_register_has_s_t_d_b_status()
    {
        $sTDBRegisterHasSTDBStatus = STDBRegisterHasSTDBStatus::factory()->create();

        $dbSTDBRegisterHasSTDBStatus = $this->sTDBRegisterHasSTDBStatusRepo->find($sTDBRegisterHasSTDBStatus->id);

        $dbSTDBRegisterHasSTDBStatus = $dbSTDBRegisterHasSTDBStatus->toArray();
        $this->assertModelData($sTDBRegisterHasSTDBStatus->toArray(), $dbSTDBRegisterHasSTDBStatus);
    }

    /**
     * @test update
     */
    public function test_update_s_t_d_b_register_has_s_t_d_b_status()
    {
        $sTDBRegisterHasSTDBStatus = STDBRegisterHasSTDBStatus::factory()->create();
        $fakeSTDBRegisterHasSTDBStatus = STDBRegisterHasSTDBStatus::factory()->make()->toArray();

        $updatedSTDBRegisterHasSTDBStatus = $this->sTDBRegisterHasSTDBStatusRepo->update($fakeSTDBRegisterHasSTDBStatus, $sTDBRegisterHasSTDBStatus->id);

        $this->assertModelData($fakeSTDBRegisterHasSTDBStatus, $updatedSTDBRegisterHasSTDBStatus->toArray());
        $dbSTDBRegisterHasSTDBStatus = $this->sTDBRegisterHasSTDBStatusRepo->find($sTDBRegisterHasSTDBStatus->id);
        $this->assertModelData($fakeSTDBRegisterHasSTDBStatus, $dbSTDBRegisterHasSTDBStatus->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_s_t_d_b_register_has_s_t_d_b_status()
    {
        $sTDBRegisterHasSTDBStatus = STDBRegisterHasSTDBStatus::factory()->create();

        $resp = $this->sTDBRegisterHasSTDBStatusRepo->delete($sTDBRegisterHasSTDBStatus->id);

        $this->assertTrue($resp);
        $this->assertNull(STDBRegisterHasSTDBStatus::find($sTDBRegisterHasSTDBStatus->id), 'STDBRegisterHasSTDBStatus should not exist in DB');
    }
}
