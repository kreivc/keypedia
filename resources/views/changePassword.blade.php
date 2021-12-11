@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header bg-outside">Update Category</div>

                    <div class="card-body bg-inside">
                        <form method="POST" action="{{ route('storeNewPassword') }}" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <div class="form-group row">
                                    <label for="current_password" class="col-md-4 col-form-label text-md-right">Current
                                        Password</label>
                                    <div class="col-md-6">
                                        <input id="current_password" type="password"
                                            class="form-control @error('current_password') is-invalid @enderror"
                                            name="current_password" required>

                                        @error('current_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="new_password" class="col-md-4 col-form-label text-md-right">New
                                        Password</label>
                                    <div class="col-md-6">
                                        <input id="new_password" type="password"
                                            class="form-control @error('new_password') is-invalid @enderror"
                                            name="new_password" required>

                                        @error('new_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="new_confirm_password" class="col-md-4 col-form-label text-md-right">New
                                        Confirm
                                        Password</label>
                                    <div class="col-md-6">
                                        <input id="new_confirm_password" type="password"
                                            class="form-control @error('new_confirm_password') is-invalid @enderror"
                                            name="new_confirm_password" required>

                                        @error('new_confirm_password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn bg-button text-white">
                                            Update Password
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
