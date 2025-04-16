@extends('layout')
@section('content')

<div class="page d-flex flex-row flex-column-fluid">
    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <div id="kt_content_container" class="container-xxl">
                    <div class="card shadow-sm">
                        <div class="card-header pt-7">
                            <h5 class="card-title">Ajouter une nouvelle livraison</h5>
                        </div>
                        <div class="card-body">
                            <!-- Formulaire pour ajouter une livraison -->
                            <form action="{{ route('livraisons.store') }}" method="POST">
                                @csrf
                                <div class="row g-2">
                                    <!-- Produit Commandé -->
                                    <div class="mb-3 fv-row fv-plugins-icon-container col-12">
                                        <label class="form-label fs-6 fw-bold">Produit Commandé:</label>
                                        <select class="form-select form-select-solid fw-bolder" name="produit_commande_id" data-kt-select2="true" data-placeholder="Sélectionnez un produit commandé" data-allow-clear="true" data-kt-user-table-filter="category" data-hide-search="false">
                                            <option value="">Sélectionnez un produit commandé</option>
                                            @foreach($produitCommandes as $produitCommande)
                                                <option value="{{ $produitCommande->id }}">
                                                    {{ $produitCommande->produit->nom ?? 'N/A' }} - 
                                                    {{ $produitCommande->commande->reference ?? 'N/A' }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('produit_commande_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row g-2">
                                    <!-- Date de livraison -->
                                    <div class="mb-3 fv-row fv-plugins-icon-container col-12">
                                        <label for="dateLivraison" class="form-label">Date de livraison</label>
                                        <input type="date" class="form-control @error('dateLivraison') is-invalid @enderror" id="dateLivraison" name="dateLivraison" value="{{ old('dateLivraison', date('Y-m-d')) }}">
                                        @error('dateLivraison')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <!-- Annuler -->
                                    <button type="button" onclick="window.history.back()" class="btn btn-danger">
                                        <i class="fa fa-times-circle"></i> Annuler
                                    </button>

                                    <!-- Ajouter la livraison -->
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-plus-circle"></i> Ajouter la livraison
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