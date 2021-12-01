<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKelolaLingkunganRequest;
use App\Http\Requests\UpdateKelolaLingkunganRequest;
use App\Repositories\KelolaLingkunganRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class KelolaLingkunganController extends AppBaseController
{
    /** @var  KelolaLingkunganRepository */
    private $kelolaLingkunganRepository;

    public function __construct(KelolaLingkunganRepository $kelolaLingkunganRepo)
    {
        $this->kelolaLingkunganRepository = $kelolaLingkunganRepo;
    }

    /**
     * Display a listing of the KelolaLingkungan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $kelolaLingkungans = $this->kelolaLingkunganRepository->all();

        return view('kelola_lingkungans.index')
            ->with('kelolaLingkungans', $kelolaLingkungans);
    }

    /**
     * Show the form for creating a new KelolaLingkungan.
     *
     * @return Response
     */
    public function create()
    {
        return view('kelola_lingkungans.create');
    }

    /**
     * Store a newly created KelolaLingkungan in storage.
     *
     * @param CreateKelolaLingkunganRequest $request
     *
     * @return Response
     */
    public function store(CreateKelolaLingkunganRequest $request)
    {
        $input = $request->all();

        $kelolaLingkungan = $this->kelolaLingkunganRepository->create($input);

        Flash::success('Kelola Lingkungan saved successfully.');

        return redirect(route('kelolaLingkungans.index'));
    }

    /**
     * Display the specified KelolaLingkungan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kelolaLingkungan = $this->kelolaLingkunganRepository->find($id);

        if (empty($kelolaLingkungan)) {
            Flash::error('Kelola Lingkungan not found');

            return redirect(route('kelolaLingkungans.index'));
        }

        return view('kelola_lingkungans.show')->with('kelolaLingkungan', $kelolaLingkungan);
    }

    /**
     * Show the form for editing the specified KelolaLingkungan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kelolaLingkungan = $this->kelolaLingkunganRepository->find($id);

        if (empty($kelolaLingkungan)) {
            Flash::error('Kelola Lingkungan not found');

            return redirect(route('kelolaLingkungans.index'));
        }

        return view('kelola_lingkungans.edit')->with('kelolaLingkungan', $kelolaLingkungan);
    }

    /**
     * Update the specified KelolaLingkungan in storage.
     *
     * @param int $id
     * @param UpdateKelolaLingkunganRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKelolaLingkunganRequest $request)
    {
        $kelolaLingkungan = $this->kelolaLingkunganRepository->find($id);

        if (empty($kelolaLingkungan)) {
            Flash::error('Kelola Lingkungan not found');

            return redirect(route('kelolaLingkungans.index'));
        }

        $kelolaLingkungan = $this->kelolaLingkunganRepository->update($request->all(), $id);

        Flash::success('Kelola Lingkungan updated successfully.');

        return redirect(route('kelolaLingkungans.index'));
    }

    /**
     * Remove the specified KelolaLingkungan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kelolaLingkungan = $this->kelolaLingkunganRepository->find($id);

        if (empty($kelolaLingkungan)) {
            Flash::error('Kelola Lingkungan not found');

            return redirect(route('kelolaLingkungans.index'));
        }

        $this->kelolaLingkunganRepository->delete($id);

        Flash::success('Kelola Lingkungan deleted successfully.');

        return redirect(route('kelolaLingkungans.index'));
    }
}
