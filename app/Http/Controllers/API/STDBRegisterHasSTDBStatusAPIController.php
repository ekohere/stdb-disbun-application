<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSTDBRegisterHasSTDBStatusAPIRequest;
use App\Http\Requests\API\UpdateSTDBRegisterHasSTDBStatusAPIRequest;
use App\Models\STDBRegisterHasSTDBStatus;
use App\Repositories\STDBRegisterHasSTDBStatusRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class STDBRegisterHasSTDBStatusController
 * @package App\Http\Controllers\API
 */

class STDBRegisterHasSTDBStatusAPIController extends AppBaseController
{
    /** @var  STDBRegisterHasSTDBStatusRepository */
    private $sTDBRegisterHasSTDBStatusRepository;

    public function __construct(STDBRegisterHasSTDBStatusRepository $sTDBRegisterHasSTDBStatusRepo)
    {
        $this->sTDBRegisterHasSTDBStatusRepository = $sTDBRegisterHasSTDBStatusRepo;
    }

    /**
     * Display a listing of the STDBRegisterHasSTDBStatus.
     * GET|HEAD /sTDBRegisterHasSTDBStatuses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $sTDBRegisterHasSTDBStatuses = $this->sTDBRegisterHasSTDBStatusRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($sTDBRegisterHasSTDBStatuses->toArray(), 'S T D B Register Has S T D B Statuses retrieved successfully');
    }

    /**
     * Store a newly created STDBRegisterHasSTDBStatus in storage.
     * POST /sTDBRegisterHasSTDBStatuses
     *
     * @param CreateSTDBRegisterHasSTDBStatusAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSTDBRegisterHasSTDBStatusAPIRequest $request)
    {
        $input = $request->all();

        $sTDBRegisterHasSTDBStatus = $this->sTDBRegisterHasSTDBStatusRepository->create($input);

        return $this->sendResponse($sTDBRegisterHasSTDBStatus->toArray(), 'S T D B Register Has S T D B Status saved successfully');
    }

    /**
     * Display the specified STDBRegisterHasSTDBStatus.
     * GET|HEAD /sTDBRegisterHasSTDBStatuses/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var STDBRegisterHasSTDBStatus $sTDBRegisterHasSTDBStatus */
        $sTDBRegisterHasSTDBStatus = $this->sTDBRegisterHasSTDBStatusRepository->find($id);

        if (empty($sTDBRegisterHasSTDBStatus)) {
            return $this->sendError('S T D B Register Has S T D B Status not found');
        }

        return $this->sendResponse($sTDBRegisterHasSTDBStatus->toArray(), 'S T D B Register Has S T D B Status retrieved successfully');
    }

    /**
     * Update the specified STDBRegisterHasSTDBStatus in storage.
     * PUT/PATCH /sTDBRegisterHasSTDBStatuses/{id}
     *
     * @param int $id
     * @param UpdateSTDBRegisterHasSTDBStatusAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSTDBRegisterHasSTDBStatusAPIRequest $request)
    {
        $input = $request->all();

        /** @var STDBRegisterHasSTDBStatus $sTDBRegisterHasSTDBStatus */
        $sTDBRegisterHasSTDBStatus = $this->sTDBRegisterHasSTDBStatusRepository->find($id);

        if (empty($sTDBRegisterHasSTDBStatus)) {
            return $this->sendError('S T D B Register Has S T D B Status not found');
        }

        $sTDBRegisterHasSTDBStatus = $this->sTDBRegisterHasSTDBStatusRepository->update($input, $id);

        return $this->sendResponse($sTDBRegisterHasSTDBStatus->toArray(), 'STDBRegisterHasSTDBStatus updated successfully');
    }

    /**
     * Remove the specified STDBRegisterHasSTDBStatus from storage.
     * DELETE /sTDBRegisterHasSTDBStatuses/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var STDBRegisterHasSTDBStatus $sTDBRegisterHasSTDBStatus */
        $sTDBRegisterHasSTDBStatus = $this->sTDBRegisterHasSTDBStatusRepository->find($id);

        if (empty($sTDBRegisterHasSTDBStatus)) {
            return $this->sendError('S T D B Register Has S T D B Status not found');
        }

        $sTDBRegisterHasSTDBStatus->delete();

        return $this->sendSuccess('S T D B Register Has S T D B Status deleted successfully');
    }
}
