<?php namespace Tests\Repositories;

use App\Models\Desa;
use App\Repositories\DesaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DesaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DesaRepository
     */
    protected $desaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->desaRepo = \App::make(DesaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_desa()
    {
        $desa = Desa::factory()->make()->toArray();

        $createdDesa = $this->desaRepo->create($desa);

        $createdDesa = $createdDesa->toArray();
        $this->assertArrayHasKey('id', $createdDesa);
        $this->assertNotNull($createdDesa['id'], 'Created Desa must have id specified');
        $this->assertNotNull(Desa::find($createdDesa['id']), 'Desa with given id must be in DB');
        $this->assertModelData($desa, $createdDesa);
    }

    /**
     * @test read
     */
    public function test_read_desa()
    {
        $desa = Desa::factory()->create();

        $dbDesa = $this->desaRepo->find($desa->id);

        $dbDesa = $dbDesa->toArray();
        $this->assertModelData($desa->toArray(), $dbDesa);
    }

    /**
     * @test update
     */
    public function test_update_desa()
    {
        $desa = Desa::factory()->create();
        $fakeDesa = Desa::factory()->make()->toArray();

        $updatedDesa = $this->desaRepo->update($fakeDesa, $desa->id);

        $this->assertModelData($fakeDesa, $updatedDesa->toArray());
        $dbDesa = $this->desaRepo->find($desa->id);
        $this->assertModelData($fakeDesa, $dbDesa->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_desa()
    {
        $desa = Desa::factory()->create();

        $resp = $this->desaRepo->delete($desa->id);

        $this->assertTrue($resp);
        $this->assertNull(Desa::find($desa->id), 'Desa should not exist in DB');
    }
}
