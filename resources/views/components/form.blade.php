<!-- Life is available only in the present moment. - Thich Nhat Hanh -->
<form class="container-fluid px-5 flow" action="/product" method="POST">
    @csrf
    <h1>{{$isDaily ? 'Create a daily product' : 'Create a monthly product'}}</h1>
    <div class="form-group">
        <x-input name="title" type="text" placeholder="Name..." :group="true" value="{{ old('title')}}"/>
    </div>
    <div class="form-group d-flex">
        <x-input name="price" type="number" value="{{ old('price') }}"/>
        <select name="price_unit" id="price_unit" class="form-control" style="width: 30%">
            <option value="unit" disabled selected="{{ old('price_unit') == null ? '' : 'false' }}">
                Unit
            </option>
            <option value="dollar" {{ old('price_unit') === 'dollar' ? 'selected' : '' }}>dollar</option>
            <option value="ruppee" {{ old('price_unit') === 'ruppee' ? 'selected' : '' }}>ruppee</option>
            <option value="euro"   {{ old('price_unit') === 'euro' ? 'selected' : '' }}>euro</option>
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
    <input type="hidden" name="is_daily" value="{{ $isDaily }}" />
    <input type="hidden" name="is_hidden" value="0" />
    <input type="hidden" name="image" value="no image" />
    <button class="btn btn-info" type="submit">Finish</button>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
 </form>
