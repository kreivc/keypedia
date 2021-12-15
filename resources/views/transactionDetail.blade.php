@php
$temp = 0;
@endphp
@extends('layouts.app')
@section('content')

    <h2 class="text-center mb-5 h1">Your Transaction at {{ $history->transactionDate }}</h2>
    <div class="d-flex flex-column">
        <table class="table col-md-10 mx-auto">
            <thead>
                <tr class="borderTable">
                    <th class="borderTable py-3" scope="col">Keyboard Image</th>
                    <th class="borderTable py-3" scope="col">Keyboard Name</th>
                    <th class="borderTable py-3" scope="col">Subtotal</th>
                    <th class="borderTable py-3" scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $trans)
                    <tr>
                        <td class="borderTable"><img style="width: 180px; height: 180px;"
                                src="/storage/assets/{{ $trans->keyboard->image }}" alt="{{ $trans->keyboard->name }}">
                        </td>
                        <td class="borderTable">
                            <p>{{ $trans->keyboard->name }}</p>
                        </td>
                        <td class="borderTable">
                            <p>$ {{ $trans->quantity * $trans->keyboard->price }}</p>
                        </td>
                        <td class="borderTable">
                            <p>{{ $trans->quantity }}</p>
                        </td>
                        <p class="d-none">{{ $temp += $trans->quantity * $trans->keyboard->price }}</p>
                    </tr>
                @endforeach
                <caption class="text-right text-black-50 text-bold h3 font-weight-bold">Total price : $ {{ $temp }}
                </caption>
            </tbody>
        </table>
    </div>

@endsection
