@extends('layouts.app')


@section('content')
@foreach ( $transactions as $trans )
    <p>{{ $trans->quantity}}</p>
@endforeach


@endsection