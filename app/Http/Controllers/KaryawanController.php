<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKaryawanRequest;
use App\Http\Requests\UpdateKaryawanRequest;
use App\Repositories\KaryawanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class KaryawanController extends AppBaseController
{
    /** @var  KaryawanRepository */
    private $karyawanRepository;

    public function __construct(KaryawanRepository $karyawanRepo)
    {
        $this->karyawanRepository = $karyawanRepo;
    }

    /**
     * Display a listing of the Karyawan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $karyawans = $this->karyawanRepository->all();

        return view('karyawans.index')
            ->with('karyawans', $karyawans);
    }

    /**
     * Show the form for creating a new Karyawan.
     *
     * @return Response
     */
    public function create()
    {
        return view('karyawans.create');
    }

    /**
     * Store a newly created Karyawan in storage.
     *
     * @param CreateKaryawanRequest $request
     *
     * @return Response
     */
    public function store(CreateKaryawanRequest $request)
    {
        $input = $request->all();

        $karyawan = $this->karyawanRepository->create($input);

        Flash::success('Karyawan saved successfully.');

        return redirect(route('karyawans.index'));
    }

    /**
     * Display the specified Karyawan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $karyawan = $this->karyawanRepository->find($id);

        if (empty($karyawan)) {
            Flash::error('Karyawan not found');

            return redirect(route('karyawans.index'));
        }

        return view('karyawans.show')->with('karyawan', $karyawan);
    }

    /**
     * Show the form for editing the specified Karyawan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $karyawan = $this->karyawanRepository->find($id);

        if (empty($karyawan)) {
            Flash::error('Karyawan not found');

            return redirect(route('karyawans.index'));
        }

        return view('karyawans.edit')->with('karyawan', $karyawan);
    }

    /**
     * Update the specified Karyawan in storage.
     *
     * @param int $id
     * @param UpdateKaryawanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKaryawanRequest $request)
    {
        $karyawan = $this->karyawanRepository->find($id);

        if (empty($karyawan)) {
            Flash::error('Karyawan not found');

            return redirect(route('karyawans.index'));
        }

        $karyawan = $this->karyawanRepository->update($request->all(), $id);

        Flash::success('Karyawan updated successfully.');

        return redirect(route('karyawans.index'));
    }

    /**
     * Remove the specified Karyawan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $karyawan = $this->karyawanRepository->find($id);

        if (empty($karyawan)) {
            Flash::error('Karyawan not found');

            return redirect(route('karyawans.index'));
        }

        $this->karyawanRepository->delete($id);

        Flash::success('Karyawan deleted successfully.');

        return redirect(route('karyawans.index'));
    }
}
