@extends('layout')
@section('content')

    <div>
        <div class="page d-flex flex-row flex-column-fluid">
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <div id="kt_content_container" class="container-xxl">
                            <div class="card">
                                <div class="card shadow-sm">
                                    <div class="card-header pt-7">
                                        <h5 class="card-title">Ajouter un nouvel utilisateur</h5>
                                    </div>
                                    <div class="card-body">
                                        <!-- Formulaire pour ajouter un utilisateur -->
                                        <form action="{{ route('users.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row g-2">
                                                <!-- Nom de l'utilisateur -->
                                                <div class="mb-3 fv-row fv-plugins-icon-container col-6">
                                                    <label for="name" class="form-label">Nom</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        id="name" name="name" value="{{ old('name') }}" required>
                                                    @error('name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Email de l'utilisateur -->
                                                <div class="mb-3 fv-row fv-plugins-icon-container col-6">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        id="email" name="email" value="{{ old('email') }}" required>
                                                    @error('email')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row g-2">
                                                <!-- Mot de passe -->
                                                <div class="mb-3 fv-row fv-plugins-icon-container col-6">
                                                    <label for="password" class="form-label">Mot de passe</label>
                                                    <input type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        id="password" name="password" required>
                                                    @error('password')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Confirmer le mot de passe -->
                                                <div class="mb-3 fv-row fv-plugins-icon-container col-6">
                                                    <label for="password_confirmation" class="form-label">Confirmer le mot
                                                        de passe</label>
                                                    <input type="password"
                                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                                        id="password_confirmation" name="password_confirmation" required>
                                                    @error('password_confirmation')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row g-2">
                                                <!-- Téléphone -->
                                                <div class="mb-3 fv-row fv-plugins-icon-container col-6">
                                                    <label for="telephone" class="form-label">Téléphone</label>
                                                    <input type="text"
                                                        class="form-control @error('telephone') is-invalid @enderror"
                                                        id="telephone" name="telephone" value="{{ old('telephone') }}">
                                                    @error('telephone')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Rôle -->
                                                <div class="mb-3 fv-row fv-plugins-icon-container col-6">
                                                    <label for="role_id" class="form-label">Rôle</label>
                                                    <select
                                                        class="form-select form-select-solid fw-bolder @error('role_id') is-invalid @enderror"
                                                        name="role_id" required>
                                                        <option value="">Sélectionnez un rôle</option>
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->id }}"
                                                                {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                                                {{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('role_id')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row g-2">
                                                <!-- Photo de profil -->
                                                <div class="mb-3 fv-row fv-plugins-icon-container col-12">
                                                    <label for="photo" class="form-label">Photo de profil</label>
                                                    <input type="file"
                                                        class="form-control @error('photo') is-invalid @enderror"
                                                        id="photo" name="photo">
                                                    @error('photo')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="card-footer">
                                                <!-- Annuler -->
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                                    <i class="fa fa-times-circle"></i> Annuler
                                                </button>

                                                <!-- Ajouter l'utilisateur -->
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-plus-circle"></i> Ajouter Utilisateur
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
