@extends('admin.common.main')
@section('content')
<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">ຈັດການຜູ້ໃຊ້</h2>
                </div>
            </div>
        </div>
        <div class="ecommerce-widget">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">ຂໍ້ມູນຜູ້ໃຊ້ທັງໝົດ</h5>
                        <a href=""><i class="fa fa-plus" 
                            style="position:absolute;right:20px;top:20px;"></i></a>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">ລຳດັບ</th>
                                            <th class="border-0">ຊື່</th>
                                            <th class="border-0">ອີເມວ</th>
                                            <th class="border-0" style="text-align:right">ຕັ້ງຄ່າທົ່ວໄປ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td style="text-align:right">
                                                <a href="{{ route('getUpdateUser', $user->id) }}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                &nbsp;&nbsp;
                                                <a href="#"><i class="fa fa-trash" data-toggle="modal" data-target="#DeleteModal-{{ $user['id'] }}"></i></a>
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

@foreach($users as $user)
<div class="modal fade" id="DeleteModal-{{ $user['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form action="{{ route('userDelete', $user->id) }}" method="GET">
            <div class="modal-body">
                <label class="lbname">ທ່ານເເນ່ໃຈ ທີ່ຈະລຶບ ຫຼື ບໍ ?</label><br>
                <button class="btn btn-danger" style="border-radius:5px;" type="submit">ລຶບອອກ</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endforeach

@endsection
