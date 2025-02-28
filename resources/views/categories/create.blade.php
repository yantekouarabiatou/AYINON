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
								<h5 class="card-title">Ajouter une nouveau catégorie</h5>
							</div>
							<div class="card-body">
								<!-- Formulaire pour ajouter un produit -->
								<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
									@csrf
									<div class="row ">
										<!-- Nom du produit -->
										<div class="mb-3 fv-row fv-plugins-icon-container col-12">
											<label for="name" class="form-label">Nom de la catégorie</label>
											<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
											@error('name')
												<div class="invalid-feedback">{{ $message }}</div>
											@enderror
										</div>

										
									</div>

									
                               <div class="">

                                   <!-- Description -->
                        <div class="mb-3 fv-row fv-plugins-icon-container col-12">
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

										<!-- Ajouter le produit -->
										<button type="submit" class="btn btn-primary">
											<i class="fa fa-plus-circle"></i> Ajouter la catégorie
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
