<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePenjualanSaprodiRequest;
use App\Http\Requests\UpdatePenjualanSaprodiRequest;
use App\Repositories\PenjualanSaprodiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PenjualanSaprodiController extends AppBaseController
{
    /** @var  PenjualanSaprodiRepository */
    private $penjualanSaprodiRepository;

    public function __construct(PenjualanSaprodiRepository $penjualanSaprodiRepo)
    {
        $this->penjualanSaprodiRepository = $penjualanSaprodiRepo;
    }

    /**
     * Display a listing of the PenjualanSaprodi.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $penjualanSaprodis = $this->penjualanSaprodiRepository->all();

        return view('penjualan_saprodis.index')
            ->with('penjualanSaprodis', $penjualanSaprodis);
    }

    /**
     * Show the form for creating a new PenjualanSaprodi.
     *
     * @return Response
     */
    public function create()
    {
        return view('penjualan_saprodis.create');
    }

    /**
     * Store a newly created PenjualanSaprodi in storage.
     *
     * @param CreatePenjualanSaprodiRequest $request
     *
     * @return Response
     */
    public function store(CreatePenjualanSaprodiRequest $request)
    {
        $input = $request->all();

        $penjualanSaprodi = $this->penjualanSaprodiRepository->create($input);

        Flash::success('Penjualan Saprodi saved successfully.');

        return redirect(route('penjualanSaprodis.index'));
    }

    /**
     * Display the specified PenjualanSaprodi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $penjualanSaprodi = $this->penjualanSaprodiRepository->find($id);

        if (empty($penjualanSaprodi)) {
            Flash::error('Penjualan Saprodi not found');

            return redirect(route('penjualanSaprodis.index'));
        }

        return view('penjualan_saprodis.show')->with('penjualanSaprodi', $penjualanSaprodi);
    }

    /**
     * Show the form for editing the specified PenjualanSaprodi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $penjualanSaprodi = $this->penjualanSaprodiRepository->find($id);

        if (empty($penjualanSaprodi)) {
            Flash::error('Penjualan Saprodi not found');

            return redirect(route('penjualanSaprodis.index'));
        }

        return view('penjualan_saprodis.edit')->with('penjualanSaprodi', $penjualanSaprodi);
    }

    /**
     * Update the specified PenjualanSaprodi in storage.
     *
     * @param int $id
     * @param UpdatePenjualanSaprodiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePenjualanSaprodiRequest $request)
    {
        $penjualanSaprodi = $this->penjualanSaprodiRepository->find($id);

        if (empty($penjualanSaprodi)) {
            Flash::error('Penjualan Saprodi not found');

            return redirect(route('penjualanSaprodis.index'));
        }

        $penjualanSaprodi = $this->penjualanSaprodiRepository->update($request->all(), $id);

        Flash::success('Penjualan Saprodi updated successfully.');

        return redirect(route('penjualanSaprodis.index'));
    }

    /**
     * Remove the specified PenjualanSaprodi from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $penjualanSaprodi = $this->penjualanSaprodiRepository->find($id);

        if (empty($penjualanSaprodi)) {
            Flash::error('Penjualan Saprodi not found');

            return redirect(route('penjualanSaprodis.index'));
        }

        $this->penjualanSaprodiRepository->delete($id);

        Flash::success('Penjualan Saprodi deleted successfully.');

        return redirect(route('penjualanSaprodis.index'));
    }
}
