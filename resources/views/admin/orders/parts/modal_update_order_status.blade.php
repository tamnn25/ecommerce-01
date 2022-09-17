<div class="modal" tabindex="-1" role="dialog" id="modal-update-order-status">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">{{ __('message.update_order_status') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>

         <div class="modal-body">
            <div class="mb-2">
               <label for="">{{ __('message.fullname') }}</label>
               <input type="text" id="modal-fullname" disabled class="form-control">
               <input type="hidden" id="modal-order-id">
               <input type="hidden" id="update-order-status-url">
            </div>

            <div class="row">
               <div class="col-md-6">
                  <div class="mb-2">
                     <label for="">{{ __('message.total_quantity') }}</label>
                     <input type="text" id="modal-total-quantity" disabled class="form-control">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="mb-2">
                     <label for="">{{ __('message.total_money') }}</label>
                     <input type="text" id="modal-total-money" disabled class="form-control">
                  </div>
               </div>
            </div>

            <div class="mb-2">
               <label for="">{{ __('message.status') }}</label>
               <div class="border p-2">
                  <ul class="list-unstyled">
                     <li>
                        <input type="radio" name="status" class="status" id="modal-status-0" value="{{ \App\Models\Order::STATUS[0] }}">
                        <label for="modal-status-0">{{ __('message.status_payment_unpaid') }}</label>
                     </li>
                     <li>
                        <input type="radio" name="status" class="status" id="modal-status-1" value="{{ \App\Models\Order::STATUS[1] }}">
                        <label for="modal-status-1">{{ __('message.status_payment_online') }}</label>
                     </li>
                     <li>
                        <input type="radio" name="status" class="status" id="modal-status-2" value="{{ \App\Models\Order::STATUS[2] }}">
                        <label for="modal-status-2">{{ __('message.status_shipper_doing') }}</label>
                     </li>
                     <li>
                        <input type="radio" name="status" class="status" id="modal-status-3" value="{{ \App\Models\Order::STATUS[3] }}">
                        <label for="modal-status-3">{{ __('message.status_cancel') }}</label>
                     </li>
                     <li>
                        <input type="radio" name="status" class="status" id="modal-status-4" value="{{ \App\Models\Order::STATUS[4] }}">
                        <label for="modal-status-4">{{ __('message.status_complete') }}</label>
                     </li>
                  </ul>
               </div>
            </div>
         </div>

         <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="processOrderStatus()"><i class="fas fa-user-cog"></i> {{ __('message.update') }}</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i> {{ __('message.close') }}</button>
         </div>
      </div>
   </div>
</div>