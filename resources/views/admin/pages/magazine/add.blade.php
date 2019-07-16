    @extends('admin.common.main')
    @section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">ເພີ່ມຂໍ້ມູນວາລະສານ</h2>
                    </div>
                </div>
            </div>
            <div class="ecommerce-widget">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <form action="{{ route('admin.insert.magazine') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <label class="lbname">ວັນທີຈັດພິມ</label>
                                    <input type="date" class="form-control" required placeholder="ກະລຸນາປ້ອນຊື່ວາລະສານ" name="date_of_publish"><br>
                                    <label class="lbname">ສະບັບເລກທີ່</label>
                                    <input type="text" class="form-control" required placeholder="ກະລຸນາປ້ອນເລກທີ່" name="issue"><br>

                                    <label class="lbname">ຮູບໜ້າປົກວາລະສານ</label>
                                    <div class="file-upload">
                                        <div class="file-select" style="border-radius: 5px;">
                                            <div class="file-select-button" id="fileName" style="font-family: Phetsarath OT; font-size: 16px;">ອັບໂຫຼດ</div>
                                            <div class="file-select-name" id="noFile" style="font-family: Phetsarath OT; font-size: 16px; color: #999;">ກະລຸນາເລືອກຮູບໜ້າປົກວາລະສານ</div> 
                                            <input type="file" name="cover" required id="imgInp">
                                        </div>
                                    </div><br>

                                    <div class="form-group">
                                        <img style="max-height: 150px;" id="blah" src="{{ url('/') }}/assets/images/default.png" alt="your image"/>
                                    </div>
                                    <label class="lbname">ໄຟລ ວາລະສານ</label>
                                    <div class="file-upload">
                                        <div class="file-select" style="border-radius: 5px;">
                                            <div class="file-select-button" id="fileName" style="font-family: Phetsarath OT; font-size: 16px;">ອັບໂຫຼດ</div>
                                            <div class="file-select-name" id="noFile" style="font-family: Phetsarath OT; font-size: 16px; color: #999;">ກະລຸນາເລືອກໄຟລວາລະສານ</div> 
                                            <input type="file" name="magazine" required id="chooseFile">
                                        </div>
                                    </div><br>
                                    <p id="filenames" style="font-size: 20px;"></p>
                                    <label class="lbname">ເນື້ອໃນວາລະສານໂດຍຫຍໍ້</label>
                                    <textarea name="description" required cols="30" class="form-control" rows="10"></textarea>
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
    <script type="text/javascript">
    $(document).ready(function(){
        $('input[id="chooseFile"]').change(function(e){
            var fileName = e.target.files[0].name;
            document.getElementById('filenames').innerText = "ຟາຍເອກະສານ: " + fileName;
        });
    });
</script>
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