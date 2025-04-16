<!-- resources/views/produitsCommandes/show.blade.php -->
@extends('layout')
@section('content')

<div class="page d-flex flex-row flex-column-fluid">
    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <div id="kt_content_container" class="container-xxl">
                    <div class="card card-flush">
                        <div class="card-header pt-7">
                            <div class="card-title">
                                <h2>Détails du produit commandé #{{ $produitCommande->id }}</h2>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            <table class="table align-middle table-row-dashed fs-6 gy-5">
                                <tr>
                                    <th class="text-gray-500 fw-bolder fs-7 text-uppercase">ID:</th>
                                    <td>{{ $produitCommande->id }}</td>
                                </tr>
                                <tr>
                                    <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Produit:</th>
                                    <td>{{ $produitCommande->produit->nom }}</td>
                                </tr>
                                <tr>
                                    <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Commande:</th>
                                    <td>{{ $produitCommande->commande->reference }}</td>
                                </tr>
                                <tr>
                                    <th class="text-gray-500 fw-bolder fs-7 text-uppercase">Créé le:</th>
                                    <td>{{ $produitCommande->created_at->format('d-m-Y H:i') }}</td>
                                </tr>
                            </table>

                            <div class="mt-4">
                                <a href="{{ route('produitsCommandes.index') }}" class="btn btn-secondary me-2">
                                    <i class="fa fa-arrow-left"></i> Retour à la liste
                                </a>
                                <a href="{{ route('produitsCommandes.edit', $produitCommande->id) }}" class="btn btn-primary me-2">
                                    <i class="fa fa-edit"></i> Modifier
                                </a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $produitCommande->id }}">
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
<div class="modal fade" id="deleteModal{{ $produitCommande->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $produitCommande->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $produitCommande->id }}">Confirmer la suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer ce produit commandé ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <form action="{{ route('produitsCommandes.destroy', $produitCommande->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>

