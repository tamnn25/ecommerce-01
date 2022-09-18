@php
$cartNumber = 0;
if (Session::has('carts')) {
    foreach (Session::get('carts') as $key => $value) {
        $cartNumber += 1;
    }
}
@endphp
<ul>
    <li>
        <a href="{{ route('cart.cart-info') }}"><i class="fas fa-cart-plus"> Giỏ hàng: &nbsp; &nbsp;&nbsp;&nbsp; <span class="number">{{ $cartNumber }}</span></i></a>
    </li>
</ul>
  