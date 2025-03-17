@extends('layout')

@section('content')
<div>
    <div class="page d-flex flex-row flex-column-fluid">
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <div id="kt_content_container" class="container-xxl">
                        <div class="card">
                            <div class="card-header border-0 pt-6">
                                <div class="card-title">
                                    <div class="d-flex align-items-center position-relative my-1">
                                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                            <!-- Icone de recherche -->
                                        </span>
                                        <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Rechercher un produit" />
                                    </div>
                                </div>
                                <div class="card-toolbar">
                                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                        <a href="{{ route('produits.create') }}" class="btn btn-primary">Ajouter un produit</a>
                                    </div>
                                </div>

                                <!-- Alerte pour les stocks faibles -->
                                @if($alertProduits->isNotEmpty())
                                    <div class="alert alert-warning mt-3">
                                        <strong>Alerte de stock faible :</strong>
                                        <ul>
                                            @foreach($alertProduits as $alertproduit)
                                                <li>{{ $alertproduit->name }} ({{ $alertproduit->quantite }} en stock)</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>

                            <div class="card-body pt-3">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_produits">
                                        <thead>
                                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                <th>Image produit</th>
                                                <th>Nom produit</th>
                                                <th>Description</th>
                                                <th>Prix unitaire</th>
                                                <th>Quantité</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-600 fw-bold">
                                            @foreach($produits as $produit)
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset('storage/produits/' . $produit->getFirstMedia()?->file_name) }}" 
                                                             alt="{{ $produit->name }}" 
                                                             width="100" 
                                                             style="max-height: 100px; object-fit: cover;">
                                                    </td>
                                                    
                                                    <td>{{ $produit->name }}</td>
                                                    <td>{{ $produit->description }}</td>
                                                    <td>{{ number_format($produit->prix, 0, ',', ' ') }} FCFA</td>
                                                    <td>{{ $produit->quantite }} Cartons</td>
                                                    <td class="text-end">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                Actions
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="{{ route('produits.show', $produit->id) }}"><i class="fas fa-eye pe-2"></i> Voir</a></li>
                                                                <li><a class="dropdown-item" href="{{ route('produits.edit', $produit->id) }}"><i class="fas fa-edit pe-2"></i> Modifier</a></li>
                                                                <li>
                                                                    <a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $produit->id }}">
                                                                        <i class="fas fa-trash pe-2"></i> Supprimer
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Modal pour confirmer la suppression -->
                                                <div class="modal fade" id="deleteModal{{ $produit->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $produit->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel{{ $produit->id }}">Confirmation de suppression</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Êtes-vous sûr de vouloir supprimer le produit <strong>{{ $produit->name }}</strong> ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                                <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" style="display:inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div> <!-- Fin du card-body -->
                        </div> <!-- Fin de la card -->
                    </div> <!-- Fin du container -->
                </div>
            </div>
        </div>
    </div>
</div>

