<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePelatihanRequest;
use App\Http\Requests\UpdatePelatihanRequest;
use App\Repositories\PelatihanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PelatihanController extends AppBaseController
{
    /** @var  PelatihanRepository */
    private $pelatihanRepository;

    public function __construct(PelatihanRepository $pelatihanRepo)
    {
        $this->pelatihanRepository = $pelatihanRepo;
    }

    /**
     * Display a listing of the Pelatihan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pelatihans = $this->pelatihanRepository->all();

        return view('pelatihans.index')
            ->with('pelatihans', $pelatihans);
    }

    /**
     * Show the form for creating a new Pelatihan.
     *
     * @return Response
     */
    public function create()
    {
        return view('pelatihans.create');
    }

    /**
     * Store a newly created Pelatihan in storage.
     *
     * @param CreatePelatihanRequest $request
     *
     * @return Response
     */
    public function store(CreatePelatihanRequest $request)
    {
        $input = $request->all();

        $pelatihan = $this->pelatihanRepository->create($input);

        Flash::success('Pelatihan saved successfully.');

        return redirect(route('pelatihans.index'));
    }

    /**
     * Display the specified Pelatihan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pelatihan = $this->pelatihanRepository->find($id);

        if (empty($pelatihan)) {
            Flash::error('Pelatihan not found');

            return redirect(route('pelatihans.index'));
        }

        return view('pelatihans.show')->with('pelatihan', $pelatihan);
    }

    /**
     * Show the form for editing the specified Pelatihan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pelatihan = $this->pelatihanRepository->find($id);

        if (empty($pelatihan)) {
            Flash::error('Pelatihan not found');

            return redirect(route('pelatihans.index'));
        }

        return view('pelatihans.edit')->with('pelatihan', $pelatihan);
    }

    /**
     * Update the specified Pelatihan in storage.
     *
     * @param int $id
     * @param UpdatePelatihanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePelatihanRequest $request)
    {
        $pelatihan = $this->pelatihanRepository->find($id);

        if (empty($pelatihan)) {
            Flash::error('Pelatihan not found');

            return redirect(route('pelatihans.index'));
        }

        $pelatihan = $this->pelatihanRepository->update($request->all(), $id);

        Flash::success('Pelatihan updated successfully.');

        return redirect(route('pelatihans.index'));
    }

    /**
     * Remove the specified Pelatihan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pelatihan = $this->pelatihanRepository->find($id);

        if (empty($pelatihan)) {
            Flash::error('Pelatihan not found');

            return redirect(route('pelatihans.index'));
        }

        $this->pelatihanRepository->delete($id);

        Flash::success('Pelatihan deleted successfully.');

        return redirect(route('pelatihans.index'));
    }
}
