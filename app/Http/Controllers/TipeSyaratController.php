<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTipeSyaratRequest;
use App\Http\Requests\UpdateTipeSyaratRequest;
use App\Repositories\TipeSyaratRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TipeSyaratController extends AppBaseController
{
    /** @var  TipeSyaratRepository */
    private $tipeSyaratRepository;

    public function __construct(TipeSyaratRepository $tipeSyaratRepo)
    {
        $this->tipeSyaratRepository = $tipeSyaratRepo;
    }

    /**
     * Display a listing of the TipeSyarat.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tipeSyarats = $this->tipeSyaratRepository->all();

        return view('tipe_syarats.index')
            ->with('tipeSyarats', $tipeSyarats);
    }

    /**
     * Show the form for creating a new TipeSyarat.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipe_syarats.create');
    }

    /**
     * Store a newly created TipeSyarat in storage.
     *
     * @param CreateTipeSyaratRequest $request
     *
     * @return Response
     */
    public function store(CreateTipeSyaratRequest $request)
    {
        $input = $request->all();

        $tipeSyarat = $this->tipeSyaratRepository->create($input);

        Flash::success('Tipe Syarat saved successfully.');

        return redirect(route('tipeSyarats.index'));
    }

    /**
     * Display the specified TipeSyarat.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipeSyarat = $this->tipeSyaratRepository->find($id);

        if (empty($tipeSyarat)) {
            Flash::error('Tipe Syarat not found');

            return redirect(route('tipeSyarats.index'));
        }

        return view('tipe_syarats.show')->with('tipeSyarat', $tipeSyarat);
    }

    /**
     * Show the form for editing the specified TipeSyarat.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipeSyarat = $this->tipeSyaratRepository->find($id);

        if (empty($tipeSyarat)) {
            Flash::error('Tipe Syarat not found');

            return redirect(route('tipeSyarats.index'));
        }

        return view('tipe_syarats.edit')->with('tipeSyarat', $tipeSyarat);
    }

    /**
     * Update the specified TipeSyarat in storage.
     *
     * @param int $id
     * @param UpdateTipeSyaratRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipeSyaratRequest $request)
    {
        $tipeSyarat = $this->tipeSyaratRepository->find($id);

        if (empty($tipeSyarat)) {
            Flash::error('Tipe Syarat not found');

            return redirect(route('tipeSyarats.index'));
        }

        $tipeSyarat = $this->tipeSyaratRepository->update($request->all(), $id);

        Flash::success('Tipe Syarat updated successfully.');

        return redirect(route('tipeSyarats.index'));
    }

    /**
     * Remove the specified TipeSyarat from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipeSyarat = $this->tipeSyaratRepository->find($id);

        if (empty($tipeSyarat)) {
            Flash::error('Tipe Syarat not found');

            return redirect(route('tipeSyarats.index'));
        }

        $this->tipeSyaratRepository->delete($id);

        Flash::success('Tipe Syarat deleted successfully.');

        return redirect(route('tipeSyarats.index'));
    }
}
