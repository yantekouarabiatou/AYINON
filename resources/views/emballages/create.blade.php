@extends('layout')
@section('content')

<div class="page d-flex flex-row flex-column-fluid">
    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <div id="kt_content_container" class="container-xxl">
                    <div class="card shadow-sm">
                        <div class="card-header pt-7">
                            <h5 class="card-title">Ajouter un nouvel emballage</h5>
                        </div>
                        <div class="card-body">
                            <!-- Formulaire pour ajouter un emballage -->
                            <form action="{{ route('emballages.store') }}" method="POST">
                                @csrf
                                <div class="row g-2">
                                    <!-- Produit -->
                                    <div class="mb-3 fv-row fv-plugins-icon-container col-6">
                                        <label class="form-label fs-6 fw-bold">Produit:</label>
                                        <select class="form-select form-select-solid fw-bolder @error('produit_id') is-invalid @enderror" name="produit_id" data-kt-select2="true" data-placeholder="Sélectionnez un produit" data-allow-clear="true">
                                            <option value="">Sélectionnez un produit</option>
                                            @foreach($produits as $produit)
                                                <option value="{{ $produit->id }}" {{ old('produit_id') == $produit->id ? 'selected' : '' }}>{{ $produit->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('produit_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Prix d'achat -->
                                    <div class="mb-3 fv-row fv-plugins-icon-container col-6">
                                        <label for="prix_achat" class="form-label">Prix d'achat</label>
                                        <input type="number" step="0.01" class="form-control @error('prix_achat') is-invalid @enderror" id="prix_achat" name="prix_achat" value="{{ old('prix_achat') }}">
                                        @error('prix_achat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row g-2">
                                    <!-- Prix unitaire -->
                                    <div class="mb-3 fv-row fv-plugins-icon-container col-6">
                                        <label for="prix_unitaire" class="form-label">Prix unitaire</label>
                                        <input type="number" step="0.01" class="form-control @error('prix_unitaire') is-invalid @enderror" id="prix_unitaire" name="prix_unitaire" value="{{ old('prix_unitaire') }}">
                                        @error('prix_unitaire')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Prix par carton -->
                                    <div class="mb-3 fv-row fv-plugins-icon-container col-6">
                                        <label for="prix_carton" class="form-label">Prix par carton</label>
                                        <input type="number" step="0.01" class="form-control @error('prix_carton') is-invalid @enderror" id="prix_carton" name="prix_carton" value="{{ old('prix_carton') }}">
                                        @error('prix_carton')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <!-- Annuler -->
                                    <a href="{{ route('emballages.index') }}" class="btn btn-danger">
                                        <i class="fa fa-times-circle"></i> Annuler
                                    </a>

                                    <!-- Ajouter l'emballage -->
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-plus-circle"></i> Ajouter l'emballage
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

