<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSTDBStatusAPIRequest;
use App\Http\Requests\API\UpdateSTDBStatusAPIRequest;
use App\Models\STDBStatus;
use App\Repositories\STDBStatusRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class STDBStatusController
 * @package App\Http\Controllers\API
 */

class STDBStatusAPIController extends AppBaseController
{
    /** @var  STDBStatusRepository */
    private $sTDBStatusRepository;

    public function __construct(STDBStatusRepository $sTDBStatusRepo)
    {
        $this->sTDBStatusRepository = $sTDBStatusRepo;
    }

    /**
     * Display a listing of the STDBStatus.
     * GET|HEAD /sTDBStatuses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $sTDBStatuses = $this->sTDBStatusRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($sTDBStatuses->toArray(), 'S T D B Statuses retrieved successfully');
    }

    /**
     * Store a newly created STDBStatus in storage.
     * POST /sTDBStatuses
     *
     * @param CreateSTDBStatusAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSTDBStatusAPIRequest $request)
    {
        $input = $request->all();

        $sTDBStatus = $this->sTDBStatusRepository->create($input);

        return $this->sendResponse($sTDBStatus->toArray(), 'S T D B Status saved successfully');
    }

    /**
     * Display the specified STDBStatus.
     * GET|HEAD /sTDBStatuses/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var STDBStatus $sTDBStatus */
        $sTDBStatus = $this->sTDBStatusRepository->find($id);

        if (empty($sTDBStatus)) {
            return $this->sendError('S T D B Status not found');
        }

        return $this->sendResponse($sTDBStatus->toArray(), 'S T D B Status retrieved successfully');
    }

    /**
     * Update the specified STDBStatus in storage.
     * PUT/PATCH /sTDBStatuses/{id}
     *
     * @param int $id
     * @param UpdateSTDBStatusAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSTDBStatusAPIRequest $request)
    {
        $input = $request->all();

        /** @var STDBStatus $sTDBStatus */
        $sTDBStatus = $this->sTDBStatusRepository->find($id);

        if (empty($sTDBStatus)) {
            return $this->sendError('S T D B Status not found');
        }

        $sTDBStatus = $this->sTDBStatusRepository->update($input, $id);

        return $this->sendResponse($sTDBStatus->toArray(), 'STDBStatus updated successfully');
    }

    /**
     * Remove the specified STDBStatus from storage.
     * DELETE /sTDBStatuses/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var STDBStatus $sTDBStatus */
        $sTDBStatus = $this->sTDBStatusRepository->find($id);

        if (empty($sTDBStatus)) {
            return $this->sendError('S T D B Status not found');
        }

        $sTDBStatus->delete();

        return $this->sendSuccess('S T D B Status deleted successfully');
    }
}
