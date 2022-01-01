<?php namespace Tests\Repositories;

use App\Models\STDBStatus;
use App\Repositories\STDBStatusRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class STDBStatusRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var STDBStatusRepository
     */
    protected $sTDBStatusRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->sTDBStatusRepo = \App::make(STDBStatusRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_s_t_d_b_status()
    {
        $sTDBStatus = STDBStatus::factory()->make()->toArray();

        $createdSTDBStatus = $this->sTDBStatusRepo->create($sTDBStatus);

        $createdSTDBStatus = $createdSTDBStatus->toArray();
        $this->assertArrayHasKey('id', $createdSTDBStatus);
        $this->assertNotNull($createdSTDBStatus['id'], 'Created STDBStatus must have id specified');
        $this->assertNotNull(STDBStatus::find($createdSTDBStatus['id']), 'STDBStatus with given id must be in DB');
        $this->assertModelData($sTDBStatus, $createdSTDBStatus);
    }

    /**
     * @test read
     */
    public function test_read_s_t_d_b_status()
    {
        $sTDBStatus = STDBStatus::factory()->create();

        $dbSTDBStatus = $this->sTDBStatusRepo->find($sTDBStatus->id);

        $dbSTDBStatus = $dbSTDBStatus->toArray();
        $this->assertModelData($sTDBStatus->toArray(), $dbSTDBStatus);
    }

    /**
     * @test update
     */
    public function test_update_s_t_d_b_status()
    {
        $sTDBStatus = STDBStatus::factory()->create();
        $fakeSTDBStatus = STDBStatus::factory()->make()->toArray();

        $updatedSTDBStatus = $this->sTDBStatusRepo->update($fakeSTDBStatus, $sTDBStatus->id);

        $this->assertModelData($fakeSTDBStatus, $updatedSTDBStatus->toArray());
        $dbSTDBStatus = $this->sTDBStatusRepo->find($sTDBStatus->id);
        $this->assertModelData($fakeSTDBStatus, $dbSTDBStatus->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_s_t_d_b_status()
    {
        $sTDBStatus = STDBStatus::factory()->create();

        $resp = $this->sTDBStatusRepo->delete($sTDBStatus->id);

        $this->assertTrue($resp);
        $this->assertNull(STDBStatus::find($sTDBStatus->id), 'STDBStatus should not exist in DB');
    }
}
