<!-- Life is available only in the present moment. - Thich Nhat Hanh -->
{{-- @props(['isDaily' => true]) --}}
<x-table>
    <x-slot name="head">
        <th>Title</th>
        <th>Price</th>
        <th>Price Unit</th>
        <th>Quantity</th>
        <th>Quantity Unit</th>
    </x-slot>
    @foreach ($products as $product)
        <tr>
            <td>{{ $product->title }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->price_unit }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->quantity_unit }}</td>
            <td style="margin-left: auto" class="bg-primary text-white">
                    <a href="/product/{{ $product->id }}/edit"><i class="fas fa-pencil-alt text-white"></i></a>
            </td>
            <td style="margin-left: auto" class="bg-danger">
                <form action="/product/{{ $product->id }}" method="post">
                   @csrf
                   @method('DELETE')
                   <button type="submit" style="all: unset;cursor: pointer;"><i class="text-white fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
</x-table>
