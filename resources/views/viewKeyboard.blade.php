@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="text-center my-4 bg-success">
            <p class="h1 font-weight-bold">{{ $category->name }}</p>
        </div>

        <div class="col-md-5">
            <form action="{{ route('search') }}" method="GET">
                @csrf
                <div class="d-flex">
                    <input class="mx-1" type="text" name="search" required placeholder="Search..">
                    <select class="custom-select mx-1" class="form-control" name="filter" id="filter">
                        <option selected value="name">Name</option>
                        <option value="price">Price</option>
                    </select>
                    <input class="d-none" value="{{ $category->id }}" name="ctgId">
                    <button class="mx-1" type="submit">Search</button>
                </div>
            </form>
        </div>

        <div class="d-flex justify-content-center align-items-center flex-wrap">
            @foreach ($keyboards as $key)
                <div class="p-1 bg-outside m-3">
                    <div class="card bg-inside" style="width: 20rem;">
                        <img src="/storage/assets/{{ $key->image }}" class="d-block w-100" alt="{{ $key->name }}">
                        <div class="card-body text-center">
                            <a class="card-text h5" href="#">{{ $key->name }}</a>
                            <p class="card-text h5 text-white">US$ {{ $key->price }}</p>
                            @if (Auth::user())
                                @if (Auth::user()->role == 'manager')
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <a class="bg-button mx-1 p-1 px-1 border border-white rounded-sm bitOfPaddingX"
                                            href="#">Delete
                                            Keyboard</a>
                                        <a class="bg-button mx-1 p-1 px-1 border border-white rounded-sm bitOfPaddingX"
                                            href="#">Update
                                            Categories</a>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- <div class="m-3 d-flex justify-content-end">
            {{ $keyboards->withQueryString()->links() }}
        </div> --}}
        <div aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
                {{ $keyboards->links() }}
            </ul>
        </div>
    </div>

@endsection
