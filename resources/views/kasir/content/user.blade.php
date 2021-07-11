@extends('kasir.template')

@section('title', 'Tambah Data')

@section('content')

@include('sweetalert::alert')

<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Mendaftarkan Akun User</h1>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- Horizontal Form -->
            <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Daftarkan User</h3>
                </div>
                <!-- /.card-header -->
                
                <div class="card-body register-card-body">
              
                    <form action="{{ route('admin.addNewUser') }}" method="post">
                        @csrf
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Full name">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-user"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control rounded-0" name="password" id="passwordOutput" placeholder="password"/>
                        <span class="input-group-append">
                            <button type="button" class="btn btn-info btn-flat" onclick="onClick()">Generate Password</button>
                        </span>
                      </div>
                        <!-- /.col -->
                        <div class="col-4">
                          <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                      </div>
                    </form>

            </div>
              <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
    <script src="{{asset('js/random.js')}}"></script>
@endpush