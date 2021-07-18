<!-- Well begun is half done. - Aristotle -->
@php
    $unit = $_GET['unit'];
    function calculateTotal($products, $symbol, $dollars = 75, $euros = 88, $ruppees = 1, $divideDollar = false) {
        $total = 0;
        foreach($products as $product) {
            $price = ($product->price * $product->quantity);
            if ($product->price_unit === 'dollar') $total += $divideDollar ? $price / $dollars : $price * $dollars;
            else if ($product->price_unit === 'euro') $total += $price * $euros;
            else if ($product->price_unit === 'ruppee') $total += $price * $ruppees;
            $total = "{$symbol}{$total}";
        }
        return $total;
    }
    //'dollar' -> $price;
    //'euro' -> $price * 1.18063;
    //'ruppee' -> $price * 75;
       
    //'dollar' -> $price / 1.18063;
    //'euro' -> $price;
    //'ruppee' -> $price * 88;
    if ($unit === 'ruppees') $total = calculateTotal($products, '₹');
    if ($unit === 'euros') $total = calculateTotal($products, '€',1.18063, 1, 88, true);
    if ($unit === 'dollars') $total = calculateTotal($products, '$',1, 75, 1.18063);
@endphp
<div class="container-md px-4 py-4">
        <h1 class="h1">Your total is {{ $total }}</h1>
        <select name="unit" class="form-control" onchange="location = '{{$_SERVER['PHP_SELF']}}?unit=' + this.value">
            <option value="euros">euro (€)</option>
            <option value="ruppees">ruppees (₹)</option>
            <option value="dollars">dollar ($)</option>
        </select>
</div>
