<?php 

namespace App\Http\Repositories;

use App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use App\Http\Repositories\BaseRepository;

class SupplierRepository extends BaseRepository
{
    protected $supplier;

    public function __construct(Supplier $supplier)
    {
        parent::__construct($supplier);
        $this->supplier = $supplier;
    }

    public function indexSupplier()
    {
        $result = $this->supplier->paginate(10);
        return $result;
    }

    public function storeSupplier($request)
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

    public function updateSupplier($request, $id)
    {
        return DB::transaction(function() use ($request, $id) {
            $save = [
                'name' => $request['name'],
                'alamat' => $request['alamat'],
                'telepon' => $request['telepon'],
            ];
            $result = $this->update($save, $id);
            $dataResult = $this->supplier->find($id);
            return $dataResult;
        });
    }

}
