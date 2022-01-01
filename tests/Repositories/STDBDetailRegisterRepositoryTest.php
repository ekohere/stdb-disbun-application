<?php namespace Tests\Repositories;

use App\Models\STDBDetailRegister;
use App\Repositories\STDBDetailRegisterRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class STDBDetailRegisterRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var STDBDetailRegisterRepository
     */
    protected $sTDBDetailRegisterRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->sTDBDetailRegisterRepo = \App::make(STDBDetailRegisterRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_s_t_d_b_detail_register()
    {
        $sTDBDetailRegister = STDBDetailRegister::factory()->make()->toArray();

        $createdSTDBDetailRegister = $this->sTDBDetailRegisterRepo->create($sTDBDetailRegister);

        $createdSTDBDetailRegister = $createdSTDBDetailRegister->toArray();
        $this->assertArrayHasKey('id', $createdSTDBDetailRegister);
        $this->assertNotNull($createdSTDBDetailRegister['id'], 'Created STDBDetailRegister must have id specified');
        $this->assertNotNull(STDBDetailRegister::find($createdSTDBDetailRegister['id']), 'STDBDetailRegister with given id must be in DB');
        $this->assertModelData($sTDBDetailRegister, $createdSTDBDetailRegister);
    }

    /**
     * @test read
     */
    public function test_read_s_t_d_b_detail_register()
    {
        $sTDBDetailRegister = STDBDetailRegister::factory()->create();

        $dbSTDBDetailRegister = $this->sTDBDetailRegisterRepo->find($sTDBDetailRegister->id);

        $dbSTDBDetailRegister = $dbSTDBDetailRegister->toArray();
        $this->assertModelData($sTDBDetailRegister->toArray(), $dbSTDBDetailRegister);
    }

    /**
     * @test update
     */
    public function test_update_s_t_d_b_detail_register()
    {
        $sTDBDetailRegister = STDBDetailRegister::factory()->create();
        $fakeSTDBDetailRegister = STDBDetailRegister::factory()->make()->toArray();

        $updatedSTDBDetailRegister = $this->sTDBDetailRegisterRepo->update($fakeSTDBDetailRegister, $sTDBDetailRegister->id);

        $this->assertModelData($fakeSTDBDetailRegister, $updatedSTDBDetailRegister->toArray());
        $dbSTDBDetailRegister = $this->sTDBDetailRegisterRepo->find($sTDBDetailRegister->id);
        $this->assertModelData($fakeSTDBDetailRegister, $dbSTDBDetailRegister->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_s_t_d_b_detail_register()
    {
        $sTDBDetailRegister = STDBDetailRegister::factory()->create();

        $resp = $this->sTDBDetailRegisterRepo->delete($sTDBDetailRegister->id);

        $this->assertTrue($resp);
        $this->assertNull(STDBDetailRegister::find($sTDBDetailRegister->id), 'STDBDetailRegister should not exist in DB');
    }
}
