@extends('layouts.app')
@if (Session::has('success'))
    <div class="alert alert-success">
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
                    <div class="card-header bg-outside">My Cart</div>
                    @if ($carts != null)
                    <div class="card-body bg-inside">
                            @foreach ($carts as $cart)
                                <div class="d-flex align-self-start mb-3">
                                    <div style="width: 20rem;" class="mr-4">
                                        <img src="/storage/assets/{{ $cart->keyboard->image }}" class="d-block w-100"
                                            alt="{{ $cart->keyboard->name }}">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group row h3">
                                            <h2 class="col-form-label font-weight-bold">{{ $cart->keyboard->name }}</h2>
                                        </div>

                                        <div class="form-group row">
                                            <p class="col-form-label">$ {{ $cart->keyboard->price * $cart->quantity }}</p>
                                        </div>

                                        <div class="form-group row justify-content-center">
                                            <form method="POST" action="/userCart/update/{{ $cart->id }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <label for="quantity"
                                                        class="col-form-label text-md-left">Quantity</label>

                                                    <div class="col-md-10">
                                                        <input id="quantity" type="number" class="form-control"
                                                            value="{{ $cart->quantity }}" name="quantity" required
                                                            autocomplete="quantity" min="0">
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
                                    </div>
                                </div>
                            @endforeach   
                        <div>
                            <div class="d-flex justify-content-center">
                                <a href="/userCart/checkout" class="btn bg-button text-white">
                                    Checkout
                                </a>
                            </div>
                        </div>
                        @else
                        <div>
                            <div class="d-flex justify-content-center">
                                <p  class="bg-button text-white p-3 rounded-lg">
                                    No Item in Your Cart.
                                </p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
