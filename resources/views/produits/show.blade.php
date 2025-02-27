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
                                <h2>Détails du produit {{ $produit->name }}</h2>
                            </div>
                            <!--begin::Card image-->
                            <div class="card-image">
                                <img src="{{ Storage::url($produit->photo) }}" alt="{{ $produit->name }}" width="100" class="img-fluid" style="max-height: 200px; object-fit: cover;" />
                            </div>
                            <!--end::Card image-->
                        </div>
                        <!--end::Card header-->
                        <div class="card-body pt-5">
                            <div>
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5">
                                        <tr>
                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Nom:</th>
                                            <td>{{ $produit->name }}</td>
                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Référence:</th>
                                            <td class="fw-bolder">{{ $produit->refProduit }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Description:</th>
                                            <td colspan="3">{{ $produit->description }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Catégorie:</th>
                                            <td>{{ $produit->categorie?->name }}</td>

                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Prix Unitaire:</th>
                                            <td class="fw-bolder">{{ number_format($produit->prix, 2, ',', ' ') }} F CFA</td>
                                        </tr>
                                        <tr>
                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Quantité en stock:</th>
                                            <td>{{ $produit->quantite }}</td>
                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Alerte Stock:</th>
                                            <td class="fw-bolder">{{ $produit->stock_alert }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Date de création:</th>
                                            <td>{{ $produit->created_at ? $produit->created_at->format('d-m-Y') : '' }}</td>
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


