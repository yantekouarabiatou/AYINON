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
                                        <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search vente" />
                                    </div>
                                </div>
                                <div class="card-toolbar">
                                @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                                    <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                        <a href="{{ route('ventes.create') }}" class="btn btn-primary">Ajouter un vente</a>
                                    </div>
                                </div>

                            </div>

                            <div class="card-body pt-3">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_ventes">
                                        <thead>
                                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="w-10px pe-2">
                                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                                                    </div>
                                                </th>
                                                <th class="min-w-175px">#</th>
                                                <!-- <th class="min-w-175px">Image du vendeur</th> -->
                                                <th class="min-w-175px">Nom du vendeur</th>
                                                <th class="min-w-175px"> Montant de la vente</th>
                                                <th class="min-w-100px text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-600 fw-bold">
                                        @foreach($ventes as $index => $vente)
                                            <tr>

                                                <td>
                                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="{{ $vente->id }}" />
                                                    </div>
                                                </td>
                                                <td>{{ $index + 1 }}</td>

                                                <!-- <td>
                                                    <img src="{{ Auth::user()->getFirstMediaUrl('photos', 'photo') }}" 
                                                         alt="Photo de l'utilisateur" width="50">
                                                </td>                                                 -->
                                                <td>{{ $vente->user->name }}</td>
                                                <td>{{ $vente->montant_total }}</td>
                                             <!--begin::Action=-->
<td class="text-end">
	<div class="btn-group"
	  <button type="button" class="btn btn-light btn-sm" data-bs-toggle="dropdown" aria-expanded="false">
		Actions
	  </button>
	  <ul class="dropdown-menu">
		<li><a class="dropdown-item" href="{{ route('ventes.show', $vente->id) }}">
		  <i class="fas fa-eye pe-2"></i>Voir
		</a></li>
		<li><a class="dropdown-item" href="{{ route('ventes.edit', $vente->id) }}">
		  <i class="fas fa-edit pe-2"></i>Modifier
		</a></li>
		<li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $vente->id }}">
		  <i class="fas fa-trash pe-2"></i>Supprimer
		</a></li>
	  </ul>
	</div>
  </td>
  <!--end::Action=-->
  
<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="deleteModal{{ $vente->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $vente->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $vente->id }}">Confirmer la suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer ce vente ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <form action="{{ route('ventes.destroy', $vente->id) }}" method="POST" style="display:inline;">
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
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

