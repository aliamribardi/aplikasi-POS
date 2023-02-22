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
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Cart</h3>
              <!-- <a href="" class="btn btn-outline-primary float-sm-right">Tambah</a> -->
            </div>  
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover text-center">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Quantity </th>
                  <th>Harga</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <div class="h-10 w-28">
                                <div class="relative flex flex-row w-full h-8">
                                
                                <form action="{{ route('cart.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id}}" >
                                <input type="number" name="quantity" value="{{ $item->quantity }}" 
                                class="w-16 text-center h-6 text-gray-800 outline-none rounded border border-blue-600" />
                                <button class="btn btn-warning badge py-1.5 text-sm rounded rounded shadow text-violet-100 bg-violet-500">Update</button>
                                </form>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-sm font-medium lg:text-base">
                                Rp.{{ $item->price }}
                            </span>
                        </td>
                        <td style="width: 200px">
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $item->id }}" name="id">
                                <button class="btn btn-danger badge text-white bg-red-600 shadow rounded-full">x</button>
                            </form>
                        </td>
                    </tr>  
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Quantity</th>
                  <th>Harga</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
              <div class="my-2">
                <input type="text" class="form-control" style="pointer-events: none; width:200px;" placeholder="Total: Rp.{{ Cart::getTotal() }}">
              </div>
              <div>
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger badge px-6 py-2 text-sm  rounded shadow text-red-100 bg-red-500">Clear Carts</button>
                </form>
              </div>
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