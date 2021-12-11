@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="text-center">
            <p class="h1 font-weight-bold">Welcome to Keypedia</p>
            <p class="h5 font-weight-bold">Best Keyboard and Keycaps Shop</p>
            <p class="h2 font-weight-bold mt-4">Categories</p>

        </div>

        <div class="d-flex justify-content-center align-items-center flex-wrap">
            @foreach ($categories as $ctg)
                <div class="p-1 bg-outside m-3">
                    <div class="card bg-inside" style="width: 20rem;">
                        <div class="card-body text-center">
                            <a class="card-text h5" href="#">{{ $ctg->name }}</a>
                        </div>
                        <img src="/storage/assets/{{ $ctg->image }}" class="d-block w-100" alt="{{ $ctg->name }}">
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
