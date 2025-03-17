@extends('layout')

@section('content')
<div>
    <div class="page d-flex flex-row flex-column-fluid">
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <div id="kt_content_container" class="container-xxl">
                        <div class="card">
                            <div id="kt_content_container" class="container-xxl">
                                <div class="card card-flush">
                                    <!--begin::Card header-->
                                    <div class="card-header pt-7">
                                        <div class="card-title">
                                            <h2>Détails de la vente #{{ $vente->id }}</h2>
                                        </div>
                                    </div>
                                    <!--end::Card header-->
                                    <div class="card-body pt-5">
                                        <div class="table-responsive">
                                            <table class="table align-middle table-row-dashed fs-6 gy-5">
                                                <tr>
                                                    <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Nom de l'utilisateur:</th>
                                                    <td>
                                                        {{ $vente->user ? $vente->user->name : 'Non défini' }}
                                                    </td>

                                                    <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Nom du produit:</th>
                                                    <td>
                                                        {{ $vente->produit ? $vente->produit->name : 'Non défini' }}
                                                    </td>

                                                    <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Montant total:</th>
                                                    <td>
                                                        {{ $vente->montant_total ?? 'Non défini' }}
                                                    </td>
                                                </tr>
                                              
                                                <tr>
                                                    <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Date de création:</th>
                                                    <td>
                                                        {{ $vente->created_at ? $vente->created_at->format('d-m-Y') : 'Non définie' }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- Détails des produits associés -->
                                    <h3>Détails des produits de la vente :</h3>
                                    <div class="table-responsive">
                                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                                            <thead>
                                                <tr>
                                                    <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Nom du produit</th>
                                                    <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Quantité</th>
                                                    <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Prix unitaire</th>
                                                    <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Montant total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($vente->vente_details as $detail)
                                                    <tr>
                                                        <td>{{ $detail->produit->name }}</td>
                                                        <td>{{ $detail->quantite }}</td>
                                                        <td>{{ number_format($detail->prix_unitaire, 2) }}</td>
                                                        <td>{{ number_format($detail->montant_total, 2) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="mt-4">
                                        <h4>Total de la vente : <strong>${{ number_format($vente->montant_total, 2) }}</strong></h4>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

