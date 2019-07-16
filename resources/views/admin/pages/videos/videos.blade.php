@extends('admin.common.main')
@section('content') 
<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">ຈັດການຂໍ້ມູນ ວີດີໂອ</h2>
                </div>
            </div>
        </div>
        <div class="ecommerce-widget">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">ຂໍ້ມູນວີດີໂອ</h5>
                        <a href="{{ route('admin.getAddVideo') }}"><i class="fa fa-plus" style="position:absolute;right:20px;top:20px;"></i></a>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">ລຳດັບ</th>
                                            <th class="border-0">ຊື່ຫົວຂໍ້</th>
                                            <th class="border-0" style="text-align:right">ຕັ້ງຄ່າທົ່ວໄປ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($videos as $video)
                                        <tr>
                                            <td>{{ $video->id }}</td>
                                            <td>{{ $video->title }}</td>
                                            <td style="text-align:right">
                                            <a href="{{ route('admin.getUpdateVideo', $video->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                                &nbsp;&nbsp;
                                                <i class="fa fa-trash"  data-toggle="modal" data-target="#DeleteModal-{{ $video['id'] }}"></i>
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

@foreach($videos as $video)
<div class="modal fade" id="DeleteModal-{{ $video['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form action="{{ route('admin.delete.videos', $video->id) }}" method="POST">
        @csrf
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

