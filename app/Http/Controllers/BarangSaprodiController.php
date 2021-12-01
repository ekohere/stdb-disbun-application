<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBarangSaprodiRequest;
use App\Http\Requests\UpdateBarangSaprodiRequest;
use App\Repositories\BarangSaprodiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BarangSaprodiController extends AppBaseController
{
    /** @var  BarangSaprodiRepository */
    private $barangSaprodiRepository;

    public function __construct(BarangSaprodiRepository $barangSaprodiRepo)
    {
        $this->barangSaprodiRepository = $barangSaprodiRepo;
    }

    /**
     * Display a listing of the BarangSaprodi.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $barangSaprodis = $this->barangSaprodiRepository->all();

        return view('barang_saprodis.index')
            ->with('barangSaprodis', $barangSaprodis);
    }

    /**
     * Show the form for creating a new BarangSaprodi.
     *
     * @return Response
     */
    public function create()
    {
        return view('barang_saprodis.create');
    }

    /**
     * Store a newly created BarangSaprodi in storage.
     *
     * @param CreateBarangSaprodiRequest $request
     *
     * @return Response
     */
    public function store(CreateBarangSaprodiRequest $request)
    {
        $input = $request->all();

        $barangSaprodi = $this->barangSaprodiRepository->create($input);

        Flash::success('Barang Saprodi saved successfully.');

        return redirect(route('barangSaprodis.index'));
    }

    /**
     * Display the specified BarangSaprodi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $barangSaprodi = $this->barangSaprodiRepository->find($id);

        if (empty($barangSaprodi)) {
            Flash::error('Barang Saprodi not found');

            return redirect(route('barangSaprodis.index'));
        }

        return view('barang_saprodis.show')->with('barangSaprodi', $barangSaprodi);
    }

    /**
     * Show the form for editing the specified BarangSaprodi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $barangSaprodi = $this->barangSaprodiRepository->find($id);

        if (empty($barangSaprodi)) {
            Flash::error('Barang Saprodi not found');

            return redirect(route('barangSaprodis.index'));
        }

        return view('barang_saprodis.edit')->with('barangSaprodi', $barangSaprodi);
    }

    /**
     * Update the specified BarangSaprodi in storage.
     *
     * @param int $id
     * @param UpdateBarangSaprodiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBarangSaprodiRequest $request)
    {
        $barangSaprodi = $this->barangSaprodiRepository->find($id);

        if (empty($barangSaprodi)) {
            Flash::error('Barang Saprodi not found');

            return redirect(route('barangSaprodis.index'));
        }

        $barangSaprodi = $this->barangSaprodiRepository->update($request->all(), $id);

        Flash::success('Barang Saprodi updated successfully.');

        return redirect(route('barangSaprodis.index'));
    }

    /**
     * Remove the specified BarangSaprodi from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $barangSaprodi = $this->barangSaprodiRepository->find($id);

        if (empty($barangSaprodi)) {
            Flash::error('Barang Saprodi not found');

            return redirect(route('barangSaprodis.index'));
        }

        $this->barangSaprodiRepository->delete($id);

        Flash::success('Barang Saprodi deleted successfully.');

        return redirect(route('barangSaprodis.index'));
    }
}
