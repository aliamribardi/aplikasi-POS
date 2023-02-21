<?php 

namespace App\Http\Repositories;

use App\Models\Kategori;
use Illuminate\Support\Facades\DB;
use App\Http\Repositories\BaseRepository;

class KategoriRepository extends BaseRepository
{
    protected $kategori;

    public function __construct(Kategori $kategori)
    {
        parent::__construct($kategori);
        $this->kategori = $kategori;
    }

    public function indexKategori()
    {
        $result = $this->kategori->all();
        return $result;
    }

    public function storeKategori($request)
    {
        return DB::transaction(function () use ($request) {
            $save = [
                'name' => $request->name,
            ];
            $result = $this->store($save);
            return $result;
        });
    }

    public function updateKategori($request, $id)
    {
        return DB::transaction(function() use ($request, $id) {
            $save = [
                'name' => $request['name'],
            ];
            $result = $this->update($save, $id);
            $dataResult = $this->kategori->find($id);
            return $dataResult;
        });
    }

}
