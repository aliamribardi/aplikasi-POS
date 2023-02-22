<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Http\Repositories\ProdukRepository;

class ProdukController extends Controller
{
    protected $repository;

    public function __construct(ProdukRepository $repository)
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
        $data = $this->repository->indexProduk();

        return view('dashboard.produk.index', [
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
        $data = $this->repository->createProduk();
        return view('dashboard.produk.create', [
            'datas' => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProdukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProdukRequest $request)
    {
        $data = $this->repository->storeProduk($request);

        session()->flash('success', 'Produk berhasil ditambahkan');

        return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $id)
    {
        $kategori = $this->repository->editProduk();
        return view('dashboard.produk.edit', [
            'kategoris' => $kategori,
            'data' => $id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProdukRequest  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProdukRequest $request, $id)
    {
        $data = $this->repository->updateProduk($request->all(), $id);

        session()->flash('success', 'Produk berhasil diupdate');

        return redirect()->route('produk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $id)
    {
        if($id->file) {
            Storage::delete($id->file);
        }
        Produk::destroy($id->id);

        session()->flash('success', 'Produk berhasil dihapus');

        return redirect()->route('produk.index');
    }
}
