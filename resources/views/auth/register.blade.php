<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Créer un compte</title>
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/global/plugins.bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.bundle.css') }}">
</head>
<body class="bg-body">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid">
            <div class="d-flex flex-center flex-column flex-column-fluid p-10">
               
                <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <a href="#" class="d-flex flex-center flex-column flex-column-fluid">
                        <img alt="Logo" src="{{ asset('assets/media/logos/LOGO_2.png') }}" class="h-100px" />
                    </a>
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf                

                        <div class="row fv-row mb-7">
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Nom</label>
                                <input class="form-control form-control-lg form-control-solid" type="text" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Email</label>
                                <input class="form-control form-control-lg form-control-solid" type="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row fv-row mb-7">
                            
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Mot de passe</label>
                                <div class="position-relative">
                                    <input class="form-control form-control-lg form-control-solid" type="password" name="password" id="password" required>
                                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-2" onclick="togglePassword('password')">
                                        <i class="bi bi-eye-slash fs-2"></i>
                                    </span>
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6">Confirmer le mot de passe</label>
                            <input class="form-control form-control-lg form-control-solid" type="password" name="password_confirmation" required>
                        </div>
                        </div>
                        
                        <div class="col-xl">
                                <label class="form-label fw-bolder text-dark fs-6">Role</label>
                                <select class="form-control form-control-lg form-control-solid" name="role_id" required>
                                    <option value="">-- Sélectionnez un rôle --</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        <div class="row fv-row mb-7">
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Photo</label>
                                <input class="form-control form-control-lg form-control-solid" type="file" name="photo" required>
                                @error('photo')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6">Téléphone</label>
                                <input class="form-control form-control-lg form-control-solid" type="number" name="telephone" value="{{ old('telephone') }}" required>
                                @error('telephone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                      

                        <div class="fv-row mb-10">
                            <label class="form-check form-check-custom form-check-solid form-check-inline">
                                <input class="form-check-input" type="checkbox" name="toc" value="1" required>
                                <span class="form-check-label fw-bold text-gray-700 fs-6">J'accepte les <a href="#" class="ms-1 link-primary">conditions d'utilisation</a>.</span>
                            </label>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-lg btn-primary">
                                S'inscrire
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <script>
        function togglePassword(id) {
            let input = document.getElementById(id);
            let icon = input.nextElementSibling.querySelector("i");
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("bi-eye-slash");
                icon.classList.add("bi-eye");
            } else {
                input.type = "password";
                icon.classList.remove("bi-eye");
                icon.classList.add("bi-eye-slash");
            }
        }
    </script>
</body>
</html>
