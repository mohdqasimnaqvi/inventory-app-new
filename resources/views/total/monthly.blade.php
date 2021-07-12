@extends('layouts.app')
@section('content')
    <x-total :products="$products->filter(fn($item) => !$item->is_daily)"></x-total>
@endsection
