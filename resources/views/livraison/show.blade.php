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
                                <h2>Détails du fournisseur {{ $fournisseur->nom}}</h2>
                            </div>
                            <!--begin::Card image-->
                            <!--begin::Card image-->
                            <div class="card-image" style="box-shadow: 0 4px 8px rgba(13, 12, 12, 0.591); border-radius: 15px;">
                            <!-- Vérifie si une photo est définie, sinon affiche une image par défaut -->
                            <img src="{{ $fournisseur->getFirstMediaUrl('fournisseurs') }}" 
                             alt="{{ $fournisseur->nom }}" 
                            width="100" class="img-fluid" 
                            style="max-height: 200px; object-fit: cover;" />
                           </div>
                        </div>
                        <!--end::Card header-->
                        <div class="card-body pt-5">
                            <div>
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5">
                                        <tr>
                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Nom:</th>
                                            <td>{{ $fournisseur->nom }}</td>
                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Réseaux:</th>
                                            <td class="fw-bolder">{{ $fournisseur->reseau }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Catégorie:</th>
                                            <td>{{ $fournisseur->Tfournisseurs?->nom }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Date de création:</th>
                                            <td>{{ $fournisseur->created_at ? $fournisseur->created_at->format('d-m-Y') : '' }}</td>
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


