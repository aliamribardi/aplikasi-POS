@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Kategori</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Kategori</a></li>
              <li class="breadcrumb-item active">Edit Kategori</li>
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
                Edit Kategori
                {{-- <small>Simple and fast</small> --}}
              </h3>
              <!-- tools box -->
              {{-- <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fas fa-times"></i></button>
              </div> --}}
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
                <div class="mb-3">
                    <form action="{{ Route('kategori.update', $datas->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ old('name', $datas->name) }}" name="name" placeholder="Nama Kategori">
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