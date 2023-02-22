<?php 

namespace App\Http\Repositories;

use App\Models\Pelanggan;
use Illuminate\Support\Facades\DB;
use App\Http\Repositories\BaseRepository;

class PelangganRepository extends BaseRepository
{
    protected $pelanggan;

    public function __construct(Pelanggan $pelanggan)
    {
        parent::__construct($pelanggan);
        $this->pelanggan = $pelanggan;
    }

    public function indexPelanggan()
    {
        $result = $this->pelanggan->paginate(10);
        return $result;
    }

    public function storePelanggan($request)
    {
        return DB::transaction(function () use ($request) {
            $save = [
                'name' => $request->name,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
            ];
            $result = $this->store($save);
            return $result;
        });
    }

    public function updatePelanggan($request, $id)
    {
        return DB::transaction(function() use ($request, $id) {
            $save = [
                'name' => $request['name'],
                'alamat' => $request['alamat'],
                'telepon' => $request['telepon'],
            ];
            $result = $this->update($save, $id);
            $dataResult = $this->pelanggan->find($id);
            return $dataResult;
        });
    }

}
