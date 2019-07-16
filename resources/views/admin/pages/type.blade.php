@extends('admin.common.main')
@section('content') 
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">ຈັດການໝວດໝູ່ສື່ຕ່າງໆ</h2>
                </div>
            </div>
        </div>
        <div class="ecommerce-widget">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">ໝວດໝູ່</h5>
                        <i class="fa fa-plus" style="position:absolute;right:20px;top:20px;" data-toggle="modal" data-target="#AddModal"></i>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">ລຳດັບ</th>
                                            <th class="border-0">ໝວດໝູ່</th>
                                            <th class="border-0" style="text-align:right">ຕັ້ງຄ່າທົ່ວໄປ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $auto_number = 1;
                                    @endphp
                                    @foreach($categorys as $category)
                                        <tr>
                                            <td>{{ $auto_number++ }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td style="text-align:right">
                                                <i class="fa fa-edit" data-toggle="modal" data-target="#EditModal-{{ $category['id'] }}"></i>
                                                &nbsp;&nbsp;
                                                <i class="fa fa-trash" data-toggle="modal" data-target="#DeleteModal-{{ $category['id'] }}"></i>
                                            </td>
                                        </tr>
                                    @endforeach
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
                <div class="modal-body">
                <form action="{{ route('admin.insert.type') }}" method="POST">
                @csrf
                    <label class="lbname">ໝວດໝູ່</label>
                    <input type="text" class="form-control" placeholder="ກະລຸນາປ້ອນໝວດໝູ່" name="typename"><br>
                    <button class="btn btn-success" style="border-radius:5px;" type="submit">ເພີ່ມ ໝວດໝູ່</button>
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Add End -->

    <!-- Modal Edit Type -->
    @foreach($categorys as $category)
   <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal fade" id="EditModal-{{ $category['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form action="{{ route('admin.edits.type', $category->id) }}" method="POST">
                @csrf
            <div class="modal-body">
                <label class="lbname">ໝວດໝູ່ : </label>
                <input type="text" class="form-control" placeholder="ກະລຸນາປ້ອນໝວດໝູ່" name="typename" value="{{ $category->name }}"><br>
                <button type="submit" class="btn btn-warning">ອັບເເດດ</button>
            </div>
            </form>
            </div>
        </div>
        </div>
    @endforeach
    <!-- Modal Edit End -->

    <!-- Modal Edit Type -->
    @foreach($categorys as $category)
    <div class="modal fade" id="DeleteModal-{{ $category['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form action="{{ route('admin.delete.type', $category->id) }}" method="POST">
                @csrf
            <div class="modal-body">
                <label class="lbname">ທ່ານເເນ່ໃຈ ທີ່ຈະລຶບ ຫຼື ບໍ່ ? </label><br>
                <button type="submit" class="btn btn-danger">ລຶບອອກ</button>
            </div>
            </form>
            </div>
        </div>
    </div>
    @endforeach
    <!-- Modal Edit End -->
@endsection