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
								<h5 class="card-title">Modifier le fournisseur</h5>
							</div>
							<div class="card-body">
								<!-- Formulaire pour mettre à jour le fournisseur -->
								<form action="{{ route('fournisseurs.update', $fournisseur->id) }}" method="POST" enctype="multipart/form-data">
                                   @csrf
									@method('PUT') <!-- Méthode pour la mise à jour -->

									<div class="row g-2">
										<!-- Nom du fournisseur -->
										<div class="mb-3 fv-row fv-plugins-icon-container col-6">
											<label for="nom" class="form-label">Nom du fournisseur</label>
											<input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom', $fournisseur->nom) }}">
											@error('nom')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>

										<!-- Catégorie -->
										<div class="mb-3 fv-row fv-plugins-icon-container col-6">
											<label class="form-label fs-6 fw-bold">Nom du type fournisseur:</label>
											<select class="form-select form-select-solid fw-bolder" name="type_id" data-kt-select2="true" data-placeholder="Sélectionnez du type fournisseur" data-allow-clear="true">
												<option value="">Sélectionnez le nom du type fournisseur</option>
												@foreach($Tfournisseurs as $Tfournisseurs)
													<option value="{{ $Tfournisseurs->id }}" {{ $fournisseur->type_id == $Tfournisseurs->id ? 'selected' : '' }}>
														{{ $Tfournisseurs->nom }}
													</option>
												@endforeach
											</select>
											@error('categorie_id')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>
									</div>
									<div class="row g-2">
										<!-- Réseau -->
										<div class="mb-3 fv-row fv-plugins-icon-container col-6">
											<label for="reseau" class="form-label">Réseau du fournisseur</label>
											<input type="text" class="form-control @error('reseau') is-invalid @enderror" id="reseau" name="reseau" value="{{ old('reseau', $fournisseur->reseau) }}"">
											@error('reseau')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>
	
										 <!-- Image du fournisseur -->
										 <div class="mb-3 fv-row fv-plugins-icon-container col-6">
											<label for="logo" class="form-label">Logo du fournisseur</label>
											<input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo" value="{{ old('logo', $fournisseur->logo) }}">
											@error('logo')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>
									</div>
								

									<div class="card-footer">
										<!-- Annuler -->
										<a href="{{ route('fournisseurs.index') }}" class="btn btn-danger">
											<i class="fa fa-times-circle"></i> Annuler
										</a>

										<!-- Mettre à jour le fournisseur -->
										<button type="submit" class="btn btn-primary">
											<i class="fa fa-save"></i> Mettre à jour le fournisseur
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


