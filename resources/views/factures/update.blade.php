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
								<h5 class="card-title">Modifier le factureCommande</h5>
							</div>
							<div class="card-body">
								<!-- Formulaire pour mettre à jour le factureCommande -->
								<form action="{{ route('factureCommandes.update', $factureCommande->id) }}" method="POST" enctype="multipart/form-data">
									@csrf
									 @method('PUT') <!-- Méthode pour la mise à jour -->
								 
									 <div class="row g-2">
								 
										 <!-- Catégorie -->
										 <div class="mb-3 fv-row fv-plugins-icon-container col-6">
											 <label class="form-label fs-6 fw-bold">La date d'entrée de la commande:</label>
											 <select class="form-select form-select-solid fw-bolder" name="commande_id" data-kt-select2="true" data-placeholder="Sélectionnez la date commandes" data-allow-clear="true">
												 <option value="">Sélectionnez la date de la commandes</option>
												 @foreach($commandes as $commande)
													 <option value="{{ $commande->id }}" {{ $factureCommande->commande_id == $commande->id ? 'selected' : '' }}>
														 {{ $commande->date_entree }}
													 </option>
												 @endforeach
											 </select>
											 @error('commande_id')
												 <div class="invalid-feedback">{{ $message }}</div>
											 @enderror
										 </div>
									 </div>
									 <div class="row g-2">
										 <!-- Image du factureCommande -->
										 <div class="mb-3 fv-row fv-plugins-icon-container col-6">
											 <label for="recu" class="form-label">Image du factureCommande</label>
											 <input type="file" class="form-control @error('recu') is-invalid @enderror" id="recu" name="recu">
											 @if($factureCommande->recu)
												 <p class="mt-2">Image actuelle :</p>
												 <img src="{{ Storage::url($factureCommande->recu) }}" alt="{{ $factureCommande->name }}" width="120">
											 @endif
											 @error('recu')
												 <div class="invalid-feedback">{{ $message }}</div>
											 @enderror
										 </div>
									 </div>
								 
									 <div class="card-footer">
										 <!-- Annuler -->
										 <a href="{{ route('factureCommandes.index') }}" class="btn btn-danger">
											 <i class="fa fa-times-circle"></i> Annuler
										 </a>
								 
										 <!-- Mettre à jour le factureCommande -->
										 <button type="submit" class="btn btn-primary">
											 <i class="fa fa-save"></i> Mettre à jour le factureCommande
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


