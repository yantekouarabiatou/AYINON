@extends('layout')
@section('content')

<div class="container mt-5">
    <h2 class="mb-4">Mettre à jour une Catégorie</h2>

    <form action="{{ route('categories.update', $categorie->id) }}" method="POST" class="row g-3">
        @csrf
        @method('PUT')

        <div class="col-md-12">
            <label for="nameInput" class="form-label">Nom de la catégorie</label>
            <input type="text" class="form-control" id="nameInput" name="name" placeholder="Entrez le nom de la catégorie" value="{{ $categorie->name }}" required>
        </div>

        <div class="col-md-12">
            <label for="descriptionInput" class="form-label">Description</label>
            <textarea class="form-control" id="descriptionInput" name="description" placeholder="Entrez la description de la catégorie" rows="5" required>{{ $categorie->description }}</textarea>
        </div>

        <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </div>
    </form>
</div>

@endsection
