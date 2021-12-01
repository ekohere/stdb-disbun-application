<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePenjualanTbsRequest;
use App\Http\Requests\UpdatePenjualanTbsRequest;
use App\Repositories\PenjualanTbsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PenjualanTbsController extends AppBaseController
{
    /** @var  PenjualanTbsRepository */
    private $penjualanTbsRepository;

    public function __construct(PenjualanTbsRepository $penjualanTbsRepo)
    {
        $this->penjualanTbsRepository = $penjualanTbsRepo;
    }

    /**
     * Display a listing of the PenjualanTbs.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $penjualanTbs = $this->penjualanTbsRepository->all();

        return view('penjualan_tbs.index')
            ->with('penjualanTbs', $penjualanTbs);
    }

    /**
     * Show the form for creating a new PenjualanTbs.
     *
     * @return Response
     */
    public function create()
    {
        return view('penjualan_tbs.create');
    }

    /**
     * Store a newly created PenjualanTbs in storage.
     *
     * @param CreatePenjualanTbsRequest $request
     *
     * @return Response
     */
    public function store(CreatePenjualanTbsRequest $request)
    {
        $input = $request->all();

        $penjualanTbs = $this->penjualanTbsRepository->create($input);

        Flash::success('Penjualan Tbs saved successfully.');

        return redirect(route('penjualanTbs.index'));
    }

    /**
     * Display the specified PenjualanTbs.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $penjualanTbs = $this->penjualanTbsRepository->find($id);

        if (empty($penjualanTbs)) {
            Flash::error('Penjualan Tbs not found');

            return redirect(route('penjualanTbs.index'));
        }

        return view('penjualan_tbs.show')->with('penjualanTbs', $penjualanTbs);
    }

    /**
     * Show the form for editing the specified PenjualanTbs.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $penjualanTbs = $this->penjualanTbsRepository->find($id);

        if (empty($penjualanTbs)) {
            Flash::error('Penjualan Tbs not found');

            return redirect(route('penjualanTbs.index'));
        }

        return view('penjualan_tbs.edit')->with('penjualanTbs', $penjualanTbs);
    }

    /**
     * Update the specified PenjualanTbs in storage.
     *
     * @param int $id
     * @param UpdatePenjualanTbsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePenjualanTbsRequest $request)
    {
        $penjualanTbs = $this->penjualanTbsRepository->find($id);

        if (empty($penjualanTbs)) {
            Flash::error('Penjualan Tbs not found');

            return redirect(route('penjualanTbs.index'));
        }

        $penjualanTbs = $this->penjualanTbsRepository->update($request->all(), $id);

        Flash::success('Penjualan Tbs updated successfully.');

        return redirect(route('penjualanTbs.index'));
    }

    /**
     * Remove the specified PenjualanTbs from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $penjualanTbs = $this->penjualanTbsRepository->find($id);

        if (empty($penjualanTbs)) {
            Flash::error('Penjualan Tbs not found');

            return redirect(route('penjualanTbs.index'));
        }

        $this->penjualanTbsRepository->delete($id);

        Flash::success('Penjualan Tbs deleted successfully.');

        return redirect(route('penjualanTbs.index'));
    }
}
