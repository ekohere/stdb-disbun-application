<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKoperasiRequest;
use App\Http\Requests\UpdateKoperasiRequest;
use App\Repositories\KoperasiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class KoperasiController extends AppBaseController
{
    /** @var  KoperasiRepository */
    private $koperasiRepository;

    public function __construct(KoperasiRepository $koperasiRepo)
    {
        $this->koperasiRepository = $koperasiRepo;
    }

    /**
     * Display a listing of the Koperasi.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $koperasis = $this->koperasiRepository->all();

        return view('koperasis.index')
            ->with('koperasis', $koperasis);
    }

    /**
     * Show the form for creating a new Koperasi.
     *
     * @return Response
     */
    public function create()
    {
        return view('koperasis.create');
    }

    /**
     * Store a newly created Koperasi in storage.
     *
     * @param CreateKoperasiRequest $request
     *
     * @return Response
     */
    public function store(CreateKoperasiRequest $request)
    {
        $input = $request->all();

        $koperasi = $this->koperasiRepository->create($input);

        Flash::success('Koperasi saved successfully.');

        return redirect(route('koperasis.index'));
    }

    /**
     * Display the specified Koperasi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $koperasi = $this->koperasiRepository->find($id);

        if (empty($koperasi)) {
            Flash::error('Koperasi not found');

            return redirect(route('koperasis.index'));
        }

        return view('koperasis.show')->with('koperasi', $koperasi);
    }

    /**
     * Show the form for editing the specified Koperasi.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $koperasi = $this->koperasiRepository->find($id);

        if (empty($koperasi)) {
            Flash::error('Koperasi not found');

            return redirect(route('koperasis.index'));
        }

        return view('koperasis.edit')->with('koperasi', $koperasi);
    }

    /**
     * Update the specified Koperasi in storage.
     *
     * @param int $id
     * @param UpdateKoperasiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKoperasiRequest $request)
    {
        $koperasi = $this->koperasiRepository->find($id);

        if (empty($koperasi)) {
            Flash::error('Koperasi not found');

            return redirect(route('koperasis.index'));
        }

        $koperasi = $this->koperasiRepository->update($request->all(), $id);

        Flash::success('Koperasi updated successfully.');

        return redirect(route('koperasis.index'));
    }

    /**
     * Remove the specified Koperasi from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $koperasi = $this->koperasiRepository->find($id);

        if (empty($koperasi)) {
            Flash::error('Koperasi not found');

            return redirect(route('koperasis.index'));
        }

        $this->koperasiRepository->delete($id);

        Flash::success('Koperasi deleted successfully.');

        return redirect(route('koperasis.index'));
    }
}
