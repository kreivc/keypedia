@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="text-center my-4">
            <p class="h1 font-weight-bold">Manage Categories</p>
        </div>

        <div class="d-flex justify-content-center align-items-center flex-wrap">
            @foreach ($categories as $ctg)
                <div class="p-1 bg-outside m-3">
                    <div class="card bg-inside" style="width: 20rem;">
                        <img src="/storage/assets/{{ $ctg->image }}" class="d-block w-100" alt="{{ $ctg->name }}">
                        <div class="card-body text-center">
                            <p class="card-text h5" href="#">{{ $ctg->name }}</p>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <a class="bg-button mx-1 p-1 px-1 border border-white rounded-sm bitOfPaddingX"
                                    href="#">Delete Categories</a>
                                <a class="bg-button mx-1 p-1 px-1 border border-white rounded-sm bitOfPaddingX"
                                    href="#">Update Categories</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
