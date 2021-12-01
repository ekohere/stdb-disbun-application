<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKategoriPemeliharaanRequest;
use App\Http\Requests\UpdateKategoriPemeliharaanRequest;
use App\Repositories\KategoriPemeliharaanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class KategoriPemeliharaanController extends AppBaseController
{
    /** @var  KategoriPemeliharaanRepository */
    private $kategoriPemeliharaanRepository;

    public function __construct(KategoriPemeliharaanRepository $kategoriPemeliharaanRepo)
    {
        $this->kategoriPemeliharaanRepository = $kategoriPemeliharaanRepo;
    }

    /**
     * Display a listing of the KategoriPemeliharaan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $kategoriPemeliharaans = $this->kategoriPemeliharaanRepository->all();

        return view('kategori_pemeliharaans.index')
            ->with('kategoriPemeliharaans', $kategoriPemeliharaans);
    }

    /**
     * Show the form for creating a new KategoriPemeliharaan.
     *
     * @return Response
     */
    public function create()
    {
        return view('kategori_pemeliharaans.create');
    }

    /**
     * Store a newly created KategoriPemeliharaan in storage.
     *
     * @param CreateKategoriPemeliharaanRequest $request
     *
     * @return Response
     */
    public function store(CreateKategoriPemeliharaanRequest $request)
    {
        $input = $request->all();

        $kategoriPemeliharaan = $this->kategoriPemeliharaanRepository->create($input);

        Flash::success('Kategori Pemeliharaan saved successfully.');

        return redirect(route('kategoriPemeliharaans.index'));
    }

    /**
     * Display the specified KategoriPemeliharaan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kategoriPemeliharaan = $this->kategoriPemeliharaanRepository->find($id);

        if (empty($kategoriPemeliharaan)) {
            Flash::error('Kategori Pemeliharaan not found');

            return redirect(route('kategoriPemeliharaans.index'));
        }

        return view('kategori_pemeliharaans.show')->with('kategoriPemeliharaan', $kategoriPemeliharaan);
    }

    /**
     * Show the form for editing the specified KategoriPemeliharaan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kategoriPemeliharaan = $this->kategoriPemeliharaanRepository->find($id);

        if (empty($kategoriPemeliharaan)) {
            Flash::error('Kategori Pemeliharaan not found');

            return redirect(route('kategoriPemeliharaans.index'));
        }

        return view('kategori_pemeliharaans.edit')->with('kategoriPemeliharaan', $kategoriPemeliharaan);
    }

    /**
     * Update the specified KategoriPemeliharaan in storage.
     *
     * @param int $id
     * @param UpdateKategoriPemeliharaanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKategoriPemeliharaanRequest $request)
    {
        $kategoriPemeliharaan = $this->kategoriPemeliharaanRepository->find($id);

        if (empty($kategoriPemeliharaan)) {
            Flash::error('Kategori Pemeliharaan not found');

            return redirect(route('kategoriPemeliharaans.index'));
        }

        $kategoriPemeliharaan = $this->kategoriPemeliharaanRepository->update($request->all(), $id);

        Flash::success('Kategori Pemeliharaan updated successfully.');

        return redirect(route('kategoriPemeliharaans.index'));
    }

    /**
     * Remove the specified KategoriPemeliharaan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kategoriPemeliharaan = $this->kategoriPemeliharaanRepository->find($id);

        if (empty($kategoriPemeliharaan)) {
            Flash::error('Kategori Pemeliharaan not found');

            return redirect(route('kategoriPemeliharaans.index'));
        }

        $this->kategoriPemeliharaanRepository->delete($id);

        Flash::success('Kategori Pemeliharaan deleted successfully.');

        return redirect(route('kategoriPemeliharaans.index'));
    }
}
