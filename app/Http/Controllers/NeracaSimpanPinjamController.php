<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNeracaSimpanPinjamRequest;
use App\Http\Requests\UpdateNeracaSimpanPinjamRequest;
use App\Repositories\NeracaSimpanPinjamRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class NeracaSimpanPinjamController extends AppBaseController
{
    /** @var  NeracaSimpanPinjamRepository */
    private $neracaSimpanPinjamRepository;

    public function __construct(NeracaSimpanPinjamRepository $neracaSimpanPinjamRepo)
    {
        $this->neracaSimpanPinjamRepository = $neracaSimpanPinjamRepo;
    }

    /**
     * Display a listing of the NeracaSimpanPinjam.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $neracaSimpanPinjams = $this->neracaSimpanPinjamRepository->all();

        return view('neraca_simpan_pinjams.index')
            ->with('neracaSimpanPinjams', $neracaSimpanPinjams);
    }

    /**
     * Show the form for creating a new NeracaSimpanPinjam.
     *
     * @return Response
     */
    public function create()
    {
        return view('neraca_simpan_pinjams.create');
    }

    /**
     * Store a newly created NeracaSimpanPinjam in storage.
     *
     * @param CreateNeracaSimpanPinjamRequest $request
     *
     * @return Response
     */
    public function store(CreateNeracaSimpanPinjamRequest $request)
    {
        $input = $request->all();

        $neracaSimpanPinjam = $this->neracaSimpanPinjamRepository->create($input);

        Flash::success('Neraca Simpan Pinjam saved successfully.');

        return redirect(route('neracaSimpanPinjams.index'));
    }

    /**
     * Display the specified NeracaSimpanPinjam.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $neracaSimpanPinjam = $this->neracaSimpanPinjamRepository->find($id);

        if (empty($neracaSimpanPinjam)) {
            Flash::error('Neraca Simpan Pinjam not found');

            return redirect(route('neracaSimpanPinjams.index'));
        }

        return view('neraca_simpan_pinjams.show')->with('neracaSimpanPinjam', $neracaSimpanPinjam);
    }

    /**
     * Show the form for editing the specified NeracaSimpanPinjam.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $neracaSimpanPinjam = $this->neracaSimpanPinjamRepository->find($id);

        if (empty($neracaSimpanPinjam)) {
            Flash::error('Neraca Simpan Pinjam not found');

            return redirect(route('neracaSimpanPinjams.index'));
        }

        return view('neraca_simpan_pinjams.edit')->with('neracaSimpanPinjam', $neracaSimpanPinjam);
    }

    /**
     * Update the specified NeracaSimpanPinjam in storage.
     *
     * @param int $id
     * @param UpdateNeracaSimpanPinjamRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNeracaSimpanPinjamRequest $request)
    {
        $neracaSimpanPinjam = $this->neracaSimpanPinjamRepository->find($id);

        if (empty($neracaSimpanPinjam)) {
            Flash::error('Neraca Simpan Pinjam not found');

            return redirect(route('neracaSimpanPinjams.index'));
        }

        $neracaSimpanPinjam = $this->neracaSimpanPinjamRepository->update($request->all(), $id);

        Flash::success('Neraca Simpan Pinjam updated successfully.');

        return redirect(route('neracaSimpanPinjams.index'));
    }

    /**
     * Remove the specified NeracaSimpanPinjam from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $neracaSimpanPinjam = $this->neracaSimpanPinjamRepository->find($id);

        if (empty($neracaSimpanPinjam)) {
            Flash::error('Neraca Simpan Pinjam not found');

            return redirect(route('neracaSimpanPinjams.index'));
        }

        $this->neracaSimpanPinjamRepository->delete($id);

        Flash::success('Neraca Simpan Pinjam deleted successfully.');

        return redirect(route('neracaSimpanPinjams.index'));
    }
}
