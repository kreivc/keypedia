@extends('layouts.app')
@section('content')

    @php
    $keyboard = ['87 Key Keyboard', '61 Key Keyboard', 'XDA Profile', 'Cherry Profile'];
    @endphp

    <div class="container">
        <div class="text-center">
            <p class="h1 font-weight-bold">Welcome to Keypedia</p>
            <p class="h5 font-weight-bold">Best Keyboard and Keycaps Shop</p>
            <p class="h2 font-weight-bold mt-4">Categories</p>

        </div>

        <div class="d-flex justify-content-center align-items-center flex-wrap">
            @foreach ($keyboard as $key)
                <div class="p-1 bg-outside m-3">
                    <div class="card bg-inside" style="width: 18rem;">
                        <div class="card-body text-center">
                            <a class="card-text h5" href="#">{{ $key }}</a>
                        </div>
                        <img src="/storage/assets/{{ $loop->index + 1 }}.jpg" class="d-block w-100"
                            alt="{{ $loop->index + 1 }}">
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
