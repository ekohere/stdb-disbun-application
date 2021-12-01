<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLaporanPanenRequest;
use App\Http\Requests\UpdateLaporanPanenRequest;
use App\Repositories\LaporanPanenRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class LaporanPanenController extends AppBaseController
{
    /** @var  LaporanPanenRepository */
    private $laporanPanenRepository;

    public function __construct(LaporanPanenRepository $laporanPanenRepo)
    {
        $this->laporanPanenRepository = $laporanPanenRepo;
    }

    /**
     * Display a listing of the LaporanPanen.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $laporanPanens = $this->laporanPanenRepository->all();

        return view('laporan_panens.index')
            ->with('laporanPanens', $laporanPanens);
    }

    /**
     * Show the form for creating a new LaporanPanen.
     *
     * @return Response
     */
    public function create()
    {
        return view('laporan_panens.create');
    }

    /**
     * Store a newly created LaporanPanen in storage.
     *
     * @param CreateLaporanPanenRequest $request
     *
     * @return Response
     */
    public function store(CreateLaporanPanenRequest $request)
    {
        $input = $request->all();

        $laporanPanen = $this->laporanPanenRepository->create($input);

        Flash::success('Laporan Panen saved successfully.');

        return redirect(route('laporanPanens.index'));
    }

    /**
     * Display the specified LaporanPanen.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $laporanPanen = $this->laporanPanenRepository->find($id);

        if (empty($laporanPanen)) {
            Flash::error('Laporan Panen not found');

            return redirect(route('laporanPanens.index'));
        }

        return view('laporan_panens.show')->with('laporanPanen', $laporanPanen);
    }

    /**
     * Show the form for editing the specified LaporanPanen.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $laporanPanen = $this->laporanPanenRepository->find($id);

        if (empty($laporanPanen)) {
            Flash::error('Laporan Panen not found');

            return redirect(route('laporanPanens.index'));
        }

        return view('laporan_panens.edit')->with('laporanPanen', $laporanPanen);
    }

    /**
     * Update the specified LaporanPanen in storage.
     *
     * @param int $id
     * @param UpdateLaporanPanenRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLaporanPanenRequest $request)
    {
        $laporanPanen = $this->laporanPanenRepository->find($id);

        if (empty($laporanPanen)) {
            Flash::error('Laporan Panen not found');

            return redirect(route('laporanPanens.index'));
        }

        $laporanPanen = $this->laporanPanenRepository->update($request->all(), $id);

        Flash::success('Laporan Panen updated successfully.');

        return redirect(route('laporanPanens.index'));
    }

    /**
     * Remove the specified LaporanPanen from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $laporanPanen = $this->laporanPanenRepository->find($id);

        if (empty($laporanPanen)) {
            Flash::error('Laporan Panen not found');

            return redirect(route('laporanPanens.index'));
        }

        $this->laporanPanenRepository->delete($id);

        Flash::success('Laporan Panen deleted successfully.');

        return redirect(route('laporanPanens.index'));
    }
}
