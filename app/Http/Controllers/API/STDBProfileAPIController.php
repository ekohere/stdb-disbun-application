<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSTDBProfileAPIRequest;
use App\Http\Requests\API\UpdateSTDBProfileAPIRequest;
use App\Models\STDBProfile;
use App\Repositories\STDBProfileRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class STDBProfileController
 * @package App\Http\Controllers\API
 */

class STDBProfileAPIController extends AppBaseController
{
    /** @var  STDBProfileRepository */
    private $sTDBProfileRepository;

    public function __construct(STDBProfileRepository $sTDBProfileRepo)
    {
        $this->sTDBProfileRepository = $sTDBProfileRepo;
    }

    /**
     * Display a listing of the STDBProfile.
     * GET|HEAD /sTDBProfiles
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $sTDBProfiles = $this->sTDBProfileRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($sTDBProfiles->toArray(), 'S T D B Profiles retrieved successfully');
    }

    /**
     * Store a newly created STDBProfile in storage.
     * POST /sTDBProfiles
     *
     * @param CreateSTDBProfileAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSTDBProfileAPIRequest $request)
    {
        $input = $request->all();

        $sTDBProfile = $this->sTDBProfileRepository->create($input);

        return $this->sendResponse($sTDBProfile->toArray(), 'S T D B Profile saved successfully');
    }

    /**
     * Display the specified STDBProfile.
     * GET|HEAD /sTDBProfiles/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var STDBProfile $sTDBProfile */
        $sTDBProfile = $this->sTDBProfileRepository->find($id);

        if (empty($sTDBProfile)) {
            return $this->sendError('S T D B Profile not found');
        }

        return $this->sendResponse($sTDBProfile->toArray(), 'S T D B Profile retrieved successfully');
    }

    /**
     * Update the specified STDBProfile in storage.
     * PUT/PATCH /sTDBProfiles/{id}
     *
     * @param int $id
     * @param UpdateSTDBProfileAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSTDBProfileAPIRequest $request)
    {
        $input = $request->all();

        /** @var STDBProfile $sTDBProfile */
        $sTDBProfile = $this->sTDBProfileRepository->find($id);

        if (empty($sTDBProfile)) {
            return $this->sendError('S T D B Profile not found');
        }

        $sTDBProfile = $this->sTDBProfileRepository->update($input, $id);

        return $this->sendResponse($sTDBProfile->toArray(), 'STDBProfile updated successfully');
    }

    /**
     * Remove the specified STDBProfile from storage.
     * DELETE /sTDBProfiles/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var STDBProfile $sTDBProfile */
        $sTDBProfile = $this->sTDBProfileRepository->find($id);

        if (empty($sTDBProfile)) {
            return $this->sendError('S T D B Profile not found');
        }

        $sTDBProfile->delete();

        return $this->sendSuccess('S T D B Profile deleted successfully');
    }
}
