@extends('layout')

@section('content')
<div class="page d-flex flex-row flex-column-fluid">
    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <div id="kt_content_container" class="container-xxl">
                    <div class="card shadow-sm">
                        <div class="card-header pt-7">
                            <h5 class="card-title">Modifier la vente</h5>
                        </div>
                        <div class="card-body">
                            <!-- Formulaire pour mettre à jour la vente -->
                            <form action="{{ route('ventes.update', $vente->id) }}" method="POST">
                                @csrf
                                @method('PUT') <!-- Ajout de la méthode PUT -->

                                <div class="row g-2">
                                    <!-- Sélection de l'utilisateur -->
                                    <div class="mb-3 fv-row fv-plugins-icon-container col-6">
                                        <label class="form-label fs-6 fw-bold">Utilisateur :</label>
                                        <select class="form-select form-select-solid fw-bolder" name="user_id">
                                            <option value="">Sélectionnez un utilisateur</option>
                                            @foreach($user as $u)
                                                <option value="{{ $u->id }}" {{ $vente->user_id == $u->id ? 'selected' : '' }}>
                                                    {{ $u->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Sélection du produit -->
                                    <div class="mb-3 fv-row fv-plugins-icon-container col-6">
                                        <label class="form-label fs-6 fw-bold">Produit :</label>
                                        <select class="form-select form-select-solid fw-bolder" name="produit_id">
                                            <option value="">Sélectionnez un produit</option>
                                            @foreach($produit as $p)
                                                <option value="{{ $p->id }}" {{ $vente->produit_id == $p->id ? 'selected' : '' }}>
                                                    {{ $p->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('produit_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Montant total -->
                                <div class="row g-2">
                                    <div class="mb-3 fv-row fv-plugins-icon-container col-6">
                                        <label for="montant_total" class="form-label">Montant total :</label>
                                        <input type="text" class="form-control @error('montant_total') is-invalid @enderror" id="montant_total" name="montant_total" value="{{ $vente->montant_total }}">
                                        @error('montant_total')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <!-- Annuler -->
                                    <a href="{{ route('ventes.index') }}" class="btn btn-danger">
                                        <i class="fa fa-times-circle"></i> Annuler
                                    </a>

                                    <!-- Mettre à jour la vente -->
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Mettre à jour la vente
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

