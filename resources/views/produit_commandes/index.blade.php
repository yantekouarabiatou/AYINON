@extends('layout')

@section('content')
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
                                    <input type="text" class="form-control form-control-solid w-250px ps-14" placeholder="Rechercher un produitCommande commandé" />
                                </div>
                            </div>
                            <div class="card-toolbar">
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('produitsCommandes.create') }}" 
                                       class="btn btn-primary"
                                       style="background-color: #3699ff; border-color: #3699ff; padding: 0.65rem 1.25rem; border-radius: 0.475rem; font-weight: 500; transition: all 0.2s ease;"
                                       onmouseover="this.style.backgroundColor='#187de4'; this.style.borderColor='#187de4'"
                                       onmouseout="this.style.backgroundColor='#3699ff'; this.style.borderColor='#3699ff'">
                                        <i class="fas fa-plus-circle me-2"></i> Ajouter un produit commandé
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body pt-3">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <thead>
                                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase">
                                            <th>ID</th>
                                            <th>produitCommande</th>
                                            <th>Commande</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($produitCommandes as $produitCommande)
                                        <tr>
                                            <td>{{ $produitCommande->id }}</td>
                                            <td>{{ $produitCommande->produit->name }}</td>
                                            <td>{{ $produitCommande->commande->reference }}</td>
                                            <td class="text-end">
                                                <div class="d-flex justify-content-end" style="gap: 0.5rem;">
                                                    <!-- Bouton Voir -->
                                                    <a href="{{ route('produitsCommandes.show', $produitCommande->id) }}" 
                                                       class="btn btn-sm"
                                                       style="background-color: #e8fff3; color: #1bc5bd; border-color: #1bc5bd; padding: 0.5rem 1rem; border-radius: 0.475rem; transition: all 0.2s ease;"
                                                       onmouseover="this.style.backgroundColor='#d4f7eb'; this.style.color='#0bb7af'"
                                                       onmouseout="this.style.backgroundColor='#e8fff3'; this.style.color='#1bc5bd'">
                                                        <i class="fas fa-eye me-1"></i> Voir
                                                    </a>
                                                    
                                                    <!-- Bouton Modifier -->
                                                    <a href="{{ route('produitsCommandes.edit', $produitCommande->id) }}" 
                                                       class="btn btn-sm"
                                                       style="background-color: #fff8dd; color: #ffa800; border-color: #ffa800; padding: 0.5rem 1rem; border-radius: 0.475rem; transition: all 0.2s ease;"
                                                       onmouseover="this.style.backgroundColor='#f7e8be'; this.style.color='#ee9d01'"
                                                       onmouseout="this.style.backgroundColor='#fff8dd'; this.style.color='#ffa800'">
                                                        <i class="fas fa-edit me-1"></i> Modifier
                                                    </a>
                                                    
                                                    <!-- Bouton Supprimer -->
                                                    <form action="{{ route('produitsCommandes.destroy', $produitCommande->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="btn btn-sm"
                                                                style="background-color: #ffe2e5; color: #f64e60; border-color: #f64e60; padding: 0.5rem 1rem; border-radius: 0.475rem; transition: all 0.2s ease;"
                                                                onmouseover="this.style.backgroundColor='#f5c2c7'; this.style.color='#ea2d46'"
                                                                onmouseout="this.style.backgroundColor='#ffe2e5'; this.style.color='#f64e60'">
                                                            <i class="fas fa-trash-alt me-1"></i> Supprimer
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
<!-- Pagination stylisée -->
<div class="d-flex justify-content-between align-items-center flex-wrap mt-5">
    <div class="d-flex align-items-center py-3">
        <span class="text-muted fs-7 fw-bold">
            Affichage de {{ $produitCommandes->firstItem() }} à {{ $produitCommandes->lastItem() }} sur {{ $produitCommandes->total() }} entrées
        </span>
    </div>
    <div class="d-flex flex-wrap py-3">
        <ul class="pagination">
            <!-- Premier lien -->
            <li class="page-item {{ $produitCommandes->onFirstPage() ? 'disabled' : '' }}">
                <a href="{{ $produitCommandes->url(1) }}" class="page-link" aria-label="First">
                    <span aria-hidden="true">&laquo;&laquo;</span>
                </a>
            </li>
            <!-- Lien précédent -->
            <li class="page-item {{ $produitCommandes->onFirstPage() ? 'disabled' : '' }}">
                <a href="{{ $produitCommandes->previousPageUrl() }}" class="page-link" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <!-- Liens des pages -->
            @foreach ($produitCommandes->getUrlRange(max(1, $produitCommandes->currentPage() - 2), min($produitCommandes->lastPage(), $produitCommandes->currentPage() + 2)) as $page => $url)
                <li class="page-item {{ $page == $produitCommandes->currentPage() ? 'active' : '' }}">
                    <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                </li>
            @endforeach
            <!-- Lien suivant -->
            <li class="page-item {{ !$produitCommandes->hasMorePages() ? 'disabled' : '' }}">
                <a href="{{ $produitCommandes->nextPageUrl() }}" class="page-link" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
            <!-- Dernier lien -->
            <li class="page-item {{ !$produitCommandes->hasMorePages() ? 'disabled' : '' }}">
                <a href="{{ $produitCommandes->url($produitCommandes->lastPage()) }}" class="page-link" aria-label="Last">
                    <span aria-hidden="true">&raquo;&raquo;</span>
                </a>
            </li>
        </ul>
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


@push('styles')
<style>
/* Style personnalisé pour la pagination */
.pagination {
--bs-pagination-color: #5E6278;
--bs-pagination-bg: #F5F8FA;
--bs-pagination-border-color: #E4E6EF;
--bs-pagination-hover-color: #009EF7;
--bs-pagination-hover-bg: #F1FAFF;
--bs-pagination-hover-border-color: #E4E6EF;
--bs-pagination-focus-color: #009EF7;
--bs-pagination-focus-bg: #F1FAFF;
--bs-pagination-focus-box-shadow: 0 0 0 0.25rem rgba(0, 158, 247, 0.25);
--bs-pagination-active-color: #FFFFFF;
--bs-pagination-active-bg: #009EF7;
--bs-pagination-active-border-color: #009EF7;
--bs-pagination-disabled-color: #B5B5C3;
--bs-pagination-disabled-bg: #F5F8FA;
--bs-pagination-disabled-border-color: #E4E6EF;
border-radius: 0.475rem;
}

.page-item.active .page-link {
box-shadow: 0 0 0 2px #F1FAFF;
}

.page-link {
padding: 0.5rem 0.75rem;
min-width: 2.5rem;
text-align: center;
margin: 0 2px;
border-radius: 0.475rem !important;
}
</style>
@endpush