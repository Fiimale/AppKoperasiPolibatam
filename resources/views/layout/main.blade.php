<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="css/layout.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Dashboard</title> 
</head>
<body>
    <nav class="odes-sidebar odes-close">
        <div class="odes-text odes-logo-text odes-title">
            <span class="odes-title-span odes-name" >Koperasi Polibatam</span>
        </div>
        <header>
            <div class="odes-image-text">
                <span class="odes-image">
                    <img src="image/profil.webp" alt="">
                </span>

                <div class="odes-text odes-logo-text">
                    <span class="odes-profession">Admin</span>
                    <!-- <span class="profession">Username</span> -->
                    <button type="button" class="odes-butt-log-out" id="odes-butt-log-out" >Sign Out</button>
                    
                </div>
            </div>

            <i class='bx bx-chevron-right odes-toggle'></i>
        </header>

        <div class="odes-menu-bar">
            <div class="odes-menu">

                <!-- <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li> -->

                <ul class="odes-menu-links">
                    <li class="odes-nav-link">
                        <a href="dashboard">
                            <i class='bx bx-home-alt odes-icon' ></i>
                            <span class="odes-text odes-nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="odes-nav-link">
                        <a href="nasabah">
                            <i class='bx bx-group odes-icon' ></i>
                            <span class="odes-text odes-nav-text">Nasabah</span>
                        </a>
                    </li>

                    <li class="odes-nav-link">
                        <a href="simpanan">
                            <i class='bx bx-wallet odes-icon'></i>
                            <span class="odes-text odes-nav-text">Simpanan</span>
                        </a>
                    </li>

                    <li class="odes-nav-link">
                        <a href="pinjaman">
                            <i class='bx bx-money-withdraw odes-icon' ></i>
                            <span class="odes-text odes-nav-text">Pinjaman</span>
                        </a>
                    </li>

                    <li class="odes-nav-link">
                        <a href="registrasi">
                            <i class='bx bx-registered odes-icon' ></i>
                            <span class="odes-text odes-nav-text">Registrasi</span>
                        </a>
                    </li>

                    <li class="odes-nav-link">
                        <a href="laporan">
                            <i class='bx bxs-report odes-icon' ></i>
                            <span class="odes-text odes-nav-text">Laporan</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>

    </nav>
    <div class="modal-keluar" id="modal-keluar">
        <div id="modal-content-keluar" class="modal-content-keluar">
            <div>
                <div class="header_modal">
                    <span>Modal Konfirmasi</span>
                </div>
                <div class="pesan">
                    <span>Anda yakin ingin meninggalkan halaman?</span>
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
    <section class="odes-home">
        @yield('container')
    </section>

    <script src="js/layout.js"></script>
    <script type="text/javascript">
        let modal_logout = document.getElementById('modal-keluar');
        let butt_logout = document.getElementById('odes-butt-log-out');
        let butt_cancel_logout = document.getElementById('btn-close');

        butt_logout.addEventListener("click",()=>{
            modal_logout.style.display = 'flex';
        })

        butt_cancel_logout.addEventListener("click",()=>{
            modal_logout.style.display = 'none';
        })
        window.addEventListener("click",(e)=>{
            if (e.target == modal_logout) {
                modal_logout.style.display = 'none';
            }
        })

    </script>

</body>
</html>