@props(['isDaily', 'product'])
<tr>
    <td>{{ $product->title }}</td>
    <td>{{ $product->price }}</td>
    <td>{{ $product->price_unit }}</td>
    <td>{{ $product->quantity }}</td>
    <td>{{ $product->quantity_unit }}</td>
    <td class="p-0"><img style="height:50px;width: 100px;object-fit: cover" src="img/{{$product->img}}" />
    </td>
    <td style="margin-left: auto" class="bg-success text-white"
        onclick="() => location = '/product/{{ $product->id }}'">
        <a href="/product/{{ $product->id }}"
            class="d-flex w-100 h-100 justify-content-center align-items-center">
            <i class="fas fa-eye text-white"></i>
        </a>
    </td>
    <td style="margin-left: auto" class="bg-primary text-white"
        onclick="() => location = '/product/{{ $product->id }}/edit'">
        <a href="/product/{{ $product->id }}/edit"
            class="d-flex w-100 h-100 justify-content-center align-items-center">
            <i class="fas fa-pencil-alt text-white"></i>
        </a>
    </td>
    <td style="margin-left: auto" class="bg-danger p-0 m-0">
        <form action="/product/{{ $product->id }}" method="post" class="p-0 m-0">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="d-flex justify-content-center align-items-center hover bg-danger p-3 m-0"
                style="all: unset;cursor: pointer">
                <i class="text-white fas fa-trash m-0 d-block"></i>
            </button>
            <input type="hidden" class="p-0 m-0" name="isDaily"
                value="{{ $isDaily ? 'daily' : 'monthly' }}">
        </form>
    </td>
</tr>
