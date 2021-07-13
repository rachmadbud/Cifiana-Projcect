@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @else
                        
                    @endif
                    <form action="{{route('passwordPatch')}}" method="post">
                        @csrf
                        @method('PATCH')

                        <div class="form-grup">
                            <label for="old_password">Old Password</label>
                            <input type="password" name="old_password" id="old_password" class="form-control @error('old_password') is-invalid @enderror ">
                            @error('old_password')
                                <div class="text-danger mt-2">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-gru">
                            <label for="password">New Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <div class="text-danger mt-2">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-grup">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary my-2"> 
                            change password
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
