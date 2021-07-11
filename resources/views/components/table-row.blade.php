@props(['product'])
<tr>
    <td>{{ $product->title }}</td>
    <td><img class="img-fluid" style="width: 150px;"src="{{ $product->image }}" /></td>
    <td>{{ $product->price }}</td>
    <td>{{ $product->price_unit }}</td>
    <td>{{ $product->quantity }}</td>
    <td>{{ $product->quantity_unit }}</td>
</tr>
<!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
