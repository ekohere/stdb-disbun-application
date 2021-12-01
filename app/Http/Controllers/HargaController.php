<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHargaRequest;
use App\Http\Requests\UpdateHargaRequest;
use App\Repositories\HargaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class HargaController extends AppBaseController
{
    /** @var  HargaRepository */
    private $hargaRepository;

    public function __construct(HargaRepository $hargaRepo)
    {
        $this->hargaRepository = $hargaRepo;
    }

    /**
     * Display a listing of the Harga.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $hargas = $this->hargaRepository->all();

        return view('hargas.index')
            ->with('hargas', $hargas);
    }

    /**
     * Show the form for creating a new Harga.
     *
     * @return Response
     */
    public function create()
    {
        return view('hargas.create');
    }

    /**
     * Store a newly created Harga in storage.
     *
     * @param CreateHargaRequest $request
     *
     * @return Response
     */
    public function store(CreateHargaRequest $request)
    {
        $input = $request->all();

        $harga = $this->hargaRepository->create($input);

        Flash::success('Harga saved successfully.');

        return redirect(route('hargas.index'));
    }

    /**
     * Display the specified Harga.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $harga = $this->hargaRepository->find($id);

        if (empty($harga)) {
            Flash::error('Harga not found');

            return redirect(route('hargas.index'));
        }

        return view('hargas.show')->with('harga', $harga);
    }

    /**
     * Show the form for editing the specified Harga.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $harga = $this->hargaRepository->find($id);

        if (empty($harga)) {
            Flash::error('Harga not found');

            return redirect(route('hargas.index'));
        }

        return view('hargas.edit')->with('harga', $harga);
    }

    /**
     * Update the specified Harga in storage.
     *
     * @param int $id
     * @param UpdateHargaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHargaRequest $request)
    {
        $harga = $this->hargaRepository->find($id);

        if (empty($harga)) {
            Flash::error('Harga not found');

            return redirect(route('hargas.index'));
        }

        $harga = $this->hargaRepository->update($request->all(), $id);

        Flash::success('Harga updated successfully.');

        return redirect(route('hargas.index'));
    }

    /**
     * Remove the specified Harga from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $harga = $this->hargaRepository->find($id);

        if (empty($harga)) {
            Flash::error('Harga not found');

            return redirect(route('hargas.index'));
        }

        $this->hargaRepository->delete($id);

        Flash::success('Harga deleted successfully.');

        return redirect(route('hargas.index'));
    }
}
