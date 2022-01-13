<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSTDBRegisterHasSTDBStatusRequest;
use App\Http\Requests\UpdateSTDBRegisterHasSTDBStatusRequest;
use App\Models\STDBRegisterHasSTDBStatus;
use App\Repositories\STDBRegisterHasSTDBStatusRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class STDBRegisterHasSTDBStatusController extends AppBaseController
{
    /** @var  STDBRegisterHasSTDBStatusRepository */
    private $sTDBRegisterHasSTDBStatusRepository;

    public function __construct(STDBRegisterHasSTDBStatusRepository $sTDBRegisterHasSTDBStatusRepo)
    {
        $this->sTDBRegisterHasSTDBStatusRepository = $sTDBRegisterHasSTDBStatusRepo;
    }

    /**
     * Display a listing of the STDBRegisterHasSTDBStatus.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $sTDBRegisterHasSTDBStatuses = STDBRegisterHasSTDBStatus::all();

        return view('s_t_d_b_register_has_s_t_d_b_statuses.index')
            ->with('sTDBRegisterHasSTDBStatuses', $sTDBRegisterHasSTDBStatuses);
    }

    /**
     * Show the form for creating a new STDBRegisterHasSTDBStatus.
     *
     * @return Response
     */
    public function create()
    {
        return view('s_t_d_b_register_has_s_t_d_b_statuses.create');
    }

    /**
     * Store a newly created STDBRegisterHasSTDBStatus in storage.
     *
     * @param CreateSTDBRegisterHasSTDBStatusRequest $request
     *
     * @return Response
     */
    public function store(CreateSTDBRegisterHasSTDBStatusRequest $request)
    {
        $input = $request->all();

        $sTDBRegisterHasSTDBStatus = $this->sTDBRegisterHasSTDBStatusRepository->create($input);

        Flash::success('S T D B Register Has S T D B Status saved successfully.');

        return redirect(route('sTDBRegisterHasSTDBStatuses.index'));
    }

    /**
     * Display the specified STDBRegisterHasSTDBStatus.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sTDBRegisterHasSTDBStatus = $this->sTDBRegisterHasSTDBStatusRepository->find($id);

        if (empty($sTDBRegisterHasSTDBStatus)) {
            Flash::error('S T D B Register Has S T D B Status not found');

            return redirect(route('sTDBRegisterHasSTDBStatuses.index'));
        }

        return view('s_t_d_b_register_has_s_t_d_b_statuses.show')->with('sTDBRegisterHasSTDBStatus', $sTDBRegisterHasSTDBStatus);
    }

    /**
     * Show the form for editing the specified STDBRegisterHasSTDBStatus.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $sTDBRegisterHasSTDBStatus = $this->sTDBRegisterHasSTDBStatusRepository->find($id);

        if (empty($sTDBRegisterHasSTDBStatus)) {
            Flash::error('S T D B Register Has S T D B Status not found');

            return redirect(route('sTDBRegisterHasSTDBStatuses.index'));
        }

        return view('s_t_d_b_register_has_s_t_d_b_statuses.edit')->with('sTDBRegisterHasSTDBStatus', $sTDBRegisterHasSTDBStatus);
    }

    /**
     * Update the specified STDBRegisterHasSTDBStatus in storage.
     *
     * @param int $id
     * @param UpdateSTDBRegisterHasSTDBStatusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSTDBRegisterHasSTDBStatusRequest $request)
    {
        $sTDBRegisterHasSTDBStatus = $this->sTDBRegisterHasSTDBStatusRepository->find($id);

        if (empty($sTDBRegisterHasSTDBStatus)) {
            Flash::error('S T D B Register Has S T D B Status not found');

            return redirect(route('sTDBRegisterHasSTDBStatuses.index'));
        }

        $sTDBRegisterHasSTDBStatus = $this->sTDBRegisterHasSTDBStatusRepository->update($request->all(), $id);

        Flash::success('S T D B Register Has S T D B Status updated successfully.');

        return redirect(route('sTDBRegisterHasSTDBStatuses.index'));
    }

    /**
     * Remove the specified STDBRegisterHasSTDBStatus from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sTDBRegisterHasSTDBStatus = $this->sTDBRegisterHasSTDBStatusRepository->find($id);

        if (empty($sTDBRegisterHasSTDBStatus)) {
            Flash::error('S T D B Register Has S T D B Status not found');

            return redirect(route('sTDBRegisterHasSTDBStatuses.index'));
        }

        $this->sTDBRegisterHasSTDBStatusRepository->delete($id);

        Flash::success('S T D B Register Has S T D B Status deleted successfully.');

        return redirect(route('sTDBRegisterHasSTDBStatuses.index'));
    }
}
