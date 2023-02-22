<?php 

namespace App\Http\Repositories;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Repositories\BaseRepository;

class ProdukRepository extends BaseRepository
{
    protected $produk;
    protected $kategori;

    public function __construct(Produk $produk, Kategori $kategori)
    {
        parent::__construct($produk, $kategori);
        $this->produk = $produk;
        $this->kategori = $kategori;
    }

    public function indexProduk()
    {
        $result = $this->produk->paginate(10);
        return $result;
    }

    public function createProduk()
    {
        $result = $this->kategori->all();
        return $result;
    }

    public function storeProduk($request)
    {
        return DB::transaction(function () use ($request) {
            if($request->file('file')) {
                $file = $request->file('file')->store('Produk-file');
            }
            $save = [
                'name' => $request->name,
                'id_kategori' => $request->id_kategori,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'file' => $file,
            ];
            $result = $this->store($save);
            return $result;

        });
    }

    public function editProduk()
    {
        $result = $this->kategori->all();
        return $result;
    }

    public function updateProduk($request, $id)
    {
        return DB::transaction(function () use ($request, $id) {
            if($request['file']) {
                if($request['oldFile']) {
                    Storage::delete($request['oldFile']);
                }
                $file = $request['file']->store('Produk-file');
            }
            $save = [
                'name' => $request['name'],
                'id_kategori' => $request['id_kategori'],
                'harga' => $request['harga'],
                'deskripsi' => $request['deskripsi'],
                'file' => $file,
            ];
            $result = $this->update($save, $id);
            $dataResult = $this->produk->find($id);
            return $dataResult;
        });
    }

}
