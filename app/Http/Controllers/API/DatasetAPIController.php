<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDatasetAPIRequest;
use App\Http\Requests\API\UpdateDatasetAPIRequest;
use App\Models\Dataset;
use App\Repositories\DatasetRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DatasetController
 * @package App\Http\Controllers\API
 */

class DatasetAPIController extends AppBaseController
{
    /** @var  DatasetRepository */
    private $datasetRepository;

    public function __construct(DatasetRepository $datasetRepo)
    {
        $this->datasetRepository = $datasetRepo;
    }

    /**
     * Display a listing of the Dataset.
     * GET|HEAD /datasets
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $datasets = $this->datasetRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($datasets->toArray(), 'Datasets retrieved successfully');
    }

    /**
     * Store a newly created Dataset in storage.
     * POST /datasets
     *
     * @param CreateDatasetAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDatasetAPIRequest $request)
    {
        $input = $request->all();

        $dataset = $this->datasetRepository->create($input);

        return $this->sendResponse($dataset->toArray(), 'Dataset saved successfully');
    }

    /**
     * Display the specified Dataset.
     * GET|HEAD /datasets/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Dataset $dataset */
        $dataset = $this->datasetRepository->find($id);

        if (empty($dataset)) {
            return $this->sendError('Dataset not found');
        }

        return $this->sendResponse($dataset->toArray(), 'Dataset retrieved successfully');
    }

    /**
     * Update the specified Dataset in storage.
     * PUT/PATCH /datasets/{id}
     *
     * @param int $id
     * @param UpdateDatasetAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDatasetAPIRequest $request)
    {
        $input = $request->all();

        /** @var Dataset $dataset */
        $dataset = $this->datasetRepository->find($id);

        if (empty($dataset)) {
            return $this->sendError('Dataset not found');
        }

        $dataset = $this->datasetRepository->update($input, $id);

        return $this->sendResponse($dataset->toArray(), 'Dataset updated successfully');
    }

    /**
     * Remove the specified Dataset from storage.
     * DELETE /datasets/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Dataset $dataset */
        $dataset = $this->datasetRepository->find($id);

        if (empty($dataset)) {
            return $this->sendError('Dataset not found');
        }

        $dataset->delete();

        return $this->sendSuccess('Dataset deleted successfully');
    }
}
