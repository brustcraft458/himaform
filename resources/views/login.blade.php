<!DOCTYPE html>
<html lang="en">

<head>
    <?= view('shared.headerhead'); ?>
</head>

<body>
    <main>
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/logokf.png" alt="">
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                    <p class="text-center small">Enter your username & password to login</p>
                                </div>
                                @if (session('action_message') == 'login_fail')
                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                        Username Atau Password Salah
                                    </div>
                                @endif

                                <form class="row g-3 needs-validation" action="/login" method="post">
                                    @csrf
                                    <div class="col-12">
                                        <label for="username" class="form-label">Username</label>
                                        <div class="input-group has-validation">
                                            <input type="text" name="username" class="form-control" id="username" required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" required>
                                    </div>

                                    <div class="col-12">
                                        <button name="login" class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="credits">
                            <!-- All the links in the footer should remain intact. -->
                            <!-- You can delete the links only if you purchased the pro version. -->
                            <!-- Licensing information: https://bootstrapmade.com/license/ -->
                            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
</body>

{{-- <?= view('shared.footer')?> --}}
</html>
