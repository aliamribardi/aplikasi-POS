@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Supplier</h1>
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
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Supplier</h3>
              <a href="{{ Route('supplier.create') }}" class="btn btn-outline-primary float-sm-right">Tambah</a>
            </div>  
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover text-center">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name </th>
                  <th>Telepon </th>
                  <th>Alamat </th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($datas as $data)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $data->name }}</td>
                  <td>{{ $data->alamat }}</td>
                  <td>{{ $data->telepon }}</td>
                  <td style="width: 200px">
                    <a href="{{ Route('supplier.edit', $data->id) }}" class="btn btn-outline-warning"><i class="las la-edit"></i></a> 
                    <form action="{{ Route('supplier.destroy', $data->id) }}" method="POST" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-outline-danger"><i class="las la-trash-alt"></i></button>
                    </form>
                  </td>
                </tr>  
                @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Telepon</th>
                  <th>Alamat</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
              <br>
              {{ $datas->links() }}
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