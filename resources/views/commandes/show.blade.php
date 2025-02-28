@extends('layout')
@section('content')

<div class="page d-flex flex-row flex-column-fluid">
    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <div id="kt_content_container" class="container-xxl">
                    <div class="card card-flush">
                        <!--begin::Card header-->
                        <div class="card-header pt-7">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Détails de la commande</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <div class="card-body pt-5">
                            <div>
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5">
                                        <tr>
                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Nom du fournisseur:</th>
                                            <td>{{ $commande->fournisseur?->nom ?? 'Fournisseur  introuvable' }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Nom du produit:</th>
                                            <td>{{ $commande->produit?->name ?? 'Produit introuvable' }}</td>
                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Référence:</th>
                                            <td class="fw-bolder">{{ $commande->reference }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Quantité:</th>
                                            <td colspan="3">{{ $commande->quantite }} Kg</td>
                                        </tr> 
                                        <tr>
                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Date d'entrée:</th>
                                            <td>{{ $commande->date_entree ? \Carbon\Carbon::parse($commande->date_entree)->format('d-m-Y') : 'Non définie' }}</td>

                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Date de péremption:</th>
                                            <td class="fw-bolder">{{ $commande->peremption_date ? \Carbon\Carbon::parse($commande->peremption_date)->format('d-m-Y') : 'Non définie' }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Statut de la commande:</th>
                                            <td>{{ $commande->statut }}</td> 
                                        </tr>
                                        <tr>
                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Date de création:</th>
                                            <td>{{ $commande->created_at ? $commande->created_at->format('d-m-Y') : 'Non définie' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

