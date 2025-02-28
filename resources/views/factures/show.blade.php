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
                                <h2>Détails du factureCommande {{  $factureCommande->commande->reference }}</h2>
                            </div>
                            <!--begin::Card image-->
                            <div class="card-image" style="box-shadow: 0 4px 8px rgba(13, 12, 12, 0.591); border-radius: 15px;">
                                <!-- Vérifie si une photo est définie, sinon affiche une image par défaut -->
                                <img src="{{ $factureCommande->getFirstMediaUrl('factureCommandes') }}" 
                                 alt="{{ $factureCommande->nom }}" 
                                width="100" class="img-fluid" 
                                style="max-height: 200px; object-fit: cover;" />
                               </div>
                            </div>
                            <!--end::Card header-->
                        </div>
                        <!--end::Card header-->
                        <div class="card-body pt-5">
                            <div>
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5">
                                        <tr>
                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Date d'entrée de la commande:</th>
                                            <td>
                                                @if ($factureCommande->commande && $factureCommande->commande->date_entree)
                                                    {{ \Carbon\Carbon::parse($factureCommande->commande->date_entree)->format('d-m-Y') }}
                                                @else
                                                    Non définie
                                                @endif
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Date de création:</th>
                                            <td>
                                                @if ($factureCommande->created_at)
                                                    {{ \Carbon\Carbon::parse($factureCommande->created_at)->format('d-m-Y') }}
                                                @else
                                                    Non définie
                                                @endif
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

