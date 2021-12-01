<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePksRequest;
use App\Http\Requests\UpdatePksRequest;
use App\Repositories\PksRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PksController extends AppBaseController
{
    /** @var  PksRepository */
    private $pksRepository;

    public function __construct(PksRepository $pksRepo)
    {
        $this->pksRepository = $pksRepo;
    }

    /**
     * Display a listing of the Pks.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pks = $this->pksRepository->all();

        return view('pks.index')
            ->with('pks', $pks);
    }

    /**
     * Show the form for creating a new Pks.
     *
     * @return Response
     */
    public function create()
    {
        return view('pks.create');
    }

    /**
     * Store a newly created Pks in storage.
     *
     * @param CreatePksRequest $request
     *
     * @return Response
     */
    public function store(CreatePksRequest $request)
    {
        $input = $request->all();

        $pks = $this->pksRepository->create($input);

        Flash::success('Pks saved successfully.');

        return redirect(route('pks.index'));
    }

    /**
     * Display the specified Pks.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pks = $this->pksRepository->find($id);

        if (empty($pks)) {
            Flash::error('Pks not found');

            return redirect(route('pks.index'));
        }

        return view('pks.show')->with('pks', $pks);
    }

    /**
     * Show the form for editing the specified Pks.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pks = $this->pksRepository->find($id);

        if (empty($pks)) {
            Flash::error('Pks not found');

            return redirect(route('pks.index'));
        }

        return view('pks.edit')->with('pks', $pks);
    }

    /**
     * Update the specified Pks in storage.
     *
     * @param int $id
     * @param UpdatePksRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePksRequest $request)
    {
        $pks = $this->pksRepository->find($id);

        if (empty($pks)) {
            Flash::error('Pks not found');

            return redirect(route('pks.index'));
        }

        $pks = $this->pksRepository->update($request->all(), $id);

        Flash::success('Pks updated successfully.');

        return redirect(route('pks.index'));
    }

    /**
     * Remove the specified Pks from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pks = $this->pksRepository->find($id);

        if (empty($pks)) {
            Flash::error('Pks not found');

            return redirect(route('pks.index'));
        }

        $this->pksRepository->delete($id);

        Flash::success('Pks deleted successfully.');

        return redirect(route('pks.index'));
    }
}
