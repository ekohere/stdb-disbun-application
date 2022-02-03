<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKPHRequest;
use App\Http\Requests\UpdateKPHRequest;
use App\Repositories\KPHRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class KPHController extends AppBaseController
{
    /** @var  KPHRepository */
    private $kPHRepository;

    public function __construct(KPHRepository $kPHRepo)
    {
        $this->kPHRepository = $kPHRepo;
    }

    /**
     * Display a listing of the KPH.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $kPHS = $this->kPHRepository->all();

        return view('k_p_h_s.index')
            ->with('kPHS', $kPHS);
    }

    /**
     * Show the form for creating a new KPH.
     *
     * @return Response
     */
    public function create()
    {
        return view('k_p_h_s.create');
    }

    /**
     * Store a newly created KPH in storage.
     *
     * @param CreateKPHRequest $request
     *
     * @return Response
     */
    public function store(CreateKPHRequest $request)
    {
        $input = $request->all();

        $kPH = $this->kPHRepository->create($input);

        Flash::success('K P H saved successfully.');

        return redirect(route('kPHS.index'));
    }

    /**
     * Display the specified KPH.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kPH = $this->kPHRepository->find($id);

        if (empty($kPH)) {
            Flash::error('K P H not found');

            return redirect(route('kPHS.index'));
        }

        return view('k_p_h_s.show')->with('kPH', $kPH);
    }

    /**
     * Show the form for editing the specified KPH.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kPH = $this->kPHRepository->find($id);

        if (empty($kPH)) {
            Flash::error('K P H not found');

            return redirect(route('kPHS.index'));
        }

        return view('k_p_h_s.edit')->with('kPH', $kPH);
    }

    /**
     * Update the specified KPH in storage.
     *
     * @param int $id
     * @param UpdateKPHRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKPHRequest $request)
    {
        $kPH = $this->kPHRepository->find($id);

        if (empty($kPH)) {
            Flash::error('K P H not found');

            return redirect(route('kPHS.index'));
        }

        $kPH = $this->kPHRepository->update($request->all(), $id);

        Flash::success('K P H updated successfully.');

        return redirect(route('kPHS.index'));
    }

    /**
     * Remove the specified KPH from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kPH = $this->kPHRepository->find($id);

        if (empty($kPH)) {
            Flash::error('K P H not found');

            return redirect(route('kPHS.index'));
        }

        $this->kPHRepository->delete($id);

        Flash::success('KPH deleted successfully.');

        return redirect(route('kPHS.index'));
    }
}

