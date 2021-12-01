<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNeracaKeuanganRequest;
use App\Http\Requests\UpdateNeracaKeuanganRequest;
use App\Repositories\NeracaKeuanganRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class NeracaKeuanganController extends AppBaseController
{
    /** @var  NeracaKeuanganRepository */
    private $neracaKeuanganRepository;

    public function __construct(NeracaKeuanganRepository $neracaKeuanganRepo)
    {
        $this->neracaKeuanganRepository = $neracaKeuanganRepo;
    }

    /**
     * Display a listing of the NeracaKeuangan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $neracaKeuangans = $this->neracaKeuanganRepository->all();

        return view('neraca_keuangans.index')
            ->with('neracaKeuangans', $neracaKeuangans);
    }

    /**
     * Show the form for creating a new NeracaKeuangan.
     *
     * @return Response
     */
    public function create()
    {
        return view('neraca_keuangans.create');
    }

    /**
     * Store a newly created NeracaKeuangan in storage.
     *
     * @param CreateNeracaKeuanganRequest $request
     *
     * @return Response
     */
    public function store(CreateNeracaKeuanganRequest $request)
    {
        $input = $request->all();

        $neracaKeuangan = $this->neracaKeuanganRepository->create($input);

        Flash::success('Neraca Keuangan saved successfully.');

        return redirect(route('neracaKeuangans.index'));
    }

    /**
     * Display the specified NeracaKeuangan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $neracaKeuangan = $this->neracaKeuanganRepository->find($id);

        if (empty($neracaKeuangan)) {
            Flash::error('Neraca Keuangan not found');

            return redirect(route('neracaKeuangans.index'));
        }

        return view('neraca_keuangans.show')->with('neracaKeuangan', $neracaKeuangan);
    }

    /**
     * Show the form for editing the specified NeracaKeuangan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $neracaKeuangan = $this->neracaKeuanganRepository->find($id);

        if (empty($neracaKeuangan)) {
            Flash::error('Neraca Keuangan not found');

            return redirect(route('neracaKeuangans.index'));
        }

        return view('neraca_keuangans.edit')->with('neracaKeuangan', $neracaKeuangan);
    }

    /**
     * Update the specified NeracaKeuangan in storage.
     *
     * @param int $id
     * @param UpdateNeracaKeuanganRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNeracaKeuanganRequest $request)
    {
        $neracaKeuangan = $this->neracaKeuanganRepository->find($id);

        if (empty($neracaKeuangan)) {
            Flash::error('Neraca Keuangan not found');

            return redirect(route('neracaKeuangans.index'));
        }

        $neracaKeuangan = $this->neracaKeuanganRepository->update($request->all(), $id);

        Flash::success('Neraca Keuangan updated successfully.');

        return redirect(route('neracaKeuangans.index'));
    }

    /**
     * Remove the specified NeracaKeuangan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $neracaKeuangan = $this->neracaKeuanganRepository->find($id);

        if (empty($neracaKeuangan)) {
            Flash::error('Neraca Keuangan not found');

            return redirect(route('neracaKeuangans.index'));
        }

        $this->neracaKeuanganRepository->delete($id);

        Flash::success('Neraca Keuangan deleted successfully.');

        return redirect(route('neracaKeuangans.index'));
    }
}
