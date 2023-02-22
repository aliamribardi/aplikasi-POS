@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Supplier</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Supplier</a></li>
              <li class="breadcrumb-item active">Tambah Supplier</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Tambah Supplier
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
                <div class="mb-3">
                    <form action="{{ Route('supplier.update', $datas->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" value="{{ old('name', $datas->name) }}" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="alamat" value="{{ old('alamat', $datas->alamat) }}" placeholder="Alamat">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="telepon" value="{{ old('telepon', $datas->telepon) }}" placeholder="Telepon">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary float-sm-right">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
    
@endsection