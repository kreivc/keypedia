@extends('layouts.app')

@section('content')
@foreach ( $histories as $history )
    <p>Transaction at {{ $history->transactionDate }}</p>
@endforeach


@endsection