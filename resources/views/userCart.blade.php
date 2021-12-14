@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-outside">My Cart</div>

                    <div class="card-body bg-inside">
                        @if ($carts != null)
                            @foreach ($carts as $cart)
                                <div class="d-flex align-self-start">
                                    {{-- <div style="width: 20rem;" class="mr-4">
                                        <img src="/storage/assets/{{ $cart->keyboard->image }}" class="d-block w-100"
                                            alt="{{ $cart->keyboard->name }}">
                                    </div> --}}
                                    {{-- <div class="col-md-7">
                                        <div class="form-group row h3">
                                            <h2 class="col-form-label font-weight-bold">{{ $cart->keyboard->name }}</h2>
                                        </div>

                                        <div class="form-group row">
                                            <p class="col-form-label">$ {{ $cart->keyboard->price * $cart->quantity }}</p>
                                        </div>


                                        <div class="form-group row justify-content-center">
                                            <form method="POST" action="" enctype="multipart/form-data">
                                                @csrf
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <label for="quantity"
                                                        class="col-form-label text-md-left">Quantity</label>

                                                    <div class="col-md-10">
                                                        <input id="quantity" type="number" class="form-control"
                                                            value="{{ $cart->quantity }}" name="quantity" required
                                                            autocomplete="quantity" min="1">
                                                    </div>

                                                    @error('quantity')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="d-flex justify-content-center mt-4">
                                                    <button type="submit" class="btn bg-button text-white">
                                                        Update
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div> --}}
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
