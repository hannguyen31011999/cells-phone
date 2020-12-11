<!--Modal: modalConfirmDelete-->
<div class="modal fade" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Body-->
      <div class="modal-body">
        <i class="fa fa-times" style="color: red;font-size:50px;"></i>
        <p> @if(isset($error)) {{$error}} @endif </p>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: modalConfirmDelete-->