<?php namespace Tests\Repositories;

use App\Models\STDBPersil;
use App\Repositories\STDBPersilRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class STDBPersilRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var STDBPersilRepository
     */
    protected $sTDBPersilRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->sTDBPersilRepo = \App::make(STDBPersilRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_s_t_d_b_persil()
    {
        $sTDBPersil = STDBPersil::factory()->make()->toArray();

        $createdSTDBPersil = $this->sTDBPersilRepo->create($sTDBPersil);

        $createdSTDBPersil = $createdSTDBPersil->toArray();
        $this->assertArrayHasKey('id', $createdSTDBPersil);
        $this->assertNotNull($createdSTDBPersil['id'], 'Created STDBPersil must have id specified');
        $this->assertNotNull(STDBPersil::find($createdSTDBPersil['id']), 'STDBPersil with given id must be in DB');
        $this->assertModelData($sTDBPersil, $createdSTDBPersil);
    }

    /**
     * @test read
     */
    public function test_read_s_t_d_b_persil()
    {
        $sTDBPersil = STDBPersil::factory()->create();

        $dbSTDBPersil = $this->sTDBPersilRepo->find($sTDBPersil->id);

        $dbSTDBPersil = $dbSTDBPersil->toArray();
        $this->assertModelData($sTDBPersil->toArray(), $dbSTDBPersil);
    }

    /**
     * @test update
     */
    public function test_update_s_t_d_b_persil()
    {
        $sTDBPersil = STDBPersil::factory()->create();
        $fakeSTDBPersil = STDBPersil::factory()->make()->toArray();

        $updatedSTDBPersil = $this->sTDBPersilRepo->update($fakeSTDBPersil, $sTDBPersil->id);

        $this->assertModelData($fakeSTDBPersil, $updatedSTDBPersil->toArray());
        $dbSTDBPersil = $this->sTDBPersilRepo->find($sTDBPersil->id);
        $this->assertModelData($fakeSTDBPersil, $dbSTDBPersil->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_s_t_d_b_persil()
    {
        $sTDBPersil = STDBPersil::factory()->create();

        $resp = $this->sTDBPersilRepo->delete($sTDBPersil->id);

        $this->assertTrue($resp);
        $this->assertNull(STDBPersil::find($sTDBPersil->id), 'STDBPersil should not exist in DB');
    }
}
