@extends('layout')

@section('content')
<div class="page d-flex flex-row flex-column-fluid">
    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <div id="kt_content_container" class="container-xxl">
                    <div class="card shadow-sm">
                        <div class="card-header pt-7">
                            <h5 class="card-title">Ajouter des détails de vente</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('detailsVentes.store') }}" method="POST">
                                @csrf

                                <!-- Conteneur des détails de produits -->
                                <div id="produit-details-container">
                                    <!-- Détail de produit (initialement un seul) -->
                                    <div class="row g-2 produit-detail">
                                        <!-- Sélection du produit -->
                                        <div class="mb-3 col-3">
                                            <label class="form-label fs-6 fw-bold">Produit :</label>
                                            <select class="form-select" name="produit_id[]" required>
                                                <option value="">Sélectionnez un produit</option>
                                                @foreach($produits as $produit)
                                                    <option value="{{ $produit->id }}" data-prix="{{ $produit->prix }}">
                                                        {{ $produit->name }} - {{ number_format($produit->prix, 2) }} FCFA
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Quantité -->
                                        <div class="mb-3 col-3">
                                            <label for="quantite" class="form-label">Quantité :</label>
                                            <input type="number" class="form-control quantite" name="quantite[]" min="1" required>
                                        </div>

                                        <!-- Montant total (calcul automatique) -->
                                        <div class="mb-3 col-3">
                                            <label for="montant_total" class="form-label">Montant total :</label>
                                            <input type="number" class="form-control montant_total" name="montant_total[]" readonly>
                                        </div>

                                        <div class="mb-3 col-3 " style="height: 100%; padding-top: 26px;">
                                            <button type="button" class="btn btn-danger remove-detail">
                                                <i class="fa fa-trash"></i> Supprimer
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <br><br>

                                <!-- Bouton pour ajouter un autre produit -->
                                <div class="mb-3 text-end">
                                    <button type="button" class="btn btn-secondary" id="ajouter-autre-detail">
                                        <i class="fa fa-plus"></i> Ajouter un autre détail
                                    </button>
                                </div>

                                <div class="card-footer">
                                    <!-- Annuler -->
                                    <a href="{{ route('detailsVentes.index') }}" class="btn btn-danger">
                                        <i class="fa fa-times-circle"></i> Annuler
                                    </a>

                                    <!-- Ajouter les détails -->
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Ajouter les détails
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

<!-- Script pour calculer automatiquement le montant total et supprimer des lignes -->
<script>
    // Fonction pour calculer le montant total de chaque produit
    function updateMontantTotal() {
        let produitSelects = document.querySelectorAll('.produit-detail');
        produitSelects.forEach(function(detail) {
            let produitSelect = detail.querySelector('select');
            let quantite = detail.querySelector('.quantite').value;
            let prixUnitaire = produitSelect.options[produitSelect.selectedIndex].getAttribute('data-prix');
            let montantTotalInput = detail.querySelector('.montant_total');
            
            if (prixUnitaire && quantite) {
                montantTotalInput.value = (quantite * prixUnitaire).toFixed(2);
            } else {
                montantTotalInput.value = '';
            }
        });
    }

    // Ajouter un autre détail de vente
    document.getElementById('ajouter-autre-detail').addEventListener('click', function() {
        let produitDetailsContainer = document.getElementById('produit-details-container');
        let newDetail = produitDetailsContainer.querySelector('.produit-detail').cloneNode(true);

        // Réinitialiser les champs dans le nouveau détail
        let inputs = newDetail.querySelectorAll('input, select');
        inputs.forEach(function(input) {
            input.value = '';
            input.removeAttribute('readonly');
        });

        produitDetailsContainer.appendChild(newDetail);
    });

    // Supprimer un détail
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-detail')) {
            let detail = e.target.closest('.produit-detail');
            detail.remove();
            updateMontantTotal();
        }
    });

    // Calcul automatique du montant total sur les produits ajoutés
    document.addEventListener('change', function(e) {
        if (e.target.classList.contains('quantite') || e.target.tagName.toLowerCase() === 'select') {
            updateMontantTotal();
        }
    });

    // Appeler la fonction au début pour les détails existants
    updateMontantTotal();
</script>

