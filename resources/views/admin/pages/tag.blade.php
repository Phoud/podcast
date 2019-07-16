@extends('admin.common.main')
@section('content') 
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Management Tag</h2>
                </div>
            </div>
        </div>
        <div class="ecommerce-widget">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Table Tag</h5>
                        <i class="fa fa-plus" style="position:absolute;right:20px;top:20px;" data-toggle="modal" data-target="#AddModal"></i>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">ລຳດັບ</th>
                                            <th class="border-0">ຊື່ເເທ໋ກ</th>
                                            <th class="border-0" style="text-align:right">ຕັ້ງຄ່າທົ່ວໄປ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($show_tags as $show_tag)
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $show_tag->tag_name }}</td>
                                            <td style="text-align:right">
                                                <i class="fa fa-edit" data-toggle="modal" data-target="#EditModal-{{ $show_tag['id'] }}"></i>
                                                &nbsp;&nbsp;
                                                <i class="fa fa-trash" data-toggle="modal" data-target="#DeleteModal-{{ $show_tag['id'] }}"></i>
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
            <form action="{{ route('admin.insert.tag') }}" method="POST">
            @csrf
                <div class="modal-body">
                    <label class="lbname">ຊື່ເເທ໋ກ : </label>
                    <input type="text" class="form-control" placeholder="ກະລຸນາປ້ອນຊື່ເເທ໋ກ..." name="t_name">
                    @if($errors->has('t_name'))
                    <p class="error_name">* {{ $errors->first('t_name') }}</p>
                    @else
                    <br>
                    @endif
                    <button class="btn btn-success" style="border-radius:5px;" type="submit">ເພີ່ມ</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- Modal Add End -->

    <!-- Modal Edit Type -->
    @foreach($show_tags as $show_tag)
    <div class="modal fade" id="EditModal-{{ $show_tag['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form action="{{ route('admin.edit.tag', $show_tag->id) }}" method="POST">
            @csrf
                <div class="modal-body">
                    <label class="lbname">ຊື່ເເທ໋ກ : </label>
                    <input type="text" class="form-control" placeholder="ກະລຸນາປ້ອນຊື່ເເທ໋ກ..." name="t_name" value="{{ $show_tag->tag_name }}">
                    @if($errors->has('t_name'))
                    <p class="error_name">* {{ $errors->first('t_name') }}</p>
                    @else
                    <br>
                    @endif
                    <button class="btn btn-warning" style="border-radius:5px;" type="submit">ອັບເເດດ</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    @endforeach
    <!-- Modal Edit End -->

    <!-- Modal Edit Type -->
    @foreach($show_tags as $show_tag)
    <div class="modal fade" id="DeleteModal-{{ $show_tag['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form action="{{ route('admin.delete.tag', $show_tag->id) }}" method="POST">
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
    @if($errors->has('t_name'))
        document.getElementById('AddModal').style.display = "block";
    @endif
</script>
