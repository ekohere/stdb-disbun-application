<?php namespace Tests\Repositories;

use App\Models\Resources;
use App\Repositories\ResourcesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ResourcesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ResourcesRepository
     */
    protected $resourcesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->resourcesRepo = \App::make(ResourcesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_resources()
    {
        $resources = Resources::factory()->make()->toArray();

        $createdResources = $this->resourcesRepo->create($resources);

        $createdResources = $createdResources->toArray();
        $this->assertArrayHasKey('id', $createdResources);
        $this->assertNotNull($createdResources['id'], 'Created Resources must have id specified');
        $this->assertNotNull(Resources::find($createdResources['id']), 'Resources with given id must be in DB');
        $this->assertModelData($resources, $createdResources);
    }

    /**
     * @test read
     */
    public function test_read_resources()
    {
        $resources = Resources::factory()->create();

        $dbResources = $this->resourcesRepo->find($resources->id);

        $dbResources = $dbResources->toArray();
        $this->assertModelData($resources->toArray(), $dbResources);
    }

    /**
     * @test update
     */
    public function test_update_resources()
    {
        $resources = Resources::factory()->create();
        $fakeResources = Resources::factory()->make()->toArray();

        $updatedResources = $this->resourcesRepo->update($fakeResources, $resources->id);

        $this->assertModelData($fakeResources, $updatedResources->toArray());
        $dbResources = $this->resourcesRepo->find($resources->id);
        $this->assertModelData($fakeResources, $dbResources->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_resources()
    {
        $resources = Resources::factory()->create();

        $resp = $this->resourcesRepo->delete($resources->id);

        $this->assertTrue($resp);
        $this->assertNull(Resources::find($resources->id), 'Resources should not exist in DB');
    }
}
