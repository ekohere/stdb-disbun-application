<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKategoriPekerjaRequest;
use App\Http\Requests\UpdateKategoriPekerjaRequest;
use App\Repositories\KategoriPekerjaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class KategoriPekerjaController extends AppBaseController
{
    /** @var  KategoriPekerjaRepository */
    private $kategoriPekerjaRepository;

    public function __construct(KategoriPekerjaRepository $kategoriPekerjaRepo)
    {
        $this->kategoriPekerjaRepository = $kategoriPekerjaRepo;
    }

    /**
     * Display a listing of the KategoriPekerja.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $kategoriPekerjas = $this->kategoriPekerjaRepository->all();

        return view('kategori_pekerjas.index')
            ->with('kategoriPekerjas', $kategoriPekerjas);
    }

    /**
     * Show the form for creating a new KategoriPekerja.
     *
     * @return Response
     */
    public function create()
    {
        return view('kategori_pekerjas.create');
    }

    /**
     * Store a newly created KategoriPekerja in storage.
     *
     * @param CreateKategoriPekerjaRequest $request
     *
     * @return Response
     */
    public function store(CreateKategoriPekerjaRequest $request)
    {
        $input = $request->all();

        $kategoriPekerja = $this->kategoriPekerjaRepository->create($input);

        Flash::success('Kategori Pekerja saved successfully.');

        return redirect(route('kategoriPekerjas.index'));
    }

    /**
     * Display the specified KategoriPekerja.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kategoriPekerja = $this->kategoriPekerjaRepository->find($id);

        if (empty($kategoriPekerja)) {
            Flash::error('Kategori Pekerja not found');

            return redirect(route('kategoriPekerjas.index'));
        }

        return view('kategori_pekerjas.show')->with('kategoriPekerja', $kategoriPekerja);
    }

    /**
     * Show the form for editing the specified KategoriPekerja.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kategoriPekerja = $this->kategoriPekerjaRepository->find($id);

        if (empty($kategoriPekerja)) {
            Flash::error('Kategori Pekerja not found');

            return redirect(route('kategoriPekerjas.index'));
        }

        return view('kategori_pekerjas.edit')->with('kategoriPekerja', $kategoriPekerja);
    }

    /**
     * Update the specified KategoriPekerja in storage.
     *
     * @param int $id
     * @param UpdateKategoriPekerjaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKategoriPekerjaRequest $request)
    {
        $kategoriPekerja = $this->kategoriPekerjaRepository->find($id);

        if (empty($kategoriPekerja)) {
            Flash::error('Kategori Pekerja not found');

            return redirect(route('kategoriPekerjas.index'));
        }

        $kategoriPekerja = $this->kategoriPekerjaRepository->update($request->all(), $id);

        Flash::success('Kategori Pekerja updated successfully.');

        return redirect(route('kategoriPekerjas.index'));
    }

    /**
     * Remove the specified KategoriPekerja from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kategoriPekerja = $this->kategoriPekerjaRepository->find($id);

        if (empty($kategoriPekerja)) {
            Flash::error('Kategori Pekerja not found');

            return redirect(route('kategoriPekerjas.index'));
        }

        $this->kategoriPekerjaRepository->delete($id);

        Flash::success('Kategori Pekerja deleted successfully.');

        return redirect(route('kategoriPekerjas.index'));
    }
}
