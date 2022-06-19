<?php namespace Tests\Repositories;

use App\Models\Dataset;
use App\Repositories\DatasetRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DatasetRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DatasetRepository
     */
    protected $datasetRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->datasetRepo = \App::make(DatasetRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_dataset()
    {
        $dataset = Dataset::factory()->make()->toArray();

        $createdDataset = $this->datasetRepo->create($dataset);

        $createdDataset = $createdDataset->toArray();
        $this->assertArrayHasKey('id', $createdDataset);
        $this->assertNotNull($createdDataset['id'], 'Created Dataset must have id specified');
        $this->assertNotNull(Dataset::find($createdDataset['id']), 'Dataset with given id must be in DB');
        $this->assertModelData($dataset, $createdDataset);
    }

    /**
     * @test read
     */
    public function test_read_dataset()
    {
        $dataset = Dataset::factory()->create();

        $dbDataset = $this->datasetRepo->find($dataset->id);

        $dbDataset = $dbDataset->toArray();
        $this->assertModelData($dataset->toArray(), $dbDataset);
    }

    /**
     * @test update
     */
    public function test_update_dataset()
    {
        $dataset = Dataset::factory()->create();
        $fakeDataset = Dataset::factory()->make()->toArray();

        $updatedDataset = $this->datasetRepo->update($fakeDataset, $dataset->id);

        $this->assertModelData($fakeDataset, $updatedDataset->toArray());
        $dbDataset = $this->datasetRepo->find($dataset->id);
        $this->assertModelData($fakeDataset, $dbDataset->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_dataset()
    {
        $dataset = Dataset::factory()->create();

        $resp = $this->datasetRepo->delete($dataset->id);

        $this->assertTrue($resp);
        $this->assertNull(Dataset::find($dataset->id), 'Dataset should not exist in DB');
    }
}
