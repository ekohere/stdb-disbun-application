<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSTDBPersilAPIRequest;
use App\Http\Requests\API\UpdateSTDBPersilAPIRequest;
use App\Models\STDBPersil;
use App\Repositories\STDBPersilRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class STDBPersilController
 * @package App\Http\Controllers\API
 */

class STDBPersilAPIController extends AppBaseController
{
    /** @var  STDBPersilRepository */
    private $sTDBPersilRepository;

    public function __construct(STDBPersilRepository $sTDBPersilRepo)
    {
        $this->sTDBPersilRepository = $sTDBPersilRepo;
    }

    /**
     * Display a listing of the STDBPersil.
     * GET|HEAD /sTDBPersils
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $sTDBPersils = $this->sTDBPersilRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($sTDBPersils->toArray(), 'S T D B Persils retrieved successfully');
    }

    /**
     * Store a newly created STDBPersil in storage.
     * POST /sTDBPersils
     *
     * @param CreateSTDBPersilAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSTDBPersilAPIRequest $request)
    {
        $input = $request->all();

        $sTDBPersil = $this->sTDBPersilRepository->create($input);

        return $this->sendResponse($sTDBPersil->toArray(), 'S T D B Persil saved successfully');
    }

    /**
     * Display the specified STDBPersil.
     * GET|HEAD /sTDBPersils/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var STDBPersil $sTDBPersil */
        $sTDBPersil = $this->sTDBPersilRepository->find($id);

        if (empty($sTDBPersil)) {
            return $this->sendError('S T D B Persil not found');
        }

        return $this->sendResponse($sTDBPersil->toArray(), 'S T D B Persil retrieved successfully');
    }

    /**
     * Update the specified STDBPersil in storage.
     * PUT/PATCH /sTDBPersils/{id}
     *
     * @param int $id
     * @param UpdateSTDBPersilAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSTDBPersilAPIRequest $request)
    {
        $input = $request->all();

        /** @var STDBPersil $sTDBPersil */
        $sTDBPersil = $this->sTDBPersilRepository->find($id);

        if (empty($sTDBPersil)) {
            return $this->sendError('S T D B Persil not found');
        }

        $sTDBPersil = $this->sTDBPersilRepository->update($input, $id);

        return $this->sendResponse($sTDBPersil->toArray(), 'STDBPersil updated successfully');
    }

    /**
     * Remove the specified STDBPersil from storage.
     * DELETE /sTDBPersils/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var STDBPersil $sTDBPersil */
        $sTDBPersil = $this->sTDBPersilRepository->find($id);

        if (empty($sTDBPersil)) {
            return $this->sendError('S T D B Persil not found');
        }

        $sTDBPersil->delete();

        return $this->sendSuccess('S T D B Persil deleted successfully');
    }
}
