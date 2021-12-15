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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-headerform bg-outside">Add Keyboard</div>

                    <div class="card-body bg-bodyform bg-inside">
                        <form method="POST" action="{{ route('addKeyboard') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>
                                <div class="input-group col-md-6">
                                    <select class="custom-select" class="form-control" name="category" id="category">
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
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                        autocomplete="price" min="1">
                                </div>

                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                                <div class="col-md-6">
                                    <textarea id="description" type="text" class="form-control" name="description"
                                        required autocomplete="description"></textarea>
                                </div>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row d-flex align-items-center">
                                <label for="image" class="col-md-4 col-form-label text-md-right">Keyboard Image</label>

                                <div class="col-md-6">
                                    <input id="image" type="file" name="image" required>
                                </div>

                                @error('image')
                                    <span class="form-control" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn bg-btnform bg-button text-white">
                                        Add
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
