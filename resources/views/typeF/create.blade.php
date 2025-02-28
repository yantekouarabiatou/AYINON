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
								<h5 class="card-title">Ajouter un nouveau fournisseur </h5>
							</div>
							<div class="card-body">
								<!-- Formulaire pour ajouter un produit -->
								<form action="{{ route('Tfournisseurs.store') }}" method="POST" enctype="multipart/form-data">
									@csrf
									<div class="row ">
										<!-- Nom du produit -->
										<div class="mb-3 fv-row fv-plugins-icon-container col-12">
											<label for="nom" class="form-label">Nom du fournisseur</label>
											<input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}">
											@error('nom')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>	
									</div>

                                  </div>
									
									<div class="card-footer">
										<!-- Annuler -->
										<button type="button" class="btn btn-danger" data-bs-dismiss="modal">
											<i class="fa fa-times-circle"></i> Annuler
										</button>

										<!-- Ajouter le produit -->
										<button type="submit" class="btn btn-primary">
											<i class="fa fa-plus-circle"></i> Ajouter un fournisseur
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
