<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWilayahRequest;
use App\Http\Requests\UpdateWilayahRequest;
use App\Repositories\WilayahRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class WilayahController extends AppBaseController
{
    /** @var  WilayahRepository */
    private $wilayahRepository;

    public function __construct(WilayahRepository $wilayahRepo)
    {
        $this->wilayahRepository = $wilayahRepo;
    }

    /**
     * Display a listing of the Wilayah.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $wilayahs = $this->wilayahRepository->all();

        return view('wilayahs.index')
            ->with('wilayahs', $wilayahs);
    }

    /**
     * Show the form for creating a new Wilayah.
     *
     * @return Response
     */
    public function create()
    {
        return view('wilayahs.create');
    }

    /**
     * Store a newly created Wilayah in storage.
     *
     * @param CreateWilayahRequest $request
     *
     * @return Response
     */
    public function store(CreateWilayahRequest $request)
    {
        $input = $request->all();

        $wilayah = $this->wilayahRepository->create($input);

        Flash::success('Wilayah saved successfully.');

        return redirect(route('wilayahs.index'));
    }

    /**
     * Display the specified Wilayah.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $wilayah = $this->wilayahRepository->find($id);

        if (empty($wilayah)) {
            Flash::error('Wilayah not found');

            return redirect(route('wilayahs.index'));
        }

        return view('wilayahs.show')->with('wilayah', $wilayah);
    }

    /**
     * Show the form for editing the specified Wilayah.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $wilayah = $this->wilayahRepository->find($id);

        if (empty($wilayah)) {
            Flash::error('Wilayah not found');

            return redirect(route('wilayahs.index'));
        }

        return view('wilayahs.edit')->with('wilayah', $wilayah);
    }

    /**
     * Update the specified Wilayah in storage.
     *
     * @param int $id
     * @param UpdateWilayahRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWilayahRequest $request)
    {
        $wilayah = $this->wilayahRepository->find($id);

        if (empty($wilayah)) {
            Flash::error('Wilayah not found');

            return redirect(route('wilayahs.index'));
        }

        $wilayah = $this->wilayahRepository->update($request->all(), $id);

        Flash::success('Wilayah updated successfully.');

        return redirect(route('wilayahs.index'));
    }

    /**
     * Remove the specified Wilayah from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $wilayah = $this->wilayahRepository->find($id);

        if (empty($wilayah)) {
            Flash::error('Wilayah not found');

            return redirect(route('wilayahs.index'));
        }

        $this->wilayahRepository->delete($id);

        Flash::success('Wilayah deleted successfully.');

        return redirect(route('wilayahs.index'));
    }
}
