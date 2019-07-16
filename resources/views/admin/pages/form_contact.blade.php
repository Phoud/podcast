@extends('admin.common.main')
@section('content') 
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Management Form Contact</h2>
                </div>
            </div>
        </div>
        <div class="ecommerce-widget">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Table Form Contact</h5>
                        <i class="fa fa-plus" style="position:absolute;right:20px;top:20px;" data-toggle="modal" data-target="#AddModal"></i>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">ລຳດັບ</th>
                                            <th class="border-0">ຊື່</th>
                                            <th class="border-0">ທີ່ຢູ່ອີເມວ</th>
                                            <th class="border-0">ຂໍ້ຄວາມ</th>
                                            <th class="border-0" style="text-align:right">ຕັ້ງຄ່າທົ່ວໄປ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($show_formcontacts as $show_formcontact)
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $show_formcontact->name }}</td>
                                            <td>{{ $show_formcontact->email }}</td>
                                            <td>{!! $show_formcontact->message !!}</td>
                                            <td style="text-align:right">
                                                <i class="fa fa-edit" data-toggle="modal" data-target="#EditModal-{{ $show_formcontact['id'] }}"></i>
                                                &nbsp;&nbsp;
                                                <i class="fa fa-trash" data-toggle="modal" data-target="#DeleteModal-{{ $show_formcontact['id'] }}"></i>
                                            </td>
                                        </tr>
                                    @endforeach
                                        <tr>
                                            <td colspan="9"><a href="" class="btn btn-outline-light float-right">View Details</a></td>
                                        </tr>
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
            <form action="{{ route('admin.insert.formcontact') }}" method="POST">
            @csrf
                <div class="modal-body">
                    <label class="lbname">ຊື່ : </label>
                    <input type="text" class="form-control" placeholder="ກະລຸນາປ້ອນຊື່ຮູບ..." name="name"><br>
                    <label class="lbname">ອີເມວ : </label>
                    <input type="email" class="form-control" placeholder="ກະລຸນາປ້ອນອີເມວ..." name="email"><br>
                    <label class="lbname">ຂໍ້ຄວາມ : </label>
                    <textarea type="text" name="messages" id="descript" placeholder="ລາຍລະອຽດ"></textarea><br>
                    <button class="btn btn-success" style="border-radius:5px;" type="submit">ເພີ່ມ</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- Modal Add End -->

    <!-- Modal Edit Type -->
    @foreach($show_formcontacts as $show_formcontact)
    <div class="modal fade" id="EditModal-{{ $show_formcontact['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form action="{{ route('admin.edit.formcontact', $show_formcontact->id) }}" method="POST">
            @csrf
                <div class="modal-body">
                    <label class="lbname">ຊື່ : </label>
                    <input type="text" class="form-control" placeholder="ກະລຸນາປ້ອນຊື່ຮູບ..." name="name" value="{{ $show_formcontact->name }}"><br>
                    <label class="lbname">ອີເມວ : </label>
                    <input type="email" class="form-control" placeholder="ກະລຸນາປ້ອນອີເມວ..." name="email" value="{{ $show_formcontact->email }}"><br>
                    <label class="lbname">ຂໍ້ຄວາມ : </label>
                    <textarea type="text" name="messages" id="descripts-{{ $show_formcontact['id'] }}" placeholder="ລາຍລະອຽດ">{{ $show_formcontact->message }}</textarea><br>
                    <button class="btn btn-warning" style="border-radius:5px;" type="submit">ອັບເເດດ</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    @endforeach
    <!-- Modal Edit End -->

    <!-- Modal Edit Type -->
    @foreach($show_formcontacts as $show_formcontact)
    <div class="modal fade" id="DeleteModal-{{ $show_formcontact['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form action="{{ route('admin.delete.formcontact', $show_formcontact->id) }}" method="POST">
            @csrf
                <div class="modal-body">
                    <label class="lbname">ທ່ານເເນ່ໃຈ ທີ່ຈະລຶບ ຫຼື ບໍ ?</label><br>
                    <button class="btn btn-danger" style="border-radius:5px;" type="submit">ອັບເເດດ</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    @endforeach
    <!-- Modal Edit End -->
@endsection

@section('addcandidate')
<script>
    ClassicEditor
        .create(document.querySelector('#descript'))
        .catch(error => {
        console.log(error);
    });

    @foreach($show_formcontacts as $show_formcontact)
        ClassicEditor
            .create(document.querySelector('#descripts-{{ $show_formcontact['id'] }}'))
            .catch(error => {
            console.log(error);
        });
    @endforeach
</script>
@stop

