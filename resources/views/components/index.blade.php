<!-- Life is available only in the present moment. - Thich Nhat Hanh -->
{{-- @props(['isDaily' => true]) --}}
<x-table>
    <x-slot name="head">
        <th>Title</th>
        <th>Price</th>
        <th>Price Unit</th>
        <th>Quantity</th>
        <th>Quantity Unit</th>
        <th>Image</th>
    </x-slot>
    @foreach ($products as $product)
        <tr>
            <td>{{ $product->title }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->price_unit }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->quantity_unit }}</td>
            <td class="p-0"><img height="50px" src="{{ $product->image }}" /></td>
            <td style="margin-left: auto" class="bg-primary text-white" onclick="() => location = '/product/{{ $product->id }}/edit'">
                <a
                href="/product/{{ $product->id }}/edit"
                class="d-flex w-100 h-100 justify-content-center align-items-center">
                <i class="fas fa-pencil-alt text-white"></i>
            </a>
        </td>
            <td style="margin-left: auto" class="bg-danger p-0 m-0">
                <form action="/product/{{ $product->id }}" method="post" class="p-0 m-0">
                @csrf
                @method('DELETE')
                <button
                type="submit"
                class="d-flex justify-content-center align-items-center hover bg-danger p-3 m-0"
                style="all: unset;cursor: pointer">
                <i class="text-white fas fa-trash m-0 d-block"></i>
                </button>
                <input type="hidden" class="p-0 m-0"name="is_daily" value="{{ $is_daily ? 'daily' : 'monthly' }}">
                </form>
            </td>
        </tr>
    @endforeach
</x-table>
<div class="container-md px-4">
    <a href="/product/create-{{ $is_daily ? 'daily' : 'monthly'}}"  class="btn btn-success ml-0">Add Product</a>
    <a href="/total/{{ $is_daily ? 'daily' : 'monthly'}}" class="btn btn-primary ml-0">Get Total</a>
</div>
