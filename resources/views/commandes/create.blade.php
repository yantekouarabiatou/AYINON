@extends('layout')
@section('content')

<div class="page d-flex flex-row flex-column-fluid">
    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <div id="kt_content_container" class="container-xxl">
                    <div class="card">
                        <div class="card shadow-sm">
                            <div class="card-header pt-7">
                                <h5 class="card-title">Ajouter une nouvelle commande</h5>
                            </div>
                            <div class="card-body">
                                <!-- Formulaire pour ajouter une commande -->
                                <form action="{{ route('commandes.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">
                                        <!-- Référence -->
                                        <div class="mb-3 col-6">
                                            <label for="reference" class="form-label">Référence</label>
                                            <input type="text" class="form-control" id="reference" name="reference" value="{{ old('reference', $generatedReference) }}" readonly>
                                        </div>

                                        <!-- Fournisseur -->
                                        <div class="mb-3 col-6">
                                            <label for="fournisseur_id" class="form-label fs-6 fw-bold">Nom du fournisseur:</label>
                                            <select class="form-select @error('fournisseur_id') is-invalid @enderror" name="fournisseur_id" id="fournisseur_id">
                                                <option value="">Sélectionnez un fournisseur</option>
                                                @foreach($fournisseurs as $fournisseur)
                                                    <option value="{{ $fournisseur->id }}" {{ old('fournisseur_id') == $fournisseur->id ? 'selected' : '' }}>{{ $fournisseur->nom }}</option>
                                                @endforeach
                                            </select>
                                            @error('fournisseur_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row g-3">
                                        <!-- Nom du produit -->
                                        <div class="mb-3 col-6">
                                            <label for="produit_id" class="form-label fs-6 fw-bold">Nom du produit:</label>
                                            <select class="form-select @error('produit_id') is-invalid @enderror" name="produit_id" id="produit_id">
                                                <option value="">Sélectionnez un produit</option>
                                                @foreach($produits as $produit)
                                                    <option value="{{ $produit->id }}" {{ old('produit_id') == $produit->id ? 'selected' : '' }}>{{ $produit->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('produit_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Quantité -->
                                        <div class="mb-3 col-6">
                                            <label for="quantite" class="form-label">Quantité commandée</label>
                                            <input type="number" class="form-control @error('quantite') is-invalid @enderror" id="quantite" name="quantite" value="{{ old('quantite') }}">
                                            @error('quantite')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row g-3">
                                        <!-- Date d'entrée -->
                                        <div class="mb-3 col-4">
                                            <label for="date_entree" class="form-label">Date d'entrée du produit(Provisoire)</label>
                                            <input type="date" class="form-control @error('date_entree') is-invalid @enderror" id="date_entree" name="date_entree" value="{{ old('date_entree') }}">
                                            @error('date_entree')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Date de péremption -->
                                        <div class="mb-3 col-4">
                                            <label for="peremption_date" class="form-label">Date de péremption</label>
                                            <input type="date" class="form-control @error('peremption_date') is-invalid @enderror" id="peremption_date" name="peremption_date" value="{{ old('peremption_date') }}">
                                            @error('peremption_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Statut -->
                                        <div class="mb-3 col-4">
                                            <label for="statut" class="form-label">Statut</label>
                                            <select class="form-select @error('statut') is-invalid @enderror" id="statut" name="statut">
                                                <option value="Validée" {{ old('statut') == 'Validée' ? 'selected' : '' }}>Validée</option>
                                                <option value="Non validée" {{ old('statut') == 'Non validée' ? 'selected' : '' }}>Non validée</option>
                                            </select>
                                            @error('statut')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="card-footer d-flex justify-content-end">
                                        <!-- Annuler -->
                                        <button type="button" class="btn btn-danger me-2" data-bs-dismiss="modal">
                                            <i class="fa fa-times-circle"></i> Annuler
                                        </button>

                                        <!-- Ajouter la commande -->
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-plus-circle"></i> Ajouter la commande
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


