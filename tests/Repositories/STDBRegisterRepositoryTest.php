<?php namespace Tests\Repositories;

use App\Models\STDBRegister;
use App\Repositories\STDBRegisterRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class STDBRegisterRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var STDBRegisterRepository
     */
    protected $sTDBRegisterRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->sTDBRegisterRepo = \App::make(STDBRegisterRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_s_t_d_b_register()
    {
        $sTDBRegister = STDBRegister::factory()->make()->toArray();

        $createdSTDBRegister = $this->sTDBRegisterRepo->create($sTDBRegister);

        $createdSTDBRegister = $createdSTDBRegister->toArray();
        $this->assertArrayHasKey('id', $createdSTDBRegister);
        $this->assertNotNull($createdSTDBRegister['id'], 'Created STDBRegister must have id specified');
        $this->assertNotNull(STDBRegister::find($createdSTDBRegister['id']), 'STDBRegister with given id must be in DB');
        $this->assertModelData($sTDBRegister, $createdSTDBRegister);
    }

    /**
     * @test read
     */
    public function test_read_s_t_d_b_register()
    {
        $sTDBRegister = STDBRegister::factory()->create();

        $dbSTDBRegister = $this->sTDBRegisterRepo->find($sTDBRegister->id);

        $dbSTDBRegister = $dbSTDBRegister->toArray();
        $this->assertModelData($sTDBRegister->toArray(), $dbSTDBRegister);
    }

    /**
     * @test update
     */
    public function test_update_s_t_d_b_register()
    {
        $sTDBRegister = STDBRegister::factory()->create();
        $fakeSTDBRegister = STDBRegister::factory()->make()->toArray();

        $updatedSTDBRegister = $this->sTDBRegisterRepo->update($fakeSTDBRegister, $sTDBRegister->id);

        $this->assertModelData($fakeSTDBRegister, $updatedSTDBRegister->toArray());
        $dbSTDBRegister = $this->sTDBRegisterRepo->find($sTDBRegister->id);
        $this->assertModelData($fakeSTDBRegister, $dbSTDBRegister->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_s_t_d_b_register()
    {
        $sTDBRegister = STDBRegister::factory()->create();

        $resp = $this->sTDBRegisterRepo->delete($sTDBRegister->id);

        $this->assertTrue($resp);
        $this->assertNull(STDBRegister::find($sTDBRegister->id), 'STDBRegister should not exist in DB');
    }
}
