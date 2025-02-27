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
								<h5 class="card-title">Modifier le produit</h5>
							</div>
							<div class="card-body">
								<!-- Formulaire pour mettre à jour le produit -->
								<form action="{{ route('produits.update', $produit->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
									@method('PUT') <!-- Méthode pour la mise à jour -->

									<div class="row g-2">
										<!-- Nom du produit -->
										<div class="mb-3 fv-row fv-plugins-icon-container col-6">
											<label for="name" class="form-label">Nom du produit</label>
											<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $produit->name) }}">
											@error('name')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>

										<!-- Catégorie -->
										<div class="mb-3 fv-row fv-plugins-icon-container col-6">
											<label class="form-label fs-6 fw-bold">Nom de la catégorie:</label>
											<select class="form-select form-select-solid fw-bolder" name="categorie_id" data-kt-select2="true" data-placeholder="Sélectionnez la catégorie" data-allow-clear="true">
												<option value="">Sélectionnez une catégorie</option>
												@foreach($categories as $categorie)
													<option value="{{ $categorie->id }}" {{ $produit->categorie_id == $categorie->id ? 'selected' : '' }}>
														{{ $categorie->name }}
													</option>
												@endforeach
											</select>
											@error('categorie_id')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>
									</div>

									<div class="row g-2">
										<!-- Prix -->
										<div class="mb-3 fv-row fv-plugins-icon-container col-4">
											<label for="prix" class="form-label">Prix</label>
											<input type="number" class="form-control @error('prix') is-invalid @enderror" id="prix" name="prix" value="{{ old('prix', $produit->prix) }}" step="0.01">
											@error('prix')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>

										<!-- Quantité -->
										<div class="mb-3 fv-row fv-plugins-icon-container col-4">
											<label for="quantite" class="form-label">Quantité</label>
											<input type="number" class="form-control @error('quantite') is-invalid @enderror" id="quantite" name="quantite" value="{{ old('quantite', $produit->quantite) }}">
											@error('quantite')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>

										<!-- Seuil d'alerte -->
										<div class="mb-3 fv-row fv-plugins-icon-container col-4">
											<label for="stock_alert" class="form-label">Seuil d'alerte de stock</label>
											<input type="number" class="form-control @error('stock_alert') is-invalid @enderror" id="stock_alert" name="stock_alert" value="{{ old('stock_alert', $produit->stock_alert) }}">
											@error('stock_alert')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>
									</div>

									<div class="row g-2">
										<!-- Image du produit -->
										<div class="mb-3 fv-row fv-plugins-icon-container col-6">
											<label for="photo" class="form-label">Image du produit</label>
											<input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
											@if($produit->photo)
												<p class="mt-2">Image actuelle :</p>
												<img src="{{ Storage::url($produit->photo) }}" alt="{{ $produit->name }}" width="120">
											@endif
											@error('photo')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>

										<!-- Description -->
										<div class="mb-3 fv-row fv-plugins-icon-container col-6">
											<label for="description" class="form-label">Description</label>
											<textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $produit->description) }}</textarea>
											@error('description')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>
									</div>

									<div class="card-footer">
										<!-- Annuler -->
										<a href="{{ route('produits.index') }}" class="btn btn-danger">
											<i class="fa fa-times-circle"></i> Annuler
										</a>

										<!-- Mettre à jour le produit -->
										<button type="submit" class="btn btn-primary">
											<i class="fa fa-save"></i> Mettre à jour le produit
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


