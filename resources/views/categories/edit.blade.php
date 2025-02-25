@extends('layout')
@section('content')

<!--begin::Modal - Update Category-->
<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bolder">Mettre à jour une Catégorie</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                </div>
            </div>
            <!--end::Modal header-->

            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="kt_modal_add_user_form" class="form" action="{{ route('categories.update', $categorie->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                        
                        <!--begin::Input group - Nom-->
                        <div class="fv-row mb-7">
                            <label class="required fw-bold fs-6 mb-2">Entrez le nouveau nom de la catégorie</label>
                            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Le nom de la catégorie" value="{{ $categorie->name }}" required />
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group - Description-->
                        <div class="fv-row mb-7">
                            <label class="required fw-bold fs-6 mb-2">Entrez la description de la catégorie</label>
                            <textarea name="description" class="form-control form-control-solid" placeholder="Description de la catégorie" rows="5">{{ $categorie->description }}</textarea>
                        </div>
                        <!--end::Input group-->

                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Mettre à jour</span>
                            </button>
                        </div>
                        <!--end::Actions-->

                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Update Category-->


