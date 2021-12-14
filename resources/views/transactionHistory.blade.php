@extends('layouts.app')

@section('content')
@foreach ( $histories as $history )
    <a href="/transactionDetail/{{ $history->id }}" class="text-white">Transaction at {{ $history->transactionDate }}</a>
@endforeach


@endsection