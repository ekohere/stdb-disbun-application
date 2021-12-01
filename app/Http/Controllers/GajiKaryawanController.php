<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGajiKaryawanRequest;
use App\Http\Requests\UpdateGajiKaryawanRequest;
use App\Repositories\GajiKaryawanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class GajiKaryawanController extends AppBaseController
{
    /** @var  GajiKaryawanRepository */
    private $gajiKaryawanRepository;

    public function __construct(GajiKaryawanRepository $gajiKaryawanRepo)
    {
        $this->gajiKaryawanRepository = $gajiKaryawanRepo;
    }

    /**
     * Display a listing of the GajiKaryawan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $gajiKaryawans = $this->gajiKaryawanRepository->all();

        return view('gaji_karyawans.index')
            ->with('gajiKaryawans', $gajiKaryawans);
    }

    /**
     * Show the form for creating a new GajiKaryawan.
     *
     * @return Response
     */
    public function create()
    {
        return view('gaji_karyawans.create');
    }

    /**
     * Store a newly created GajiKaryawan in storage.
     *
     * @param CreateGajiKaryawanRequest $request
     *
     * @return Response
     */
    public function store(CreateGajiKaryawanRequest $request)
    {
        $input = $request->all();

        $gajiKaryawan = $this->gajiKaryawanRepository->create($input);

        Flash::success('Gaji Karyawan saved successfully.');

        return redirect(route('gajiKaryawans.index'));
    }

    /**
     * Display the specified GajiKaryawan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $gajiKaryawan = $this->gajiKaryawanRepository->find($id);

        if (empty($gajiKaryawan)) {
            Flash::error('Gaji Karyawan not found');

            return redirect(route('gajiKaryawans.index'));
        }

        return view('gaji_karyawans.show')->with('gajiKaryawan', $gajiKaryawan);
    }

    /**
     * Show the form for editing the specified GajiKaryawan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $gajiKaryawan = $this->gajiKaryawanRepository->find($id);

        if (empty($gajiKaryawan)) {
            Flash::error('Gaji Karyawan not found');

            return redirect(route('gajiKaryawans.index'));
        }

        return view('gaji_karyawans.edit')->with('gajiKaryawan', $gajiKaryawan);
    }

    /**
     * Update the specified GajiKaryawan in storage.
     *
     * @param int $id
     * @param UpdateGajiKaryawanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGajiKaryawanRequest $request)
    {
        $gajiKaryawan = $this->gajiKaryawanRepository->find($id);

        if (empty($gajiKaryawan)) {
            Flash::error('Gaji Karyawan not found');

            return redirect(route('gajiKaryawans.index'));
        }

        $gajiKaryawan = $this->gajiKaryawanRepository->update($request->all(), $id);

        Flash::success('Gaji Karyawan updated successfully.');

        return redirect(route('gajiKaryawans.index'));
    }

    /**
     * Remove the specified GajiKaryawan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $gajiKaryawan = $this->gajiKaryawanRepository->find($id);

        if (empty($gajiKaryawan)) {
            Flash::error('Gaji Karyawan not found');

            return redirect(route('gajiKaryawans.index'));
        }

        $this->gajiKaryawanRepository->delete($id);

        Flash::success('Gaji Karyawan deleted successfully.');

        return redirect(route('gajiKaryawans.index'));
    }
}
