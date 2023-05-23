@extends('layout.main')

@section('container')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/stylenasabah.css">
    <div class="odes-text">Daftar Anggota</div>
    <div class="container mt-4" id="container-odes-text">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="button_tambah" id="tambah" name="tambah">
                            <i class="fa-solid fa-user-plus"></i>            
                            <span>&nbsp;Tambah</span>
                        </button>
                    </div>
                    <div class="card-body" id="card-body">

                        <table id="myTable" class="table table-borderless styled-table" border="0" >
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>No. Anggota</th>
                                    <th>No. KTP</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                @if($item->role_id == 3 & $item->status_user == 1)
                                    <tr class="">
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->no_anggota }}</td>
                                        <td>{{ $item->no_ktp }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->no_telepon }}</td>
                                        <td>@if($item->status_anggota == 1)
                                            <i class="fa-solid fa-toggle-on active"></i>
                                            @elseif($item->status_anggota == 0)
                                            <i class="fa-solid fa-toggle-off inactive"></i>
                                            @endif
                                            </td>
                                        <td class="action">
                                            <button type="button" value='{{ $item->id }}' class="viewNasabahBtn btn-view">View</button>
                                            <button type="button" value='{{ $item->id }}' class="deleteNasabahBtn btn-delete">Delete</button>
                                        </td>
                                    </tr>
                                @endif
                                @endforeach
                            </tbody>
                            
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal pilihan -->
    <div class="modal_pilihan" id="modal_pilihan">
        <div class="modal_pilihan_content">
            <div class="pilihan_content_card" id="card-data-tunggal">
                <span class="pilihan_content_card_text" >Tambah Anggota</span>
                <i class="fa-solid fa-person fa-2xl icon-person"></i>
                <span class="pilihan_content_card_detail">Data Tunggal</span>
            </div>
            <div class="pilihan_content_card" id="card-data-kelompok">
                <span class="pilihan_content_card_text">Tambah Anggota</span>
                <i class="fa-solid fa-people-group fa-2xl"></i>
                <span class="pilihan_content_card_detail">Data Kelompok</span>
            </div>
        </div>
    </div>

    <!-- modal export file -->
    <div class="modal_export" id="modal_export">
        <div id="" class="modal_content">
            <div class="wrapper">
                <header>Choose Excel File</header>
                <form action="#" id="form" enctype="multipart/form-data" method="post">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input class="file-input" type="file" id="file" name="file" hidden>
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p>Browse File to Upload</p>
                </form>
                <section class="progress-area"></section>
                <section class="uploaded-area"></section>
                <div class="button_wrapper">
                    <button id="remove" class="button_remove" >Remove</button>
                    <button id="load" class="button_load" >Load</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal data kelompok -->
    <div class="modal_data" id="modal_data">
        <div id="" class="modal_content_data">
            <div class="top_modal">
                <span>Daftar Anggota</span>
            </div>
            <div class="context">
                <div class="upper_context">
                    
                </div>
                <div class="lower_context">
                    <button id="cancel" class="button_cancel">Cancel</button>
                    <button id="import" class="button_import">Import</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal data tunggal -->
    <div class="modal_data_tunggal" id="modal_data_tunggal">
        <div id="" class="modal_content_data">
            <div class="top_modal">
                <span>Formulir Daftar Anggota</span>
            </div>
            <div class="context">
                <form id="tambahdatatunggal" method="POST">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="data_form" id="data-detail-anggota">
                        <div class="input-data-left">
                            <div class="input-data">
                                <span>Nama</span>
                                <span>:</span>
                                <input type="text" name="add_nama" id="add_nama" class="form-control form-input-data" />
                            </div>
                            <div class="input-data">
                                <span>Email</span>
                                <span>:</span>
                                <input type="text" name="add_email" id="add_email" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Password</span>
                                <span>:</span>
                                <input type="text" name="add_password" id="add_password" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Tanggal Bergabung</span>
                                <span>:</span>
                                <input type="text" name="tgl_bergabung" id="tgl_bergabung" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Nomor KTP</span>
                                <span>:</span>
                                <input type="text" name="no_ktp" id="no_ktp" class="form-control form-input-data" />
                            </div>
                            <div class="input-data">
                                <span>Masa Berlaku KTP</span>
                                <span>:</span>
                                <input type="text" name="masa_berlaku_ktp" id="masa_berlaku_ktp" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Jenis Kelamin</span>
                                <span>:</span>
                                <input type="radio" name="jenis_kelamin" id="laki_laki" value="laki_laki" />
                                <label for="laki_laki">Laki-Laki</label>
                                <input type="radio" name="jenis_kelamin" id="perempuan" value="perempuan" />
                                <label for="perempuan">Perempuan</label>
                            </div>
                            <div class="input-data">
                                <span>Tempat & Tgl Lahir</span>
                                <span>:</span>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Alamat Sesuai KTP</span>
                                <span>:</span>
                                <input type="text" name="alamat_ktp" id="alamat_ktp" class="form-control form-input-data"/>
                            </div>
                            <div class="spesial-input-data">
                                <div>
                                    <span>Alamat Tempat tinggal</span>
                                    <span>(jika tidak sesuai KTP)</span>
                                </div>
                                <span class="line-1">:</span>
                                <input type="text" name="alamat_tak_sesuai_ktp" id="alamat_tak_sesuai_ktp" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>No. Telepon</span>
                                <span>:</span>
                                <input type="text" name="no_telepon" id="no_telepon" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>No. Telepon Rumah</span>
                                <span>:</span>
                                <input type="text" name="no_telepon_rumah" id="no_telepon_rumah" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Status Tempat Tinggal</span>
                                <span>:</span>
                                <input type="text" name="status_tempat_tinggal" id="status_tempat_tinggal" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Menempati Alamat Sejak</span>
                                <span>:</span>
                                <input type="text" name="menempati_sejak" id="menempati_sejak" class="form-control form-input-data"/>
                            </div>
                        </div>
                        <div class="input-data-right">
                            <div class="input-data">
                                <span>Pendidikan Terakhir</span>
                                <span>:</span>
                                <input type="text" name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Status Perkawinan</span>
                                <span>:</span>
                                <input type="text" name="status_perkawinan" id="status_perkawinan" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Nama Istri/Suami</span>
                                <span>:</span>
                                <input type="text" name="nama_pasangan" id="nama_pasangan" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Jumlah Anak</span>
                                <span>:</span>
                                <input type="text" name="jumlah_anak" id="jumlah_anak" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Nama Ibu Kandung</span>
                                <span>:</span>
                                <input type="text" name="nama_ibu_kandung" id="nama_ibu_kandung" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>NPWP Pribadi</span>
                                <span>:</span>
                                <input type="text" name="npwp_pribadi" id="npwp_pribadi" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Nama Ahli Waris</span>
                                <span>:</span>
                                <input type="text" name="nama_ahli_waris" id="nama_ahli_waris" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Hubungan Ahli Waris</span>
                                <span>:</span>
                                <input type="text" name="hub_ahli_waris" id="hub_ahli_waris" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>No. Telp ext Kantor</span>
                                <span>:</span>
                                <input type="text" name="no_telp_ext_kantor" id="no_telp_ext_kantor" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>N.I.K</span>
                                <span>:</span>
                                <input type="text" name="nik" id="nik" class="form-control form-input-data" />
                            </div>
                            <div class="input-data">
                                <span>No Rekening BNI 46</span>
                                <span>:</span>
                                <input type="text" name="no_rek_bni" id="no_rek_bni" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Divisi/Bagian/Jabatan</span>
                                <span>:</span>
                                <input type="text" name="jabatan" id="jabatan" class="form-control form-input-data" />
                            </div>
                            <div class="input-data">
                                <span>Tanggal Masuk Perusahaan</span>
                                <span>:</span>
                                <input type="text" name="tgl_masuk_perusahaan" id="tgl_masuk_perusahaan" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Status Karyawan</span>
                                <span>:</span>
                                <input type="text" name="status_karyawan" id="status_karyawan" class="form-control form-input-data" />
                            </div>
                        </div>
                    </div>
                    <div class="lower_context">
                        <button type="button" id="cancel_data_tunggal" class="button_cancel_data_tunggal">Batalkan</button>
                        <button type="submit" id="confirm_data_tunggal" class="button_confirm_data_tunggal">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal view anggota -->
    <div class="modal_view_anggota" id="modal_view_anggota">
        <div id="" class="modal_content_data">
            <div class="top_modal">
                <span>Detail Informasi</span>
            </div>
            <div class="context">
                <form id="simpanviewdetailanggota">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="detail_data_anggota" id="detail_data_anggota" >
                        <div class="input-data-left">
                            <div class="data-profile">
                                <img src="image/profil.webp" alt="">
                                <img src="image/profil.webp" alt="" class="img-hover" >
                                <div class="data-profile-info">
                                    <span id="view_nama">Nama</span>
                                    <span id="view_no_anggota">No. Anggota</span>
                                </div>
                            </div>
                            <div class="input-data">
                                <span>Email</span>
                                <span>:</span>
                                <span id="view_email">2</span>
                            </div>
                            <div class="input-data">
                                <span>Tanggal Bergabung</span>
                                <span>:</span>
                                <span id="view_tanggal_bergabung"></span>
                            </div>
                            <div class="input-data">
                                <span>Nomor KTP</span>
                                <span>:</span>
                                <span id="view_no_ktp">-</span>
                            </div>
                            <div class="input-data">
                                <span>Masa Berlaku KTP</span>
                                <span>:</span>
                                <span id="view_masa_berlaku_ktp">-</span>
                            </div>
                            <div class="input-data">
                                <span>Jenis Kelamin</span>
                                <span>:</span>
                                <span id="view_jenis_kelamin">-</span>
                            </div>
                            <div class="input-data">
                                <span>Tempat & Tgl Lahir</span>
                                <span>:</span>
                                <span id="view_tempat_lahir">-</span>
                            </div>
                            <div class="input-data">
                                <span>Alamat Sesuai KTP</span>
                                <span>:</span>
                                <span id="view_alamat_tinggal_ktp">-</span>
                            </div>
                            <div class="spesial-input-data">
                                <div>
                                    <span>Alamat Tempat tinggal</span>
                                    <span>(jika tidak sesuai KTP)</span>
                                </div>
                                <span class="line-1">:</span>
                                <span class="line-2" id="view_alamat_tinggal">-</span>
                            </div>
                            <div class="input-data">
                                <span>No. Telepon</span>
                                <span>:</span>
                                <span id="view_no_telp">-</span>
                            </div>
                            <div class="input-data">
                                <span>No. Telepon Rumah</span>
                                <span>:</span>
                                <span id="view_no_telp_rumah">-</span>
                            </div>
                            <div class="input-data">
                                <span>Status Tempat Tinggal</span>
                                <span>:</span>
                                <span id="view_status_tempat_tinggal">-</span>
                            </div>
                            <div class="input-data">
                                <span>Menempati Alamat Sejak</span>
                                <span>:</span>
                                <span id="view_menempati_sejak">-</span>
                            </div>
                        </div>
                        <div class="input-data-right">
                            <div class="input-data">
                                <span>Pendidikan Terakhir</span>
                                <span>:</span>
                                <span id="view_pendidikan_terakhir" >-</span>
                            </div>
                            <div class="input-data">
                                <span>Status Perkawinan</span>
                                <span>:</span>
                                <span id="view_status_perkawinan">-</span>
                            </div>
                            <div class="input-data">
                                <span>Nama Istri/Suami</span>
                                <span>:</span>
                                <span id="view_pasangan">-</span>
                            </div>
                            <div class="input-data">
                                <span>Jumlah Anak</span>
                                <span>:</span>
                                <span id="view_jumlah_anak">-</span>
                            </div>
                            <div class="input-data">
                                <span>Nama Ibu Kandung</span>
                                <span>:</span>
                                <span id="view_nama_ibu_kandung">-</span>
                            </div>
                            <div class="input-data">
                                <span>NPWP Pribadi</span>
                                <span>:</span>
                                <span id="view_npwp_pribadi">-</span>
                            </div>
                            <div class="input-data">
                                <span>Nama Ahli Waris</span>
                                <span>:</span>
                                <span id="view_nama_ahli_waris">-</span>
                            </div>
                            <div class="input-data">
                                <span>Hubungan Ahli Waris</span>
                                <span>:</span>
                                <span id="hubungan_ahli_waris">-</span>
                            </div>
                            <div class="input-data">
                                <span>No. Telp ext Kantor</span>
                                <span>:</span>
                                <span id="view_no_telp_kantor">-</span>
                            </div>
                            <div class="input-data">
                                <span>N.I.K</span>
                                <span>:</span>
                                <span id="view_nik">-</span>
                            </div>
                            <div class="input-data">
                                <span>No Rekening BNI 46</span>
                                <span>:</span>
                                <span id="view_no_rek_bni">-</span>
                            </div>
                            <div class="input-data">
                                <span>Divisi/Bagian/Jabatan</span>
                                <span>:</span>
                                <span id="view_divisi">-</span>
                            </div>
                            <div class="input-data">
                                <span>Tanggal Masuk Perusahaan</span>
                                <span>:</span>
                                <span id="view_tgl_masuk_perusahaan">-</span>
                            </div>
                            <div class="input-data">
                                <span>Status Karyawan</span>
                                <span>:</span>
                                <span id="view_status_karyawan">-</span>
                            </div>
                        </div>
                    </div>
                    <div class="form_detail_data_anggota" id="form_detail_data_anggota">
                        <div class="input-data-left">
                            <div class="data-profile">
                                <img src="image/profil.webp" alt="">
                                <img src="image/profil.webp" alt="" class="img-hover" >
                                <div class="data-profile-info">
                                    <input type="text" name="nama" id="input_nama" class="form-control form-input-data" />
                                    <input type="text" name="no_anggota" id="input_no_anggota" class="form-control form-input-data" />
                                </div>
                            </div>
                            <div class="input-data">
                                <span>Email</span>
                                <span>:</span>
                                <input type="text" name="email" id="input_email" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Tanggal Bergabung</span>
                                <span>:</span>
                                <input type="text" name="tgl_bergabung" id="input_tgl_bergabung" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Nomor KTP</span>
                                <span>:</span>
                                <input type="text" name="no_ktp" id="input_no_ktp" class="form-control form-input-data" />
                            </div>
                            <div class="input-data">
                                <span>Masa Berlaku KTP</span>
                                <span>:</span>
                                <input type="text" name="masa_berlaku_ktp" id="input_masa_berlaku_ktp" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Jenis Kelamin</span>
                                <span>:</span>
                                <input type="radio" name="jenis_kelamin" id="input_laki_laki" value="laki_laki" />
                                <label for="input_laki_laki">Laki-Laki</label>
                                <input type="radio" name="jenis_kelamin" id="input_perempuan" value="perempuan" />
                                <label for="input_perempuan">Perempuan</label>
                            </div>
                            <div class="input-data">
                                <span>Tempat & Tgl Lahir</span>
                                <span>:</span>
                                <input type="text" name="tempat_lahir" id="input_tempat_lahir" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Alamat Sesuai KTP</span>
                                <span>:</span>
                                <input type="text" name="alamat_ktp" id="input_alamat_ktp" class="form-control form-input-data"/>
                            </div>
                            <div class="spesial-input-data">
                                <div>
                                    <span>Alamat Tempat tinggal</span>
                                    <span>(jika tidak sesuai KTP)</span>
                                </div>
                                <span class="line-1">:</span>
                                <input type="text" name="alamat_tak_sesuai_ktp" id="input_alamat_tak_sesuai_ktp" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>No. Telepon</span>
                                <span>:</span>
                                <input type="text" name="no_telepon" id="input_no_telepon" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>No. Telepon Rumah</span>
                                <span>:</span>
                                <input type="text" name="no_telepon_rumah" id="input_no_telepon_rumah" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Status Tempat Tinggal</span>
                                <span>:</span>
                                <input type="text" name="status_tempat_tinggal" id="input_status_tempat_tinggal" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Menempati Alamat Sejak</span>
                                <span>:</span>
                                <input type="text" name="menempati_sejak" id="input_menempati_sejak" class="form-control form-input-data"/>
                            </div>
                        </div>
                        <div class="input-data-right">
                            <div class="input-data">
                                <span>Pendidikan Terakhir</span>
                                <span>:</span>
                                <input type="text" name="pendidikan_terakhir" id="input_pendidikan_terakhir" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Status Perkawinan</span>
                                <span>:</span>
                                <input type="text" name="status_perkawinan" id="input_status_perkawinan" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Nama Istri/Suami</span>
                                <span>:</span>
                                <input type="text" name="nama_pasangan" id="input_nama_pasangan" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Jumlah Anak</span>
                                <span>:</span>
                                <input type="text" name="jumlah_anak" id="input_jumlah_anak" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Nama Ibu Kandung</span>
                                <span>:</span>
                                <input type="text" name="nama_ibu_kandung" id="input_nama_ibu_kandung" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>NPWP Pribadi</span>
                                <span>:</span>
                                <input type="text" name="npwp_pribadi" id="input_npwp_pribadi" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Nama Ahli Waris</span>
                                <span>:</span>
                                <input type="text" name="nama_ahli_waris" id="input_nama_ahli_waris" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Hubungan Ahli Waris</span>
                                <span>:</span>
                                <input type="text" name="hub_ahli_waris" id="input_hub_ahli_waris" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>No. Telp ext Kantor</span>
                                <span>:</span>
                                <input type="text" name="no_telp_ext_kantor" id="input_no_telp_ext_kantor" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>N.I.K</span>
                                <span>:</span>
                                <input type="text" name="nik" id="input_nik" class="form-control form-input-data" />
                            </div>
                            <div class="input-data">
                                <span>No Rekening BNI 46</span>
                                <span>:</span>
                                <input type="text" name="no_rek_bni" id="input_no_rek_bni" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Divisi/Bagian/Jabatan</span>
                                <span>:</span>
                                <input type="text" name="jabatan" id="input_jabatan" class="form-control form-input-data" />
                            </div>
                            <div class="input-data">
                                <span>Tanggal Masuk Perusahaan</span>
                                <span>:</span>
                                <input type="text" name="tgl_masuk_perusahaan" id="input_tgl_masuk_perusahaan" class="form-control form-input-data"/>
                            </div>
                            <div class="input-data">
                                <span>Status Karyawan</span>
                                <span>:</span>
                                <input type="text" name="status_karyawan" id="input_status_karyawan" class="form-control form-input-data" />
                                <input type="hidden" name="nasabah_id" id="input_nasabah_id"  />
                            </div>
                        </div>
                    </div>
                    <div class="lower_context">
                        <button type="button" id="tutup_detail_anggota" class="button_close_detail_anggota">Tutup</button>
                        <button type="button" id="ubah_detail_anggota" class="editNasabahBtn button_ubah_detail_anggota">Ubah</button>
                        <button type="submit" id="simpan_detail_anggota" class="button_simpan_detail_anggota">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal konfirmasi -->
    <div class="modal-konfirmasi" id="modal-konfirmasi">
        <div id="modal-content-konfirmasi" class="modal-content-konfirmasi">
            <div>
                <div class="header_modal">
                    <span class="pesan-span-title">Modal Konfirmasi</span>
                </div>
                <div class="pesan">
                    <span class="pesan-span">Hapus pengguna dari Sistem?</span>
                </div>
            </div>
            <div class="footer_modal">
                <button type="button" class="btn_close" id="btn-close-modal">
                    <span>Batalkan</span>
                </button>
                <button type="button" class="btn_keluar" id="btn-konfirmasi" >
                    <span>Yakin</span>
                </button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script type="text/javascript">

        let butt_tambah = document.getElementById("tambah")
        let modal_export = document.getElementById("modal_export")
        let modal_data = document.getElementById("modal_data")
        let modal_pilihan = document.getElementById("modal_pilihan")
        let modal_data_tunggal = document.getElementById('modal_data_tunggal')
        let modal_view_anggota = document.getElementById('modal_view_anggota')
        let butt_remove = document.getElementById("remove")
        let butt_load = document.getElementById("load")
        let butt_cancel = document.getElementById("cancel")
        let butt_import = document.getElementById("import")
        
        let butt_cancel_data_tunggal = document.getElementById("cancel_data_tunggal")
        let butt_confirm_data_tunggal = document.getElementById("confirm_data_tunggal")

        let butt_close_detail_anggota = document.getElementById("tutup_detail_anggota")
        let butt_ubah_detail_anggota = document.getElementById("ubah_detail_anggota")
        let butt_simpan_detail_anggota = document.getElementById("simpan_detail_anggota")

        let detail_data_anggota = document.getElementById("detail_data_anggota")
        let form_detail_data_anggota = document.getElementById("form_detail_data_anggota")

        butt_ubah_detail_anggota.addEventListener("click",()=>{
            butt_simpan_detail_anggota.style.display = 'flex';
            butt_ubah_detail_anggota.style.display = 'none';
            form_detail_data_anggota.style.display = 'flex';
            detail_data_anggota.style.display = 'none';
        })
        butt_close_detail_anggota.addEventListener("click",()=>{
            modal_view_anggota.style.display = "none";
            butt_simpan_detail_anggota.style.display = 'none';
            butt_ubah_detail_anggota.style.display = 'flex';
            form_detail_data_anggota.style.display = 'none';
            detail_data_anggota.style.display = 'flex';
        })

        let data_tunggal = document.getElementById("card-data-tunggal")
        let data_kelompok = document.getElementById("card-data-kelompok")

        data_tunggal.addEventListener("click",()=>{
            modal_data_tunggal.style.display = 'flex';
            modal_pilihan.style.display = 'none';
        })

        data_kelompok.addEventListener("click",()=>{
            modal_export.style.display = 'flex';
            modal_pilihan.style.display = 'none';
        })
        butt_tambah.addEventListener("click",()=>{
            modal_pilihan.style.display = 'flex';
        })

        butt_cancel_data_tunggal.addEventListener("click",()=>{
            modal_data_tunggal.style.display = 'none';
        })
        // butt_load.addEventListener("click",()=>{
        //     modal_data.style.display = 'flex';
        // })

        butt_cancel.addEventListener("click",()=>{
            modal_data.style.display = 'none';
            let row = document.getElementsByClassName('inrow')
            row[0].remove()
            file_qty = 0
            document.getElementById("file").value = null;
        })

        window.addEventListener("click",(e)=>{
            if (e.target == modal_export) {
                modal_export.style.display = 'none';
            }else if(e.target == modal_data){
                modal_data.style.display = 'none';
            }else if(e.target == modal_data_tunggal){
                modal_data_tunggal.style.display = 'none';
            }else if(e.target == modal_pilihan){
                modal_pilihan.style.display = 'none';
            }else if(e.target == modal_view_anggota){
                modal_view_anggota.style.display = 'none';
            }
        })

        butt_remove.addEventListener("click",() => {
            let row = document.getElementsByClassName('inrow')
            row[0].remove()
            file_qty = 0
            document.getElementById("file").value = null;
        })

        // let form = document.querySelector("form")
        let form = document.getElementById("form")
        let fileInput = document.querySelector(".file-input")
        let progressArea = document.querySelector(".progress-area")
        let uploadedArea = document.querySelector(".uploaded-area")
        let file_qty = 0

        form.addEventListener("click", () => {
            fileInput.click();
        });

        fileInput.onchange = ({ target }) => {
            let file = target.files[0];
            if ( file_qty == 0 && file) {
                let fileName = file.name;
                if(fileName.length >= 12){
                    let splitName = fileName.split('.');
                    fileName = splitName[0].substring(0, 13) + "... ." + splitName[1];
                }
                uploadFile(fileName);
                file_qty = 1;
            }
        }

        function uploadFile(name){
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "");
            xhr.upload.addEventListener("progress", ({loaded, total}) =>{
                let fileLoaded = Math.floor((loaded / total) * 100);
                let fileTotal = Math.floor(total / 1000);
                let fileSize;
                (fileTotal < 1024) ? fileSize = fileTotal + " KB" : fileSize = (loaded / (1024*1024)).toFixed(2) + " MB";
                let progressHTML = `<li class="inrow">
                                    <i class="fas fa-file-alt"></i>
                                    <div class="incontent">
                                        <div class="details">
                                        <span class="name">${name} • Uploading</span>
                                        <span class="percent">${fileLoaded}%</span>
                                        </div>
                                        <div class="progress-bar">
                                        <div class="progress" style="width: ${fileLoaded}%"></div>
                                        </div>
                                    </div>
                                    </li>`;
                uploadedArea.classList.add("onprogress");
                progressArea.innerHTML = progressHTML;
                if(loaded == total){
                    progressArea.innerHTML = "";
                    let uploadedHTML = `<li class="inrow">
                                            <div class="incontent upload">
                                            <i class="fas fa-file-alt"></i>
                                            <div class="details">
                                                <span class="name">${name} • Uploaded</span>
                                                <span class="size">${fileSize}</span>
                                            </div>
                                            </div>
                                            <i class="fas fa-check"></i>
                                        </li>`;
                    uploadedArea.classList.remove("onprogress");
                    uploadedArea.insertAdjacentHTML("afterbegin", uploadedHTML);
                }
            });

            let data = new FormData(form);
            xhr.send(data);
        }

        // butt_load.addEventListener("click",()=>{
        //     modal_data.style.display = 'flex';
            
        // })

        $(butt_load).click(function(){
            var data = new FormData();
            data.append('file', $("#file")[0].files[0]);
            $.ajax({
                url: "/nasabah/read_file",
                method: "POST",
                dataType: "text",
                data: data,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $('.upper_context').html(response);
                    modal_data.style.display = 'flex';
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    alert('Error: ' + xhr.responseText);
                }
                    });
        });

        // Tambah Data Tunggal Anggota
        $(document).on('submit', '#tambahdatatunggal', function (e) {
            e.preventDefault();
            var data = {
                nama: $('#add_nama').val(),
                email: $('#add_email').val(),
                password: $('#add_password').val()
            };
            $.ajax({
                url: "/nasabah/create",
                method: "POST",
                dataType: "json",
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    $('#tambahdatatunggal')[0].reset();
                    $('#card-body').load(location.href + " #card-body");
                    modal_data_tunggal.style.display = 'none';
                }
            });

        });

        //  View data Anggota
        $(document).on('click', '.viewNasabahBtn', function () {
            var nasabah_id = $(this).val();
            $.ajax({
                url: "/nasabah/read",
                method: "GET",
                dataType: "json",
                data: { id: nasabah_id },
                success: function (response) { 
                    $('#view_nama').text(response.nama);
                    $('#view_email').text(response.email);
                    $('#input_nama').val(response.nama);
                    $('#input_email').val(response.email);
                    $('#input_nasabah_id').val(response.id);
                    modal_view_anggota.style.display = "flex";  
                }
            });
        });

        // Update(simpan) Data Anggota
        $(document).on('submit', '#simpanviewdetailanggota', function (e) {
            e.preventDefault();

            var nasabah_id = $('#input_nasabah_id').val();
            var data = {
                nama: $('#input_nama').val(),
                email: $('#input_email').val(),
                id: nasabah_id,
            };
            $.ajax({
                url: "/nasabah/update",
                method: "POST",
                dataType: "json",
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    $('#simpanviewdetailanggota')[0].reset();
                    $('#card-body').load(location.href + " #card-body");
                    $.ajax({
                        url: "/nasabah/read",
                        method: "GET",
                        dataType: "json",
                        data: { id: nasabah_id },
                        success: function (response) { 
                            $('#view_nama').text(response.nama);
                            $('#view_email').text(response.email);
                            $('#input_nama').val(response.nama);
                            $('#input_email').val(response.email);
                            $('#input_nasabah_id').val(response.id);
                            modal_view_anggota.style.display = "flex";  
                        }
                    });
                    butt_simpan_detail_anggota.style.display = 'none';
                    butt_ubah_detail_anggota.style.display = 'flex';
                    form_detail_data_anggota.style.display = 'none';
                    detail_data_anggota.style.display = 'flex';
                }
            });

        });

        // Hapus data Anggota
        let modal_konfirmasi = document.getElementById('modal-konfirmasi');
        let butt_close_modal = document.getElementById('btn-close-modal');
        let butt_konfirmasi = document.getElementById('btn-konfirmasi');

        butt_close_modal.addEventListener("click",()=>{
            modal_konfirmasi.style.display = 'none';
        })
        window.addEventListener("click",(e)=>{
            if (e.target == modal_konfirmasi) {
                modal_konfirmasi.style.display = 'none';
            }
        })
        $(document).on('click', '.deleteNasabahBtn', function (e) {
            e.preventDefault();
            modal_konfirmasi.style.display = 'flex';

            butt_konfirmasi.addEventListener("click",()=>{
                var nasabah_id = $(this).val();
                $.ajax({
                    url: "/nasabah/delete",
                    method: "POST",
                    dataType: "json",
                    data: {
                        'id': nasabah_id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        $('#card-body').load(location.href + " #card-body");
                        modal_konfirmasi.style.display = 'none';
                    }
                });
            })
        });

    </script>
@endsection