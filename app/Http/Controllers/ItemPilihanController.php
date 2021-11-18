<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateItemPilihanRequest;
use App\Http\Requests\UpdateItemPilihanRequest;
use App\Repositories\ItemPilihanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ItemPilihanController extends AppBaseController
{
    /** @var  ItemPilihanRepository */
    private $itemPilihanRepository;

    public function __construct(ItemPilihanRepository $itemPilihanRepo)
    {
        $this->itemPilihanRepository = $itemPilihanRepo;
    }

    /**
     * Display a listing of the ItemPilihan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $itemPilihans = $this->itemPilihanRepository->all();

        return view('item_pilihans.index')
            ->with('itemPilihans', $itemPilihans);
    }

    /**
     * Show the form for creating a new ItemPilihan.
     *
     * @return Response
     */
    public function create()
    {
        return view('item_pilihans.create');
    }

    /**
     * Store a newly created ItemPilihan in storage.
     *
     * @param CreateItemPilihanRequest $request
     *
     * @return Response
     */
    public function store(CreateItemPilihanRequest $request)
    {
        $input = $request->all();

        $itemPilihan = $this->itemPilihanRepository->create($input);

        Flash::success('Item Pilihan saved successfully.');

        return redirect(route('itemPilihans.index'));
    }

    /**
     * Display the specified ItemPilihan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $itemPilihan = $this->itemPilihanRepository->find($id);

        if (empty($itemPilihan)) {
            Flash::error('Item Pilihan not found');

            return redirect(route('itemPilihans.index'));
        }

        return view('item_pilihans.show')->with('itemPilihan', $itemPilihan);
    }

    /**
     * Show the form for editing the specified ItemPilihan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $itemPilihan = $this->itemPilihanRepository->find($id);

        if (empty($itemPilihan)) {
            Flash::error('Item Pilihan not found');

            return redirect(route('itemPilihans.index'));
        }

        return view('item_pilihans.edit')->with('itemPilihan', $itemPilihan);
    }

    /**
     * Update the specified ItemPilihan in storage.
     *
     * @param int $id
     * @param UpdateItemPilihanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateItemPilihanRequest $request)
    {
        $itemPilihan = $this->itemPilihanRepository->find($id);

        if (empty($itemPilihan)) {
            Flash::error('Item Pilihan not found');

            return redirect(route('itemPilihans.index'));
        }

        $itemPilihan = $this->itemPilihanRepository->update($request->all(), $id);

        Flash::success('Item Pilihan updated successfully.');

        return redirect(route('itemPilihans.index'));
    }

    /**
     * Remove the specified ItemPilihan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $itemPilihan = $this->itemPilihanRepository->find($id);

        if (empty($itemPilihan)) {
            Flash::error('Item Pilihan not found');

            return redirect(route('itemPilihans.index'));
        }

        $this->itemPilihanRepository->delete($id);

        Flash::success('Item Pilihan deleted successfully.');

        return redirect(route('itemPilihans.index'));
    }
}
