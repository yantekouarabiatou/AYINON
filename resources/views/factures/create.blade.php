@extends('layout')
@section('content')

<div class="page d-flex flex-row flex-column-fluid">
	<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
		<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
			<div class="post d-flex flex-column-fluid" id="kt_post">
				<div id="kt_content_container" class="container-xxl">
					<div class="card">
						<div class="card shadow-sm">
							<div class="card-header pt-7">
								<h5 class="card-title">Ajouter un nouveau factureCommande</h5>
							</div>
							<div class="card-body">
								<!-- Formulaire pour ajouter un factureCommande -->
								<form action="{{ route('factureCommandes.store') }}" method="POST" enctype="multipart/form-data">
									@csrf
									<div class="row g-2">
										<!-- Nom du factureCommande -->
										<div class="mb-3 fv-row fv-plugins-icon-container col-6">
											<label for="recu" class="form-label">Image du facture  pour la commande</label>
											<input type="file" class="form-control @error('recu') is-invalid @enderror" id="recu" name="recu">
											@error('recu')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>
										<!-- Catégorie -->
										<div class="mb-3 fv-row fv-plugins-icon-container col-6">
											<label class="form-label fs-6 fw-bold">Date de la commande:</label>
											<select class="form-select form-select-solid fw-bolder" name="commande_id" data-kt-select2="true" data-placeholder="Selectionnez la date de commande " data-allow-clear="true" data-kt-user-table-filter="commande" data-hide-search="true">
												<option value="">Selectionnez un nom</option>
												@foreach($commandes as $commande)
													<option value="{{ $commande->id }}">{{ $commande->date_entree }}</option>
												@endforeach
											</select>
											@error('commande_id')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>
									</div>

<div class="row g-2">
<!-- Image du factureCommande -->

<!-- Description -->
<div class="mb-3 fv-row fv-plugins-icon-container col-6">
	<label for="description" class="form-label">Description</label>
	<textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
	@error('description')
		<div class="invalid-feedback">{{ $message }}</div>
	@enderror
</div>

</div>

									<div class="card-footer">
										<!-- Annuler -->
										<button type="button" class="btn btn-danger" data-bs-dismiss="modal">
											<i class="fa fa-times-circle"></i> Annuler
										</button>

										<!-- Ajouter le factureCommande -->
										<button type="submit" class="btn btn-primary">
											<i class="fa fa-plus-circle"></i> Ajouter le factureCommande
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
