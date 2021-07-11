@php
    function price($price) {
        return strval($price);
    }
@endphp
@extends('layouts.app')
@section('content')
    <x-table>
        <x-slot name="head">
            <th>Title</th>
            <th>Image</th>
            <th>Price</th>
            <th>Price Unit</th>
            <th>Quantity</th>
            <th>Quantity Unit</th>
        </x-slot>
        @foreach ($products as $product)
            @if ($product->is_daily)
            <tr>
                <td>{{ $product->title }}</td>
                <td><img class="img-fluid" style="width: 200px;"src="{{ $product->image }}" /></td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->price_unit }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->quantity_unit }}</td>
                <td><i class="fas fa-tick"></i></td>
            </tr>
            @endif
        @endforeach
    </x-table>
@endsection











{{--
   title          ->  string
   image          ->  string
   price          -> decimal
   price_unit     ->  string
   quantity       -> decimal
   quantity_unit  ->  string
   is_daily       -> boolean -> default:false
   is_hidden      -> boolean -> default:false
   has_reminder   -> boolean -> default:false
--}}
