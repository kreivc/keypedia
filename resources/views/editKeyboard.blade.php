@extends('layouts.app')

@if (Session::has('success'))
    <div class="alert alert-success m-0">
        <span>{{ Session::get('success') }}</span>
    </div>

@endif

@if (!$errors->isEmpty())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
@endif
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-outside">Update Keyboard</div>

                    <div class="card-body bg-inside">
                        <form method="POST" action="/keyboard/update/{{ $keyboard->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="d-flex align-self-start">
                                <div style="width: 20rem;" class="mr-3">
                                    <img src="/storage/assets/{{ $keyboard->image }}" class="d-block w-100"
                                        alt="{{ $keyboard->name }}">
                                </div>
                                <div>

                                    <div class="form-group row">
                                        <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>
                                        <div class="input-group col-md-6">
                                            <select class="custom-select" class="form-control" name="category"
                                                id="category">
                                                <option value="null" selected>Choose...</option>
                                                @foreach ($categories as $ctg)
                                                    <option value="{{ $ctg->id }}">{{ $ctg->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Keyboard
                                            Name</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') ?? $keyboard->name }}" required autocomplete="name"
                                                autofocus>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="price" class="col-md-4 col-form-label text-md-right">Keyboard Price
                                            ($)</label>

                                        <div class="col-md-6">
                                            <input id="price" type="number" class="form-control" name="price" required
                                                autocomplete="price" min="1"
                                                value="{{ old('price') ?? $keyboard->price }}">
                                        </div>

                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group row">
                                        <label for="description"
                                            class="col-md-4 col-form-label text-md-right">Description</label>

                                        <div class="col-md-6">
                                            <textarea id="description" rows="6" type="text" class="form-control"
                                                name="description" required
                                                autocomplete="description">{{ old('description') ?? $keyboard->description }}</textarea>
                                        </div>

                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="form-group row">
                                        <label for="image" class="col-md-4 col-form-label text-md-right">Keyboard
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
