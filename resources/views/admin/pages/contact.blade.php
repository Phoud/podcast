@extends('admin.common.main')
@section('content') 
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">ຈັດການຂໍ້ມູນຕິດຕໍ່</h2>
                </div>
            </div>
        </div>
        <div class="ecommerce-widget">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">ຂໍ້ມູນຕິດຕໍ່</h5>
                        @if(!isset($show_contacts))
                        <i class="fa fa-plus" style="position:absolute;right:20px;top:20px;" data-toggle="modal" data-target="#AddModal"></i>
                        @endif
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr class="border-0">
                                            <th class="border-0">ລຳດັບ</th>
                                            <th class="border-0">ເບີໂທລະສັບ</th>
                                            <th class="border-0">ທີ່ຢູ່ອີເມວ</th>
                                            <th class="border-0">ທີ່ຢູ່</th>
                                            <th class="border-0" style="text-align:right">ຕັ້ງຄ່າທົ່ວໄປ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  @if($show_contacts)
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $show_contacts->tel }}</td>
                                            <td>{{ $show_contacts->email }}</td>
                                            <td>{!! $show_contacts->address !!}</td>
                                            <td style="text-align:right">
                                                <i class="fa fa-edit" data-toggle="modal" data-target="#EditModal-{{ $show_contacts['id'] }}"></i>
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
            <form action="{{ route('admin.insert.contact') }}" method="POST">
            @csrf
                <div class="modal-body">
                    <label class="lbname">ເບີໂທລະສັບ</label>
                    <input type="text" class="form-control" name="tel"><br>
                    <label class="lbname">ອີເມວ</label>
                    <input type="email" class="form-control" name="email"><br>
                    <label class="lbname">ທີ່ຢູ່</label>
                    <textarea type="text" name="address" id="descript" placeholder="ລາຍລະອຽດ"></textarea><br>
                    <button class="btn btn-success" style="border-radius:5px;" type="submit">ເພີ່ມ</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- Modal Add End -->

    <!-- Modal Edit Type -->
    @if($show_contacts)
    <div class="modal fade" id="EditModal-{{ $show_contacts['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form action="{{ route('admin.edit.contact', $show_contacts->id) }}" method="POST">
            @csrf
                <div class="modal-body">
                    <label class="lbname">ເບີໂທລະສັບ</label>
                    <input type="text" class="form-control" name="tel" value="{{ $show_contacts->tel }}"><br>
                    <label class="lbname">ອີເມວ</label>
                    <input type="email" class="form-control" name="email" value="{{ $show_contacts->email }}"><br>
                    <label class="lbname">ທີ່ຢູ່</label>
                    <textarea type="text" name="address" class="form-control" id="descripts-{{ $show_contacts['id'] }}" placeholder="ລາຍລະອຽດ">{{ $show_contacts->address }}</textarea><br>
                    <button class="btn btn-warning" style="border-radius:5px;" type="submit">ອັບເເດດ</button>
                </div>
            </form>
            </div>
        </div>
    </div>
   @endif
    <!-- Modal Edit End -->
@endsection

@section('js')
<script>
    ClassicEditor
        .create(document.querySelector('#descript'))
        .catch(error => {
        console.log(error);
    });

    
        ClassicEditor
            .create(document.querySelector('#descripts-{{ $show_contacts['id'] }}'))
            .catch(error => {
            console.log(error);
        });

</script>
@stop

