<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Login-mrg pembelian</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Vendor CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--End of Tawk.to Script-->
</head>

<body style="margin-top: 150px;">

    <div class="row justify-content-center">
        <div class="col-md-4">
            <main class="form-signin w-100 m-auto mt-5">
                <form action="/" method="POST">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal text-lg-center fw-bold">Login <br> MRG Pembelian</h1>
                    @if (session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('loginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                     @endif
                    <div class="form-floating mb-2">
                        <input type="text" name="username" class="form-control" id="username"
                            placeholder="Username" autofocus required>
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Password" required>
                        <label for="password">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </form>
            </main>
        </div>
    </div>

</body>

</html>
