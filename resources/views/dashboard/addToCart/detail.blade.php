@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
        @if (session()->has('success'))
        <div class="alert alert-info alert-block col-12">
            <button type="button" class="close" data-dismiss="alert"><strong>x</strong></button>	
            <strong>{{ session('success') }}</strong>
        </div>
        @endif
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">

            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card">
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-5 text-center">
                      <img src="{{ asset('storage/' . $datas->file) }}" width="350px" class="p-2" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="">
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
                      <h2 class="lead"><b> {{ $datas->name }} </b></h2>
                      <h4><b><strong>Rp.{{ $datas->harga }}</strong></b></h4>
                      <p class="text-muted text-sm"><b>Detail: </b></p>
                      <hr>
                      <ul class="ml-0 mb-0 fa-ul text-muted">
                        <li class="small">Kondisi: Baru</li>
                        <li class="small">Berat Satuan: 750g</li>
                        <li class="small">Kategori: {{ $datas->kategori->name }}</li>
                        <li class="small">Etalase: Lorem ipsu</li>
                        <li class="small">Katalog: Lorem ipsu</li>
                        <li class="small">{{ $datas->deskripsi }}</li>
                        
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card">
                <div class="card-header text-muted border-bottom-0">
                  Joger Jelek
                </div>
                <hr width="375px">
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
                      <ul class="mb-3 ml-4 mb-0 fa-ul text-muted">
                        <li class="small">Makassar, Indonesia</li>
                        <li class="small">Verified Seller</li>
                        <li class="small">Worldwide shipping</li>
                      </ul>
                    </div>
                    <div class="col">
                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $datas->id }}" name="id">
                            <input type="hidden" value="{{ $datas->name }}" name="name">
                            <input type="hidden" value="{{ $datas->harga }}" name="price">
                            <input type="hidden" value="{{ $datas->file }}"  name="image">
                            <input type="hidden" value="1" name="quantity">
                            <button class="btn btn-sm btn-primary col-md-12 mb-3"><i class="fas fa-plus"></i> Tambahkan ke Keranjang</button>
                        </form>
                        <a href="#" class="btn btn-sm btn-outline-primary col-md-12">
                          <i class="fas fa-plus"></i>  Beli Langsung
                        </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <!-- /.card-body -->
        
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
    
  </div>
    
@endsection