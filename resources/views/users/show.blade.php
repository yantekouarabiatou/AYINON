@extends('layout')
@section('content')
    <div>
        <div class="page d-flex flex-row flex-column-fluid">

            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <!--begin::Container-->
                        <div id="kt_content_container" class="container-xxl">
                            <!--begin::Layout-->
                            <div class="d-flex flex-column flex-lg-row">
                                <!--begin::Sidebar-->
                                <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                                    <!--begin::Card-->
                                    <div class="card mb-5 mb-xl-8">
                                        <!--begin::Card body-->
                                        <div class="card-body">
                                            <!--begin::Summary-->
                                            <!--begin::User Info-->
                                            <div class="d-flex flex-center flex-column py-5">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-100px symbol-circle mb-7">
                                                    @if ($selectedUser->photo)
                                                        <img src="{{ asset($selectedUser->photo) }}"
                                                            alt="{{ $selectedUser->name }}" class="w-100" />
                                                    @else
                                                        <img src="{{ asset('assets/media/avatars/profil.jpg') }}"
                                                            alt="{{ $selectedUser->name }}" class="w-100" />
                                                    @endif
                                                    <!-- <img src="assets/media/avatars/300-6.jpg" alt="image" /> -->
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Name-->
                                                <a href="#"
                                                    class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3">{{ $selectedUser->name }}</a>
                                                <!--end::Name-->
                                                <!--begin::Position-->
                                                <div class="mb-9">
                                                    <!--begin::Badge-->
                                                    <div class="badge badge-lg badge-light-primary d-inline">
                                                        {{ $selectedUser->role->name }}</div>
                                                    <!--begin::Badge-->
                                                </div>
                                                <!--end::Position-->
                                                <!--begin::Info-->
                                                <!--begin::Info heading-->
                                                <div class="fw-bolder mb-3">Assigned Tickets
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover"
                                                        data-bs-trigger="hover" data-bs-html="true"
                                                        data-bs-content="Number of support tickets assigned, closed and pending this week."></i>
                                                </div>
                                                <!--end::Info heading-->
                                                <div class="d-flex flex-wrap flex-center">
                                                    <!--begin::Stats-->
                                                    <div
                                                        class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                                        <div class="fs-4 fw-bolder text-gray-700">
                                                            <span class="w-75px">243</span>
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                            <span class="svg-icon svg-icon-3 svg-icon-success">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <rect opacity="0.5" x="13" y="6" width="13"
                                                                        height="2" rx="1"
                                                                        transform="rotate(90 13 6)" fill="black" />
                                                                    <path
                                                                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                                        fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                        <div class="fw-bold text-muted">Total</div>
                                                    </div>
                                                    <!--end::Stats-->
                                                    <!--begin::Stats-->
                                                    <div
                                                        class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
                                                        <div class="fs-4 fw-bolder text-gray-700">
                                                            <span class="w-50px">56</span>
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                                            <span class="svg-icon svg-icon-3 svg-icon-danger">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <rect opacity="0.5" x="11" y="18" width="13"
                                                                        height="2" rx="1"
                                                                        transform="rotate(-90 11 18)" fill="black" />
                                                                    <path
                                                                        d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z"
                                                                        fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                        <div class="fw-bold text-muted">Solved</div>
                                                    </div>
                                                    <!--end::Stats-->
                                                    <!--begin::Stats-->
                                                    <div
                                                        class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                                        <div class="fs-4 fw-bolder text-gray-700">
                                                            <span class="w-50px">188</span>
                                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                                            <span class="svg-icon svg-icon-3 svg-icon-success">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <rect opacity="0.5" x="13" y="6" width="13"
                                                                        height="2" rx="1"
                                                                        transform="rotate(90 13 6)" fill="black" />
                                                                    <path
                                                                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                                                                        fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </div>
                                                        <div class="fw-bold text-muted">Open</div>
                                                    </div>
                                                    <!--end::Stats-->
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User Info-->
                                            <!--end::Summary-->
                                            <!--begin::Details toggle-->
                                            <div class="d-flex flex-stack fs-4 py-3">
                                                <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse"
                                                    href="#kt_user_view_details" role="button" aria-expanded="false"
                                                    aria-controls="kt_user_view_details">Détails
                                                    <span class="ms-2 rotate-180">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                    fill="black" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </div>
                                                <span data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    title="Modifier les détails Utilisateurs ">
                                                    <a href="#" class="btn btn-sm btn-light-primary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#kt_modal_update_details">Modifier</a>
                                                </span>
                                            </div>
                                            <!--end::Details toggle-->
                                            <div class="separator"></div>
                                            <!--begin::Details content-->
                                            <div id="kt_user_view_details" class="collapse show">
                                                <div class="pb-5 fs-6">
                                                    <!--begin::Details item-->
                                                    <div class="fw-bolder mt-5">Numero ID</div>
                                                    <div class="text-gray-600">ID-{{ $selectedUser->id }}</div>
                                                    <!--begin::Details item-->
                                                    <!--begin::Details item-->
                                                    <div class="fw-bolder mt-5">Téléphone</div>
                                                    <div class="text-gray-600">
                                                        <a href="#"
                                                            class="text-gray-600 text-hover-primary">{{ $selectedUser->telephone }}</a>
                                                    </div>
                                                    <!-- <div class="fw-bolder mt-5">Email</div>
                  <div class="text-gray-600">
                   <a href="#" class="text-gray-600 text-hover-primary">{{ $selectedUser->email }}</a>
                  </div> -->
                                                    <!--begin::Details item-->
                                                    <!--begin::Details item-->
                                                    <div class="fw-bolder mt-5">Address</div>
                                                    <div class="text-gray-600">
                                                        {{ $selectedUser->adresse ?: 'Aucune information' }}
                                                        <!-- <br />Melbourne 3000 VIC -->
                                                        <!-- <br />Australia -->
                                                    </div>
                                                    <!--begin::Details item-->
                                                    <!--begin::Details item-->
                                                    <!-- <div class="fw-bolder mt-5">Language</div>
                  <div class="text-gray-600">English</div> -->
                                                    <!--begin::Details item-->
                                                    <!--begin::Details item-->
                                                    <div class="fw-bolder mt-5">Dernière Connexion</div>
                                                    <div class="text-gray-600">
                                                        {{ $selectedUser->last_login_at ? \Carbon\Carbon::parse($selectedUser->last_login_at)->locale('fr')->diffForHumans() : 'Jamais connecté' }}
                                                    </div>
                                                    <!--begin::Details item-->
                                                </div>
                                            </div>
                                            <!--end::Details content-->
                                        </div>
                                        <!--end::Card body-->
                                    </div>
                                    <!--end::Card-->

                                </div>
                                <!--end::Sidebar-->
                                <!--begin::Content-->
                                <div class="flex-lg-row-fluid ms-lg-15">
                                    <!--begin:::Tabs-->
                                    <ul
                                        class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                                        <li class="nav-item">
                                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                                href="#kt_user_view_overview_security">Security</a>
                                        </li>
                                    </ul>
                                    <!--end:::Tabs-->
                                    <!--begin:::Tab content-->
                                    <div class="tab-content" id="myTabContent">
                                        <!--begin:::Tab pane-->
                                        <div class="tab-pane fade active show" id="kt_user_view_overview_security"
                                            role="tabpanel">
                                            <!--begin::Card-->
                                            <div class="card pt-4 mb-6 mb-xl-9">
                                                <!--begin::Card header-->
                                                <div class="card-header border-0">
                                                    <!--begin::Card title-->
                                                    <div class="card-title">
                                                        <h2>Profile</h2>
                                                    </div>
                                                    <!--end::Card title-->
                                                </div>
                                                <!--end::Card header-->
                                                <!--begin::Card body-->
                                                <div class="card-body pt-0 pb-5">
                                                    <!--begin::Table wrapper-->
                                                    <div class="table-responsive">
                                                        <!--begin::Table-->
                                                        <table class="table align-middle table-row-dashed gy-5"
                                                            id="kt_table_users_login_session">
                                                            <!--begin::Table body-->
                                                            <tbody class="fs-6 fw-bold text-gray-600">
                                                                <tr>
                                                                    <td>Email</td>
                                                                    <td>{{ $selectedUser->email }}</td>
                                                                    <td class="text-end">
                                                                        <button type="button"
                                                                            class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#kt_modal_update_email">
                                                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                                            <span class="svg-icon svg-icon-3">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none">
                                                                                    <path opacity="0.3"
                                                                                        d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                                        fill="black" />
                                                                                    <path
                                                                                        d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                                        fill="black" />
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Password</td>
                                                                    <td>********</td>
                                                                    <td class="text-end">
                                                                        <button type="button"
                                                                            class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#kt_modal_update_password">
                                                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                                            <span class="svg-icon svg-icon-3">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none">
                                                                                    <path opacity="0.3"
                                                                                        d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                                        fill="black" />
                                                                                    <path
                                                                                        d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                                        fill="black" />
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Role</td>
                                                                    <td>{{ $selectedUser->role->name }} </td>
                                                                    <td class="text-end">
                                                                        <button type="button"
                                                                            class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#kt_modal_update_role">
                                                                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                                            <span class="svg-icon svg-icon-3">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    viewBox="0 0 24 24" fill="none">
                                                                                    <path opacity="0.3"
                                                                                        d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                                                        fill="black" />
                                                                                    <path
                                                                                        d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                                                        fill="black" />
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <!--end::Table body-->
                                                        </table>
                                                        <!--end::Table-->
                                                    </div>
                                                    <!--end::Table wrapper-->
                                                </div>
                                                <!--end::Card body-->
                                            </div>
                                            <!--end::Card-->
                                        </div>
                                        <!--end:::Tab pane-->

                                    </div>
                                    <!--end:::Tab content-->
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Layout-->
                            <!--begin::Modals-->
                            <!--begin::Modal - Update user details-->
                            <div class="modal fade" id="kt_modal_update_details" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Form-->
                                        <form class="form" action="{{ route('users.update', $selectedUser->id) }}"
                                            id="modal_update_detail" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <!--begin::Modal header-->
                                            <div class="modal-header" id="kt_modal_update_user_header">
                                                <!--begin::Modal title-->
                                                <h2 class="fw-bolder">Mettre à jour Détails Utilisateur</h2>
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
                                                                transform="rotate(-45 6 17.3137)" fill="black" />
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
                                            <div class="modal-body py-10 px-lg-17">
                                                <!--begin::Scroll-->
                                                <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                    id="kt_modal_update_user_scroll" data-kt-scroll="true"
                                                    data-kt-scroll-activate="{default: false, lg: true}"
                                                    data-kt-scroll-max-height="auto"
                                                    data-kt-scroll-dependencies="#kt_modal_update_user_header"
                                                    data-kt-scroll-wrappers="#kt_modal_update_user_scroll"
                                                    data-kt-scroll-offset="300px">
                                                    <!--begin::User toggle-->
                                                    <div class="fw-boldest fs-3 rotate collapsible mb-7"
                                                        data-bs-toggle="collapse" href="#kt_modal_update_user_user_info"
                                                        role="button" aria-expanded="false"
                                                        aria-controls="kt_modal_update_user_user_info">Information
                                                        Utilisateur

                                                    </div>
                                                    <!--end::User toggle-->
                                                    <!--begin::User form-->
                                                    <div id="kt_modal_update_user_user_info" class="collapse show">
                                                        <!--begin::Input group-->
                                                        <div class="mb-7">
                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-bold mb-2">
                                                                <span>Mettre à jour Image</span>
                                                                <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                    data-bs-toggle="tooltip"
                                                                    title="Allowed file types: png, jpg, jpeg."></i>
                                                            </label>
                                                            <!--end::Label-->
                                                            <!--begin::Image input wrapper-->
                                                            <div class="mt-1">
                                                                <!--begin::Image input-->
                                                                <div class="image-input image-input-outline"
                                                                    data-kt-image-input="true"
                                                                    style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                                                    <!--begin::Preview existing avatar-->
                                                                    <div class="image-input-wrapper w-125px h-125px"
                                                                        style="background-image: url('{{ $selectedUser->photo ? asset($selectedUser->photo) : asset('assets/media/avatars/blank.svg') }}')">
                                                                    </div>
                                                                    <!--end::Preview existing avatar-->
                                                                    <!--begin::Edit-->
                                                                    <label
                                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                        data-kt-image-input-action="change"
                                                                        data-bs-toggle="tooltip" title="Change avatar">
                                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                                        <!--begin::Inputs-->
                                                                        <input type="file" name="photo"
                                                                            accept=".png, .jpg, .jpeg" />
                                                                        <input type="hidden" name="avatar_remove" />
                                                                        <!--end::Inputs-->
                                                                    </label>
                                                                    <!--end::Edit-->
                                                                    <!--begin::Cancel-->
                                                                    <span
                                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                        data-kt-image-input-action="cancel"
                                                                        data-bs-toggle="tooltip" title="Cancel avatar">
                                                                        <i class="bi bi-x fs-2"></i>
                                                                    </span>
                                                                    <!--end::Cancel-->
                                                                    <!--begin::Remove-->
                                                                    <span
                                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                                        data-kt-image-input-action="remove"
                                                                        data-bs-toggle="tooltip" title="Remove avatar">
                                                                        <i class="bi bi-x fs-2"></i>
                                                                    </span>
                                                                    <!--end::Remove-->
                                                                </div>
                                                                <!--end::Image input-->
                                                            </div>
                                                            <!--end::Image input wrapper-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <!--begin::Input group-->
                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-bold mb-2">Nom et Prénoms</label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="text" class="form-control form-control-solid"
                                                                placeholder="" name="name"
                                                                value="{{ $selectedUser->name }}" />
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Input group-->
                                                        <div class="fv-row mb-7">
                                                            <!--begin::Label-->
                                                            <label class="fs-6 fw-bold mb-2">
                                                                <span>Téléphone</span>
                                                                <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                                    data-bs-toggle="tooltip"
                                                                    title="Telephone must be active"></i>
                                                            </label>
                                                            <!--end::Label-->
                                                            <!--begin::Input-->
                                                            <input type="number" class="form-control form-control-solid"
                                                                placeholder="" name="telephone"
                                                                value="{{ $selectedUser->telephone }}" />
                                                            <!--end::Input-->
                                                        </div>

                                                    </div>

                                                </div>
                                                <!--end::Scroll-->
                                            </div>
                                            <!--end::Modal body-->
                                            <!--begin::Modal footer-->
                                            <div class="modal-footer flex-center">
                                                <!--begin::Button-->
                                                <button type="reset" class="btn btn-light me-3"
                                                    id="cancel-buttons">Supprimer</button>
                                                <!--end::Button-->
                                                <!--begin::Button-->
                                                <button type="submit" class="btn btn-primary" id="submit-buttons">
                                                    <span class="indicator-label">Envoyez</span>
                                                    <span class="indicator-progress">S'il vous plaît, attendez...
                                                        <span
                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                </button>
                                                <!--end::Button-->
                                            </div>
                                            <!--end::Modal footer-->
                                        </form>
                                        <!--end::Form-->
                                    </div>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            const form = document.getElementById("modal_update_detail");
                                            const submitButton = document.getElementById("submit-buttons");
                                            const cancelButton = document.getElementById("cancel-buttons");


                                            submitButton.addEventListener("click", function() {
                                                event.preventDefault(); // Prevent normal form submission

                                                // Afficher la fenêtre de confirmation avec SweetAlert
                                                Swal.fire({
                                                    title: "Confirmer la modification",
                                                    text: "Voulez-vous vraiment modifier les informations de cet utilisateur ?",
                                                    icon: "warning",
                                                    showCancelButton: true,
                                                    confirmButtonText: "Oui, modifier",
                                                    cancelButtonText: "Annuler",
                                                    customClass: {
                                                        confirmButton: "btn btn-primary",
                                                        cancelButton: "btn btn-secondary"
                                                    }
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        // Formulaire soumis après confirmation
                                                        form.submit();
                                                    }
                                                });
                                            });

                                        });
                                    </script>
                                </div>
                            </div>
                            <!--end::Modal - Update user details-->


                            <!--begin::Modal - Update email-->
                            <div class="modal fade" id="kt_modal_update_email" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header">
                                            <!--begin::Modal title-->
                                            <h2 class="fw-bolder">Mettre à jour Email</h2>
                                            <!--end::Modal title-->
                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                data-kt-users-modal-action="close">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                            height="2" rx="1"
                                                            transform="rotate(-45 6 17.3137)" fill="black" />
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
                                            <form id="update-user-form" class="form"
                                                action="{{ route('users.update', $selectedUser->id) }}" method="POST"
                                                enctype="multipart/form-data">

                                                @csrf
                                                @method('PUT')
                                                <!--begin::Notice-->
                                                <!--begin::Notice-->
                                                <div
                                                    class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                                                    <!--begin::Icon-->
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                                                    <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="10" fill="black" />
                                                            <rect x="11" y="14" width="7" height="2"
                                                                rx="1" transform="rotate(-90 11 14)"
                                                                fill="black" />
                                                            <rect x="11" y="17" width="2" height="2"
                                                                rx="1" transform="rotate(-90 11 17)"
                                                                fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <!--end::Icon-->
                                                    <!--begin::Wrapper-->
                                                    <div class="d-flex flex-stack flex-grow-1">
                                                        <!--begin::Content-->
                                                        <div class="fw-bold">
                                                            <div class="fs-6 text-gray-700">Veuillez noter qu'une adresse
                                                                e-mail valide est requise pour terminer la vérification de
                                                                l'e-mail.</div>
                                                        </div>
                                                        <!--end::Content-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                </div>
                                                <!--end::Notice-->
                                                <!--end::Notice-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <label class="fs-6 fw-bold form-label mb-2">
                                                        <span class="required">Email Address</span>
                                                    </label>
                                                    <input class="form-control form-control-solid" placeholder=""
                                                        name="email" value="{{ $selectedUser->email }}" />
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Actions-->
                                                <div class="text-center pt-15">
                                                    <button type="reset" class="btn btn-light me-3"
                                                        data-kt-users-modal-action="cancel">Supprimer</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        data-kt-users-modal-action="submit">
                                                        <span class="indicator-label">Envoyez</span>
                                                        <span class="indicator-progress">S'il vous plaît, attendez...
                                                            <span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                </div>
                                                <!--end::Actions-->
                                            </form>

                                            <!--end::Form-->
                                        </div>
                                        <script>
                                            document.addEventListener("DOMContentLoaded", function() {
                                                const form = document.getElementById("update-user-form");

                                                form.addEventListener("submit", function(event) {
                                                    event.preventDefault(); // Empêche la soumission normale du formulaire

                                                    Swal.fire({
                                                        title: "Confirmer la modification",
                                                        text: "Voulez-vous vraiment modifier cet utilisateur ?",
                                                        icon: "warning",
                                                        showCancelButton: true,
                                                        confirmButtonText: "Oui, modifier",
                                                        cancelButtonText: "Annuler",
                                                        customClass: {
                                                            confirmButton: "btn btn-primary",
                                                            cancelButton: "btn btn-secondary"
                                                        }
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            form.submit(); // Soumet le formulaire après confirmation
                                                        }
                                                    });
                                                });
                                            });
                                        </script>

                                        <!--end::Modal body-->
                                    </div>
                                    <!--end::Modal content-->
                                </div>
                                <!--end::Modal dialog-->
                            </div>
                            <!--end::Modal - Update email-->
                            <!--begin::Modal - Update password-->
                            <div class="modal fade" id="kt_modal_update_password" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header">
                                            <!--begin::Modal title-->
                                            <h2 class="fw-bolder">Mettre à jour Mot de Passe</h2>
                                            <!--end::Modal title-->
                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                data-kt-users-modal-action="close">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                            height="2" rx="1"
                                                            transform="rotate(-45 6 17.3137)" fill="black" />
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
                                            <form id="update_password_form" class="form"
                                                action="{{ route('users.update', $selectedUser->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-10">
                                                    <label class="required form-label fs-6 mb-2">Mot de Passe
                                                        Actuel</label>
                                                    <input class="form-control form-control-lg form-control-solid"
                                                        type="password" placeholder="Mot de passe actuel" name="password"
                                                        autocomplete="off" required />
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="mb-10 fv-row" data-kt-password-meter="true">
                                                    <div class="mb-1">
                                                        <label class="form-label fw-bold fs-6 mb-2">Nouveau Mot de
                                                            passe</label>
                                                        <div class="position-relative mb-3">
                                                            <input class="form-control form-control-lg form-control-solid"
                                                                type="password" placeholder="Nouveau mot de passe"
                                                                name="new_password" autocomplete="off" required />
                                                            <span
                                                                class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                                                data-kt-password-meter-control="visibility">
                                                                <i class="bi bi-eye-slash fs-2"></i>
                                                                <i class="bi bi-eye fs-2 d-none"></i>
                                                            </span>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-3"
                                                            data-kt-password-meter-control="highlight">
                                                            <div
                                                                class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                                            </div>
                                                            <div
                                                                class="flex-grow-1 bg-secondary bg-active-success rounded h-5px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Input group-->
                                                <div class="fv-row mb-10">
                                                    <label class="form-label fw-bold fs-6 mb-2">Confirmer Nouveau Mot de
                                                        Passe</label>
                                                    <input class="form-control form-control-lg form-control-solid"
                                                        type="password" placeholder="Confirmer le nouveau mot de passe"
                                                        name="confirm_password" autocomplete="off" required />
                                                </div>
                                                <!--end::Input group-->

                                                <!--begin::Actions-->
                                                <div class="text-center pt-15">
                                                    <button type="reset" class="btn btn-light me-3"
                                                        data-kt-users-modal-action="cancel">Annuler</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        data-kt-users-modal-action="submit">
                                                        <span class="indicator-label">Envoyer</span>
                                                        <span class="indicator-progress">Veuillez patienter...
                                                            <span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                        </span>
                                                    </button>
                                                </div>
                                                <!--end::Actions-->
                                            </form>
                                            <!--end::Form-->
                                        </div>

                                        <!--end::Modal body-->
                                        <script>
                                            document.addEventListener("DOMContentLoaded", function() {
                                                const form = document.getElementById("update_password_form");

                                                form.addEventListener("submit", function(event) {
                                                    event.preventDefault(); // Empêche la soumission immédiate du formulaire

                                                    // Récupérer les valeurs des champs
                                                    const oldPassword = form.querySelector("input[name='password']").value;
                                                    const newPassword = form.querySelector("input[name='new_password']").value;
                                                    const confirmPassword = form.querySelector("input[name='confirm_password']").value;

                                                    // Vérifier que le mot de passe actuel est renseigné
                                                    if (!oldPassword) {
                                                        Swal.fire({
                                                            icon: "error",
                                                            title: "Erreur",
                                                            text: "Le mot de passe actuel est requis."
                                                        });
                                                        return;
                                                    }

                                                    // Vérifier que le nouveau mot de passe est différent de l'ancien
                                                    if (newPassword === oldPassword) {
                                                        Swal.fire({
                                                            icon: "error",
                                                            title: "Erreur",
                                                            text: "Le nouveau mot de passe doit être différent de l'ancien."
                                                        });
                                                        return;
                                                    }

                                                    // Vérifier que les nouveaux mots de passe correspondent
                                                    if (newPassword !== confirmPassword) {
                                                        Swal.fire({
                                                            icon: "error",
                                                            title: "Erreur",
                                                            text: "Le nouveau mot de passe et la confirmation ne correspondent pas."
                                                        });
                                                        return;
                                                    }

                                                    form.querySelector("input[name='password']").value = newPassword;
                                                    // Demander confirmation avant d'envoyer
                                                    Swal.fire({
                                                        title: "Confirmer la modification",
                                                        text: "Voulez-vous vraiment modifier votre mot de passe ?",
                                                        icon: "warning",
                                                        showCancelButton: true,
                                                        confirmButtonText: "Oui, modifier",
                                                        cancelButtonText: "Annuler",
                                                        customClass: {
                                                            confirmButton: "btn btn-primary",
                                                            cancelButton: "btn btn-secondary"
                                                        }
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            // Soumettre le formulaire avec le nouveau mot de passe uniquement
                                                            form.querySelector("input[name='confirm_password']")
                                                        .remove(); // Supprimer le champ actuel du mot de passe pour qu'il ne soit pas envoyé
                                                            form.querySelector("input[name='new_password']").remove();
                                                            form.submit(); // Soumettre après confirmation
                                                        }
                                                    });
                                                });
                                            });
                                        </script>

                                    </div>
                                    <!--end::Modal content-->
                                </div>
                                <!--end::Modal dialog-->
                            </div>
                            <!--end::Modal - Update password-->
                            <!--begin::Modal - Update role-->
                            <div class="modal fade" id="kt_modal_update_role" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header">
                                            <!--begin::Modal title-->
                                            <h2 class="fw-bolder">Mettre à jour Role Utilisateur</h2>
                                            <!--end::Modal title-->
                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                data-kt-users-modal-action="close">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                            height="2" rx="1"
                                                            transform="rotate(-45 6 17.3137)" fill="black" />
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
                                            <form id="modal_update_role" class="form"
                                                action="{{ route('users.update', $selectedUser->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <!--begin::Notice-->
                                                <div
                                                    class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                                                    <!--begin::Icon-->
                                                    <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.3" x="2" y="2" width="20"
                                                                height="20" rx="10" fill="black" />
                                                            <rect x="11" y="14" width="7" height="2"
                                                                rx="1" transform="rotate(-90 11 14)"
                                                                fill="black" />
                                                            <rect x="11" y="17" width="2" height="2"
                                                                rx="1" transform="rotate(-90 11 17)"
                                                                fill="black" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Icon-->
                                                    <div class="d-flex flex-stack flex-grow-1">
                                                        <div class="fw-bold">
                                                            <div class="fs-6 text-gray-700">
                                                                Veuillez noter qu'en réduisant le rang d'un rôle
                                                                d'utilisateur, cet utilisateur perdra tous les privilèges
                                                                attribués au rôle précédent.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Notice-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    @foreach ($roles as $role)
                                                        <!-- Radio Button with separator after each -->
                                                        <div class="form-check form-check-custom form-check-solid mb-3">
                                                            <input class="form-check-input me-3" type="radio"
                                                                name="role_id" value="{{ $role->id }}"
                                                                id="role_option_{{ $role->id }}"
                                                                {{ $selectedUser->role_id == $role->id ? 'checked' : '' }} />
                                                            <label class="form-check-label"
                                                                for="role_option_{{ $role->id }}">
                                                                <div class="fw-bolder text-gray-800">{{ $role->name }}
                                                                </div>
                                                            </label>
                                                        </div>

                                                        <!-- Separator after each radio -->
                                                        <div class='separator separator-dashed my-5'></div>
                                                    @endforeach
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Actions-->
                                                <div class="text-center pt-15">
                                                    <!-- Changez le type en "button" et supprimez l'attribut data-kt-users-modal-action -->
                                                    <button type="button" class="btn btn-light me-3"
                                                        id="cancel-button">Annuler</button>
                                                    <!-- Changez le type en "button" et supprimez l'attribut data-kt-users-modal-action -->
                                                    <button type="button" class="btn btn-primary" id="submit-button">
                                                        <span class="indicator-label">Envoyez</span>
                                                        <span class="indicator-progress">S'il vous plaît, attendez...
                                                            <span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                        </span>
                                                    </button>
                                                </div>
                                                <!--end::Actions-->
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Modal body-->
                                        <script>
                                            document.addEventListener("DOMContentLoaded", function() {
                                                const form = document.getElementById("modal_update_role");
                                                const submitButton = document.getElementById("submit-button");
                                                const cancelButton = document.getElementById("cancel-button");


                                                submitButton.addEventListener("click", function() {
                                                    event.preventDefault(); // Prevent normal form submission

                                                    // Afficher la fenêtre de confirmation avec SweetAlert
                                                    Swal.fire({
                                                        title: "Confirmer la modification",
                                                        text: "Voulez-vous vraiment modifier le rôle de cet utilisateur ?",
                                                        icon: "warning",
                                                        showCancelButton: true,
                                                        confirmButtonText: "Oui, modifier",
                                                        cancelButtonText: "Annuler",
                                                        customClass: {
                                                            confirmButton: "btn btn-primary",
                                                            cancelButton: "btn btn-secondary"
                                                        }
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            // Formulaire soumis après confirmation
                                                            form.submit();
                                                        }
                                                    });
                                                });
                                            });
                                        </script>

                                    </div>
                                    <!--end::Modal content-->
                                </div>
                                <!--end::Modal dialog-->
                            </div>
                            <!--end::Modal - Update role-->
                            <!--begin::Modal - Add task-->
                            <div class="modal fade" id="kt_modal_add_auth_app" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header">
                                            <!--begin::Modal title-->
                                            <h2 class="fw-bolder">Add Authenticator App</h2>
                                            <!--end::Modal title-->
                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                data-kt-users-modal-action="close">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                            height="2" rx="1"
                                                            transform="rotate(-45 6 17.3137)" fill="black" />
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
                                            <!--begin::Content-->
                                            <div class="fw-bolder d-flex flex-column justify-content-center mb-5">
                                                <!--begin::Label-->
                                                <div class="text-center mb-5" data-kt-add-auth-action="qr-code-label">
                                                    Download the
                                                    <a href="#">Authenticator app</a>, add a new account, then scan
                                                    this barcode to set up your account.
                                                </div>
                                                <div class="text-center mb-5 d-none"
                                                    data-kt-add-auth-action="text-code-label">Download the
                                                    <a href="#">Authenticator app</a>, add a new account, then enter
                                                    this code to set up your account.
                                                </div>
                                                <!--end::Label-->
                                                <!--begin::QR code-->
                                                <div class="d-flex flex-center" data-kt-add-auth-action="qr-code">
                                                    <img src="assets/media/misc/qr.png" alt="Scan this QR code" />
                                                </div>
                                                <!--end::QR code-->
                                                <!--begin::Text code-->
                                                <div class="border rounded p-5 d-flex flex-center d-none"
                                                    data-kt-add-auth-action="text-code">
                                                    <div class="fs-1">gi2kdnb54is709j</div>
                                                </div>
                                                <!--end::Text code-->
                                            </div>
                                            <!--end::Content-->
                                            <!--begin::Action-->
                                            <div class="d-flex flex-center">
                                                <div class="btn btn-light-primary"
                                                    data-kt-add-auth-action="text-code-button">Enter code manually</div>
                                                <div class="btn btn-light-primary d-none"
                                                    data-kt-add-auth-action="qr-code-button">Scan barcode instead</div>
                                            </div>
                                            <!--end::Action-->
                                        </div>
                                        <!--end::Modal body-->
                                    </div>
                                    <!--end::Modal content-->
                                </div>
                                <!--end::Modal dialog-->
                            </div>
                            <!--end::Modal - Add task-->
                            <!--begin::Modal - Add task-->
                            <div class="modal fade" id="kt_modal_add_one_time_password" tabindex="-1"
                                aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header">
                                            <!--begin::Modal title-->
                                            <h2 class="fw-bolder">Enable One Time Password</h2>
                                            <!--end::Modal title-->
                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                                data-kt-users-modal-action="close">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16"
                                                            height="2" rx="1"
                                                            transform="rotate(-45 6 17.3137)" fill="black" />
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
                                            <form class="form" id="kt_modal_add_one_time_password_form">
                                                <!--begin::Label-->
                                                <div class="fw-bolder mb-9">Enter the new phone number to receive an SMS to
                                                    when you log in.</div>
                                                <!--end::Label-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-bold form-label mb-2">
                                                        <span class="required">Mobile number</span>
                                                        <i class="fas fa-exclamation-circle ms-1 fs-7"
                                                            data-bs-toggle="tooltip"
                                                            title="A valid mobile number is required to receive the one-time password to validate your account login."></i>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid"
                                                        name="otp_mobile_number" placeholder="+6123 456 789"
                                                        value="" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Separator-->
                                                <div class="separator saperator-dashed my-5"></div>
                                                <!--end::Separator-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-bold form-label mb-2">
                                                        <span class="required">Email</span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="email" class="form-control form-control-solid"
                                                        name="otp_email" value="smith@kpmg.com" readonly="readonly" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-7">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-bold form-label mb-2">
                                                        <span class="required">Confirm password</span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <input type="password" class="form-control form-control-solid"
                                                        name="otp_confirm_password" value="" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Actions-->
                                                <div class="text-center pt-15">
                                                    <button type="reset" class="btn btn-light me-3"
                                                        data-kt-users-modal-action="cancel">Cancel</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        data-kt-users-modal-action="submit">
                                                        <span class="indicator-label">Submit</span>
                                                        <span class="indicator-progress">Please wait...
                                                            <span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                </div>
                                                <!--end::Actions-->
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Modal body-->
                                    </div>
                                    <!--end::Modal content-->
                                </div>
                                <!--end::Modal dialog-->
                            </div>
                            <!--end::Modal - Add task-->
                            <!--end::Modals-->
                        </div>
                        <!--end::Container-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
