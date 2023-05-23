<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>       
    <title>Mahasiswa</title>
</head>
<body>
    <div id="nav" class="nav close">
        <div class="nav-item">
            <i class="fa-solid fa-wheat-awn"></i>
            <span>Koperasi Polibatam</span>
        </div>
        <div id="data" class="data animate__animated ">
            <div class="left-data">
                <div class="left-data-upper">
                    <div class="profile">
                        <img src="image/profil.webp" alt="">
                    </div>
                    <div class="profile-info">
                        <span>{{ Auth()->User()->nama }}</span>
                        <span>No : {{ $data["no_anggota"] }}</span>
                        <div class="state">
                            <i class="fa-solid fa-toggle-on active"></i>
                            <span>Active</span>
                            <!-- <i class="fa-solid fa-toggle-off inactive"></i>
                            <span>Inactive/span> -->
                        </div>
                    </div>
                </div>
                <div class="left-data-lower">
                    <h3>Data Pribadi</h3>
                    <div class="general-info">
                        <span>Tanggal bergabung</span>
                        <span>:</span>
                        <span>{{ $data["tgl_bergabung"] }}</span>
                    </div>
                    <div class="general-info">
                        <span>No KTP</span>
                        <span>:</span>
                        <span>{{ $data["no_ktp"] }}</span>
                    </div>
                    <div class="general-info">
                        <span>Masa Berlaku KTP</span>
                        <span>:</span>
                        <span>{{ $data["masa_berlaku_ktp"] }}</span>
                    </div>
                    <div class="general-info">
                        <span>Jenis Kelamin</span>
                        <span>:</span>
                        <span>{{ $data["jenis_kelamin"] }}</span>
                    </div>
                    <div class="general-info">
                        <span>Tempat &amp; Tgl. Lahir</span>
                        <span>:</span>
                        <span>{{ $data["tmpt_tgl_lahir"] }}</span>
                    </div>
                    <div class="general-info">
                        <span>Alamat(sesuai KTP)</span>
                        <span>:</span>
                        <span>{{ $data["alamat_ktp"] }}</span>
                    </div>
                    <div class="spesial-general-info">
                        <div>
                            <span>Alamat Tempat tinggal</span>
                            <span>(jika tidak sesuai KTP)</span>
                        </div>
                        <span class="line-1">:</span>
                        <span class="line-2">{{ $data["alamat"] }}</span>
                    </div>
                    <div class="general-info">
                        <span>No. Telepon</span>
                        <span>:</span>
                        <span>{{ $data["no_telp"] }}</span>
                    </div>
                    <div class="general-info">
                        <span>No. Telepon Rumah</span>
                        <span>:</span>
                        <span>{{ $data["no_telp_rumah"] }}</span>
                    </div>
                    <div class="general-info">
                        <span>Status Tempat Tinggal</span>
                        <span>:</span>
                        <span>{{ $data["status_tmpt_tggl"] }}</span>
                    </div>
                    <div class="general-info">
                        <span>Menempati Alamat Sejak</span>
                        <span>:</span>
                        <span>{{ $data["tinggal_sejak"] }}</span>
                    </div>                   
                </div>
            </div>
            <div class="middle-data">
                <div class="general-info">
                    <span>Pendidikan Terakhir</span>
                    <span>:</span>
                    <span>{{ $data["pend_terakhir"] }}</span>
                </div>
                <div class="general-info">
                    <span>Status Perkawinan</span>
                    <span>:</span>
                    <span>{{ $data["status_kawin"] }}</span>
                </div>
                <div class="general-info">
                    <span>Nama Istri/Suami</span>
                    <span>:</span>
                    <span>{{ $data["nama_pasangan"] }}</span>
                </div>
                <div class="general-info">
                    <span>Jumlah Anak</span>
                    <span>:</span>
                    <span>{{ $data["jumlah_anak"] }}</span>
                </div>
                <div class="general-info">
                    <span>Nama Ibu Kandung</span>
                    <span class="line-1">:</span>
                    <span class="line-2">{{ $data["nama_ibu_kandung"] }}</span>
                </div>
                <div class="general-info">
                    <span>NPWP Pribadi</span>
                    <span>:</span>
                    <span>{{ $data["npwp_pribadi"] }}</span>
                </div>
                <div class="general-info">
                    <span>Nama Ahli Waris</span>
                    <span>:</span>
                    <span>{{ $data["nama_ahli_waris"] }}</span>
                </div>
                <div class="general-info">
                    <span>Hubungan Ahli Waris</span>
                    <span>:</span>
                    <span>{{ $data["hubungan_ahli_waris"] }}</span>
                </div>
                <h3>Data Pekerjaan</h3>
                <div class="general-info">
                    <span>No. Telp ext Kantor</span>
                    <span>:</span>
                    <span>{{ $data["no_telp_kantor"] }}</span>
                </div>
                <div class="general-info">
                    <span>N.I.K</span>
                    <span>:</span>
                    <span>{{ $data["nik"] }}</span>
                </div>
                <div class="general-info">
                    <span>Nomor Rekening BNI 46</span>
                    <span>:</span>
                    <span>{{ $data["no_rekening"] }}</span>
                </div>
                <div class="general-info">
                    <span>Divisi/Bagian/Jabatan</span>
                    <span>:</span>
                    <span>{{ $data["jabatan"] }}</span>
                </div>
                <div class="general-info">
                    <span>Tgl. Masuk ke Perusahaan</span>
                    <span>:</span>
                    <span>{{ $data["tgl_mulai_kerja"] }}</span>
                </div>
                <div class="general-info">
                    <span>Status Karyawan</span>
                    <span>:</span>
                    <span>{{ $data["status_karyawan"] }}</span>
                </div>
            </div>
            <div class="right-data">
                <h3>Tanda Tangan</h3>
                <img src="image/ttd.png" alt="">
                <div class="note">
                    <span>Catatan :</span>
                    <span>
                        <i>Bersedia membayar Simpanan Pokok sebesar Rp. 100,000,- dan memenuhi semua ketentuan yang tertera dalam 
                        Anggaran Dasar, Anggaran Rumah Tangga, Peraturan Khusus dan kebijakan-kebijakan lainnya yang ada di koperasi polibatam</i>
                    </span>
                    <span>
                        Regards - KPB Polibatam
                    </span>
                </div>
                <div>
                    <button class="butt-bantuan" name="bantuan" id="bantuan">
                        <i class="fa-solid fa-inbox"></i>
                        <span>Bantuan</span>
                    </button>
                </div>
            </div>
        </div>
        <div id="menu" class="drop-menu">
            <i id="toggle" class="fa-solid fa-chevron-down toggle"></i>
        </div>
    </div>
    <div id="container" class="container">
        <div class="header">
            <div class="info-profile">
                <img src="image/profil.webp" alt="">
                <div class="more-info">
                    <span>{{ Auth()->User()->nama }}</span>
                    <span>No : {{ $data["no_anggota"] }}</span>
                    <button class="log-out" id="log-out" type="button" >
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Log Out</span>
                    </button>
                    
                </div>
            </div>
            <div class="info-tabungan">
                <div class="saldo">
                    <span>Jumlah Dibayar Per bulan :</span>
                    <span>Rp 100.000,00</span>
                </div>
                <div class="saldo">
                    <span>Lama Bergabung :</span>
                    <span>40 Bulan</span>
                </div>
                <div class="saldo">
                    <span>Saldo Per 27-03-2023 :</span>
                    <span>Rp 4.000.000,00</span>
                </div>
                <div class="saldo">
                    <span>Pinjaman :</span>
                    <button type="button" id="btn_info" class="btn_info">Info</button>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="title">
                <h3>Riwayat Tabungan</h3>
            </div>
            <div class="info-tabel">

            </div>
        </div>
    </div>

    <!-- Modal log out -->
    <div class="modal-keluar" id="modal-keluar">
        <div id="modal-content-keluar" class="modal-content-keluar">
            <div>
                <div class="header_modal">
                    <span>Modal Konfirmasi</span>
                </div>
                <div class="pesan">
                    <h3>Anda yakin ingin meninggalkan halaman?</h3>
                </div>
            </div>
            <div class="footer_modal">
                <button type="button" class="btn_close" id="btn-close">
                    <span>Batalkan</span>
                </button>
                <button type="button" class="btn_keluar" id="btn-keluar" onclick="getElementById('logout').submit();">
                    <span>Yakin</span>
                </button>
                <form action="home/logout" id="logout" method="post">
                    @csrf
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Pinjaman -->
    <div class="modal-pinjaman" id="modal-pinjaman">
        <div id="modal-content-pinjaman" class="modal-content-pinjaman">
            <div>
                <div class="header_pinjaman">
                    <span>Modal Pinjaman</span>
                </div>
                <div class="pesan_pinjaman">
                    <h3>Mohon maaf saat ini pinjaman belum tersedia!!!</h3>
                    <h5>Coba hubungi pihak polibatam terkait masalah ini....</h5>
                </div>
            </div>
            <div class="footer_pinjaman">
                <button type="button" class="btn_tutup_pinjaman" id="btn-tutup-pinjaman">
                    <span>Tutup</span>
                </button>
                <button type="button" class="btn_ajukan_pinjaman" id="btn-ajukan-pinjaman">
                    <span>Ajukan</span>
                </button>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>