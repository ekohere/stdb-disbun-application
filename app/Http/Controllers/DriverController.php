<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDriverRequest;
use App\Http\Requests\UpdateDriverRequest;
use App\Repositories\DriverRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DriverController extends AppBaseController
{
    /** @var  DriverRepository */
    private $driverRepository;

    public function __construct(DriverRepository $driverRepo)
    {
        $this->driverRepository = $driverRepo;
    }

    /**
     * Display a listing of the Driver.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $drivers = $this->driverRepository->all();

        return view('drivers.index')
            ->with('drivers', $drivers);
    }

    /**
     * Show the form for creating a new Driver.
     *
     * @return Response
     */
    public function create()
    {
        return view('drivers.create');
    }

    /**
     * Store a newly created Driver in storage.
     *
     * @param CreateDriverRequest $request
     *
     * @return Response
     */
    public function store(CreateDriverRequest $request)
    {
        $input = $request->all();

        $driver = $this->driverRepository->create($input);

        Flash::success('Driver saved successfully.');

        return redirect(route('drivers.index'));
    }

    /**
     * Display the specified Driver.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $driver = $this->driverRepository->find($id);

        if (empty($driver)) {
            Flash::error('Driver not found');

            return redirect(route('drivers.index'));
        }

        return view('drivers.show')->with('driver', $driver);
    }

    /**
     * Show the form for editing the specified Driver.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $driver = $this->driverRepository->find($id);

        if (empty($driver)) {
            Flash::error('Driver not found');

            return redirect(route('drivers.index'));
        }

        return view('drivers.edit')->with('driver', $driver);
    }

    /**
     * Update the specified Driver in storage.
     *
     * @param int $id
     * @param UpdateDriverRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDriverRequest $request)
    {
        $driver = $this->driverRepository->find($id);

        if (empty($driver)) {
            Flash::error('Driver not found');

            return redirect(route('drivers.index'));
        }

        $driver = $this->driverRepository->update($request->all(), $id);

        Flash::success('Driver updated successfully.');

        return redirect(route('drivers.index'));
    }

    /**
     * Remove the specified Driver from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $driver = $this->driverRepository->find($id);

        if (empty($driver)) {
            Flash::error('Driver not found');

            return redirect(route('drivers.index'));
        }

        $this->driverRepository->delete($id);

        Flash::success('Driver deleted successfully.');

        return redirect(route('drivers.index'));
    }
}
