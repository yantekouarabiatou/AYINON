@extends('layout')
@section('content')

<div class="page d-flex flex-row flex-column-fluid">
    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <div id="kt_content_container" class="container-xxl">
                    <div class="card shadow-sm">
                        <div class="card-header pt-7">
                            <h5 class="card-title">Ajouter un nouveau fournisseur</h5>
                        </div>
                        <div class="card-body">
                            <!-- Formulaire pour ajouter un fournisseur -->
                            <form action="{{ route('fournisseurs.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-2">
                                    <!-- Nom du fournisseur -->
                                    <div class="mb-3 fv-row fv-plugins-icon-container col-6">
                                        <label for="nom" class="form-label">Nom du fournisseur</label>
                                        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}">
                                        @error('nom')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Catégorie -->
                                    <div class="mb-3 fv-row fv-plugins-icon-container col-6">
                                        <label class="form-label fs-6 fw-bold">Nom du Type Fournisseur:</label>
                                        <select class="form-select form-select-solid fw-bolder" name="type_id" data-kt-select2="true" data-placeholder="Sélectionnez du type de fournisseur" data-allow-clear="true" data-kt-user-table-filter="category" data-hide-search="true">
                                            <option value="">Sélectionnez un nom</option>
                                            @foreach($Tfournisseurs as $Tfournisseur)
                                                <option value="{{ $Tfournisseur->id }}">{{ $Tfournisseur->nom }}</option>
                                            @endforeach
                                        </select>
                                        @error('type_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row g-2">
                                    <!-- Réseau -->
                                    <div class="mb-3 fv-row fv-plugins-icon-container col-6">
                                        <label for="reseau" class="form-label">Réseau du fournisseur</label>
                                        <input type="text" class="form-control @error('reseau') is-invalid @enderror" id="reseau" name="reseau" value="{{ old('reseau') }}">
                                        @error('reseau')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

									 <!-- Image du fournisseur -->
									 <div class="mb-3 fv-row fv-plugins-icon-container col-6">
                                        <label for="logo" class="form-label">Logo du fournisseur</label>
                                        <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo">
                                        @error('logo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <!-- Annuler -->
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                        <i class="fa fa-times-circle"></i> Annuler
                                    </button>

                                    <!-- Ajouter le fournisseur -->
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-plus-circle"></i> Ajouter le fournisseur
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

