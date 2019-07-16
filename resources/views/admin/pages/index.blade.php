@extends('admin.common.main')
@section('content')
<div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">108 ອາຊີບ - ສື່ມີເດຍ</h2>
                                
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">

                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">ຈໍານວນສື່ມີເດຍທັງໝົດ</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">{{ $medias->count() }}</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span>ລາຍການ</span>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">ຈໍານວນວາລະສານທັງໝົດ</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">{{ $mags->count() }}</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                            <span>ສະບັບ</span>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue2"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">ຈໍານວນຜູ້ໃຊ້ທັງໝົດ</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">{{ $users->count() }}</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                            <span>ຄົນ</span>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue3"></div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted">ຂ່າວສານທັງໝົດ</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1">{{ $news->count() }}</h1>
                                        </div>
                                        <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                                            <span>ຂ່າວ</span>
                                        </div>
                                    </div>
                                    <div id="sparkline-revenue4"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- ============================================================== -->
                      
                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">ຂໍ້ມູນຕິດຕໍ່</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">ລ/ດ</th>
                                                        <th class="border-0">ຊື່</th>
                                                        <th class="border-0">ອີເມວ</th>
                                                        <th class="border-0">ຫົວຂໍ້</th>
                                                        <th class="border-0">ລາຍລະອຽດ</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($contacts as $con)
                                                    <tr>
                                                        <td>{{ $con->id }}</td>
                                                        
                                                        <td>{{ $con->name }}</td>
                                                        <td>{{ $con->email }}</td>
                                                        <td>{{ $con->subject }}</td>
                                                        <td><a href="{{ route('contactDetail', $con->id) }}" class="btn btn-outline-light">ອ່ານລາຍລະອຽດ</a></td>
                                                        
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

            @endsection