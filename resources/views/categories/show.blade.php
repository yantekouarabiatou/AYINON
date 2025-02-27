@extends('layout')

@section('content')
<br><br><br><br><br><br><br><br>

<div class="container mt-5">
    <!-- Single Category Card -->
    <div class="row justify-content-center">
        <div class="col-md-6 mb-4">
            <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <h2 class="mb-4 text-center"><strong>Modification de la catégorie:</strong> {{ $categorie->name }}</h2>

                    <!-- Category Information Table -->
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Nom de la catégorie</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>{{ $categorie->name }}</strong></td>
                                <td>{{ $categorie->description }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Action Buttons -->
                    <div class="d-flex justify-content-end">
                        <!-- Update Button with Icon -->
                        <button class="btn btn-warning me-2" data-bs-toggle="modal" data-bs-target="#updateCategoryModal{{ $categorie->id }}">
                            <i class="fas fa-edit"></i> Mettre à jour
                        </button>
                        <!-- Delete Button with Icon -->
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal{{ $categorie->id }}">
                            <i class="fas fa-trash-alt"></i> Supprimer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Modal -->
    <div class="modal fade" id="updateCategoryModal{{ $categorie->id }}" tabindex="-1" aria-labelledby="updateCategoryModalLabel{{ $categorie->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateCategoryModalLabel{{ $categorie->id }}">Mettre à jour la catégorie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Update Form -->
                    <form action="{{ route('categories.update', $categorie->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nameInput{{ $categorie->id }}" class="form-label">Nom de la catégorie</label>
                            <input type="text" class="form-control" id="nameInput{{ $categorie->id }}" name="name" value="{{ $categorie->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="descriptionInput{{ $categorie->id }}" class="form-label">Description</label>
                            <textarea class="form-control" id="descriptionInput{{ $categorie->id }}" name="description" rows="5" required>{{ $categorie->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save"></i> Modifier
                        </button>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteCategoryModal{{ $categorie->id }}" tabindex="-1" aria-labelledby="deleteCategoryModalLabel{{ $categorie->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteCategoryModalLabel{{ $categorie->id }}">Supprimer la catégorie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer cette catégorie ? Cette action est irréversible.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i> Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    <!-- Ajouter FontAwesome CDN pour les icônes -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection
