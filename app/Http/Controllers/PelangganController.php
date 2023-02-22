<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use App\Http\Repositories\PelangganRepository;

class PelangganController extends Controller
{
    protected $repository;

    public function __construct(PelangganRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->repository->indexPelanggan();
        return view('dashboard.pelanggan.index', [
            'datas' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePelangganRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePelangganRequest $request)
    {
        $data = $this->repository->storePelanggan($request);

        session()->flash('success', 'Pelanggan berhasil ditambahkan');

        return redirect()->route('pelanggan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $id)
    {
        return view('dashboard.pelanggan.edit', [
            'datas' => $id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePelangganRequest  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePelangganRequest $request, $id)
    {
        $data = $this->repository->updatePelanggan($request->all(), $id);

        session()->flash('success', 'Pelanggan berhasil diupdate');

        return redirect()->route('pelanggan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $id)
    {
        Pelanggan::destroy($id->id);

        session()->flash('success', 'Pelanggan berhasil dihapus');

        return redirect()->route('pelanggan.index');
    }
}
