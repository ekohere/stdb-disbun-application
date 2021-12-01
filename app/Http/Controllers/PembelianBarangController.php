<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePembelianBarangRequest;
use App\Http\Requests\UpdatePembelianBarangRequest;
use App\Repositories\PembelianBarangRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PembelianBarangController extends AppBaseController
{
    /** @var  PembelianBarangRepository */
    private $pembelianBarangRepository;

    public function __construct(PembelianBarangRepository $pembelianBarangRepo)
    {
        $this->pembelianBarangRepository = $pembelianBarangRepo;
    }

    /**
     * Display a listing of the PembelianBarang.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pembelianBarangs = $this->pembelianBarangRepository->all();

        return view('pembelian_barangs.index')
            ->with('pembelianBarangs', $pembelianBarangs);
    }

    /**
     * Show the form for creating a new PembelianBarang.
     *
     * @return Response
     */
    public function create()
    {
        return view('pembelian_barangs.create');
    }

    /**
     * Store a newly created PembelianBarang in storage.
     *
     * @param CreatePembelianBarangRequest $request
     *
     * @return Response
     */
    public function store(CreatePembelianBarangRequest $request)
    {
        $input = $request->all();

        $pembelianBarang = $this->pembelianBarangRepository->create($input);

        Flash::success('Pembelian Barang saved successfully.');

        return redirect(route('pembelianBarangs.index'));
    }

    /**
     * Display the specified PembelianBarang.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pembelianBarang = $this->pembelianBarangRepository->find($id);

        if (empty($pembelianBarang)) {
            Flash::error('Pembelian Barang not found');

            return redirect(route('pembelianBarangs.index'));
        }

        return view('pembelian_barangs.show')->with('pembelianBarang', $pembelianBarang);
    }

    /**
     * Show the form for editing the specified PembelianBarang.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pembelianBarang = $this->pembelianBarangRepository->find($id);

        if (empty($pembelianBarang)) {
            Flash::error('Pembelian Barang not found');

            return redirect(route('pembelianBarangs.index'));
        }

        return view('pembelian_barangs.edit')->with('pembelianBarang', $pembelianBarang);
    }

    /**
     * Update the specified PembelianBarang in storage.
     *
     * @param int $id
     * @param UpdatePembelianBarangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePembelianBarangRequest $request)
    {
        $pembelianBarang = $this->pembelianBarangRepository->find($id);

        if (empty($pembelianBarang)) {
            Flash::error('Pembelian Barang not found');

            return redirect(route('pembelianBarangs.index'));
        }

        $pembelianBarang = $this->pembelianBarangRepository->update($request->all(), $id);

        Flash::success('Pembelian Barang updated successfully.');

        return redirect(route('pembelianBarangs.index'));
    }

    /**
     * Remove the specified PembelianBarang from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pembelianBarang = $this->pembelianBarangRepository->find($id);

        if (empty($pembelianBarang)) {
            Flash::error('Pembelian Barang not found');

            return redirect(route('pembelianBarangs.index'));
        }

        $this->pembelianBarangRepository->delete($id);

        Flash::success('Pembelian Barang deleted successfully.');

        return redirect(route('pembelianBarangs.index'));
    }
}
