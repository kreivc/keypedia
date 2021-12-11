@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-outside">Update Category</div>

                    <div class="card-body bg-inside">
                        <form method="POST" action="/category/update/{{ $category->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="d-flex align-self-start">
                                <div style="width: 20rem;" class="mr-3">
                                    <img src="/storage/assets/{{ $category->image }}" class="d-block w-100"
                                        alt="{{ $category->name }}">
                                </div>
                                <div>
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Category
                                            Name</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') ?? $category->name }}" required autocomplete="name"
                                                autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="image" class="col-md-4 col-form-label text-md-right">Category
                                            Image</label>

                                        <div class="col-md-6 d-flex align-items-center">
                                            <input id="image" type="file" @error('image') is-invalid @enderror name="image">

                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn bg-button text-white">
                                                Update
                                            </button>
                                        </div>
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
