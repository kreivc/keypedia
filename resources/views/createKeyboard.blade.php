@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-headerform bg-outside">Add Keyboard</div>

                    <div class="card-body bg-bodyform bg-inside">
                        <form method="POST" action="{{ route('addKeyboard') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>
                                <div class="input-group col-md-6">
                                    <select class="custom-select" class="form-control" id="category">
                                        <option selected>Choose...</option>
                                        @foreach ($categories as $ctg)
                                            <option value="{{ $ctg->id }}">{{ $ctg->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="keyboard_name" class="col-md-4 col-form-label text-md-right">Keyboard
                                    Name</label>

                                <div class="col-md-6">
                                    <input id="keyboard_name" type="text"
                                        class="form-control @error('keyboard_name') is-invalid @enderror"
                                        name="keyboard_name" value="{{ old('keyboard_name') }}" required
                                        autocomplete="keyboard_name" autofocus>

                                    @error('keyboard_name')
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
                                        autocomplete="price" min="0">
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
                                    <input id="image" type="file" name="image" required autocomplete="image" min="0">
                                </div>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
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
