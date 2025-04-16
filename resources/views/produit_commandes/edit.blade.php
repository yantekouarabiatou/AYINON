<!-- resources/views/produitsCommandes/edit.blade.php -->
@extends('layout')
@section('content')

<div class="page d-flex flex-row flex-column-fluid">
    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <div id="kt_content_container" class="container-xxl">
                    <div class="card shadow-sm">
                        <div class="card-header pt-7">
                            <h5 class="card-title">Modifier le produit commandé #{{ $produitCommande->id }}</h5>
                        </div>
                        <div class="card-body">
                            <!-- Formulaire pour modifier un produit commandé -->
                            <form action="{{ route('produitsCommandes.update', $produitCommande->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row g-2">
                                    <!-- Sélection du produit -->
                                    <div class="mb-3 col-12">
                                        <label for="produit_id" class="form-label">Produit</label>
                                        <select class="form-select" name="produit_id" required>
                                            <option value="">Sélectionner un produit</option>
                                            @foreach($produits as $produit)
                                                <option value="{{ $produit->id }}" {{ $produitCommande->produit_id == $produit->id ? 'selected' : '' }}>
                                                    {{ $produit->nom }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Sélection de la commande -->
                                    <div class="mb-3 col-12">
                                        <label for="commande_id" class="form-label">Commande</label>
                                        <select class="form-select" name="commande_id" required>
                                            <option value="">Sélectionner une commande</option>
                                            @foreach($commandes as $commande)
                                                <option value="{{ $commande->id }}" {{ $produitCommande->commande_id == $commande->id ? 'selected' : '' }}>
                                                    {{ $commande->reference }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('produitsCommandes.index') }}" class="btn btn-danger">Annuler</a>
                                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

