<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePengurusRequest;
use App\Http\Requests\UpdatePengurusRequest;
use App\Repositories\PengurusRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PengurusController extends AppBaseController
{
    /** @var  PengurusRepository */
    private $pengurusRepository;

    public function __construct(PengurusRepository $pengurusRepo)
    {
        $this->pengurusRepository = $pengurusRepo;
    }

    /**
     * Display a listing of the Pengurus.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $penguruses = $this->pengurusRepository->all();

        return view('penguruses.index')
            ->with('penguruses', $penguruses);
    }

    /**
     * Show the form for creating a new Pengurus.
     *
     * @return Response
     */
    public function create()
    {
        return view('penguruses.create');
    }

    /**
     * Store a newly created Pengurus in storage.
     *
     * @param CreatePengurusRequest $request
     *
     * @return Response
     */
    public function store(CreatePengurusRequest $request)
    {
        $input = $request->all();

        $pengurus = $this->pengurusRepository->create($input);

        Flash::success('Pengurus saved successfully.');

        return redirect(route('penguruses.index'));
    }

    /**
     * Display the specified Pengurus.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pengurus = $this->pengurusRepository->find($id);

        if (empty($pengurus)) {
            Flash::error('Pengurus not found');

            return redirect(route('penguruses.index'));
        }

        return view('penguruses.show')->with('pengurus', $pengurus);
    }

    /**
     * Show the form for editing the specified Pengurus.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pengurus = $this->pengurusRepository->find($id);

        if (empty($pengurus)) {
            Flash::error('Pengurus not found');

            return redirect(route('penguruses.index'));
        }

        return view('penguruses.edit')->with('pengurus', $pengurus);
    }

    /**
     * Update the specified Pengurus in storage.
     *
     * @param int $id
     * @param UpdatePengurusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePengurusRequest $request)
    {
        $pengurus = $this->pengurusRepository->find($id);

        if (empty($pengurus)) {
            Flash::error('Pengurus not found');

            return redirect(route('penguruses.index'));
        }

        $pengurus = $this->pengurusRepository->update($request->all(), $id);

        Flash::success('Pengurus updated successfully.');

        return redirect(route('penguruses.index'));
    }

    /**
     * Remove the specified Pengurus from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pengurus = $this->pengurusRepository->find($id);

        if (empty($pengurus)) {
            Flash::error('Pengurus not found');

            return redirect(route('penguruses.index'));
        }

        $this->pengurusRepository->delete($id);

        Flash::success('Pengurus deleted successfully.');

        return redirect(route('penguruses.index'));
    }
}
