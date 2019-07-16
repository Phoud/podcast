@extends('admin.common.main')
@section('content') 
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">ຈັດການໂລໂກ້</h2>
                </div>
            </div>
        </div>
        <div class="ecommerce-widget">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">ໂລໂກ້</h5>
                        @if(!isset($show_webimages))
                        <i id="checkLogo" class="fa fa-plus" style="position:absolute;right:20px;top:20px;" data-toggle="modal" data-target="#AddModal"></i>
                        @endif
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">ລຳດັບ</th>
                                            <th class="border-0">ໂລໂກ້</th>
                                            <th class="border-0"></th>
                                            <th class="border-0"></th>
                                            <th class="border-0" style="text-align:right">ຕັ້ງຄ່າທົ່ວໄປ</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if($show_webimages)
                                        <tr>
                                            <td>1</td>
                                            <td><img style="max-height: 50px;" src="{{ url('/') }}/admins/weblogo/{{ isset($show_webimages) ? $show_webimages->logo : ""}}"></td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align:right">

                                                <i class="fa fa-edit" data-toggle="modal" data-target="#EditModal-{{ $show_webimages['id'] }}"></i>
                                                &nbsp;&nbsp;


                                            </td>
                                        </tr>

                                        @endif  


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Type -->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.insert.web.logo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <label class="lbname">ໂລໂກ</label>
                    <div class="file-upload">
                        <div class="file-select" style="border-radius: 5px;">
                            <div class="file-select-button" id="fileName" style="font-family: Phetsarath OT; font-size: 16px;">ອັບໂຫຼດ</div>
                            <div class="file-select-name" id="noFile" style="font-family: Phetsarath OT; font-size: 16px; color: #999;">
                                ກະລຸນາເລືອກ ໂລໂກ
                            </div> 
                            <input type="file" name="logo" id="imgInp">
                        </div>
                    </div><br>

                    <div class="form-group">
                        <img style="max-height: 150px;" id="blah" src="{{ url('/') }}/assets/images/default.png" alt="Logo"/>
                    </div>

                    <br>
                    <button class="btn btn-success" style="border-radius:5px;" type="submit">ເພີ່ມ</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Add End -->

<!-- Modal Edit Web Logo -->

@if($show_webimages)
<div class="modal fade" id="EditModal-{{ $show_webimages['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.edit.web.logo', $show_webimages->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <label class="lbname">ໂລໂກ</label>
                    <div class="file-upload" id="file-upload-{{ $show_webimages['id'] }}">
                        <div class="file-select" style="border-radius: 5px;">
                            <div class="file-select-button" id="fileName" style="font-family: Phetsarath OT; font-size: 16px;">ອັບໂຫຼດ</div>
                            <input type="file" name="logo" id="choose">
                            {{-- <input type="hidden" name="oldlogo" value="{{$show_webimages->logo}}"> --}}
                        </div>
                    </div><br>
                    <div class="form-group">
                        <img style="max-height: 150px;" id="upd" src="{{ url('/') }}/admins/weblogo/{{ $show_webimages->logo }}" alt="Logo"/>
                    </div>
                    <br>
                    <button class="btn btn-success" style="border-radius:5px;" type="submit">ອັບເເດດ</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif


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
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#upd').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#choose").change(function(){
            readURL(this);
        });
    </script>

@stop