@extends('layout')
@section('content')
    <div>

        <div class="page d-flex flex-row flex-column-fluid">

            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <!--begin::Container-->
                        <div id="kt_content_container" class="container-xxl">
                            <!--begin::Card-->
                            <div class="card">
                                <!--begin::Card header-->
                                <div class="card-header border-0 pt-6">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <!--begin::Search-->
                                        <div class="d-flex align-items-center position-relative my-1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                        height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                        fill="black" />
                                                    <path
                                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <input type="text" data-kt-user-table-filter="search"
                                                class="form-control form-control-solid w-250px ps-14"
                                                placeholder="Rechercher un utilisateur" />
                                        </div>
                                        <!--end::Search-->
                                    </div>
                                    <!--begin::Card title-->
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Toolbar-->
                                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                            <!--begin::Filter-->
                                            <button type="button" class="btn btn-light-primary me-3"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->Filtre</button>
                                            <!--begin::Menu 1-->
                                            <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px"
                                                data-kt-menu="true">
                                                <!--begin::Header-->
                                                <div class="px-7 py-5">
                                                    <div class="fs-5 text-dark fw-bolder">Option du Filtre</div>
                                                </div>
                                                <!--end::Header-->
                                                <!--begin::Separator-->
                                                <div class="separator border-gray-200"></div>
                                                <!--end::Separator-->
                                                <!--begin::Content-->
                                                <div class="px-7 py-5" data-kt-user-table-filter="form">
                                                    <!--begin::Input group-->
                                                    <div class="mb-10">
                                                        <label class="form-label fs-6 fw-bold">Role:</label>
                                                        <select class="form-select form-select-solid fw-bolder"
                                                            data-kt-select2="true"
                                                            data-placeholder="Selectionnez une option"
                                                            data-allow-clear="true" data-kt-user-table-filter="role"
                                                            data-hide-search="true">
                                                            <option value="">Select un role</option>
                                                            @foreach ($roles as $role)
                                                                <option value="{{ $role->name }}">{{ $role->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="d-flex justify-content-end">
                                                        <button type="reset"
                                                            class="btn btn-light btn-active-light-primary fw-bold me-2 px-6"
                                                            data-kt-menu-dismiss="true"
                                                            data-kt-user-table-filter="reset">Annuler</button>
                                                        <button type="submit" class="btn btn-primary fw-bold px-6"
                                                            data-kt-menu-dismiss="true"
                                                            data-kt-user-table-filter="filter">Appliquer</button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                            <!--end::Menu 1-->
                                            <!--end::Filter-->
                                            <!--begin::Export-->
                                            <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_export_users">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.3" x="12.75" y="4.25" width="12"
                                                            height="2" rx="1" transform="rotate(90 12.75 4.25)"
                                                            fill="black" />
                                                        <path
                                                            d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z"
                                                            fill="black" />
                                                        <path
                                                            d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z"
                                                            fill="#C4C4C4" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->Exporter</button>
                                            <!--end::Export-->
                                            <!--begin::Add user-->
                                            <a type="button" class="btn btn-primary" href="{{ route('users.create') }}">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="11.364" y="20.364" width="16"
                                                            height="2" rx="1"
                                                            transform="rotate(-90 11.364 20.364)" fill="black" />
                                                        <rect x="4.36396" y="11.364" width="16" height="2"
                                                            rx="1" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->Ajouter Utilisateur</a>
                                            <!--end::Add user-->
                                        </div>
                                        <!--end::Toolbar-->
                                        <!--begin::Group actions-->
                                        <div class="d-flex justify-content-end align-items-center d-none"
                                            data-kt-user-table-toolbar="selected">
                                            <div class="fw-bolder me-5">
                                                <span class="me-2"
                                                    data-kt-user-table-select="selected_count"></span>Sélectinner
                                            </div>

                                            <!-- <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST">
                         @csrf
                         @method('DELETE')
                         <button type="button" class="menu-link px-3 text-danger border-0 bg-transparent"
                         type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected"
                          
                          >
                          Supprimer la sélection
                         </button>
                        </form> -->

                                            <!-- <script>
                                                function deleteUser(userId, userName) { // 🔹 Ajout du paramètre userName
                                                    Swal.fire({
                                                        text: "Voulez-vous vraiment supprimer l'utilisateur '" + userName + "' ?",
                                                        icon: "warning",
                                                        showCancelButton: true,
                                                        confirmButtonText: "Oui, supprimer",
                                                        cancelButtonText: "Annuler",
                                                        customClass: {
                                                            confirmButton: "btn btn-danger",
                                                            cancelButton: "btn btn-secondary"
                                                        }
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            document.getElementById('delete-form-' + userId).submit();
                                                        }
                                                    });
                                                }
                                            </script> -->
                                            <button type="button" class="btn btn-danger"
                                                data-kt-user-table-select="delete_selected">Supprimer Sélectionné</button>
                                        </div>
                                        <!--end::Group actions-->
                                        <!--begin::Modal - Adjust Balance-->
                                        <div class="modal fade" id="kt_modal_export_users" tabindex="-1"
                                            aria-hidden="true">
                                            <!--begin::Modal dialog-->
                                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                                <!--begin::Modal content-->
                                                <div class="modal-content">
                                                    <!--begin::Modal header-->
                                                    <div class="modal-header">
                                                        <!--begin::Modal title-->
                                                        <h2 class="fw-bolder">Exporter les utilisateurs</h2>
                                                        <!--end::Modal title-->
                                                        <!--begin::Close-->
                                                        <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                            data-kt-users-modal-action="close">
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                            <span class="svg-icon svg-icon-1">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                                        height="2" rx="1"
                                                                        transform="rotate(-45 6 17.3137)"
                                                                        fill="black" />
                                                                    <rect x="7.41422" y="6" width="16" height="2"
                                                                        rx="1" transform="rotate(45 7.41422 6)"
                                                                        fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                        <!--end::Close-->
                                                    </div>
                                                    <!--end::Modal header-->
                                                    <!--begin::Modal body-->
                                                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                                        <!--begin::Form-->
                                                        <form id="modal_export_users_form" class="form"
                                                            action="{{ route('export.users') }}" method="POST">
                                                            @csrf
                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-10">
                                                                <!--begin::Label-->
                                                                <label class="fs-6 fw-bold form-label mb-2">Selectionner
                                                                    Roles:</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <select name="role" data-control="select2"
                                                                    data-placeholder="Select a role"
                                                                    data-hide-search="true"
                                                                    class="form-select form-select-solid fw-bolder">
                                                                    <option></option>
                                                                    @foreach ($roles as $role)
                                                                        <option value="{{ $role->name }}">
                                                                            {{ $role->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Input group-->
                                                            <div class="fv-row mb-10">
                                                                <!--begin::Label-->
                                                                <label class="required fs-6 fw-bold form-label mb-2">Selectionner
                                                                     Format d'Export:</label>
                                                                <!--end::Label-->
                                                                <!--begin::Input-->
                                                                <select name="format" data-control="select2"
                                                                    data-placeholder="Select a format"
                                                                    data-hide-search="true"
                                                                    class="form-select form-select-solid fw-bolder">
                                                                    <option></option>
                                                                    <!-- <option value="excel">Excel</option> -->
                                                                    <option value="pdf">PDF</option>
                                                                    <!-- <option value="cvs">CVS</option> -->
                                                                    <option value="zip">ZIP</option>
                                                                </select>
                                                                <!--end::Input-->
                                                            </div>
                                                            <!--end::Input group-->
                                                            <!--begin::Actions-->
                                                            <div class="text-center">
                                                                <button type="reset" class="btn btn-light me-3"
                                                                    data-kt-users-modal-action="cancel">Annuler</button>
                                                                <button type="submit" class="btn btn-primary"
                                                                    data-kt-users-modal-action="submit">
                                                                    <span class="indicator-label">Soummettre</span>
                                                                    <span class="indicator-progress">Attendez s'il vous plait...
                                                                        <span
                                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                                </button>
                                                            </div>
                                                            <!--end::Actions-->
                                                        </form>
                                                        <!--end::Form-->
                                                    </div>
                                                    <!--end::Modal body-->
                                                    <script>
                                                        // Classe pour gérer l'exportation des utilisateurs
                                                        var KTUsersExport = function() {
                                                            // Variables privées
                                                            var form;
                                                            var submitButton;
                                                            var validator;

                                                            // Fonctions privées
                                                            var handleForm = function() {
                                                                // Initialiser le validateur de formulaire
                                                                validator = FormValidation.formValidation(
                                                                    form, {
                                                                        fields: {
                                                                            'format': {
                                                                                validators: {
                                                                                    notEmpty: {
                                                                                        message: 'Le format d\'exportation est requis'
                                                                                    }
                                                                                }
                                                                            },
                                                                        },
                                                                        plugins: {
                                                                            trigger: new FormValidation.plugins.Trigger(),
                                                                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                                                                rowSelector: '.fv-row',
                                                                                eleInvalidClass: '',
                                                                                eleValidClass: ''
                                                                            })
                                                                        }
                                                                    }
                                                                );

                                                                // Gérer la soumission du formulaire
                                                                submitButton.addEventListener('click', function(e) {
                                                                    e.preventDefault();

                                                                    // Valider le formulaire
                                                                    validator.validate().then(function(status) {
                                                                        if (status == 'Valid') {
                                                                            // Montrer l'indicateur de chargement
                                                                            submitButton.setAttribute('data-kt-indicator', 'on');
                                                                            submitButton.disabled = true;

                                                                            // Soumettre le formulaire
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                });
                                                            }

                                                            // Fonctions publiques
                                                            return {
                                                                // Initialisation
                                                                init: function() {
                                                                    form = document.querySelector('#modal_export_users_form');
                                                                    submitButton = form.querySelector('[data-kt-users-modal-action="submit"]');

                                                                    handleForm();
                                                                }
                                                            };
                                                        }();

                                                        // On document ready
                                                        KTUtil.onDOMContentLoaded(function() {
                                                            KTUsersExport.init();
                                                        });
                                                    </script>
                                                </div>
                                                <!--end::Modal content-->
                                            </div>
                                            <!--end::Modal dialog-->
                                        </div>

                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                              <!--end::Card header-->
<!--begin::Card body-->
<div class="card-body py-4">
    <!--begin::Table-->
    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
        <!--begin::Table head-->
        <thead>
            <!--begin::Table row-->
            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                <th class="w-10px pe-2">
                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                        <input class="form-check-input" type="checkbox" data-kt-check="true"
                            data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                    </div>
                </th>
                <th class="min-w-125px">Utilisateurs</th>
                <th class="min-w-125px">Role</th>
                <th class="min-w-125px">Dernière connexion</th>
                <th class="min-w-125px">Contact</th>
                <th class="min-w-125px">Date de création</th>
                <th class="text-end min-w-100px">Actions</th>
            </tr>
            <!--end::Table row-->
        </thead>
        <!--end::Table head-->

        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-bold">
            @foreach ($users as $user)
                <tr>
                    <!--begin::Checkbox-->
                    <td>
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1" />
                        </div>
                    </td>
                    <!--end::Checkbox-->

                    <!--begin::User-->
                    <td class="d-flex align-items-center">
                        <!--begin::Avatar-->
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                            <a href="{{ route('users.show', $user->id) }}">
                                <div class="symbol-label">
                                    @if ($user->photo)
                                        <img src="{{ asset($user->photo) }}" alt="{{ $user->name }}" class="w-100" />
                                    @else
                                        <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="{{ $user->name }}" class="w-100" />
                                    @endif
                                </div>
                            </a>
                        </div>
                        <!--end::Avatar-->

                        <!--begin::User details-->
                        <div class="d-flex flex-column">
                            <a href="{{ route('users.show', $user->id) }}" class="text-gray-800 text-hover-primary mb-1">
                                {{ $user->name }}
                            </a>
                            <span>{{ $user->email }}</span>
                        </div>
                        <!--end::User details-->
                    </td>
                    <!--end::User-->

                    <!--begin::Role-->
                    <td>{{ $user->role->name }}</td>
                    <!--end::Role-->

                    <!--begin::Last login-->
                    <td>
                        <div class="badge badge-light fw-bolder">
                            {{ $user->last_login_at ? \Carbon\Carbon::parse($user->last_login_at)->locale('fr')->diffForHumans() : 'Jamais connecté' }}
                        </div>
                    </td>
                    <!--end::Last login-->

                    <!--begin::Téléphone-->
                    <td>{{ $user->telephone }}</td>
                    <!--end::Téléphone-->

                    <!--begin::Date de création-->
                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                    <!--end::Date de création-->

                    <!--begin::Actions-->
                    <td class="text-end">
                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end">
                            Actions
                            <span class="svg-icon svg-icon-5 m-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                        fill="black" />
                                </svg>
                            </span>
                        </a>

                        <!--begin::Dropdown Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                            data-kt-menu="true">
                            <!--begin::Modifier-->
                            <div class="menu-item px-3">
                                <a href="{{ route('users.show', $user->id) }}" class="menu-link px-3">Modifier</a>
                            </div>
                            <!--end::Modifier-->

                            <!--begin::Supprimer-->
                            <div class="menu-item px-3">
                                <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                        class="menu-link px-3 text-danger border-0 bg-transparent"
                                        onclick="deleteUser({{ $user->id }}, '{{ $user->name }}')">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                            <!--end::Supprimer-->
                        </div>
                        <!--end::Dropdown Menu-->
                    </td>
                    <!--end::Actions-->
                </tr>
            @endforeach
        </tbody>
        <!--end::Table body-->
    </table>
    <!--end::Table-->
</div>
<!--end::Card body-->

<script>
    function deleteUser(userId, userName) {
        Swal.fire({
            text: "Voulez-vous vraiment supprimer l'utilisateur '" + userName + "' ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Oui, supprimer",
            cancelButtonText: "Annuler",
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: "btn btn-secondary"
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + userId).submit();
            }
        });
    }
</script>

                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Card body-->
                        
                     <!-- Pagination stylisée -->
<div class="d-flex justify-content-between align-items-center flex-wrap mt-5">
    <div class="d-flex align-items-center py-3">
        <span class="text-muted fs-7 fw-bold">
            Affichage de {{ $users->firstItem() }} à {{ $users->lastItem() }} sur {{ $users->total() }} entrées
        </span>
    </div>
    <div class="d-flex flex-wrap py-3">
        <ul class="pagination">
            <!-- Premier lien -->
            <li class="page-item {{ $users->onFirstPage() ? 'disabled' : '' }}">
                <a href="{{ $users->url(1) }}" class="page-link" aria-label="First">
                    <span aria-hidden="true">&laquo;&laquo;</span>
                </a>
            </li>
            <!-- Lien précédent -->
            <li class="page-item {{ $users->onFirstPage() ? 'disabled' : '' }}">
                <a href="{{ $users->previousPageUrl() }}" class="page-link" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <!-- Liens des pages -->
            @foreach ($users->getUrlRange(max(1, $users->currentPage() - 2), min($users->lastPage(), $users->currentPage() + 2)) as $page => $url)
                <li class="page-item {{ $page == $users->currentPage() ? 'active' : '' }}">
                    <a href="{{ $url }}" class="page-link">{{ $page }}</a>
                </li>
            @endforeach
            <!-- Lien suivant -->
            <li class="page-item {{ !$users->hasMorePages() ? 'disabled' : '' }}">
                <a href="{{ $users->nextPageUrl() }}" class="page-link" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
            <!-- Dernier lien -->
            <li class="page-item {{ !$users->hasMorePages() ? 'disabled' : '' }}">
                <a href="{{ $users->url($users->lastPage()) }}" class="page-link" aria-label="Last">
                    <span aria-hidden="true">&raquo;&raquo;</span>
                </a>
            </li>
        </ul>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


@push('styles')
<style>
/* Style personnalisé pour la pagination */
.pagination {
--bs-pagination-color: #5E6278;
--bs-pagination-bg: #F5F8FA;
--bs-pagination-border-color: #E4E6EF;
--bs-pagination-hover-color: #009EF7;
--bs-pagination-hover-bg: #F1FAFF;
--bs-pagination-hover-border-color: #E4E6EF;
--bs-pagination-focus-color: #009EF7;
--bs-pagination-focus-bg: #F1FAFF;
--bs-pagination-focus-box-shadow: 0 0 0 0.25rem rgba(0, 158, 247, 0.25);
--bs-pagination-active-color: #FFFFFF;
--bs-pagination-active-bg: #009EF7;
--bs-pagination-active-border-color: #009EF7;
--bs-pagination-disabled-color: #B5B5C3;
--bs-pagination-disabled-bg: #F5F8FA;
--bs-pagination-disabled-border-color: #E4E6EF;
border-radius: 0.475rem;
}

.page-item.active .page-link {
box-shadow: 0 0 0 2px #F1FAFF;
}

.page-link {
padding: 0.5rem 0.75rem;
min-width: 2.5rem;
text-align: center;
margin: 0 2px;
border-radius: 0.475rem !important;
}
</style>
@endpush