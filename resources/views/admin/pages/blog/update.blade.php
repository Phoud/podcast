    @extends('admin.common.main')
    @section('content') 
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">ເພີ່ມຂໍ້ມູນຂ່າວສານ</h2>
                    </div>
                </div>
            </div>
            <div class="ecommerce-widget">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <form action="{{ route('admin.edit.blog', $updates->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <label class="lbname">ຫົວຂໍ້ຂ່າວ</label>
                                    <input type="text" value="{{ $updates->title }}" class="form-control" placeholder="ກະລຸນາປ້ອນຫົວຂໍ້..." name="title"><br>
                                    <label class="lbname">ຮູບພາບປະກອບ</label>
                                    <div class="file-upload">
                                        <div class="file-select" style="border-radius: 5px;">
                                            <div class="file-select-button" id="fileName" style="font-family: Phetsarath OT; font-size: 16px;">ອັບໂຫຼດ</div>
                                            <div class="file-select-name" id="noFile" style="font-family: Phetsarath OT; font-size: 16px; color: #999;">
                                                ກະລຸນາເລືອກ ຮູບພາບປະກອບ
                                            </div> 
                                            <input type="file" name="image" id="imgInp">

                                        </div>
                                         
                                        
                                    </div><br>
                                    <div class="form-group">
                                            <img style="max-height: 150px;" id="blah" src="{{ url('/') }}/admins/blog/{{ $updates->image }}" alt="your image"/>
                                          </div>
                                    <label class="lbname">ລາຍລະອຽດຂອງຂ່າວ</label>

                                        <textarea rows="6" cols="12" class="editor" id="editor_tiny" name="body">{{ $updates->body }}</textarea>

                                        <br>
                                        <label class="lbname">ແທັກ</label>
                                        <select name="tags[]" id="tags" class="form-control" multiple="multiple">
                                            @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                            @endforeach
                                           
                                        </select>
                                        <br>
                                    <button class="btn btn-success m-t-30" style="border-radius:5px;" type="submit">ແກ້ໄຂ</button>
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
    <script>
        var baseUrl = '{{ url('/') }}';
        $(document).ready(function(){
            $('#tags').select2({
                placeholder: "ກະລຸນາເພີ່ມ ຫຼື ເລືອກແທັກ",
                tags: true,

            }).val({{ $updates->selectedTag() }}).trigger('change');
        })
    </script>
    <script src="{{ asset('/tiny/jquery.tinymce.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/tiny/tinymce.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/tiny/tinymce.setting.js')}}" type="text/javascript"></script>
    @stop

   