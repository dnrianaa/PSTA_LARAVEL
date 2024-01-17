<div class="polman-nav-static-top">
    <div class="float-left">
        <a href="">
            <img src="{{asset('assets/image/palingbaru_logo.png') }}" style="height: 45px ;" />
        </a>
    </div>
    <div class="polman-menu">
        <div style="padding-top: 15px; margin-right: -30px;">
            @if (Session::has('username'))
            Hai, <b>{{ Session::get('username') }}</b> ({{ Session::get('png_role', 'Pesan Selamat Datang') }})
            @else
            Selamat datang, silakan login.
            @endif

        </div>


        <div class="polman-menu-bar">
            <div class="float-right">
                <div class="fa fa-bars fa-2x" style="margin-top: 9px; cursor: pointer;" aria-hidden="true" data-toggle="collapse" data-target="#menu" aria-expanded="false" aria-controls="menu"></div>
            </div>
        </div>
    </div>

    <div class="polman-nav-static-right collapse scrollstyle" id="menu">
        <div id="accordions" role="tablist" aria-multiselectable="true">
            <div class="list-group">
                <!-- <a class="list-group-item list-group-item-action polman-username" style="border-radius: 0px; border: none; background-color: #EEE;">
                Hai,&nbsp;<b></b>
            </a> -->
                <a href='/dashboard' class='list-group-item list-group-item-action' style='border-radius: 0px; border: none; padding-left: 22px; display: inherit;'>
                    <i class='fa fa-home fa-lg fa-pull-left'></i>Dashboard
                </a>
                <a href='#menu1' role='tab' class='list-group-item list-group-item-action' data-toggle='collapse' data-parent='#accordion' aria-expanded='false' aria-controls='menu1' style='border-radius: 0px; border: none;'>
                    <i class='fa fa-chevron-down fa-lg fa-pull-left'></i>Kelola Pengguna
                </a>
                <div id='menu1' class='collapse' role='tabpanel'>

                    <a href="Pebimbing_pengguna" class="list-group-item list-group-item-action " style="border-radius: 0px; border: none; padding-left: 47px; display: inherit;"><b>–&nbsp;&nbsp;</b>Pembimbing & Penguji</a>
                    <a href="kategori_penilaian" class="list-group-item list-group-item-action " style="border-radius: 0px; border: none; padding-left: 47px; display: inherit;"><b>–&nbsp;&nbsp;</b>Kategori Penilaian </a>
                    <a href="/dashboardKelola_tahun_ajaran" class="list-group-item list-group-item-action " style="border-radius: 0px; border: none; padding-left: 47px; display: inherit;"><b>–&nbsp;&nbsp;</b>Tahun Ajaran</a>
                    <a href="/dashboardaKelolaMahasiswa" class="list-group-item list-group-item-action " style="border-radius: 0px; border: none; padding-left: 47px; display: inherit;"><b>–&nbsp;&nbsp;</b>Mahasiswa</a>
                    <a href="/Indexregister" class="list-group-item list-group-item-action " style="border-radius: 0px; border: none; padding-left: 47px; display: inherit;"><b>–&nbsp;&nbsp;</b>Pengguna</a>
                </div>

                <a href='#menu2' role='tab' class='list-group-item list-group-item-action' data-toggle='collapse' data-parent='#accordion' aria-expanded='false' aria-controls='menu1' style='border-radius: 0px; border: none;'>
                    <i class='fa fa-chevron-down fa-lg fa-pull-left'></i>Laporan
                </a>
                <div id='menu2' class='collapse' role='tabpanel'>
                
                    <a href="dashboardaHasilsidang" class="list-group-item list-group-item-action " style="border-radius: 0px; border: none; padding-left: 47px; display: inherit;"><b>–&nbsp;&nbsp;</b>Hasil Sidang </a>
                    <a href="dashboardaSidangBAPSidang" class="list-group-item list-group-item-action " style="border-radius: 0px; border: none; padding-left: 47px; display: inherit;"><b>–&nbsp;&nbsp;</b>Sidang BAP TA </a>
                    <a href="dashboardaPenilaianSidangTa" class="list-group-item list-group-item-action " style="border-radius: 0px; border: none; padding-left: 47px; display: inherit;"><b>–&nbsp;&nbsp;</b>penilaian Sidang TA</a>
                </div>
                <a href="/login" class="list-group-item list-group-item-action" style="border-radius: 0px; border: none; padding-left: 23px;">
                    <i class="fa fa-sign-out fa-lg fa-pull-left"></i>Logout
                </a>

            </div>
        </div>


    </div>
</div>
</div>