<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSTDBStatusRequest;
use App\Http\Requests\UpdateSTDBStatusRequest;
use App\Repositories\STDBStatusRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class STDBStatusController extends AppBaseController
{
    /** @var  STDBStatusRepository */
    private $sTDBStatusRepository;

    public function __construct(STDBStatusRepository $sTDBStatusRepo)
    {
        $this->sTDBStatusRepository = $sTDBStatusRepo;
    }

    /**
     * Display a listing of the STDBStatus.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $sTDBStatuses = $this->sTDBStatusRepository->all();

        return view('s_t_d_b_statuses.index')
            ->with('sTDBStatuses', $sTDBStatuses);
    }

    /**
     * Show the form for creating a new STDBStatus.
     *
     * @return Response
     */
    public function create()
    {
        return view('s_t_d_b_statuses.create');
    }

    /**
     * Store a newly created STDBStatus in storage.
     *
     * @param CreateSTDBStatusRequest $request
     *
     * @return Response
     */
    public function store(CreateSTDBStatusRequest $request)
    {
        $input = $request->all();

        $sTDBStatus = $this->sTDBStatusRepository->create($input);

        Flash::success('S T D B Status saved successfully.');

        return redirect(route('sTDBStatuses.index'));
    }

    /**
     * Display the specified STDBStatus.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sTDBStatus = $this->sTDBStatusRepository->find($id);

        if (empty($sTDBStatus)) {
            Flash::error('S T D B Status not found');

            return redirect(route('sTDBStatuses.index'));
        }

        return view('s_t_d_b_statuses.show')->with('sTDBStatus', $sTDBStatus);
    }

    /**
     * Show the form for editing the specified STDBStatus.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sTDBStatus = $this->sTDBStatusRepository->find($id);

        if (empty($sTDBStatus)) {
            Flash::error('S T D B Status not found');

            return redirect(route('sTDBStatuses.index'));
        }

        return view('s_t_d_b_statuses.edit')->with('sTDBStatus', $sTDBStatus);
    }

    /**
     * Update the specified STDBStatus in storage.
     *
     * @param int $id
     * @param UpdateSTDBStatusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSTDBStatusRequest $request)
    {
        $sTDBStatus = $this->sTDBStatusRepository->find($id);

        if (empty($sTDBStatus)) {
            Flash::error('S T D B Status not found');

            return redirect(route('sTDBStatuses.index'));
        }

        $sTDBStatus = $this->sTDBStatusRepository->update($request->all(), $id);

        Flash::success('S T D B Status updated successfully.');

        return redirect(route('sTDBStatuses.index'));
    }

    /**
     * Remove the specified STDBStatus from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sTDBStatus = $this->sTDBStatusRepository->find($id);

        if (empty($sTDBStatus)) {
            Flash::error('S T D B Status not found');

            return redirect(route('sTDBStatuses.index'));
        }

        $this->sTDBStatusRepository->delete($id);

        Flash::success('S T D B Status deleted successfully.');

        return redirect(route('sTDBStatuses.index'));
    }
}
