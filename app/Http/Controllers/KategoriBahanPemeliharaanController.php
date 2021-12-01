<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKategoriBahanPemeliharaanRequest;
use App\Http\Requests\UpdateKategoriBahanPemeliharaanRequest;
use App\Repositories\KategoriBahanPemeliharaanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class KategoriBahanPemeliharaanController extends AppBaseController
{
    /** @var  KategoriBahanPemeliharaanRepository */
    private $kategoriBahanPemeliharaanRepository;

    public function __construct(KategoriBahanPemeliharaanRepository $kategoriBahanPemeliharaanRepo)
    {
        $this->kategoriBahanPemeliharaanRepository = $kategoriBahanPemeliharaanRepo;
    }

    /**
     * Display a listing of the KategoriBahanPemeliharaan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $kategoriBahanPemeliharaans = $this->kategoriBahanPemeliharaanRepository->all();

        return view('kategori_bahan_pemeliharaans.index')
            ->with('kategoriBahanPemeliharaans', $kategoriBahanPemeliharaans);
    }

    /**
     * Show the form for creating a new KategoriBahanPemeliharaan.
     *
     * @return Response
     */
    public function create()
    {
        return view('kategori_bahan_pemeliharaans.create');
    }

    /**
     * Store a newly created KategoriBahanPemeliharaan in storage.
     *
     * @param CreateKategoriBahanPemeliharaanRequest $request
     *
     * @return Response
     */
    public function store(CreateKategoriBahanPemeliharaanRequest $request)
    {
        $input = $request->all();

        $kategoriBahanPemeliharaan = $this->kategoriBahanPemeliharaanRepository->create($input);

        Flash::success('Kategori Bahan Pemeliharaan saved successfully.');

        return redirect(route('kategoriBahanPemeliharaans.index'));
    }

    /**
     * Display the specified KategoriBahanPemeliharaan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kategoriBahanPemeliharaan = $this->kategoriBahanPemeliharaanRepository->find($id);

        if (empty($kategoriBahanPemeliharaan)) {
            Flash::error('Kategori Bahan Pemeliharaan not found');

            return redirect(route('kategoriBahanPemeliharaans.index'));
        }

        return view('kategori_bahan_pemeliharaans.show')->with('kategoriBahanPemeliharaan', $kategoriBahanPemeliharaan);
    }

    /**
     * Show the form for editing the specified KategoriBahanPemeliharaan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kategoriBahanPemeliharaan = $this->kategoriBahanPemeliharaanRepository->find($id);

        if (empty($kategoriBahanPemeliharaan)) {
            Flash::error('Kategori Bahan Pemeliharaan not found');

            return redirect(route('kategoriBahanPemeliharaans.index'));
        }

        return view('kategori_bahan_pemeliharaans.edit')->with('kategoriBahanPemeliharaan', $kategoriBahanPemeliharaan);
    }

    /**
     * Update the specified KategoriBahanPemeliharaan in storage.
     *
     * @param int $id
     * @param UpdateKategoriBahanPemeliharaanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKategoriBahanPemeliharaanRequest $request)
    {
        $kategoriBahanPemeliharaan = $this->kategoriBahanPemeliharaanRepository->find($id);

        if (empty($kategoriBahanPemeliharaan)) {
            Flash::error('Kategori Bahan Pemeliharaan not found');

            return redirect(route('kategoriBahanPemeliharaans.index'));
        }

        $kategoriBahanPemeliharaan = $this->kategoriBahanPemeliharaanRepository->update($request->all(), $id);

        Flash::success('Kategori Bahan Pemeliharaan updated successfully.');

        return redirect(route('kategoriBahanPemeliharaans.index'));
    }

    /**
     * Remove the specified KategoriBahanPemeliharaan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kategoriBahanPemeliharaan = $this->kategoriBahanPemeliharaanRepository->find($id);

        if (empty($kategoriBahanPemeliharaan)) {
            Flash::error('Kategori Bahan Pemeliharaan not found');

            return redirect(route('kategoriBahanPemeliharaans.index'));
        }

        $this->kategoriBahanPemeliharaanRepository->delete($id);

        Flash::success('Kategori Bahan Pemeliharaan deleted successfully.');

        return redirect(route('kategoriBahanPemeliharaans.index'));
    }
}
