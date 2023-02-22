@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Produk</a></li>
              <li class="breadcrumb-item active">Tambah Produk</li>
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
                Tambah Produk
                {{-- <small>Simple and fast</small> --}}
              </h3>
              <!-- tools box -->
              <!-- {{-- <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fas fa-times"></i></button>
              </div> --}} -->
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
                <div class="mb-3">
                    <form action="{{ Route('produk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Nama Produk">
                        </div>
                        <div class="form-group">
                            <select name="id_kategori" class="form-control">
                                <option value=""> -- Pilih Kategori -- </option>
                                @foreach ($datas as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="harga" placeholder="Harga Produk">
                        </div>
                        <div class="form-group">
                            <textarea name="deskripsi" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>

                        <!-- Upload File -->
                        <div class="card">
                            <div class="card-header">Select File</div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <td width="50%" align="right"><b>Select File</b></td>
                                        <td width="50%">
                                            <input type="file" id="select_file" name="file" />
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <br />
                        <div class="progress" id="progress_bar" style="display:none;height:50px; line-height: 50px;">

                            <div class="progress-bar" id="progress_bar_process" role="progressbar" style="width:0%;">0%</div>

                        </div>

                        <div id="uploaded_image" class="row mt-5"></div>
                        <!-- End:Upload File -->

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

  <script>

    var file_element = document.getElementById('select_file');

    var progress_bar = document.getElementById('progress_bar');

    var progress_bar_process = document.getElementById('progress_bar_process');

    var uploaded_image = document.getElementById('uploaded_image');

    file_element.onchange = function(){

        if(!['image/jpeg', 'image/png'].includes(file_element.files[0].type))
        {
            uploaded_image.innerHTML = '<div class="alert alert-danger">Selected File must be .jpg or .png Only</div>';

            file_element.value = '';
        }
        else
        {
            var form_data = new FormData();

            form_data.append('sample_image', file_element.files[0]);

            form_data.append('_token', document.getElementsByName('_token')[0].value);

            progress_bar.style.display = 'block';

            var ajax_request = new XMLHttpRequest();

            ajax_request.open("POST", "{{ Route('upload_file.upload') }}");

            ajax_request.upload.addEventListener('progress', function(event){

                var percent_completed = Math.round((event.loaded / event.total) * 100);

                progress_bar_process.style.width = percent_completed + '%';

                progress_bar_process.innerHTML = percent_completed + '% completed';

            });

            ajax_request.addEventListener('load', function(event){

                var file_data = JSON.parse(event.target.response);

                uploaded_image.innerHTML = '<div class="alert alert-success">Files Uploaded Successfully</div><br><img src="'+file_data.image_path+'" name="file" class="img-fluid img-thumbnail" /><input type="hidden" class="form-control" name="file" value="'+file_data.name_path+'">';

                file_element.value = '';

            });

            ajax_request.send(form_data);


        }

    };

  </script>
    
@endsection