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
                                <h2>Détails de la livraison #{{ $livraison->id }}</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <div class="card-body pt-5">
                            <div>
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5">
                                        <tr>
                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">ID:</th>
                                            <td>{{ $livraison->id }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Produit Commandé:</th>
                                            <td>
                                                @if($livraison->produitCommande && $livraison->produitCommande->produit)
                                                    {{ $livraison->produitCommande->produit->nom ?? 'N/A' }} - 
                                                    {{ $livraison->produitCommande->commande->reference ?? 'N/A' }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Date de livraison:</th>
                                            <td>{{ \Carbon\Carbon::parse($livraison->dateLivraison)->format('d/m/Y') }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Créé le:</th>
                                            <td>{{ $livraison->created_at ? $livraison->created_at->format('d-m-Y H:i') : '' }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Mis à jour le:</th>
                                            <td>{{ $livraison->updated_at ? $livraison->updated_at->format('d-m-Y H:i') : '' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('livraisons.index') }}" class="btn btn-secondary me-2">
                                    <i class="fa fa-arrow-left"></i> Retour à la liste
                                </a>
                                <a href="{{ route('livraisons.edit', $livraison->id) }}" class="btn btn-primary me-2">
                                    <i class="fa fa-edit"></i> Modifier
                                </a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $livraison->id }}">
                                    <i class="fa fa-trash"></i> Supprimer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="deleteModal{{ $livraison->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $livraison->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $livraison->id }}">Confirmer la suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer cette livraison ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <form action="{{ route('livraisons.destroy', $livraison->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>