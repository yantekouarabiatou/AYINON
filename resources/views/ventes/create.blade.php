@extends('layout')

@section('content')
    <div>
        <div class="page d-flex flex-row flex-column-fluid">
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <div id="kt_content_container" class="container-xxl">
                        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
        @if(session('vente_id'))
            <a href="{{ route('factures.show', session('vente_id')) }}" class="btn btn-primary mt-2">
                Télécharger la facture
            </a>
        @endif
    </div>
@endif
                            <form id="kt_ecommerce_edit_order_form" class="form d-flex flex-column flex-lg-row" action="{{ route('ventes.store') }}" method="POST">
                                @csrf
                                <!--begin::Aside column-->
                                <div class="w-100 flex-lg-row-auto w-lg-300px mb-7 me-7 me-lg-10">
                                    <!--begin::Order details-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Vente</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <div class="d-flex flex-column gap-10">
                                                <!--begin::Input group-->
                                                <div class="fv-row">
                                                    <label class="form-label">Vente ID</label>
                                                    <div class="fw-bolder fs-3">#{{ $nextVenteId }}</div>
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row">
                                                    <label class="required form-label">Méthode de paiement</label>
                                                    <select class="form-select mb-2" name="mode_payement" id="kt_ecommerce_edit_order_payment" required>
                                                        <option value="">Sélectionnez une option</option>
                                                        <option value="cash">Cash</option>
                                                        <option value="cheque">Chèque</option>
                                                    </select>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Order details-->
                                </div>
                                <!--end::Aside column-->
                                <!--begin::Main column-->
                                <div class="d-flex flex-column flex-lg-row-fluid gap-7 gap-lg-10">
                                    <!--begin::Order details-->
                                    <div class="card card-flush py-4">
                                        <!--begin::Card header-->
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Sélectionnez Produits</h2>
                                            </div>
                                        </div>
                                        <!--end::Card header-->
                                        <!--begin::Card body-->
                                        <div class="card-body pt-0">
                                            <div class="d-flex flex-column gap-10">
                                                <!--begin::Selected products-->
                                                <div class="row row-cols-1 row-cols-xl-3 row-cols-md-2 border border-dashed rounded pt-3 pb-1 px-2 mb-5 mh-300px overflow-scroll" id="kt_ecommerce_edit_order_selected_products">
                                                    <span class="w-100 text-muted">Sélectionnez un ou plusieurs produits dans la liste ci-dessous en cochant la case.</span>
                                                </div>
                                                <!--end::Selected products-->
                                                <!--begin::Total price-->
                                                <div class="fw-bolder fs-4">Total du: $<span id="kt_ecommerce_edit_order_total_price">0.00</span></div>
                                                <!--end::Total price-->
                                                <!--begin::Table-->
                                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_edit_order_product_table">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th class="w-25px pe-2"></th>
                                                            <th class="min-w-200px">Produit</th>
                                                            <th class="min-w-100px text-end pe-5">Qté Restante</th>
                                                            <th class="min-w-100px text-end pe-5">Quantité</th>
                                                            <th class="min-w-100px text-end pe-5">Prix Unitaire</th>
                                                        </tr>
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
<tbody class="fw-bold text-gray-600">
    @foreach($produits as $produit)
        <tr>
            <!-- Checkbox -->
            <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                    <input class="form-check-input product-checkbox" type="checkbox" name="produits[]" value="{{ $produit->id }}" data-price="{{ $produit->prix }}" />
                </div>
            </td>

            <!-- Image and Product Details -->
            <td>
                <div class="d-flex align-items-center">
                    <div class="symbol symbol-50px">
                        <!-- Card with product image -->
                        <div class="card" style="width: 150px; border: 1px solid #ddd; border-radius: 10px; overflow: hidden;">
                            <img src="{{ asset('storage/produits/' . $produit->getFirstMediaUrl('produits/' . $produit->id, 'photo')) }}" 
                                 alt="{{ $produit->name }}" 
                                 class="card-img-top" 
                                 style="width: 50%; height: 100px; object-fit: cover; border-bottom: 1px solid #ddd;">
                        </div>
                    </div>

                    <div class="ms-5">
                        <a href="#" class="text-gray-800 text-hover-primary fs-5 fw-bolder">{{ $produit->name }}</a>
                        <div class="fw-bold fs-7">Prix: ${{ $produit->prix }}</div>
                    </div>
                </div>
            </td>

            <!-- Quantity in Stock -->
            <td class="text-end pe-5">{{ $produit->quantite }}</td>

            <!-- Quantity Input -->
            <td class="text-end pe-5">
                <input type="number" name="quantites[{{ $produit->id }}]" class="form-control product-quantity" min="1" max="{{ $produit->quantite }}" value="1" />
            </td>

            <!-- Price -->
            <td class="text-end pe-5">${{ $produit->prix }}</td>
        </tr>
    @endforeach
</tbody>
<!--end::Table body-->

                                                </table>
                                                <!--end::Table-->
                                            </div>
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Order details-->
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('ventes.index') }}" class="btn btn-light me-5">Annuler</a>
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </div>
                                <!--end::Main column-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = document.querySelectorAll('.product-checkbox');
            const quantityInputs = document.querySelectorAll('.product-quantity');
            const totalPriceElement = document.getElementById('kt_ecommerce_edit_order_total_price');
            let totalPrice = 0;

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateTotalPrice);
            });

            quantityInputs.forEach(input => {
                input.addEventListener('input', updateTotalPrice);
            });

            function updateTotalPrice() {
                totalPrice = 0;
                checkboxes.forEach((checkbox, index) => {
                    if (checkbox.checked) {
                        const quantity = parseInt(quantityInputs[index].value) || 0;
                        const price = parseFloat(checkbox.dataset.price);
                        totalPrice += quantity * price;
                    } else {
                        // Réinitialiser la quantité si la case n'est pas cochée
                        quantityInputs[index].value = 1;
                    }
                });
                totalPriceElement.textContent = totalPrice.toFixed(2);
            }

            // Vérifier les quantités avant l'envoi du formulaire
            document.getElementById('kt_ecommerce_edit_order_form').addEventListener('submit', function(event) {
                let valid = true;
                checkboxes.forEach((checkbox, index) => {
                    if (checkbox.checked && (quantityInputs[index].value == "" || quantityInputs[index].value > checkbox.dataset.max)) {
                        alert("Veuillez vérifier les quantités des produits sélectionnés.");
                        valid = false;
                    }
                });
                if (!valid) {
                    event.preventDefault();
                }
            });
        });
    </script>

