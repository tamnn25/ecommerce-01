
<div class="border p-2">
    <div class="mb-3"><h4><b>Thông tin thanh toán</h4></b></div>
    {{-- Thông Tin Thanh Toán --}}
    <form action="{{ route('cart.checkout-complete') }}" method="POST" id="frm-checkout" >
        @csrf
        <div class="form-group btn btn-group btn-info" style="background-color:#FDE5C8">
            <div class="mr-4">
                <input type="radio" value="1" name="payment_type" id="payment-type-1" checked class="payment-type">
                <label for="payment-type-1"  style="color:black">Thanh toán tại nhà</label>
            </div>
            <div class="ml-2">
                <input type="radio" value="2" name="payment_type" id="payment-type-2" class="payment-type">
                <label for="payment-type-2"  style="color:black">Thanh toán bằng Credit Card</label>
            </div>
        </div>
        <div class="mt-2">
            <button type="submit" class="btn btn-primary" id="btn-checkout" onclick="return confirm('Confirmed Order')">Thanh toán</button>
        </div>
    </form>
</div>