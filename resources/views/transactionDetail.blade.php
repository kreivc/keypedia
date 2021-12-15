@extends('layouts.app')


@section('content')

    <p>Your Transaction at {{ $history->transactionDate }}</p>
    @php
        $temp = 0;
    @endphp
    @foreach ( $transactions as $trans )
        <img src="/storage/assets/{{ $trans->keyboard->image }}" alt="{{ $trans->keyboard->name }}">
        <p>name: {{ $trans->keyboard->name}}</p>
        <p>Sub Total: $ {{ $trans->quantity * $trans->keyboard->price }}</p>
        <p>Quantity: {{ $trans->quantity }}</p>
        <p  class="d-none">{{ $temp+= $trans->quantity * $trans->keyboard->price }}</p>
    @endforeach
   <p>Total Price: $ {{ $temp }}</p>
@endsection