@extends('layout')
@section('content')
   <br><br><br><br><br><br><br><br><br>
    <div class="auth-page-wrapper ">
        
        <div class="auth-page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 col-lg-8 col-xl-5 d-flex  justify-content-center">
                        <div class="card mt-4 card-bg-fill">
                            <div class="card-body p-4 text-center">
                                <div class="avatar-lg mx-auto mt-2">
                                    <div class="avatar-title bg-light text-success display-3 rounded-circle">
                                        <i class="ri-checkbox-circle-fill"></i>
                                    </div>
                                </div>
                                <div class="mt-4 pt-2">
                                    <h4>Bien joué !</h4>
                                    <p class="text-muted mx-4">La catégorie a été enregistrée avec succès.</p>
                                    <div class="mt-4">
                                        <a href="{{ route('categories.index') }}" class="btn btn-primary w-100">Retour à la liste des catégories</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
