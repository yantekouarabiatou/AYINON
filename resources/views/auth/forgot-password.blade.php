<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Réinitialisation du mot de passe</title>
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/global/plugins.bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.bundle.css') }}">
</head>
<body class="bg-body">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid">
            <div class="d-flex flex-center flex-column flex-column-fluid p-10">
                <a href="{{ route('home') }}" class="mb-12">
                    <img alt="Logo" src="{{ asset('assets/media/logos/logo-1.svg') }}" class="h-40px">
                </a>
                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <!-- Formulaire -->
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="text-center mb-10">
                            <h1 class="text-dark mb-3">Mot de passe oublié ?</h1>
                            <div class="text-gray-400 fw-bold fs-4">Entrez votre email pour réinitialiser votre mot de passe.</div>
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- Champ Email -->
                        <div class="fv-row mb-10">
                            <label class="form-label fw-bolder text-gray-900 fs-6">Email</label>
                            <input class="form-control form-control-solid" type="email" name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Actions -->
                        <div class="d-flex flex-wrap justify-content-center">
                            <button type="submit" class="btn btn-lg btn-primary fw-bolder me-4">
                                <span class="indicator-label">Envoyer</span>
                            </button>
                            <a href="{{ route('login') }}" class="btn btn-lg btn-light-primary fw-bolder">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="d-flex flex-center flex-column-auto p-10">
                <div class="d-flex align-items-center fw-bold fs-6">
                    <a href="#" class="text-muted text-hover-primary px-2">À propos</a>
                    <a href="mailto:support@tonsite.com" class="text-muted text-hover-primary px-2">Contact</a>
                    <a href="#" class="text-muted text-hover-primary px-2">Support</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
</body>
</html>
