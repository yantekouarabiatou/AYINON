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
								<h5 class="card-title">Modifier le type de fournisseur</h5>
							</div>
							<div class="card-body">
								<!-- Formulaire pour mettre à jour le Tfournisseur -->
								<form action="{{ route('Tfournisseurs.update', $Tfournisseur->id) }}" method="POST" enctype="multipart/form-data">
                                   @csrf
									@method('PUT') <!-- Méthode pour la mise à jour -->

									<div class="row g-2">
										<!-- Nom du Tfournisseur -->
										<div class="mb-3 fv-row fv-plugins-icon-container col-12">
											<label for="nom" class="form-label">Nom du Type de fournisseur</label>
											<input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom', $Tfournisseur->nom) }}">
											@error('nom')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>
									</div>

									</div>

									<div class="card-footer">
										<!-- Annuler -->
										<a href="{{ route('Tfournisseurs.index') }}" class="btn btn-danger">
											<i class="fa fa-times-circle"></i> Annuler
										</a>

										<!-- Mettre à jour le Tfournisseur -->
										<button type="submit" class="btn btn-primary">
											<i class="fa fa-save"></i> Mettre à jour le Type fournisseur
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


