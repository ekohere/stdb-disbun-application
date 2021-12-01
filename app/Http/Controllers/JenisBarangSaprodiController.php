<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateJenisBarangSaprodiRequest;
use App\Http\Requests\UpdateJenisBarangSaprodiRequest;
use App\Repositories\JenisBarangSaprodiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class JenisBarangSaprodiController extends AppBaseController
{
    /** @var  JenisBarangSaprodiRepository */
    private $jenisBarangSaprodiRepository;

    public function __construct(JenisBarangSaprodiRepository $jenisBarangSaprodiRepo)
    {
        $this->jenisBarangSaprodiRepository = $jenisBarangSaprodiRepo;
    }

    /**
     * Display a listing of the JenisBarangSaprodi.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $jenisBarangSaprodis = $this->jenisBarangSaprodiRepository->all();

        return view('jenis_barang_saprodis.index')
            ->with('jenisBarangSaprodis', $jenisBarangSaprodis);
    }

    /**
     * Show the form for creating a new JenisBarangSaprodi.
     *
     * @return Response
     */
    public function create()
    {
        return view('jenis_barang_saprodis.create');
    }

    /**
     * Store a newly created JenisBarangSaprodi in storage.
     *
     * @param CreateJenisBarangSaprodiRequest $request
     *
     * @return Response
     */
    public function store(CreateJenisBarangSaprodiRequest $request)
    {
        $input = $request->all();

        $jenisBarangSaprodi = $this->jenisBarangSaprodiRepository->create($input);

        Flash::success('Jenis Barang Saprodi saved successfully.');

        return redirect(route('jenisBarangSaprodis.index'));
    }

    /**
     * Display the specified JenisBarangSaprodi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $jenisBarangSaprodi = $this->jenisBarangSaprodiRepository->find($id);

        if (empty($jenisBarangSaprodi)) {
            Flash::error('Jenis Barang Saprodi not found');

            return redirect(route('jenisBarangSaprodis.index'));
        }

        return view('jenis_barang_saprodis.show')->with('jenisBarangSaprodi', $jenisBarangSaprodi);
    }

    /**
     * Show the form for editing the specified JenisBarangSaprodi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jenisBarangSaprodi = $this->jenisBarangSaprodiRepository->find($id);

        if (empty($jenisBarangSaprodi)) {
            Flash::error('Jenis Barang Saprodi not found');

            return redirect(route('jenisBarangSaprodis.index'));
        }

        return view('jenis_barang_saprodis.edit')->with('jenisBarangSaprodi', $jenisBarangSaprodi);
    }

    /**
     * Update the specified JenisBarangSaprodi in storage.
     *
     * @param int $id
     * @param UpdateJenisBarangSaprodiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJenisBarangSaprodiRequest $request)
    {
        $jenisBarangSaprodi = $this->jenisBarangSaprodiRepository->find($id);

        if (empty($jenisBarangSaprodi)) {
            Flash::error('Jenis Barang Saprodi not found');

            return redirect(route('jenisBarangSaprodis.index'));
        }

        $jenisBarangSaprodi = $this->jenisBarangSaprodiRepository->update($request->all(), $id);

        Flash::success('Jenis Barang Saprodi updated successfully.');

        return redirect(route('jenisBarangSaprodis.index'));
    }

    /**
     * Remove the specified JenisBarangSaprodi from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $jenisBarangSaprodi = $this->jenisBarangSaprodiRepository->find($id);

        if (empty($jenisBarangSaprodi)) {
            Flash::error('Jenis Barang Saprodi not found');

            return redirect(route('jenisBarangSaprodis.index'));
        }

        $this->jenisBarangSaprodiRepository->delete($id);

        Flash::success('Jenis Barang Saprodi deleted successfully.');

        return redirect(route('jenisBarangSaprodis.index'));
    }
}
