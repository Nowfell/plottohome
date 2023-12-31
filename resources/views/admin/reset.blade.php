@extends('layout.admin.app')

@section('content')

    <div class="content-wrapper">
      <div class="page-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex flex-wrap justify-content-between ">
                    <h3 class="page-title">User Management</h3>
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        {{-- <li class="breadcrumb-item"><a href="{{ route('admin.properties.index') }}">Properties</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page"> User Management </li>
                      </ol>
                    </nav>
                </div>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card text-center">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Reset Password</h5>
                    <form method="post" action="{{ route('admin.reset.user') }}">
                        @csrf
                        <p class="card-text">
                            <div class="form-group">
                                <label for="password" style="float: left;">New Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter new password">
                                
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="rePassword" style="float: left;">Re-type Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="rePassword" name="password_confirmation" placeholder="Re type new password">
                            </div>
                        </p>
                        <button type="submit" class="btn btn-primary">Reset</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
@endsection

@push('footer-script')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        @if(Session::has('success'))
            toastr.success("{{ Session::get('success')}}");
        @endif
    </script>
@endpush
