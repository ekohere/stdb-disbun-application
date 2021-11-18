<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWilayahPelayananRequest;
use App\Http\Requests\UpdateWilayahPelayananRequest;
use App\Repositories\WilayahPelayananRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class WilayahPelayananController extends AppBaseController
{
    /** @var  WilayahPelayananRepository */
    private $wilayahPelayananRepository;

    public function __construct(WilayahPelayananRepository $wilayahPelayananRepo)
    {
        $this->wilayahPelayananRepository = $wilayahPelayananRepo;
    }

    /**
     * Display a listing of the WilayahPelayanan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $wilayahPelayanans = $this->wilayahPelayananRepository->all();

        return view('wilayah_pelayanans.index')
            ->with('wilayahPelayanans', $wilayahPelayanans);
    }

    /**
     * Show the form for creating a new WilayahPelayanan.
     *
     * @return Response
     */
    public function create()
    {
        return view('wilayah_pelayanans.create');
    }

    /**
     * Store a newly created WilayahPelayanan in storage.
     *
     * @param CreateWilayahPelayananRequest $request
     *
     * @return Response
     */
    public function store(CreateWilayahPelayananRequest $request)
    {
        $input = $request->all();

        $wilayahPelayanan = $this->wilayahPelayananRepository->create($input);

        Flash::success('Wilayah Pelayanan saved successfully.');

        return redirect(route('wilayahPelayanans.index'));
    }

    /**
     * Display the specified WilayahPelayanan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $wilayahPelayanan = $this->wilayahPelayananRepository->find($id);

        if (empty($wilayahPelayanan)) {
            Flash::error('Wilayah Pelayanan not found');

            return redirect(route('wilayahPelayanans.index'));
        }

        return view('wilayah_pelayanans.show')->with('wilayahPelayanan', $wilayahPelayanan);
    }

    /**
     * Show the form for editing the specified WilayahPelayanan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $wilayahPelayanan = $this->wilayahPelayananRepository->find($id);

        if (empty($wilayahPelayanan)) {
            Flash::error('Wilayah Pelayanan not found');

            return redirect(route('wilayahPelayanans.index'));
        }

        return view('wilayah_pelayanans.edit')->with('wilayahPelayanan', $wilayahPelayanan);
    }

    /**
     * Update the specified WilayahPelayanan in storage.
     *
     * @param int $id
     * @param UpdateWilayahPelayananRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWilayahPelayananRequest $request)
    {
        $wilayahPelayanan = $this->wilayahPelayananRepository->find($id);

        if (empty($wilayahPelayanan)) {
            Flash::error('Wilayah Pelayanan not found');

            return redirect(route('wilayahPelayanans.index'));
        }

        $wilayahPelayanan = $this->wilayahPelayananRepository->update($request->all(), $id);

        Flash::success('Wilayah Pelayanan updated successfully.');

        return redirect(route('wilayahPelayanans.index'));
    }

    /**
     * Remove the specified WilayahPelayanan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $wilayahPelayanan = $this->wilayahPelayananRepository->find($id);

        if (empty($wilayahPelayanan)) {
            Flash::error('Wilayah Pelayanan not found');

            return redirect(route('wilayahPelayanans.index'));
        }

        $this->wilayahPelayananRepository->delete($id);

        Flash::success('Wilayah Pelayanan deleted successfully.');

        return redirect(route('wilayahPelayanans.index'));
    }
}
