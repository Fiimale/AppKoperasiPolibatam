<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="css/stylelogin.css">
         
    <title>Login & Registration Form</title> 
</head>
<body>

    <div class="">
        <div class="odes-container">
            <span class="odes-title">OPTIMALKAN PENGELOLAAN KEUANGAN ANDA</span>
            <span class="odes-title-info">Bersama Koperasi Polibatam</span>

            <div class="odes-slider">
                <div class="odes-slides">
                    <input type="radio" name="radio-btn" id="odes-radio1" />
                    <input type="radio" name="radio-btn" id="odes-radio2" />
                    <input type="radio" name="radio-btn" id="odes-radio3" />
                    <input type="radio" name="radio-btn" id="odes-radio4" />
                    <div class="odes-slide odes-first">
                        <img src="image/home7.jpg" alt=""/>
                    </div>
                    <div class="odes-slide">
                        <img src="image/home6.jpg" alt=""/>
                    </div>
                    <div class="odes-slide">
                        <img src="image/home5.JPG" alt=""/>
                    </div>
                    <div class="odes-slide">
                        <img src="image/home4.jpg" alt=""/>
                    </div>
                    <div class="odes-navigation-auto">
                        <div class="odes-auto-btn1"></div>
                        <div class="odes-auto-btn2"></div>
                        <div class="odes-auto-btn3"></div>
                        <div class="odes-auto-btn4"></div>
                    </div>
                </div>
                <div class="odes-navigation-manual">
                    <label for="odes-radio1" class="odes-manual-btn"></label>
                    <label for="odes-radio2" class="odes-manual-btn"></label>
                    <label for="odes-radio3" class="odes-manual-btn"></label>
                    <label for="odes-radio4" class="odes-manual-btn"></label>
                </div>
            </div>
            <!-- <img class="odes-image" src="/odes_crm/static/description/inven.jpeg" /> -->
            <div class="odes-content">
                <div class="odes-left-content">
                    <div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, necessitatibus aspernatur qui, odio libero harum quas pariatur in nobis excepturi aliquam nam architecto temporibus nostrum, cupiditate tempore ad impedit ipsa!</p><br/>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel, necessitatibus aspernatur qui, odio libero harum quas pariatur in nobis excepturi aliquam nam architecto temporibus nostrum, cupiditate tempore ad impedit ipsa!</p>
                    </div>
                </div>
                <div class="odes-right-content">
                    <span class="odes-title-form home-text">Sudah Punya Akun?Login Sekarang.</span>
                    <button id="butt-login" name="butt-login" class="butt-login">
                        <span>Login</span>
                    </button>
                    <span class="home-detail">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit ex dicta maiores, facere magni vero. Nemo, accusantium eaque officiis harum quia nam. Voluptatum numquam tempora obcaecati quis nobis facere eum.</span>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            var counter = 1;
            setInterval(function(){
                document.getElementById('odes-radio' + counter).checked = true;
                counter++;
                if(counter > 4){
                    counter = 1;
                }
            }, 5000);
        </script>
    </div>
    <div class="modal-login" id="modal-login">
        <div class="modal-login-content">
            <div class="container">
                <div class="forms">
                    <div class="form login">
                        <span class="title">Login</span>
                        <form action="home/login" method="POST">
                            @csrf
                            <div class="input-field">
                                <input type="text" placeholder="Enter your email" name="email" required>
                                <i class="uil uil-envelope icon"></i>
                            </div>
                            <div class="input-field">
                                <input type="password" class="password" name="password" placeholder="Enter your password" required>
                                <i class="uil uil-lock icon"></i>
                                <i class="uil uil-eye-slash showHidePw"></i>
                            </div>
                            <div class="checkbox-text">
                                <div class="checkbox-content">
                                    <input type="checkbox" id="logCheck">
                                    <label for="logCheck" class="text">Remember me</label>
                                </div>
                                
                                <a href="#" class="text">Lupa password?</a>
                            </div>
                            <div class="input-field button">
                                <input type="submit" value="Login">
                            </div>
                        </form>
                        <div class="login-signup">
                            <span class="text">Belum punya akun?
                                <a href="#" class="text signup-link">Signup Sekarang</a>
                            </span>
                        </div>
                    </div>
                    <!-- Registration Form -->
                    <div class="form signup">
                        <span class="title">Registration</span>
                        <form action="home/register" method="POST">
                            @csrf
                            <div class="input-field">
                                <input type="text" placeholder="Enter your name" name="reg_nama" required>
                                <i class="uil uil-user"></i>
                            </div>
                            <div class="input-field">
                                <input type="text" placeholder="Enter your email" name="reg_email" required>
                                <i class="uil uil-envelope icon"></i>
                            </div>
                            <div class="input-field">
                                <input type="password" class="password" placeholder="Create a password" name="reg_password" required>
                                <i class="uil uil-lock icon"></i>
                            </div>
                            <div class="input-field">
                                <input type="password" class="password" placeholder="Confirm a password" name="reg_con_password" required>
                                <i class="uil uil-lock icon"></i>
                                <i class="uil uil-eye-slash showHidePw"></i>
                            </div>
                            <!-- <div class="checkbox-text">
                                <div class="checkbox-content">
                                    <input type="checkbox" id="termCon">
                                    <label for="termCon" class="text">I accepted all terms and conditions</label>
                                </div>
                            </div> -->
                            <div class="input-field button">
                                <input type="submit" value="Signup">
                            </div>
                        </form>
                        <div class="login-signup">
                            <span class="text">Sudah Punya Akun?
                                <a href="#" class="text login-link">Login Sekarang</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/scriptlogin.js"></script> 
    <script type="text/javascript">
        let butt_login = document.getElementById("butt-login");
        let modal_login = document.getElementById("modal-login");
        butt_login.addEventListener("click",()=>{
            modal_login.style.display = "flex";
        })

        window.addEventListener("click",(e)=>{
            if (e.target == modal_login) {
                modal_login.style.display = 'none';
            }
        })
    </script>
</body>
</html>
