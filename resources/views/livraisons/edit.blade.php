@extends('layout')
@section('content')

<div class="page d-flex flex-row flex-column-fluid">
    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <div id="kt_content_container" class="container-xxl">
                    <div class="card shadow-sm">
                        <div class="card-header pt-7">
                            <h5 class="card-title">Modifier la livraison</h5>
                        </div>
                        <div class="card-body">
                            <!-- Formulaire pour mettre à jour la livraison -->
                            <form action="{{ route('livraisons.update', $livraison->id) }}" method="POST">
                                @csrf
                                @method('PUT') <!-- Méthode pour la mise à jour -->

                                <div class="row g-2">
                                    <!-- Produit Commandé -->
                                    <div class="mb-3 fv-row fv-plugins-icon-container col-12">
                                        <label class="form-label fs-6 fw-bold">Produit Commandé:</label>
                                        <select class="form-select form-select-solid fw-bolder" name="produit_commande_id" data-kt-select2="true" data-placeholder="Sélectionnez un produit commandé" data-allow-clear="true" data-kt-user-table-filter="category" data-hide-search="false">
                                            <option value="">Sélectionnez un produit commandé</option>
                                            @foreach($produitCommandes as $produitCommande)
                                                <option value="{{ $produitCommande->id }}" {{ $livraison->produit_commande_id == $produitCommande->id ? 'selected' : '' }}>
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
                                        <input type="date" class="form-control @error('dateLivraison') is-invalid @enderror" id="dateLivraison" name="dateLivraison" value="{{ old('dateLivraison', $livraison->dateLivraison ? date('Y-m-d', strtotime($livraison->dateLivraison)) : date('Y-m-d')) }}">
                                        @error('dateLivraison')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <!-- Annuler -->
                                    <a href="{{ route('livraisons.index') }}" class="btn btn-danger">
                                        <i class="fa fa-times-circle"></i> Annuler
                                    </a>

                                    <!-- Mettre à jour la livraison -->
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Mettre à jour la livraison
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