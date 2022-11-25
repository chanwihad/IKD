<!doctype html>
<html lang="en">

<head>
    <title>Indikator : Forget Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- favicon ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('assets/img/logo/logosn.png') }}">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="log/css/style.css">
    <link rel="stylesheet" href="log/css/login.css">

</head>

<body>

    <img src="log/images/login-header.png" alt="Image" class="img-header">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img img-fluid" style="background-image: url(assets/img/register.jpeg);">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h5 style="font-weight: 600;">Silahkan Masukkan Password Baru Anda</h5> <br>
                                </div>
                            </div>

                            <form method="POST" action="{{ route('userForgetPasswordSave') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="label" for="nip">NIP</label>
                                    <input id="nip" type="text" class="form-control @error('nip') is-invalid @enderror" placeholder="NIP" name="nip" value="{{ old('nip') }}" required autocomplete="nip">
                                    @error('nip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="name">Email</label>
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password-confirm">{{ __('Konfirmasi Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password">
                                </div>
                                @if($errors->any())
                                {{ implode('', $errors->all(':message')) }}
                                @endif
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">SUBMIT</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="log/js/jquery.min.js"></script>
    <script src="log/js/popper.js"></script>
    <script src="log/js/bootstrap.min.js"></script>
    <script src="log/js/main.js"></script>

</body>

</html>