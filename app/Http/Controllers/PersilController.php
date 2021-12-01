<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePersilRequest;
use App\Http\Requests\UpdatePersilRequest;
use App\Repositories\PersilRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PersilController extends AppBaseController
{
    /** @var  PersilRepository */
    private $persilRepository;

    public function __construct(PersilRepository $persilRepo)
    {
        $this->persilRepository = $persilRepo;
    }

    /**
     * Display a listing of the Persil.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $persils = $this->persilRepository->all();

        return view('persils.index')
            ->with('persils', $persils);
    }

    /**
     * Show the form for creating a new Persil.
     *
     * @return Response
     */
    public function create()
    {
        return view('persils.create');
    }

    /**
     * Store a newly created Persil in storage.
     *
     * @param CreatePersilRequest $request
     *
     * @return Response
     */
    public function store(CreatePersilRequest $request)
    {
        $input = $request->all();

        $persil = $this->persilRepository->create($input);

        Flash::success('Persil saved successfully.');

        return redirect(route('persils.index'));
    }

    /**
     * Display the specified Persil.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $persil = $this->persilRepository->find($id);

        if (empty($persil)) {
            Flash::error('Persil not found');

            return redirect(route('persils.index'));
        }

        return view('persils.show')->with('persil', $persil);
    }

    /**
     * Show the form for editing the specified Persil.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $persil = $this->persilRepository->find($id);

        if (empty($persil)) {
            Flash::error('Persil not found');

            return redirect(route('persils.index'));
        }

        return view('persils.edit')->with('persil', $persil);
    }

    /**
     * Update the specified Persil in storage.
     *
     * @param int $id
     * @param UpdatePersilRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePersilRequest $request)
    {
        $persil = $this->persilRepository->find($id);

        if (empty($persil)) {
            Flash::error('Persil not found');

            return redirect(route('persils.index'));
        }

        $persil = $this->persilRepository->update($request->all(), $id);

        Flash::success('Persil updated successfully.');

        return redirect(route('persils.index'));
    }

    /**
     * Remove the specified Persil from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $persil = $this->persilRepository->find($id);

        if (empty($persil)) {
            Flash::error('Persil not found');

            return redirect(route('persils.index'));
        }

        $this->persilRepository->delete($id);

        Flash::success('Persil deleted successfully.');

        return redirect(route('persils.index'));
    }
}
