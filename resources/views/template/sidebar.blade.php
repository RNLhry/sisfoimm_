<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            @if (Auth::user()->roles->id == 1)
                <ul>
                    <li class="active">
                        <a href="/home"><img src="{{ asset('assets/img/icons/dashboard.svg') }}" alt="img"><span>
                                Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/komisariat"><img src="{{ asset('assets/img/icons/database.svg') }}"
                                alt="img"><span>
                                Data Komisariat</span>
                        </a>
                    </li>
                    <li class="submenu">
                        <a href="/kader"><img src="{{ asset('assets/img/icons/database.svg') }}"
                                alt="img"><span>Data Kader</span><span class="menu-arrow"></span></a>
                        <ul>
                            @foreach ($komisariat as $k)
                                <li><a href="/kader/{{ $k->id }}">{{ $k->nama_komisariat }}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="/galeri"><img src="{{ asset('assets/img/icons/image.svg') }}" alt="img"><span>
                                Galeri</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="/galeri">List Galeri</a></li>
                            <li><a href="/galeri/tambah">Add Galeri</a></li>
                            <!-- <li><a href="importpurchase.html">Import Galeri</a></li> -->
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/trello.svg') }}"
                                alt="img"><span>
                                Informasi</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="/informasi">List Informasi</a></li>
                            <li><a href="/informasi/tambah">Add Informasi</a></li>
                            <li><a href="/categoriInformasi">Kategori</a></li>
                            <!-- <li><a href="importpurchase.html">Import Informasi</a></li> -->
                        </ul>
                    </li>
             
                    <li>
                        <a href="/user"><img src="{{ asset('assets/img/icons/users.svg') }}"
                                alt="img"><span>
                                Data User</span>
                        </a>
                    </li>
                    <!-- <li class="submenu">
                        <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/setting.svg') }}"
                                alt="img"><span>
                                Settings</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="generalsettings.html">General Settings</a></li>
                            <li><a href="emailsettings.html">Email Settings</a></li>
                        </ul>
                    </li> -->
                </ul>
            @endif
            @if (Auth::user()->roles->id == 2)
                <ul>
                    <li class="active">
                        <a href="/home"><img src="{{ asset('assets/img/icons/dashboard.svg') }}" alt="img"><span>
                                Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/kaderKmst"><img src="{{ asset('assets/img/icons/users1.svg') }}" alt="img"><span>
                                Data Kader</span>
                        </a>
                    </li>
                    <li class="submenu">
                        <a href="javascript:void(0);"><img src="{{ asset('assets/img/icons/trello.svg') }}"
                                alt="img"><span>
                                Informasi</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="/informasi2">List Informasi</a></li>
                            <li><a href="/informasi/tambah">Add Informasi</a></li>
                        </ul>
                    </li>
            @endif
        </div>
    </div>
</div>
