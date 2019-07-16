@extends('home.common.main')
@section('css')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('/') }}/home/styles/contact.css">
<link rel="stylesheet" type="text/css" href="{{ url('/') }}/home/styles/contact_responsive.css">
@endsection
@section('content')
<div class="contact_container">
<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{ url('/') }}/home/images/contact.jpg" data-speed="0.8"></div>
		<div class="home_container d-flex flex-column align-items-center justify-content-center">
			<div class="home_content">
				<div class="home_title"><h1>ລົງທະບຽນ</h1></div>
			</div>
		</div>
	</div>

	<div class="signup">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="contact_form_container">
						<div class="contact_form_title text-center">ຂໍ້ມູນສ່ວນຕົວ</div>

						<div class="row">
							<div class="col-lg-8 offset-lg-2">
								@if($errors->any())
					<div class="alert alert-danger" role="alert">
					  {{ $errors->first() }}
					</div>
					@endif
								<form action="{{ route('memberSignup') }}" enctype="multipart/form-data" class="contact_form" method="POST">
									@csrf
									<div class="row">
										<div class="col-md-6 contact_col">
											<label for="name">ຊື່ ແລະນາມສະກຸນ</label>
											<input type="text" class="contact_input" placeholder="ຊື່" name="name" required="required">
										</div>
										<div class="col-md-6">
											<label for="name">ທີ່ຢູ່ອີເມວ</label>
											<input type="email" class="contact_input" placeholder="ທີ່ຢູ່ອີເມວ" name="email" required="required">
										</div>
									</div>
									<div>
										<label for="name">ລະຫັດຜ່ານ</label>
										<input type="password" id="NewPassword" class="contact_input" name="password" placeholder="ລະຫັດຜ່ານ"></div>
									<div>
										<label for="name">ຢືນຢັນລະຫັດຜ່ານ</label>
										<input type="password" id="ConfirmPassword" class="contact_input" name="confirmpassword" placeholder="ຢືນຢັນລະຫັດຜ່ານ">
									<p id="CheckPasswordMatch" class="alert-danger"></p>
									</div>

										

										<label for="name">ຮູບໂພຟາຍ</label>
										
                                <div class="file-upload" id="file-upload_videos">
                                    <div class="file-select" style="border-radius: 5px;">
                                        <div class="file-select-button" id="fileName" style="font-family: Phetsarath OT; font-size: 16px;">ອັບໂຫຼດ</div>
                                        <div class="file-select-name" style="font-family: Phetsarath OT; font-size: 16px; color: #999;">
                                            ກະລຸນາເລືອກ ຮູບ
                                        </div> 
                                        <input type="file" name="profile" id="chooseFile">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <img style="max-height: 150px;" id="blah" src="{{ url('/') }}/assets/images/default.png" alt="cover"/>
                                </div>
									<button class="contact_button button_fill ml-auto mr-auto">ລົງທະບຽນ</button>
								</form>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

@endsection
@section('js')
	<script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#chooseFile").change(function(){
            readURL(this);
        });

        $(function() {
    $("#ConfirmPassword").keyup(function() {
        var password = $("#NewPassword").val();
        $("#CheckPasswordMatch").html(password == $(this).val() ? "" : "ລະຫັດຜ່ານບໍ່ຕົງກັນ!");
    });

});
</script>
@stop