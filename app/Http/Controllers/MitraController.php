<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMitraRequest;
use App\Http\Requests\UpdateMitraRequest;
use App\Repositories\MitraRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MitraController extends AppBaseController
{
    /** @var  MitraRepository */
    private $mitraRepository;

    public function __construct(MitraRepository $mitraRepo)
    {
        $this->mitraRepository = $mitraRepo;
    }

    /**
     * Display a listing of the Mitra.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $mitras = $this->mitraRepository->all();

        return view('mitras.index')
            ->with('mitras', $mitras);
    }

    /**
     * Show the form for creating a new Mitra.
     *
     * @return Response
     */
    public function create()
    {
        return view('mitras.create');
    }

    /**
     * Store a newly created Mitra in storage.
     *
     * @param CreateMitraRequest $request
     *
     * @return Response
     */
    public function store(CreateMitraRequest $request)
    {
        $input = $request->all();

        $mitra = $this->mitraRepository->create($input);

        Flash::success('Mitra saved successfully.');

        return redirect(route('mitras.index'));
    }

    /**
     * Display the specified Mitra.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mitra = $this->mitraRepository->find($id);

        if (empty($mitra)) {
            Flash::error('Mitra not found');

            return redirect(route('mitras.index'));
        }

        return view('mitras.show')->with('mitra', $mitra);
    }

    /**
     * Show the form for editing the specified Mitra.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mitra = $this->mitraRepository->find($id);

        if (empty($mitra)) {
            Flash::error('Mitra not found');

            return redirect(route('mitras.index'));
        }

        return view('mitras.edit')->with('mitra', $mitra);
    }

    /**
     * Update the specified Mitra in storage.
     *
     * @param int $id
     * @param UpdateMitraRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMitraRequest $request)
    {
        $mitra = $this->mitraRepository->find($id);

        if (empty($mitra)) {
            Flash::error('Mitra not found');

            return redirect(route('mitras.index'));
        }

        $mitra = $this->mitraRepository->update($request->all(), $id);

        Flash::success('Mitra updated successfully.');

        return redirect(route('mitras.index'));
    }

    /**
     * Remove the specified Mitra from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mitra = $this->mitraRepository->find($id);

        if (empty($mitra)) {
            Flash::error('Mitra not found');

            return redirect(route('mitras.index'));
        }

        $this->mitraRepository->delete($id);

        Flash::success('Mitra deleted successfully.');

        return redirect(route('mitras.index'));
    }
}
