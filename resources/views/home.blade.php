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
                            <a class="card-text h5" href="/viewKeyboard/{{ $ctg->id }}">{{ $ctg->name }}</a>
                        </div>
                        <img src="/storage/assets/{{ $ctg->image }}" class="d-block w-100" alt="{{ $ctg->name }}">
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
