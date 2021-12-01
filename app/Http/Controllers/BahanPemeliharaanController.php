<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBahanPemeliharaanRequest;
use App\Http\Requests\UpdateBahanPemeliharaanRequest;
use App\Repositories\BahanPemeliharaanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class BahanPemeliharaanController extends AppBaseController
{
    /** @var  BahanPemeliharaanRepository */
    private $bahanPemeliharaanRepository;

    public function __construct(BahanPemeliharaanRepository $bahanPemeliharaanRepo)
    {
        $this->bahanPemeliharaanRepository = $bahanPemeliharaanRepo;
    }

    /**
     * Display a listing of the BahanPemeliharaan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $bahanPemeliharaans = $this->bahanPemeliharaanRepository->all();

        return view('bahan_pemeliharaans.index')
            ->with('bahanPemeliharaans', $bahanPemeliharaans);
    }

    /**
     * Show the form for creating a new BahanPemeliharaan.
     *
     * @return Response
     */
    public function create()
    {
        return view('bahan_pemeliharaans.create');
    }

    /**
     * Store a newly created BahanPemeliharaan in storage.
     *
     * @param CreateBahanPemeliharaanRequest $request
     *
     * @return Response
     */
    public function store(CreateBahanPemeliharaanRequest $request)
    {
        $input = $request->all();

        $bahanPemeliharaan = $this->bahanPemeliharaanRepository->create($input);

        Flash::success('Bahan Pemeliharaan saved successfully.');

        return redirect(route('bahanPemeliharaans.index'));
    }

    /**
     * Display the specified BahanPemeliharaan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bahanPemeliharaan = $this->bahanPemeliharaanRepository->find($id);

        if (empty($bahanPemeliharaan)) {
            Flash::error('Bahan Pemeliharaan not found');

            return redirect(route('bahanPemeliharaans.index'));
        }

        return view('bahan_pemeliharaans.show')->with('bahanPemeliharaan', $bahanPemeliharaan);
    }

    /**
     * Show the form for editing the specified BahanPemeliharaan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bahanPemeliharaan = $this->bahanPemeliharaanRepository->find($id);

        if (empty($bahanPemeliharaan)) {
            Flash::error('Bahan Pemeliharaan not found');

            return redirect(route('bahanPemeliharaans.index'));
        }

        return view('bahan_pemeliharaans.edit')->with('bahanPemeliharaan', $bahanPemeliharaan);
    }

    /**
     * Update the specified BahanPemeliharaan in storage.
     *
     * @param int $id
     * @param UpdateBahanPemeliharaanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBahanPemeliharaanRequest $request)
    {
        $bahanPemeliharaan = $this->bahanPemeliharaanRepository->find($id);

        if (empty($bahanPemeliharaan)) {
            Flash::error('Bahan Pemeliharaan not found');

            return redirect(route('bahanPemeliharaans.index'));
        }

        $bahanPemeliharaan = $this->bahanPemeliharaanRepository->update($request->all(), $id);

        Flash::success('Bahan Pemeliharaan updated successfully.');

        return redirect(route('bahanPemeliharaans.index'));
    }

    /**
     * Remove the specified BahanPemeliharaan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bahanPemeliharaan = $this->bahanPemeliharaanRepository->find($id);

        if (empty($bahanPemeliharaan)) {
            Flash::error('Bahan Pemeliharaan not found');

            return redirect(route('bahanPemeliharaans.index'));
        }

        $this->bahanPemeliharaanRepository->delete($id);

        Flash::success('Bahan Pemeliharaan deleted successfully.');

        return redirect(route('bahanPemeliharaans.index'));
    }
}
