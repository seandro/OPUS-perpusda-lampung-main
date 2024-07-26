<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset berhasil!</title>
</head>

<body>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <div class="page-wrap d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <span class="display-1 d-block">Berhasil</span>
                    <div class="mb-4 lead">Password berhasil diubah</div>
                    <div class="mb-4 lead">Email: {{ $email }}</div>
                    <div class="mb-4 lead">Password: {{ $newpass }}</div>
                    <a href="{{ route('data-karyawan') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
    <style>
        body {
            background: #dedede;
        }

        .page-wrap {
            min-height: 100vh;
        }
    </style>
</body>

</html>