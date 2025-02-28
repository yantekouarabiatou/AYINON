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
								<h5 class="card-title">Modifier la categorie</h5>
							</div>
							<div class="card-body">
								<!-- Formulaire pour mettre à jour le categorie -->
								<form action="{{ route('categories.update', $categorie->id) }}" method="POST" enctype="multipart/form-data">
                                   @csrf
									@method('PUT') <!-- Méthode pour la mise à jour -->

									<div class="row g-2">
										<!-- Nom du categorie -->
										<div class="mb-3 fv-row fv-plugins-icon-container col-12">
											<label for="name" class="form-label">Nom de la categorie</label>
											<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $categorie->name) }}">
											@error('name')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>
									</div>

									<div class="row g-2">
										<!-- Description -->
										<div class="mb-3 fv-row fv-plugins-icon-container col-6">
											<label for="description" class="form-label">Description</label>
											<textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $categorie->description) }}</textarea>
											@error('description')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>
									</div>

									<div class="card-footer">
										<!-- Annuler -->
										<a href="{{ route('categories.index') }}" class="btn btn-danger">
											<i class="fa fa-times-circle"></i> Annuler
										</a>

										<!-- Mettre à jour le categorie -->
										<button type="submit" class="btn btn-primary">
											<i class="fa fa-save"></i> Mettre à jour le categorie
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


