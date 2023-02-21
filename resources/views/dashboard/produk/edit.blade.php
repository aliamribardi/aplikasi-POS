@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Produk</a></li>
              <li class="breadcrumb-item active">Edit Produk</li>
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
                Edit Produk
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
                    <form action="{{ Route('produk.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" value="{{ old('name', $data->name) }}" placeholder="Nama Produk">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="oldFile" value="{{ $data->file }}" class="form-control" name="file">
                            <input type="file" class="form-control" name="file">
                        </div>
                        <div class="form-group">
                            <select name="id_kategori" class="form-control">
                                <option value=""> -- Pilih Kategori -- </option>
                                @foreach ($kategoris as $kategori)
                                    @if ($data->kategori->id == $kategori->id)
                                    <option value="{{ $kategori->id }}" selected>{{ $kategori->name }}</option>
                                    @else
                                    <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="harga" value="{{ old('harga', $data->harga) }}" placeholder="Harga Produk">
                        </div>
                        <div class="form-group">
                            <textarea name="deskripsi" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $data->deskripsi }}"</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary float-sm-right">Simpan</button>
                        </div>
                    </form>
                </div>
              {{-- <p class="text-sm mb-0">
                Editor <a href="https://github.com/bootstrap-wysiwyg/bootstrap3-wysiwyg">Documentation and license
                information.</a>
              </p> --}}
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