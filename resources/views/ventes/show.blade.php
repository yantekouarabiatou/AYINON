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
                                <h2>Détails de la vente 
                                    @if ($vente->produit)
                                        {{ $vente->produit->name }}
                                    @else
                                        Produit non défini
                                    @endif
                                </h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <div class="card-body pt-5">
                            <div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

