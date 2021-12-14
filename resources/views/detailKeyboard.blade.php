@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-outside">Detail Keyboard</div>

                    <div class="card-body bg-inside">
                        <div class="d-flex align-self-start">
                            <div style="width: 20rem;" class="mr-4">
                                <img src="/storage/assets/{{ $keyboard->image }}" class="d-block w-100"
                                    alt="{{ $keyboard->name }}">
                            </div>
                            <div class="col-md-7">
                                <div class="form-group row h3">
                                    <h2 class="col-form-label font-weight-bold">{{ $keyboard->name }}</h2>
                                </div>

                                <div class="form-group row">
                                    <p class="col-form-label">$ {{ $keyboard->price }}</p>
                                </div>

                                <div class="form-group row">
                                    <p class="col-form-label">{{ $keyboard->description }}</p>
                                </div>
                                @if (Auth::user()->role != 'manager')
                                    <div class="form-group row justify-content-center">
                                        <form method="POST" action="/addToCart/{{ $keyboard->id }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="d-flex align-items-center justify-content-center">
                                                <label for="quantity" class="col-form-label text-md-left">Quantity</label>

                                                <div class="col-md-10">
                                                    <input id="quantity" type="number" class="form-control"
                                                        name="quantity" required autocomplete="quantity" min="1">
                                                </div>

                                                @error('quantity')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="d-flex justify-content-center mt-4">
                                                <button type="submit" class="btn bg-button text-white">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
