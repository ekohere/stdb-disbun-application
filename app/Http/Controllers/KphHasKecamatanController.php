<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKphHasKecamatanRequest;
use App\Http\Requests\UpdateKphHasKecamatanRequest;
use App\Repositories\KphHasKecamatanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class KphHasKecamatanController extends AppBaseController
{
    /** @var  KphHasKecamatanRepository */
    private $kphHasKecamatanRepository;

    public function __construct(KphHasKecamatanRepository $kphHasKecamatanRepo)
    {
        $this->kphHasKecamatanRepository = $kphHasKecamatanRepo;
    }

    /**
     * Display a listing of the KphHasKecamatan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $kphHasKecamatans = $this->kphHasKecamatanRepository->all();

        return view('kph_has_kecamatans.index')
            ->with('kphHasKecamatans', $kphHasKecamatans);
    }

    /**
     * Show the form for creating a new KphHasKecamatan.
     *
     * @return Response
     */
    public function create()
    {
        return view('kph_has_kecamatans.create');
    }

    /**
     * Store a newly created KphHasKecamatan in storage.
     *
     * @param CreateKphHasKecamatanRequest $request
     *
     * @return Response
     */
    public function store(CreateKphHasKecamatanRequest $request)
    {
        $input = $request->all();

        $kphHasKecamatan = $this->kphHasKecamatanRepository->create($input);

        Flash::success('Kph Has Kecamatan saved successfully.');

        return redirect(route('kphHasKecamatans.index'));
    }

    /**
     * Display the specified KphHasKecamatan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kphHasKecamatan = $this->kphHasKecamatanRepository->find($id);

        if (empty($kphHasKecamatan)) {
            Flash::error('Kph Has Kecamatan not found');

            return redirect(route('kphHasKecamatans.index'));
        }

        return view('kph_has_kecamatans.show')->with('kphHasKecamatan', $kphHasKecamatan);
    }

    /**
     * Show the form for editing the specified KphHasKecamatan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kphHasKecamatan = $this->kphHasKecamatanRepository->find($id);

        if (empty($kphHasKecamatan)) {
            Flash::error('Kph Has Kecamatan not found');

            return redirect(route('kphHasKecamatans.index'));
        }

        return view('kph_has_kecamatans.edit')->with('kphHasKecamatan', $kphHasKecamatan);
    }

    /**
     * Update the specified KphHasKecamatan in storage.
     *
     * @param int $id
     * @param UpdateKphHasKecamatanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKphHasKecamatanRequest $request)
    {
        $kphHasKecamatan = $this->kphHasKecamatanRepository->find($id);

        if (empty($kphHasKecamatan)) {
            Flash::error('Kph Has Kecamatan not found');

            return redirect(route('kphHasKecamatans.index'));
        }

        $kphHasKecamatan = $this->kphHasKecamatanRepository->update($request->all(), $id);

        Flash::success('Kph Has Kecamatan updated successfully.');

        return redirect(route('kphHasKecamatans.index'));
    }

    /**
     * Remove the specified KphHasKecamatan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kphHasKecamatan = $this->kphHasKecamatanRepository->find($id);

        if (empty($kphHasKecamatan)) {
            Flash::error('Kph Has Kecamatan not found');

            return redirect(route('kphHasKecamatans.index'));
        }

        $this->kphHasKecamatanRepository->delete($id);

        Flash::success('Kph Has Kecamatan deleted successfully.');

        return redirect(route('kphHasKecamatans.index'));
    }
}
