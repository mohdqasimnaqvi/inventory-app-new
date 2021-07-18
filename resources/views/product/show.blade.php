@php
    $unit = $product->price_unit;
    $symbol;
    switch ($unit) {
        case 'dollar': {
            $symbol = '$';
            break;
        }
        case 'ruppee': {
            $symbol = '₹';
            break;
        }
        case 'euro': {
            $symbol = '€';
            break;
        }
        default: {
            $symbol = $product->price_unit;
            break;
        }
    }
@endphp
@extends('layouts.app')

@section('content')
    <div class="container-md">
        <h1 class="h1">A {{ $product->title }}</h1>
        <p class="h4"><b>
            Which we need
            {{ $product->quantity }}
            {{ $product->quantity_unit !== 'no_unit' ? $product->quantity_unit . 's' : 'units' }}
            worth. Which will cost us {{ $symbol }}{{ $product->price }}
        </b></p>
        <img src="{{ $product->image }}" alt="{{ $product->title }}" onerror="this.remove()">
    </div>
@endsection
