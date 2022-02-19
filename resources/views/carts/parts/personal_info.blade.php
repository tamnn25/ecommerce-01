<h4 class="btn btn-info">Thông tin cá nhân</h4>
{{-- Thông Tin Cá Nhân --}}
<br>
<div class="border p-2 btn btn-info table" style="    background-color: #5d9564eb;">
    <div class="p-2">
        <label for="">Tên đầy đủ</label>
        <p style="color:#201818">{{ Auth::user()->name }}</p>
    </div>
    <hr>
    <div class="p-2">
        <label for="">Email</label>
        <p style="color:#201818">{{ Auth::user()->email }}</p>
    </div>
    <hr>
    <div class="p-2">
        <label for="">Số điện thoại</label>
        <p style="color:#201818">{{ Auth::user()->phone_number }}</p>
    </div>
    <hr>
    <div class="p-2">
        <label for="">Địa chỉ</label>
        <p style="color:#201818">{{ Auth::user()->address }}</p>
    </div>
</div>