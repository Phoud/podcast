@extends('admin.common.main')
@section('content') 
<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">ເພີ່ມຂໍ້ມູນວີດີໂອ</h2>
                </div>
            </div>
        </div>
        <div class="ecommerce-widget">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <form action="{{ route('admin.insert.videos') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <label class="lbname">ຊື່ຫົວຂໍ້</label>
                                <input type="text" class="form-control" required="" name="title"><br>
                                <label class="lbname">ຮູບປະກອບ</label>
                                <div class="file-upload" id="file-upload_img">
                                    <div class="file-select" style="border-radius: 5px;">
                                        <div class="file-select-button" id="fileName" style="font-family: Phetsarath OT; font-size: 16px;">ອັບໂຫຼດ</div>
                                        <div class="file-select-name" id="noFile_img" style="font-family: Phetsarath OT; font-size: 16px; color: #999;">
                                            ກະລຸນາເລືອກຮູບ
                                        </div> 
                                        <input type="file" required name="image" id="imgInp">
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <img style="max-height: 150px;" id="blah" src="{{ url('/') }}/assets/images/default.png" alt="cover"/>
                                </div><br>
                                <label class="lbname">ອັບໂຫຼດໄຟລ ວີດີໂອ</label>
                                <div class="file-upload" id="file-upload_videos">
                                    <div class="file-select" style="border-radius: 5px;">
                                        <div class="file-select-button" id="fileName" style="font-family: Phetsarath OT; font-size: 16px;">ອັບໂຫຼດ</div>
                                        <div class="file-select-name" id="noFile_videos" style="font-family: Phetsarath OT; font-size: 16px; color: #999;">
                                            ກະລຸນາເລືອກ ໄຟລວີດີໂອ
                                        </div> 
                                        <input type="file" required name="video" id="chooseFile">
                                    </div>
                                </div><br>
                                <p id="filenames" style="font-size: 20px;"></p>
                                <div class="group">
                                    <label class="lbname">ຄຳບັນຍາຍ</label>
                                    <textarea rows="6" required cols="12" class="editor" id="editor_tiny" name="description"></textarea>
                                </div><br>
                                <div class="group">
                                    <label class="lbname">ໝວດໝູ່</label>
                                    <select class="form-control" name="category">
                                        <option value="" disabled selected="">ກະລຸນາເລືອກໝວດໝູ່</option>
                                        @foreach($cates as $cate)

                                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                        @endforeach
                                    </select>
                                </div><br>
                                <div class="group">
                                    <label class="lbname">ເເທັກ</label>
                                    <select class="form-control" id="tag" name="tags[]" multiple="multiple">
                                        @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                    </div><br>
                                    <label class="lbname">ແຂກຮັບເຊີນ</label>
                                     <select class="form-control" id="guest" name="guests[]" multiple="multiple">
                                        @foreach($guests as $guest)
                                        <option value="{{ $guest->id }}">{{ $guest->name }}</option>
                                            @endforeach
                                        </select><br>
                                    <br>
                                    <button class="btn btn-success" style="border-radius:5px;" type="submit">ເພີ່ມ ໄຟລວີດີໂອ</button>
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
            document.getElementById('filenames').innerText = "ຟາຍສຽງ: " + fileName;
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
    <script>
        ClassicEditor
        .create(document.querySelector('#descript'))
        .catch(error => {
            console.log(error);
        });
        ClassicEditor
        .create(document.querySelector('#tags'))
        .catch(error => {
            console.log(error);
        });

        $("#guest").select2({
            placeholder: 'ກະລຸນາເລືອກແຂກຮັບເຊີນ'
        });

        $("#tag").select2({
            tags: true,
            placeholder: 'ກະລຸນາເລືອກເເທ໋ກ',
        });





</script>
<script>
        var baseUrl = '{{ url('/') }}';

    </script>
    <script src="{{ asset('/tiny/jquery.tinymce.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/tiny/tinymce.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/tiny/tinymce.setting.js')}}" type="text/javascript"></script>
@stop