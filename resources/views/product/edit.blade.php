@extends('layouts.app')

@section('content')
<form
class="container-fluid px-5 flow"
action="/product/{{ $product->id }}"
method="post">
@csrf
@method('PUT')
<div class="form-group">
    <x-input name="title" type="text" placeholder="Name..." :group="true" value="{{
$product->title }}"/>
</div>
<div class="form-group d-flex">
    <x-input name="price" type="number"  value="{{ $product->price }}"/>
    <x-input name="image" type="hidden" value="No image"/>

    <select name="price_unit" id="price_unit" class="form-control" style="width: 30%">
        <x-form-dropdown-item :current_val="$product->price_unit" value="dollar"></x-form-dropdown-item>
        <x-form-dropdown-item :current_val="$product->price_unit" value="ruppee"></x-form-dropdown-item>
        <x-form-dropdown-item :current_val="$product->price_unit" value="euro"></x-form-dropdown-item>
    </select>
</div>
<div class="form-group d-flex" style="justify-content: stretch;" >
    <x-input value="{{ $product->quantity }}" name="quantity" type="number"/>
    <select name="quantity_unit" id="quantity_unit" class="form-control" style="width: 30%">
        <x-form-dropdown-item :current_val="$product->price_unit" value="kilogram"></x-form-dropdown-item>
        <x-form-dropdown-item :current_val="$product->price_unit" value="pound"></x-form-dropdown-item>
        <x-form-dropdown-item :current_val="$product->price_unit" value="gram"></x-form-dropdown-item>
        <x-form-dropdown-item :current_val="$product->price_unit" value="milligram"></x-form-dropdown-item>
        <x-form-dropdown-item :current_val="$product->price_unit" value="no_unit"></x-form-dropdown-item>
    </select>
</div>
<x-input type="hidden" name="is_daily" value="{{ $product->is_daily }}" />
<x-input type="hidden" name="is_hidden" value="{{ $product->is_hidden }}" />
<x-input type="hidden" name="has_reminder" value="{{ $product->has_reminder }}" />
<button class="btn btn-primary" type="submit">Submit</button>
<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
</form>
@endsection
