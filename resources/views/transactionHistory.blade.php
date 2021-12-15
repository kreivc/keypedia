@extends('layouts.app')

@section('content')
    <h2 class="display-4 text-center mb-5">Your Transaction History</h2>
    <div class="d-flex flex-column">
        @foreach ($histories as $history)
            <div class="justify-content-center mb-4 text-center">
                <a href="/transactionDetail/{{ $history->id }}" class="h5 bg-white rounded-xl p-1 px-5">Transaction at
                    {{ $history->transactionDate }}</a>
            </div>
        @endforeach
    </div>


@endsection
