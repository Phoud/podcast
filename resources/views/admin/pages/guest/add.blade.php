    @extends('admin.common.main')
    @section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">ເພີ່ມແຂກຮັບເຊີນ</h2>
                    </div>
                </div>
            </div>
            <div class="ecommerce-widget">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <form action="{{ route('admin.insertGuest') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <label class="lbname">ຊື່ ແລະນາມສະກຸນ</label>
                                    <input type="text" class="form-control" required name="name"><br>
                                    <label class="lbname">ຕໍາແໜ່ງ</label>
                                    <input type="text" class="form-control" required name="position"><br>

                                    <label class="lbname">ຮູບປະຈໍາໂຕ</label>
                                    <div class="file-upload">
                                        <div class="file-select" style="border-radius: 5px;">
                                            <div class="file-select-button" id="fileName" style="font-family: Phetsarath OT; font-size: 16px;">ອັບໂຫຼດ</div>
                                            <div class="file-select-name" id="noFile" style="font-family: Phetsarath OT; font-size: 16px; color: #999;">ກະລຸນາເລືອກຮູບ</div> 
                                            <input type="file" name="photo" required id="imgInp">
                                        </div>
                                    </div><br>

                                    <div class="form-group">
                                        <img style="max-height: 150px;" id="blah" src="{{ url('/') }}/assets/images/default.png" alt="your image"/>
                                    </div>
                                    <br>
                                    <button class="btn btn-success m-t-30" style="border-radius:3px;">ເພີ່ມ</button>
                                </div>
                            </form>
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

        $("#imgInp").change(function(){
            readURL(this);
        });
    </script>
    @stop