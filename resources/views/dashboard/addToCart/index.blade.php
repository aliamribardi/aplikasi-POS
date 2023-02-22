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

    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List Produk</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">

        @foreach($products as $produk)
          <div class="col-md-4">
            <div class="card">
              <div class="card-body text-center">
                <img src="{{ asset('storage/' . $produk->file) }}" width="300px" alt="">
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <div class="row">
                  <div class="col-md-6 pl-5">
                    <a href="{{ Route('produk.show', $produk->id) }}">
                      <h5><strong>Rp.{{ $produk->harga }}</strong></h5>
                      <p>{{ $produk->name }}</p>
                    </a>
                  </div>
                  <div class="col-md-6 text-right pr-5">
                    <button class="btn btn-outline-primary badge"><span><i class="lar la-heart"></i></span></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach

        </div>
        
      </div><!-- /.container-fluid -->
      {{ $products->links() }}
    </section>
    <!-- /.content -->
  </div>
    
@endsection