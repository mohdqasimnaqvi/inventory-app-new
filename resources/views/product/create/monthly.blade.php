
    @extends('layouts.app')

    @section('content')
    <form class="container-fluid px-5 flow" action="/product" method="POST">
        @csrf
        <div class="form-group">
            <x-input name="title" type="text" placeholder="Name..." :group="true" value="{{ old('name')}}"/>
        </div>
        <div class="form-group d-flex">
            <x-input name="price" type="number"/>
            <select name="price_unit" id="price_unit" class="form-control" style="width: 30%">
                <option value="dollar">dollar</option>
                <option value="ruppee">ruppee</option>
                <option value="euro">euro</option>
            </select>
        </div>
        <div class="form-group d-flex" style="justify-content: stretch;" >
            <x-input value="{{ old('quantity') }}" name="quantity" type="number"/>
            <select name="quantity_unit" id="quantity_unit" class="form-control" style="width: 30%">
                <option value="kilogram">kilogram</option>
                <option value="pound">pound</option>
                <option value="gram">gram</option>
                <option value="milligram">milligram</option>
                <option value="no_unit">no unit</option>
            </select>
        </div>
        <input type="hidden" name="is_daily" value="1" />
        <input type="hidden" name="is_hidden" value="0" />
        <input type="hidden" name="image" value="no image" />
        <button class="btn btn-info" type="submit">Submit</button>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
     </form>
     @endsection

