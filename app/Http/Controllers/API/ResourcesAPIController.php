<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateResourcesAPIRequest;
use App\Http\Requests\API\UpdateResourcesAPIRequest;
use App\Models\Resources;
use App\Repositories\ResourcesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ResourcesController
 * @package App\Http\Controllers\API
 */

class ResourcesAPIController extends AppBaseController
{
    /** @var  ResourcesRepository */
    private $resourcesRepository;

    public function __construct(ResourcesRepository $resourcesRepo)
    {
        $this->resourcesRepository = $resourcesRepo;
    }

    /**
     * Display a listing of the Resources.
     * GET|HEAD /resources
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $resources = $this->resourcesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($resources->toArray(), 'Resources retrieved successfully');
    }

    /**
     * Store a newly created Resources in storage.
     * POST /resources
     *
     * @param CreateResourcesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateResourcesAPIRequest $request)
    {
        $input = $request->all();

        $resources = $this->resourcesRepository->create($input);

        return $this->sendResponse($resources->toArray(), 'Resources saved successfully');
    }

    /**
     * Display the specified Resources.
     * GET|HEAD /resources/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Resources $resources */
        $resources = $this->resourcesRepository->find($id);

        if (empty($resources)) {
            return $this->sendError('Resources not found');
        }

        return $this->sendResponse($resources->toArray(), 'Resources retrieved successfully');
    }

    /**
     * Update the specified Resources in storage.
     * PUT/PATCH /resources/{id}
     *
     * @param int $id
     * @param UpdateResourcesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateResourcesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Resources $resources */
        $resources = $this->resourcesRepository->find($id);

        if (empty($resources)) {
            return $this->sendError('Resources not found');
        }

        $resources = $this->resourcesRepository->update($input, $id);

        return $this->sendResponse($resources->toArray(), 'Resources updated successfully');
    }

    /**
     * Remove the specified Resources from storage.
     * DELETE /resources/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Resources $resources */
        $resources = $this->resourcesRepository->find($id);

        if (empty($resources)) {
            return $this->sendError('Resources not found');
        }

        $resources->delete();

        return $this->sendSuccess('Resources deleted successfully');
    }
}
