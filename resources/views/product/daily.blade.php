@php
    function price($price) {
        return strval($price);
    }
@endphp
@extends('layouts.app')
@section('content')
    <x-index :links="$products->links()" :products="$products" :isDaily="true"/>
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
