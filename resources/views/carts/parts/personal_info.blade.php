<div class="border p-2">
    <div class="mb-3"><h4><b>Thông tin tài khoản</h4></b></div>
    {{-- Thông Tin Cá Nhân --}}
    <div class="p-2">
        <label for="" style="color:black">Tên đầy đủ:</label>
        <p>{{ Auth::user()->name }}</p>
    </div>
    <div class="p-2">
        <label for=""  style="color:black">Email:</label>
        <p>{{ Auth::user()->email }}</p>
    </div>
    <div class="p-2">
        <label for="" style="color:black">Số điện thoại:</label>
        <p>{{ Auth::user()->phone_number }}</p>
    </div>
    <div class="p-2">
        <label for="" style="color:black">Địa chỉ:</label>
        <p>{{ Auth::user()->address }}</p>
    </div>
</div>