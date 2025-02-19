<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Connexion - Metronic</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>
<body id="kt_body" class="bg-body">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url('{{ asset('assets/media/illustrations/sketchy-1/14.png') }}');">
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <a href="#" class="mb-12">
                    <img alt="Logo" src="{{ asset('assets/media/logos/logo-1.svg') }}" class="h-40px" />
                </a>
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="text-center mb-10">
                            <h1 class="text-dark mb-3">Se connecter</h1>
                            
                        </div>
                        <div class="fv-row mb-10">
                            <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                            <input id="email" class="form-control form-control-lg form-control-solid" type="email" name="email" required autocomplete="email" />
                        </div>
                        <div class="fv-row mb-10">
                            <div class="d-flex flex-stack mb-2">
                                <label class="form-label fw-bolder text-dark fs-6 mb-0">Mot de passe</label>
                                @if (Route::has('password.request'))
                                    <a class="link-primary fs-6 fw-bolder" href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                                @endif
                            </div>
                            <input class="form-control form-control-lg form-control-solid" type="password" name="password" required autocomplete="current-password" />
                        </div>
                        <div class="text-center">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">Se connecter</span>
                                <span class="indicator-progress">Veuillez patienter...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                           
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>var hostUrl = "{{ asset('assets/') }}";</script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
</body>
</html>