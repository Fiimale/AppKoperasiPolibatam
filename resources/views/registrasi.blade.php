@extends('layout.main')

@section('container')
    <link rel="stylesheet" href="css/styleregistrasi.css">
    <div class="odes-text">Daftar Pengajuan Registrasi</div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" id="card-body">
                        @foreach($data as $item)
                        @if($item->role_id == 3 & $item->status_user == 0)
                        <div class="pengajuan-registrasi">
                            <div class="pengajuan-detail">
                                <span>{{ $item->nama }}</span>
                                <span>{{ $item->email }}</span>
                            </div>
                            <div class="pengajuan-konfirmasi">
                                <button  value="{{ $item->id }}" class="btn-pengajuan-konfirmasi confirmnasabah">
                                    <span>Confirm</span>
                                </button>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-konfirmasi" id="modal-konfirmasi">
        <div id="modal-content-konfirmasi" class="modal-content-konfirmasi">
            <div>
                <div class="header_modal">
                    <span>Modal Konfirmasi</span>
                </div>
                <div class="pesan">
                    <span>Setujui Permintaan untuk bergabung?</span>
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
    <script type="text/javascript">
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

        $(document).on('click', '.confirmnasabah', function (e) {
            e.preventDefault();
            var nasabah_id = $(this).val();
            modal_konfirmasi.style.display = 'flex';
            butt_konfirmasi.addEventListener("click",()=>{
                $.ajax({
                    url: "/registrasi/confirm",
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
    <script type="text/javascript">
        

    </script>
@endsection