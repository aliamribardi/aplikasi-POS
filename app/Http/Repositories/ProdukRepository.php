<?php 

namespace App\Http\Repositories;

use App\Models\Produk;
use App\Http\Repositories\BaseRepository;

class ProdukRepository extends BaseRepository
{
    protected $produk;

    public function __construct(Produk $produk)
    {
        parent::__construct($produk);
        $this->produk = $produk;
    }

    public function indexProduk()
    {
        $result = $this->produk->all();
        return $result;
    }

}
