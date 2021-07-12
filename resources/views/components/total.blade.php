<!-- Well begun is half done. - Aristotle -->
@php
    $total = 0;
    foreach($products as $product) {
        if ($product->price_unit === 'dollar') $total += $product->price * 75;
        else if ($product->price_unit === 'euro') $total += $product->price * 88;
        else if ($product->price_unit === 'ruppee') $total += $product->price ;
    }
    $total = strval($total);
@endphp
<div class="container-md px-4 py-4">

        <h1>Your total is ₹{{ $total }}</h1>
</div>
