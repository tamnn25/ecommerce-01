 <!-- Modal -->
 <div class="modal fade" id="modal-send-code" tabindex="-1" aria-labelledby="modal-send-code-label" aria-hidden="true">
   <div class="modal-dialog">
     <div style="background-color: white;" class="modal-content">
       <div class="modal-header" style="background-color:#005d64a6;text-align: center;">
         <h3 id="exampleModalLabel" class="text-white">Gửi mã xác thực</h3>
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
         @auth
         <div class="form-group p-2 mt-2 mb-2 border">
           <form action="{{ route('cart.send-verify-code') }}" method="POST" id="frm-send-verify-code">
             @csrf
             <strong><label for="" >Vui lòng chọn phương thức gửi mã xác thực</label></strong><br>
             <input type="radio" name="code_type" value="1" id="send-code-type-1" checked><label for="send-code-type-1">&ensp;Gửi mã xác nhận đến mail</label><br>
             <input type="radio" name="code_type" value="2" id="send-code-type-2"><label for="send-code-type-2">&ensp;Gửi mã xác nhận đến số điện thoại</label><br>
             <button type="submit" class="btn btn-outline-primary" style="border-color: #28a745; ">Gửi mã xác thực</button>
           </form>
         </div>

         {{-- confirm send code --}}
         <div class="form-group  p-2 mt-2 mb-2 border">
           <form action="{{ route('cart.confirm-verify-code') }}" method="POST" id="frm-confirm-verify-code">
             @csrf
             <div class="form-group">
               <label for=""><strong>Nhập mã xác thực</strong></label>
               <input type="text" name="code" required>
             </div>
             <div class="form-group">
               <button class="btn btn-outline-primary" type="submit">Gửi</button>
             </div>
           </form>
         </div>
         @endauth

         @guest
         <div class="account-info">
           <a class="btn btn-outline-primary" href="/login">Đăng Nhập</a>
           <a class="btn btn-outline-primary" href="/register">Đăng Ký</a>
         </div>
         @endguest
       </div>
     </div>
   </div>
 </div>