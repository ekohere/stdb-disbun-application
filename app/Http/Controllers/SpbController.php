<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSpbRequest;
use App\Http\Requests\UpdateSpbRequest;
use App\Repositories\SpbRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class SpbController extends AppBaseController
{
    /** @var  SpbRepository */
    private $spbRepository;

    public function __construct(SpbRepository $spbRepo)
    {
        $this->spbRepository = $spbRepo;
    }

    /**
     * Display a listing of the Spb.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $spbs = $this->spbRepository->all();

        return view('spbs.index')
            ->with('spbs', $spbs);
    }

    /**
     * Show the form for creating a new Spb.
     *
     * @return Response
     */
    public function create()
    {
        return view('spbs.create');
    }

    /**
     * Store a newly created Spb in storage.
     *
     * @param CreateSpbRequest $request
     *
     * @return Response
     */
    public function store(CreateSpbRequest $request)
    {
        $input = $request->all();

        $spb = $this->spbRepository->create($input);

        Flash::success('Spb saved successfully.');

        return redirect(route('spbs.index'));
    }

    /**
     * Display the specified Spb.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $spb = $this->spbRepository->find($id);

        if (empty($spb)) {
            Flash::error('Spb not found');

            return redirect(route('spbs.index'));
        }

        return view('spbs.show')->with('spb', $spb);
    }

    /**
     * Show the form for editing the specified Spb.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $spb = $this->spbRepository->find($id);

        if (empty($spb)) {
            Flash::error('Spb not found');

            return redirect(route('spbs.index'));
        }

        return view('spbs.edit')->with('spb', $spb);
    }

    /**
     * Update the specified Spb in storage.
     *
     * @param int $id
     * @param UpdateSpbRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSpbRequest $request)
    {
        $spb = $this->spbRepository->find($id);

        if (empty($spb)) {
            Flash::error('Spb not found');

            return redirect(route('spbs.index'));
        }

        $spb = $this->spbRepository->update($request->all(), $id);

        Flash::success('Spb updated successfully.');

        return redirect(route('spbs.index'));
    }

    /**
     * Remove the specified Spb from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $spb = $this->spbRepository->find($id);

        if (empty($spb)) {
            Flash::error('Spb not found');

            return redirect(route('spbs.index'));
        }

        $this->spbRepository->delete($id);

        Flash::success('Spb deleted successfully.');

        return redirect(route('spbs.index'));
    }
}
