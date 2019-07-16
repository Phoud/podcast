<!-- Modal -->
@if(!Auth::check())
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ເຂົ້າສູ່ລະບົບ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card ">
            <div class="card-header text-center"><a href=""><p>108MegaHeard</p></a><span class="splash-description">ກະລຸນາປ້ອນຂໍ້ມູນເພື່ອເຂົ້າສູ່ລະບົບ</span></div>
            <div class="card-body">
                <form action="{{ route('login') }}?login_reload={{ Session::get('login_reload') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input name="email" class="form-control form-control-lg" type="text" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input name="password" class="form-control form-control-lg" type="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block mt-2">ເຂົ້າສູ່ລະບົບ</button>
                </form>
                <div class="mt-10">
              
                    ຖ້າຍັງບໍ່ມີບັນຊີ <a href="{{ route('getSignup') }}" class="footer-link">ສ້າງບັນຊີທີ່ນີ້</a>

            </div>
            </div>
            
        </div>
      </div>
    </div>
  </div>
</div>
		@endif