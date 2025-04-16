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
                                        <input type="text" id="searchInput" class="form-control form-control-solid w-250px ps-14" placeholder="Rechercher par Catégorie" />
                                    </div>
                                </div>
                                <div class="card-toolbar">
                                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">

                                        <a href="{{ route('categories.create') }}" class="btn btn-primary">Ajouter catégorie</a>
                                    </div>
                                </div>

                                <!-- Alerte de stock faible -->

                            </div>

                            <div class="card-body pt-3">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_categories">
                                        <thead>
                                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="w-10px pe-2">
                                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                                                    </div>
                                                </th>
                                                <th class="min-w-175px">Nom de la categorie</th>
                                                <th class="min-w-150px">Description de la categorie</th>
                                                <th class="min-w-100px text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-600 fw-bold" id="categoriesTable">
                                            @foreach($categories as $categorie)
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="{{ $categorie->id }}" />
                                                    </div>
                                                </td>
                                                <td>{{ $categorie->name }}</td>
                                                <td>{{ $categorie->description }}</td>
                                             <!--begin::Action=-->
<td class="text-end">
	<div class="btn-group">
	  <button type="button" class="btn btn-light btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
		Actions
	  </button>
	  <ul class="dropdown-menu">
		<li><a class="dropdown-item" href="{{ route('categories.show', $categorie->id) }}">
		  <i class="fas fa-eye pe-2"></i>Voir
		</a></li>
		<li><a class="dropdown-item" href="{{ route('categories.edit', $categorie->id) }}">
		  <i class="fas fa-edit pe-2"></i>Modifier
		</a></li>
		<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $categorie->id }}">
		  <i class="fas fa-trash pe-2"></i>Supprimer
		</a></li>
	  </ul>
	</div>
  </td>
  <!--end::Action=-->
  								<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="deleteModal{{ $categorie->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $categorie->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $categorie->id }}">Confirmer la suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer cette catégorie ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>

			                             </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            <!-- Pagination stylisée -->
<div class="d-flex justify-content-between align-items-center flex-wrap mt-5">
    <div class="d-flex align-items-center py-3">
        <span class="text-muted fs-7 fw-bold">
            Affichage de {{ $categories->firstItem() }} à {{ $categories->lastItem() }} sur {{ $categories->total() }} entrées
        </span>
    </div>
    <div class="d-flex flex-wrap py-3">
        <ul class="pagination">
            <!-- Premier lien -->
            <li class="page-item {{ $categories->onFirstPage() ? 'disabled' : '' }}">
                <a href="{{ $categories->url(1) }}" class="page-link" aria-label="First">
                    <span aria-hidden="true">&laquo;&laquo;</span>
                </a>
            </li>
            <!-- Lien précédent -->
            <li class="page-item {{ $categories->onFirstPage() ? 'disabled' : '' }}">
                <a href="{{ $categories->previousPageUrl() }}" class="page-link" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <!-- Liens des pages -->
            @foreach ($categories->getUrlRange(max(1, $categories->currentPage() - 2), min($categories->lastPage(), $categories->currentPage() + 2)) as $page => $url)
                <li class="page-item {{ $page == $categories->currentPage() ? 'active' : '' }}">
                    <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                </li>
            @endforeach
            <!-- Lien suivant -->
            <li class="page-item {{ !$categories->hasMorePages() ? 'disabled' : '' }}">
                <a href="{{ $categories->nextPageUrl() }}" class="page-link" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
            <!-- Dernier lien -->
            <li class="page-item {{ !$categories->hasMorePages() ? 'disabled' : '' }}">
                <a href="{{ $categories->url($categories->lastPage()) }}" class="page-link" aria-label="Last">
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
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const tableRows = document.querySelectorAll('#categoriesTable tr');

        searchInput.addEventListener('keyup', function () {
            const searchTerm = searchInput.value.toLowerCase();

            tableRows.forEach(function (row) {
                const name = row.children[1].textContent.toLowerCase();
                const description = row.children[2].textContent.toLowerCase();

                if (name.includes(searchTerm) || description.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>
@endpush
