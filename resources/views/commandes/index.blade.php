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
                                        <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search commande" />
                                    </div>
                                </div>
                                <div class="card-toolbar">
                                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                        <a href="{{ route('commandes.create') }}" class="btn btn-primary">Ajouter une commande</a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body pt-3">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_commandes">
                                        <thead>
                                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="w-10px pe-2">
                                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                                                    </div>
                                                </th>
                                                <th class="min-w-175px">Référence</th>
                                                <th class="min-w-175px">Nom du produit</th>
                                                <th class="min-w-175px">Quantité commandée</th>
                                                <th class="min-w-150px">Date d'entrée</th>
                                                <th class="min-w-100px text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-600 fw-bold">
                                            @foreach($commandes as $commande)
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="{{ $commande->id }}" />
                                                    </div>
                                                </td>
                                                <td>{{ $commande->reference }}</td>
                                                <td>
                                                    @foreach($commande->produits as $produit)
                                                        <p style="margin: 0.25rem 0;">{{ $produit->name }}</p>
                                                    @endforeach
                                                </td>
                                                <td>{{ $commande->quantite }} Kg</td>
                                                <td>{{ $commande->date_entree }}</td>
                                                <td class="text-end">
                                                    <div class="btn-group">
                                                        <button type="button" 
                                                                class="btn btn-sm px-4 dropdown-toggle"
                                                                style="background-color: #f1faff; border-color: #bae6fd; color: #0369a1; transition: all 0.3s ease;"
                                                                onmouseover="this.style.backgroundColor='#e0f2fe'; this.style.borderColor='#7dd3fc'"
                                                                onmouseout="this.style.backgroundColor='#f1faff'; this.style.borderColor='#bae6fd'"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="fas fa-cog me-2"></i> Actions
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm" style="min-width: 180px; border-radius: 8px;">
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center py-2" 
                                                                   href="{{ route('commandes.show', $commande->id) }}"
                                                                   style="transition: all 0.2s ease;"
                                                                   onmouseover="this.style.backgroundColor='#f8fafc'; this.style.transform='translateX(3px)'"
                                                                   onmouseout="this.style.backgroundColor=''; this.style.transform=''">
                                                                    <span style="background-color: #dcfce7; padding: 0.35rem; border-radius: 50%; margin-right: 0.5rem;">
                                                                        <i class="fas fa-eye text-success"></i>
                                                                    </span>
                                                                    <span>Voir détails</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center py-2" 
                                                                   href="{{ route('commandes.edit', $commande->id) }}"
                                                                   style="transition: all 0.2s ease;"
                                                                   onmouseover="this.style.backgroundColor='#f8fafc'; this.style.transform='translateX(3px)'"
                                                                   onmouseout="this.style.backgroundColor=''; this.style.transform=''">
                                                                    <span style="background-color: #fef9c3; padding: 0.35rem; border-radius: 50%; margin-right: 0.5rem;">
                                                                        <i class="fas fa-edit text-warning"></i>
                                                                    </span>
                                                                    <span>Modifier</span>
                                                                </a>
                                                            </li>
                                                            <li><hr class="dropdown-divider"></li>
                                                            <li>
                                                                <a class="dropdown-item d-flex align-items-center py-2 text-danger" 
                                                                   href="#" 
                                                                   data-bs-toggle="modal" 
                                                                   data-bs-target="#deleteModal{{ $commande->id }}"
                                                                   style="transition: all 0.2s ease;"
                                                                   onmouseover="this.style.backgroundColor='#f8fafc'; this.style.transform='translateX(3px)'"
                                                                   onmouseout="this.style.backgroundColor=''; this.style.transform=''">
                                                                    <span style="background-color: #fee2e2; padding: 0.35rem; border-radius: 50%; margin-right: 0.5rem;">
                                                                        <i class="fas fa-trash-alt"></i>
                                                                    </span>
                                                                    <span>Supprimer</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Modal de confirmation de suppression -->
                                            <div class="modal fade" id="deleteModal{{ $commande->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $commande->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel{{ $commande->id }}">Confirmer la suppression</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Êtes-vous sûr de vouloir supprimer cette commande ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                            <form action="{{ route('commandes.destroy', $commande->id) }}" method="POST" style="display:inline;">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
