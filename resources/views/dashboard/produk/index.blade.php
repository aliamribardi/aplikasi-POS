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
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Produk</h3>
              <a href="{{ Route('produk.create') }}" class="btn btn-outline-primary float-sm-right">Tambah Produk</a>
            </div>  
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover text-center">
                <thead>
                <tr>
                  <th>No</th>
                  <th>File</th>
                  <th>Name Produk</th>
                  <th>Deskripsi</th>
                  <th>Harga</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>image</td>
                  <td>name</td>
                  <td>Deskripsi</td>
                  <td>Rp. 4000</td>
                  <td style="width: 200px">
                    <a href="" class="btn btn-outline-warning"><i class="las la-edit"></i></a> 
                    <a href="" class="btn btn-outline-danger"><i class="las la-trash-alt"></i></a>
                  </td>
                </tr>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>File</th>
                  <th>Name Produk</th>
                  <th>Deskripsi</th>
                  <th>Harga</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
    
@endsection