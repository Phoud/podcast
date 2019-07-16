<div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column mb-30">
                            <li class="nav-divider">
                                Menu
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>ຕັ້ງຄ່າໜ້າເວັບ</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                            <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('admin.logo.web') }}">ໂລໂກ້</a>
                                                </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.type') }}">ໝວດໝູ່ <span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                                <a class="nav-link" href="{{ route('admin.contact') }}">ຂໍ້ມູນຕິດຕໍ່</a>
                                            </li>
                                        {{-- <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.magazine') }}">Magazine</a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.form.contact') }}">Form Contact</a>
                                        </li>
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.show.tag') }}">Tag</a>
                                        </li> --}}
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>ພອດແຄດ</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.show.add_podcast') }}">ເພີ່ມພອດແຄດ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.podcast') }}">ພອດແຄດທັງໝົດ</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>ວີດີໂອ</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.getAddVideo') }}">ເພີ່ມວີດີໂອ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.videos') }}">ວີດີໂອທັງໝົດ</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>ວາລະສານ</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.getAddMagazine') }}">ເພີ່ມວາລະສານ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('admin.magazine') }}" class="nav-link">ວາລະສານທັງໝົດ</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-newspaper"></i>ຂ່າວສານ</a>
                                <div id="submenu-6" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.getAddNews') }}">ເພີ່ມຂ່າວສານ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.blog') }}">ຂ່າວສານທັງໝົດ</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-divider">
                                ຜູ້ໃຊ້
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-user"></i>ແຂກຮັບເຊີນ</a>
                                <div id="submenu-7" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.getAddGuest') }}">ເພີ່ມແຂກຮັບເຊີນ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.getGuest') }}">ລາຍລະອຽດຂອງແຂກຮັບເຊີນ</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8"><i class="fas fa-user"></i>ຈັດການຜູ້ໃຊ້</a>
                                <div id="submenu-8" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('addUsers') }}">ເພີ່ມຜູ້ໃຊ້</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('getUsers') }}">ຜູ້ໃຊ້ທັງໝົດ</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-divider">
                                ລົດລາຍງານ
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9"><i class="fas fa-user"></i>ບົດລາຍງານທັງໝົດ </a>
                                <div id="submenu-9" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('userReport') }}">ລາຍງານຜູ້ໃຊ້</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('podcastReport') }}">ລາຍງານລາຍການພອດແຄດ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('videoReport') }}">ລາຍງານລາຍການທຸກທິດທາງ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('magazineReport') }}">ລາຍງານວາລະສານ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('topDownload') }}">ລາຍງານການດາວໂຫຼດ</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                        <br><br><br><br><br><br>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        