<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Perpusda Lampung</title>
    @include('view.broilerplate')
</head>

<!-- css -->
<link rel="stylesheet" href="/boostrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/login.css">

<!-- icon -->
<link rel="stylesheet" href="/fontawesome/css/all.min.css">

<!-- google font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

<body>
    <div class="background"></div>
    <div class="container-fluid d-flex align-items-center h-100 justify-content-center">
        <div class="d-flex shadow rounded" style="max-width: 1000px">
            <!-- bagian kiri form -->
            <div id="kiri-form" class="col-8 bg-primary justify-content-center align-items-center">
                <div class="image-perpus w-100 h-100 img-fluid h-100 w-100 d-flex align-items-end" alt="...">
                    <div class="p-3 d-flex flex-column">
                        <h4>Selamat Datang</h4>
                        <hr class="w-100" />
                        <h4>Perpustakaan Daerah</h4>
                        <h4>Lampung</h4>
                    </div>
                </div>
            </div>

            <style>
                .image-perpus {
                    background-image: url('{{asset('images/Perpus edit png-compressed.png')}}');
                    background-size: cover;
                    background-position: center;
                }

                .image-perpus>* {
                    color: white;
                }
            </style>

            <!-- bagian kanan form -->

            <div class="bg-light d-flex flex-column align-items-center justify-content-center p-4 pt-5 pb-5">
                <img src="{{asset('images/fix logo.png')}}" alt="">
                <div class="header">
                    <h1>Silahkan Login</h1>
                </div>
                <div class="login-form mt-20">
                    <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Masukan email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Masukan kata sandi">
                        </div>
                        <button type="submit" class="btn btn-primary mt-20">Submit</button>
                    </form>

                    <span class="p1">*Apabila lupa password silahkan untuk
                        menghubungi admin</span>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- js -->
    <script src="../boostrap/js/bootstrap.min.js"></script>
</body>

</html>