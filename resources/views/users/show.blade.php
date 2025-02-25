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
													@if($selectedUser->photo)
														<img src="{{ asset($selectedUser->photo) }}" alt="{{ $selectedUser->name }}" class="w-100" />
													@else
														<img src="{{ asset('assets/media/avatars/blank.png') }}" alt="{{ $selectedUser->name }}" class="w-100" />
													@endif
													</div>
													<!--end::Avatar-->
													<!--begin::Name-->
													
														<a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3">{{ $selectedUser->name }}</a>
														<div class="mb-9">
															<div class="badge badge-lg badge-light-primary d-inline">{{ $selectedUser->role->name }}</div>
														</div>
												
													<!--end::Position-->
													<!--begin::Info-->
													<!--begin::Info heading-->
													<div class="fw-bolder mb-3">Assigned Tickets
													<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Number of support tickets assigned, closed and pending this week."></i></div>
													<!--end::Info heading-->
													<div class="d-flex flex-wrap flex-center">
														<!--begin::Stats-->
														<div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
															<div class="fs-4 fw-bolder text-gray-700">
																<span class="w-75px">243</span>
																<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
																<span class="svg-icon svg-icon-3 svg-icon-success">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
																		<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<div class="fw-bold text-muted">Total</div>
														</div>
														<!--end::Stats-->
														<!--begin::Stats-->
														<div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
															<div class="fs-4 fw-bolder text-gray-700">
																<span class="w-50px">56</span>
																<!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
																<span class="svg-icon svg-icon-3 svg-icon-danger">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
																		<path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
															</div>
															<div class="fw-bold text-muted">Solved</div>
														</div>
														<!--end::Stats-->
														<!--begin::Stats-->
														<div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
															<div class="fs-4 fw-bolder text-gray-700">
																<span class="w-50px">188</span>
																<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
																<span class="svg-icon svg-icon-3 svg-icon-success">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
																		<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
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
													<div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">Details
													<span class="ms-2 rotate-180">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
														<span class="svg-icon svg-icon-3">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
															</svg>
														</span>
														<!--end::Svg Icon-->
													</span></div>
													<span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit customer details">
														<a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_details">Modifier</a>
													</span>
												</div>
												<!--end::Details toggle-->
												<div class="separator"></div>
												<!--begin::Details content-->
												<div id="kt_user_view_details" class="collapse show">
													<div class="pb-5 fs-6">
													
														<!--begin::Details item-->
														<div class="fw-bolder mt-5">Account ID</div>
														<div class="text-gray-600">ID-{{ $selectedUser->id }}</div>
														<!--begin::Details item-->
														<!--begin::Details item-->
														<div class="fw-bolder mt-5">Téléphone</div>
														<div class="text-gray-600">
															<a href="#" class="text-gray-600 text-hover-primary">{{ $selectedUser->telephone }}</a>
														</div>
														<!--begin::Details item-->
														<!--begin::Details item-->
														<div class="fw-bolder mt-5">Address</div>
														<div class="text-gray-600">{{ $selectedUser->adresse ?: 'Aucune information' }}
														<!-- <div class="fw-bolder mt-5">Téléphone</div>
														<div class="text-gray-600">{{ $selectedUser->telephone ?: 'Aucune information' }} -->
														<!-- <br /> -->
														 <!-- <br /> -->
														</div> 
														<div class="fw-bolder mt-5">Dernière connexion</div>
														<div class="text-gray-600"><p>{{ $selectedUser->last_login_at ? \Carbon\Carbon::parse($selectedUser->last_login_at)->locale('fr')->diffForHumans() : 'Jamais connecté' }}

														</p>
														</div>
														
													
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
										<ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
											<!--begin:::Tab item-->
											<li class="nav-item">
												<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_user_view_overview_tab">Overview</a>
											</li>
											<!--end:::Tab item-->
											<!--begin:::Tab item-->
											<li class="nav-item">
												<a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#kt_user_view_overview_security">Security</a>
											</li>
											<!--end:::Tab item-->
											
										</ul>
										<!--end:::Tabs-->
										<!--begin:::Tab content-->
										<div class="tab-content" id="myTabContent">
											<!--begin:::Tab pane-->
											<div class="tab-pane fade show active" id="kt_user_view_overview_tab" role="tabpanel">
												<!--begin::Card-->
												<div class="card card-flush mb-6 mb-xl-9">
													<!--begin::Card header-->
													<div class="card-header mt-6">
														<!--begin::Card title-->
														<div class="card-title flex-column">
															<h2 class="mb-1">User's Schedule</h2>
															<div class="fs-6 fw-bold text-muted">2 upcoming meetings</div>
														</div>
														<!--end::Card title-->
														<!--begin::Card toolbar-->
														<div class="card-toolbar">
															<button type="button" class="btn btn-light-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_add_schedule">
															<!--SVG file not found: media/icons/duotune/art/art008.svg-->
															Add Schedule</button>
														</div>
														<!--end::Card toolbar-->
													</div>
													<!--end::Card header-->
													<!--begin::Card body-->
													<div class="card-body p-9 pt-4">
														<!--begin::Dates-->
														<ul class="nav nav-pills d-flex flex-nowrap hover-scroll-x py-2">
															<!--begin::Date-->
															<li class="nav-item me-1">
																<a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_0">
																	<span class="opacity-50 fs-7 fw-bold">Su</span>
																	<span class="fs-6 fw-boldest">21</span>
																</a>
															</li>
															<!--end::Date-->
															<!--begin::Date-->
															<li class="nav-item me-1">
																<a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary active" data-bs-toggle="tab" href="#kt_schedule_day_1">
																	<span class="opacity-50 fs-7 fw-bold">Mo</span>
																	<span class="fs-6 fw-boldest">22</span>
																</a>
															</li>
															<!--end::Date-->
															<!--begin::Date-->
															<li class="nav-item me-1">
																<a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_2">
																	<span class="opacity-50 fs-7 fw-bold">Tu</span>
																	<span class="fs-6 fw-boldest">23</span>
																</a>
															</li>
															<!--end::Date-->
															<!--begin::Date-->
															<li class="nav-item me-1">
																<a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_3">
																	<span class="opacity-50 fs-7 fw-bold">We</span>
																	<span class="fs-6 fw-boldest">24</span>
																</a>
															</li>
															<!--end::Date-->
															<!--begin::Date-->
															<li class="nav-item me-1">
																<a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_4">
																	<span class="opacity-50 fs-7 fw-bold">Th</span>
																	<span class="fs-6 fw-boldest">25</span>
																</a>
															</li>
															<!--end::Date-->
															<!--begin::Date-->
															<li class="nav-item me-1">
																<a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_5">
																	<span class="opacity-50 fs-7 fw-bold">Fr</span>
																	<span class="fs-6 fw-boldest">26</span>
																</a>
															</li>
															<!--end::Date-->
															<!--begin::Date-->
															<li class="nav-item me-1">
																<a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_6">
																	<span class="opacity-50 fs-7 fw-bold">Sa</span>
																	<span class="fs-6 fw-boldest">27</span>
																</a>
															</li>
															<!--end::Date-->
															<!--begin::Date-->
															<li class="nav-item me-1">
																<a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_7">
																	<span class="opacity-50 fs-7 fw-bold">Su</span>
																	<span class="fs-6 fw-boldest">28</span>
																</a>
															</li>
															<!--end::Date-->
															<!--begin::Date-->
															<li class="nav-item me-1">
																<a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_8">
																	<span class="opacity-50 fs-7 fw-bold">Mo</span>
																	<span class="fs-6 fw-boldest">29</span>
																</a>
															</li>
															<!--end::Date-->
															<!--begin::Date-->
															<li class="nav-item me-1">
																<a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_9">
																	<span class="opacity-50 fs-7 fw-bold">Tu</span>
																	<span class="fs-6 fw-boldest">30</span>
																</a>
															</li>
															<!--end::Date-->
															<!--begin::Date-->
															<li class="nav-item me-1">
																<a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-40px me-2 py-4 btn-active-primary" data-bs-toggle="tab" href="#kt_schedule_day_10">
																	<span class="opacity-50 fs-7 fw-bold">We</span>
																	<span class="fs-6 fw-boldest">31</span>
																</a>
															</li>
															<!--end::Date-->
														</ul>
														<!--end::Dates-->
														<!--begin::Tab Content-->
														<div class="tab-content">
															<!--begin::Day-->
															<div id="kt_schedule_day_0" class="tab-pane fade show">
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">11:00 - 11:45
																		<span class="fs-7 text-muted text-uppercase">am</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Project Review &amp; Testing</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Caleb Donaldson</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">16:30 - 17:30
																		<span class="fs-7 text-muted text-uppercase">pm</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Committee Review Approvals</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Yannis Gloverson</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">16:30 - 17:30
																		<span class="fs-7 text-muted text-uppercase">pm</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Team Backlog Grooming Session</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Yannis Gloverson</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">10:00 - 11:00
																		<span class="fs-7 text-muted text-uppercase">am</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Marketing Campaign Discussion</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Kendell Trevor</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
															</div>
															<!--end::Day-->
															<!--begin::Day-->
															<div id="kt_schedule_day_1" class="tab-pane fade show active">
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">11:00 - 11:45
																		<span class="fs-7 text-muted text-uppercase">am</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Creative Content Initiative</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Caleb Donaldson</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">11:00 - 11:45
																		<span class="fs-7 text-muted text-uppercase">am</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Dashboard UI/UX Design Review</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Michael Walters</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">16:30 - 17:30
																		<span class="fs-7 text-muted text-uppercase">pm</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Development Team Capacity Review</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Sean Bean</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">16:30 - 17:30
																		<span class="fs-7 text-muted text-uppercase">pm</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Committee Review Approvals</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Bob Harris</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
															</div>
															<!--end::Day-->
															<!--begin::Day-->
															<div id="kt_schedule_day_2" class="tab-pane fade show">
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">11:00 - 11:45
																		<span class="fs-7 text-muted text-uppercase">am</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Weekly Team Stand-Up</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Karina Clarke</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">10:00 - 11:00
																		<span class="fs-7 text-muted text-uppercase">am</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Project Review &amp; Testing</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Mark Randall</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">9:00 - 10:00
																		<span class="fs-7 text-muted text-uppercase">am</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Weekly Team Stand-Up</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Caleb Donaldson</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">16:30 - 17:30
																		<span class="fs-7 text-muted text-uppercase">pm</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Creative Content Initiative</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Terry Robins</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
															</div>
															<!--end::Day-->
															<!--begin::Day-->
															<div id="kt_schedule_day_3" class="tab-pane fade show">
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">10:00 - 11:00
																		<span class="fs-7 text-muted text-uppercase">am</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Committee Review Approvals</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Caleb Donaldson</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">12:00 - 13:00
																		<span class="fs-7 text-muted text-uppercase">pm</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Development Team Capacity Review</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Mark Randall</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">16:30 - 17:30
																		<span class="fs-7 text-muted text-uppercase">pm</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Creative Content Initiative</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Kendell Trevor</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">16:30 - 17:30
																		<span class="fs-7 text-muted text-uppercase">pm</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Weekly Team Stand-Up</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Naomi Hayabusa</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
															</div>
															<!--end::Day-->
															<!--begin::Day-->
															<div id="kt_schedule_day_4" class="tab-pane fade show">
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">16:30 - 17:30
																		<span class="fs-7 text-muted text-uppercase">pm</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Development Team Capacity Review</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Yannis Gloverson</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">13:00 - 14:00
																		<span class="fs-7 text-muted text-uppercase">pm</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Weekly Team Stand-Up</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Walter White</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">9:00 - 10:00
																		<span class="fs-7 text-muted text-uppercase">am</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Development Team Capacity Review</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Peter Marcus</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
															</div>
															<!--end::Day-->
															<!--begin::Day-->
															<div id="kt_schedule_day_5" class="tab-pane fade show">
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">16:30 - 17:30
																		<span class="fs-7 text-muted text-uppercase">pm</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Weekly Team Stand-Up</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Peter Marcus</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">11:00 - 11:45
																		<span class="fs-7 text-muted text-uppercase">am</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Committee Review Approvals</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Peter Marcus</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">16:30 - 17:30
																		<span class="fs-7 text-muted text-uppercase">pm</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Development Team Capacity Review</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Karina Clarke</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">10:00 - 11:00
																		<span class="fs-7 text-muted text-uppercase">am</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">9 Degree Project Estimation Meeting</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Karina Clarke</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
															</div>
															<!--end::Day-->
															<!--begin::Day-->
															<div id="kt_schedule_day_6" class="tab-pane fade show">
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">11:00 - 11:45
																		<span class="fs-7 text-muted text-uppercase">am</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Team Backlog Grooming Session</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Sean Bean</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">10:00 - 11:00
																		<span class="fs-7 text-muted text-uppercase">am</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Project Review &amp; Testing</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Yannis Gloverson</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">13:00 - 14:00
																		<span class="fs-7 text-muted text-uppercase">pm</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Committee Review Approvals</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Michael Walters</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">12:00 - 13:00
																		<span class="fs-7 text-muted text-uppercase">pm</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Dashboard UI/UX Design Review</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Walter White</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">14:30 - 15:30
																		<span class="fs-7 text-muted text-uppercase">pm</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Team Backlog Grooming Session</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Yannis Gloverson</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
															</div>
															<!--end::Day-->
															<!--begin::Day-->
															<div id="kt_schedule_day_7" class="tab-pane fade show">
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">9:00 - 10:00
																		<span class="fs-7 text-muted text-uppercase">am</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Development Team Capacity Review</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Caleb Donaldson</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">11:00 - 11:45
																		<span class="fs-7 text-muted text-uppercase">am</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Marketing Campaign Discussion</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Bob Harris</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">14:30 - 15:30
																		<span class="fs-7 text-muted text-uppercase">pm</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Dashboard UI/UX Design Review</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">David Stevenson</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">11:00 - 11:45
																		<span class="fs-7 text-muted text-uppercase">am</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Sales Pitch Proposal</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Bob Harris</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
															</div>
															<!--end::Day-->
															<!--begin::Day-->
															<div id="kt_schedule_day_8" class="tab-pane fade show">
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">9:00 - 10:00
																		<span class="fs-7 text-muted text-uppercase">am</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">9 Degree Project Estimation Meeting</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Terry Robins</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">14:30 - 15:30
																		<span class="fs-7 text-muted text-uppercase">pm</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Development Team Capacity Review</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Walter White</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">10:00 - 11:00
																		<span class="fs-7 text-muted text-uppercase">am</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Weekly Team Stand-Up</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Michael Walters</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">10:00 - 11:00
																		<span class="fs-7 text-muted text-uppercase">am</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Project Review &amp; Testing</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Terry Robins</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
															</div>
															<!--end::Day-->
															<!--begin::Day-->
															<div id="kt_schedule_day_9" class="tab-pane fade show">
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">13:00 - 14:00
																		<span class="fs-7 text-muted text-uppercase">pm</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Lunch &amp; Learn Catch Up</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Mark Randall</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">9:00 - 10:00
																		<span class="fs-7 text-muted text-uppercase">am</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Committee Review Approvals</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Terry Robins</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">11:00 - 11:45
																		<span class="fs-7 text-muted text-uppercase">am</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Sales Pitch Proposal</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Bob Harris</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">14:30 - 15:30
																		<span class="fs-7 text-muted text-uppercase">pm</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Development Team Capacity Review</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Walter White</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">9:00 - 10:00
																		<span class="fs-7 text-muted text-uppercase">am</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Dashboard UI/UX Design Review</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Naomi Hayabusa</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
															</div>
															<!--end::Day-->
															<!--begin::Day-->
															<div id="kt_schedule_day_10" class="tab-pane fade show">
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">13:00 - 14:00
																		<span class="fs-7 text-muted text-uppercase">pm</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Team Backlog Grooming Session</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Sean Bean</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">13:00 - 14:00
																		<span class="fs-7 text-muted text-uppercase">pm</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Creative Content Initiative</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Michael Walters</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">10:00 - 11:00
																		<span class="fs-7 text-muted text-uppercase">am</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Project Review &amp; Testing</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Sean Bean</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
																<!--begin::Time-->
																<div class="d-flex flex-stack position-relative mt-6">
																	<!--begin::Bar-->
																	<div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
																	<!--end::Bar-->
																	<!--begin::Info-->
																	<div class="fw-bold ms-5">
																		<!--begin::Time-->
																		<div class="fs-7 mb-1">9:00 - 10:00
																		<span class="fs-7 text-muted text-uppercase">am</span></div>
																		<!--end::Time-->
																		<!--begin::Title-->
																		<a href="#" class="fs-5 fw-bolder text-dark text-hover-primary mb-2">Creative Content Initiative</a>
																		<!--end::Title-->
																		<!--begin::User-->
																		<div class="fs-7 text-muted">Lead by
																		<a href="#">Terry Robins</a></div>
																		<!--end::User-->
																	</div>
																	<!--end::Info-->
																	<!--begin::Action-->
																	<a href="#" class="btn btn-light bnt-active-light-primary btn-sm">View</a>
																	<!--end::Action-->
																</div>
																<!--end::Time-->
															</div>
															<!--end::Day-->
														</div>
														<!--end::Tab Content-->
													</div>
													<!--end::Card body-->
												</div>
												<!--end::Card-->
												<!--begin::Tasks-->

												<!--end::Tasks-->
											</div>
											<!--end:::Tab pane-->
											<!--begin:::Tab pane-->
											<div class="tab-pane fade" id="kt_user_view_overview_security" role="tabpanel">
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
															<table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
																<!--begin::Table body-->
																<tbody class="fs-6 fw-bold text-gray-600">
																	<tr>
																		<td>Email</td>
																		<td>{{ $selectedUser->email }}</td>
																		<td class="text-end">
																			<button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-bs-toggle="modal" data-bs-target="#kt_modal_update_email">
																				<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																				<span class="svg-icon svg-icon-3">
																					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																						<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
																						<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
																					</svg>
																				</span>
																				<!--end::Svg Icon-->
																			</button>
																		</td>
																	</tr>
																	<tr>
																		<td>Password</td>
																		<td>******</td>
																		<td class="text-end">
																			<button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-bs-toggle="modal" data-bs-target="#kt_modal_update_password">
																				<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																				<span class="svg-icon svg-icon-3">
																					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																						<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
																						<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
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
																			<button type="button" class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto" data-bs-toggle="modal" data-bs-target="#kt_modal_update_role">
																				<!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
																				<span class="svg-icon svg-icon-3">
																					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																						<path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black" />
																						<path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black" />
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
												
												<!--begin::Card-->
												<div class="card pt-4 mb-6 mb-xl-9">
													<!--begin::Card header-->
													<div class="card-header border-0">
														<!--begin::Card title-->
														<div class="card-title flex-column">
															<h2>Email Notifications</h2>
															<div class="fs-6 fw-bold text-muted">Choose what messages you’d like to receive for each of your accounts.</div>
														</div>
														<!--end::Card title-->
													</div>
													<!--end::Card header-->
													<!--begin::Card body-->
													<div class="card-body">
														<!--begin::Form-->
														<form class="form" id="kt_users_email_notification_form">
															<!--begin::Item-->
															<div class="d-flex">
																<!--begin::Checkbox-->
																<div class="form-check form-check-custom form-check-solid">
																	<!--begin::Input-->
																	<input class="form-check-input me-3" name="email_notification_0" type="checkbox" value="0" id="kt_modal_update_email_notification_0" checked='checked' />
																	<!--end::Input-->
																	<!--begin::Label-->
																	<label class="form-check-label" for="kt_modal_update_email_notification_0">
																		<div class="fw-bolder">Successful Payments</div>
																		<div class="text-gray-600">Receive a notification for every successful payment.</div>
																	</label>
																	<!--end::Label-->
																</div>
																<!--end::Checkbox-->
															</div>
															<!--end::Item-->
															<div class='separator separator-dashed my-5'></div>
															<!--begin::Item-->
															<div class="d-flex">
																<!--begin::Checkbox-->
																<div class="form-check form-check-custom form-check-solid">
																	<!--begin::Input-->
																	<input class="form-check-input me-3" name="email_notification_1" type="checkbox" value="1" id="kt_modal_update_email_notification_1" />
																	<!--end::Input-->
																	<!--begin::Label-->
																	<label class="form-check-label" for="kt_modal_update_email_notification_1">
																		<div class="fw-bolder">Payouts</div>
																		<div class="text-gray-600">Receive a notification for every initiated payout.</div>
																	</label>
																	<!--end::Label-->
																</div>
																<!--end::Checkbox-->
															</div>
															<!--end::Item-->
															<div class='separator separator-dashed my-5'></div>
															
															<!--begin::Action buttons-->
															<div class="d-flex justify-content-end align-items-center mt-12">
																<!--begin::Button-->
																<button type="button" class="btn btn-light me-5" id="kt_users_email_notification_cancel">Cancel</button>
																<!--end::Button-->
																<!--begin::Button-->
																<button type="button" class="btn btn-primary" id="kt_users_email_notification_submit">
																	<span class="indicator-label">Save</span>
																	<span class="indicator-progress">Please wait...
																	<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
																</button>
																<!--end::Button-->
															</div>
															<!--begin::Action buttons-->
														</form>
														<!--end::Form-->
													</div>
													<!--end::Card body-->
													<!--begin::Card footer-->
													<!--end::Card footer-->
												</div>
												<!--end::Card-->
											</div>
											<!--end:::Tab pane-->
											<!--begin:::Tab pane-->
											<div class="tab-pane fade" id="kt_user_view_overview_events_and_logs_tab" role="tabpanel">
												<!--begin::Card-->
												<div class="card pt-4 mb-6 mb-xl-9">
													<!--begin::Card header-->
													<div class="card-header border-0">
														<!--begin::Card title-->
														<div class="card-title">
															<h2>Login Sessions</h2>
														</div>
														<!--end::Card title-->
														<!--begin::Card toolbar-->
														<div class="card-toolbar">
															<!--begin::Filter-->
															<button type="button" class="btn btn-sm btn-flex btn-light-primary" id="kt_modal_sign_out_sesions">
															<!--begin::Svg Icon | path: icons/duotune/arrows/arr077.svg-->
															<span class="svg-icon svg-icon-3">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<rect opacity="0.3" x="4" y="11" width="12" height="2" rx="1" fill="black" />
																	<path d="M5.86875 11.6927L7.62435 10.2297C8.09457 9.83785 8.12683 9.12683 7.69401 8.69401C7.3043 8.3043 6.67836 8.28591 6.26643 8.65206L3.34084 11.2526C2.89332 11.6504 2.89332 12.3496 3.34084 12.7474L6.26643 15.3479C6.67836 15.7141 7.3043 15.6957 7.69401 15.306C8.12683 14.8732 8.09458 14.1621 7.62435 13.7703L5.86875 12.3073C5.67684 12.1474 5.67684 11.8526 5.86875 11.6927Z" fill="black" />
																	<path d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z" fill="#C4C4C4" />
																</svg>
															</span>
															<!--end::Svg Icon-->Sign out all sessions</button>
															<!--end::Filter-->
														</div>
														<!--end::Card toolbar-->
													</div>
													<!--end::Card header-->
													<!--begin::Card body-->
													<div class="card-body pt-0 pb-5">
														<!--begin::Table wrapper-->
														<div class="table-responsive">
															<!--begin::Table-->
															<table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
																<!--begin::Table head-->
																<thead class="border-bottom border-gray-200 fs-7 fw-bolder">
																	<!--begin::Table row-->
																	<tr class="text-start text-muted text-uppercase gs-0">
																		<th class="min-w-100px">Location</th>
																		<th>Device</th>
																		<th>IP Address</th>
																		<th class="min-w-125px">Time</th>
																		<th class="min-w-70px">Actions</th>
																	</tr>
																	<!--end::Table row-->
																</thead>
																<!--end::Table head-->
																<!--begin::Table body-->
																<tbody class="fs-6 fw-bold text-gray-600">
																	<tr>
																		<!--begin::Invoice=-->
																		<td>Australia</td>
																		<!--end::Invoice=-->
																		<!--begin::Status=-->
																		<td>Chome - Windows</td>
																		<!--end::Status=-->
																		<!--begin::Amount=-->
																		<td>207.26.42.291</td>
																		<!--end::Amount=-->
																		<!--begin::Date=-->
																		<td>23 seconds ago</td>
																		<!--end::Date=-->
																		<!--begin::Action=-->
																		<td>Current session</td>
																		<!--end::Action=-->
																	</tr>
																	<tr>
																		<!--begin::Invoice=-->
																		<td>Australia</td>
																		<!--end::Invoice=-->
																		<!--begin::Status=-->
																		<td>Safari - iOS</td>
																		<!--end::Status=-->
																		<!--begin::Amount=-->
																		<td>207.33.23.145</td>
																		<!--end::Amount=-->
																		<!--begin::Date=-->
																		<td>3 days ago</td>
																		<!--end::Date=-->
																		<!--begin::Action=-->
																		<td>
																			<a href="#" data-kt-users-sign-out="single_user">Sign out</a>
																		</td>
																		<!--end::Action=-->
																	</tr>
																	<tr>
																		<!--begin::Invoice=-->
																		<td>Australia</td>
																		<!--end::Invoice=-->
																		<!--begin::Status=-->
																		<td>Chrome - Windows</td>
																		<!--end::Status=-->
																		<!--begin::Amount=-->
																		<td>207.16.14.231</td>
																		<!--end::Amount=-->
																		<!--begin::Date=-->
																		<td>last week</td>
																		<!--end::Date=-->
																		<!--begin::Action=-->
																		<td>Expired</td>
																		<!--end::Action=-->
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
												<!--begin::Card-->
												<div class="card pt-4 mb-6 mb-xl-9">
													<!--begin::Card header-->
													<div class="card-header border-0">
														<!--begin::Card title-->
														<div class="card-title">
															<h2>Logs</h2>
														</div>
														<!--end::Card title-->
														<!--begin::Card toolbar-->
														<div class="card-toolbar">
															<!--begin::Button-->
															<button type="button" class="btn btn-sm btn-light-primary">
															<!--begin::Svg Icon | path: icons/duotune/files/fil021.svg-->
															<span class="svg-icon svg-icon-3">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3" d="M19 15C20.7 15 22 13.7 22 12C22 10.3 20.7 9 19 9C18.9 9 18.9 9 18.8 9C18.9 8.7 19 8.3 19 8C19 6.3 17.7 5 16 5C15.4 5 14.8 5.2 14.3 5.5C13.4 4 11.8 3 10 3C7.2 3 5 5.2 5 8C5 8.3 5 8.7 5.1 9H5C3.3 9 2 10.3 2 12C2 13.7 3.3 15 5 15H19Z" fill="black" />
																	<path d="M13 17.4V12C13 11.4 12.6 11 12 11C11.4 11 11 11.4 11 12V17.4H13Z" fill="black" />
																	<path opacity="0.3" d="M8 17.4H16L12.7 20.7C12.3 21.1 11.7 21.1 11.3 20.7L8 17.4Z" fill="black" />
																</svg>
															</span>
															<!--end::Svg Icon-->Download Report</button>
															<!--end::Button-->
														</div>
														<!--end::Card toolbar-->
													</div>
													<!--end::Card header-->
													<!--begin::Card body-->
													<div class="card-body py-0">
														<!--begin::Table wrapper-->
														<div class="table-responsive">
															<!--begin::Table-->
															<table class="table align-middle table-row-dashed fw-bold text-gray-600 fs-6 gy-5" id="kt_table_users_logs">
																<!--begin::Table body-->
																<tbody>
																	<!--begin::Table row-->
																	<tr>
																		<!--begin::Badge=-->
																		<td class="min-w-70px">
																			<div class="badge badge-light-success">200 OK</div>
																		</td>
																		<!--end::Badge=-->
																		<!--begin::Status=-->
																		<td>POST /v1/invoices/in_7967_1624/payment</td>
																		<!--end::Status=-->
																		<!--begin::Timestamp=-->
																		<td class="pe-0 text-end min-w-200px">10 Mar 2022, 6:43 am</td>
																		<!--end::Timestamp=-->
																	</tr>
																	<!--end::Table row-->
																	<!--begin::Table row-->
																	<tr>
																		<!--begin::Badge=-->
																		<td class="min-w-70px">
																			<div class="badge badge-light-success">200 OK</div>
																		</td>
																		<!--end::Badge=-->
																		<!--begin::Status=-->
																		<td>POST /v1/invoices/in_9962_6608/payment</td>
																		<!--end::Status=-->
																		<!--begin::Timestamp=-->
																		<td class="pe-0 text-end min-w-200px">15 Apr 2022, 10:10 pm</td>
																		<!--end::Timestamp=-->
																	</tr>
																	<!--end::Table row-->
																	<!--begin::Table row-->
																	<tr>
																		<!--begin::Badge=-->
																		<td class="min-w-70px">
																			<div class="badge badge-light-success">200 OK</div>
																		</td>
																		<!--end::Badge=-->
																		<!--begin::Status=-->
																		<td>POST /v1/invoices/in_9962_6608/payment</td>
																		<!--end::Status=-->
																		<!--begin::Timestamp=-->
																		<td class="pe-0 text-end min-w-200px">05 May 2022, 5:20 pm</td>
																		<!--end::Timestamp=-->
																	</tr>
																	<!--end::Table row-->
																	<!--begin::Table row-->
																	<tr>
																		<!--begin::Badge=-->
																		<td class="min-w-70px">
																			<div class="badge badge-light-danger">500 ERR</div>
																		</td>
																		<!--end::Badge=-->
																		<!--begin::Status=-->
																		<td>POST /v1/invoice/in_9102_7650/invalid</td>
																		<!--end::Status=-->
																		<!--begin::Timestamp=-->
																		<td class="pe-0 text-end min-w-200px">10 Nov 2022, 8:43 pm</td>
																		<!--end::Timestamp=-->
																	</tr>
																	<!--end::Table row-->
																	<!--begin::Table row-->
																	<tr>
																		<!--begin::Badge=-->
																		<td class="min-w-70px">
																			<div class="badge badge-light-danger">500 ERR</div>
																		</td>
																		<!--end::Badge=-->
																		<!--begin::Status=-->
																		<td>POST /v1/invoice/in_9102_7650/invalid</td>
																		<!--end::Status=-->
																		<!--begin::Timestamp=-->
																		<td class="pe-0 text-end min-w-200px">25 Jul 2022, 5:20 pm</td>
																		<!--end::Timestamp=-->
																	</tr>
																	<!--end::Table row-->
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
												<!--begin::Card-->
												<div class="card pt-4 mb-6 mb-xl-9">
													<!--begin::Card header-->
													<div class="card-header border-0">
														<!--begin::Card title-->
														<div class="card-title">
															<h2>Events</h2>
														</div>
														<!--end::Card title-->
														<!--begin::Card toolbar-->
														<div class="card-toolbar">
															<!--begin::Button-->
															<button type="button" class="btn btn-sm btn-light-primary">
															<!--begin::Svg Icon | path: icons/duotune/files/fil021.svg-->
															<span class="svg-icon svg-icon-3">
																<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																	<path opacity="0.3" d="M19 15C20.7 15 22 13.7 22 12C22 10.3 20.7 9 19 9C18.9 9 18.9 9 18.8 9C18.9 8.7 19 8.3 19 8C19 6.3 17.7 5 16 5C15.4 5 14.8 5.2 14.3 5.5C13.4 4 11.8 3 10 3C7.2 3 5 5.2 5 8C5 8.3 5 8.7 5.1 9H5C3.3 9 2 10.3 2 12C2 13.7 3.3 15 5 15H19Z" fill="black" />
																	<path d="M13 17.4V12C13 11.4 12.6 11 12 11C11.4 11 11 11.4 11 12V17.4H13Z" fill="black" />
																	<path opacity="0.3" d="M8 17.4H16L12.7 20.7C12.3 21.1 11.7 21.1 11.3 20.7L8 17.4Z" fill="black" />
																</svg>
															</span>
															<!--end::Svg Icon-->Download Report</button>
															<!--end::Button-->
														</div>
														<!--end::Card toolbar-->
													</div>
													<!--end::Card header-->
													<!--begin::Card body-->
													<div class="card-body py-0">
														<!--begin::Table-->
														<table class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-5" id="kt_table_customers_events">
															<!--begin::Table body-->
															<tbody>
																<!--begin::Table row-->
																<tr>
																	<!--begin::Event=-->
																	<td class="min-w-400px">Invoice
																	<a href="#" class="fw-bolder text-gray-900 text-hover-primary me-1">#WER-45670</a>is
																	<span class="badge badge-light-info">In Progress</span></td>
																	<!--end::Event=-->
																	<!--begin::Timestamp=-->
																	<td class="pe-0 text-gray-600 text-end min-w-200px">19 Aug 2022, 6:05 pm</td>
																	<!--end::Timestamp=-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Event=-->
																	<td class="min-w-400px">
																	<a href="#" class="text-gray-600 text-hover-primary me-1">Melody Macy</a>has made payment to
																	<a href="#" class="fw-bolder text-gray-900 text-hover-primary">#XRS-45670</a></td>
																	<!--end::Event=-->
																	<!--begin::Timestamp=-->
																	<td class="pe-0 text-gray-600 text-end min-w-200px">21 Feb 2022, 11:30 am</td>
																	<!--end::Timestamp=-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Event=-->
																	<td class="min-w-400px">Invoice
																	<a href="#" class="fw-bolder text-gray-900 text-hover-primary me-1">#KIO-45656</a>status has changed from
																	<span class="badge badge-light-succees me-1">In Transit</span>to
																	<span class="badge badge-light-success">Approved</span></td>
																	<!--end::Event=-->
																	<!--begin::Timestamp=-->
																	<td class="pe-0 text-gray-600 text-end min-w-200px">25 Jul 2022, 5:20 pm</td>
																	<!--end::Timestamp=-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Event=-->
																	<td class="min-w-400px">
																	<a href="#" class="text-gray-600 text-hover-primary me-1">Max Smith</a>has made payment to
																	<a href="#" class="fw-bolder text-gray-900 text-hover-primary">#SDK-45670</a></td>
																	<!--end::Event=-->
																	<!--begin::Timestamp=-->
																	<td class="pe-0 text-gray-600 text-end min-w-200px">10 Mar 2022, 2:40 pm</td>
																	<!--end::Timestamp=-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Event=-->
																	<td class="min-w-400px">Invoice
																	<a href="#" class="fw-bolder text-gray-900 text-hover-primary me-1">#SEP-45656</a>status has changed from
																	<span class="badge badge-light-warning me-1">Pending</span>to
																	<span class="badge badge-light-info">In Progress</span></td>
																	<!--end::Event=-->
																	<!--begin::Timestamp=-->
																	<td class="pe-0 text-gray-600 text-end min-w-200px">20 Jun 2022, 11:30 am</td>
																	<!--end::Timestamp=-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Event=-->
																	<td class="min-w-400px">
																	<a href="#" class="text-gray-600 text-hover-primary me-1">Brian Cox</a>has made payment to
																	<a href="#" class="fw-bolder text-gray-900 text-hover-primary">#OLP-45690</a></td>
																	<!--end::Event=-->
																	<!--begin::Timestamp=-->
																	<td class="pe-0 text-gray-600 text-end min-w-200px">19 Aug 2022, 5:30 pm</td>
																	<!--end::Timestamp=-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Event=-->
																	<td class="min-w-400px">Invoice
																	<a href="#" class="fw-bolder text-gray-900 text-hover-primary me-1">#LOP-45640</a>has been
																	<span class="badge badge-light-danger">Declined</span></td>
																	<!--end::Event=-->
																	<!--begin::Timestamp=-->
																	<td class="pe-0 text-gray-600 text-end min-w-200px">25 Jul 2022, 2:40 pm</td>
																	<!--end::Timestamp=-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Event=-->
																	<td class="min-w-400px">
																	<a href="#" class="text-gray-600 text-hover-primary me-1">Brian Cox</a>has made payment to
																	<a href="#" class="fw-bolder text-gray-900 text-hover-primary">#OLP-45690</a></td>
																	<!--end::Event=-->
																	<!--begin::Timestamp=-->
																	<td class="pe-0 text-gray-600 text-end min-w-200px">24 Jun 2022, 10:30 am</td>
																	<!--end::Timestamp=-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Event=-->
																	<td class="min-w-400px">
																	<a href="#" class="text-gray-600 text-hover-primary me-1">Max Smith</a>has made payment to
																	<a href="#" class="fw-bolder text-gray-900 text-hover-primary">#SDK-45670</a></td>
																	<!--end::Event=-->
																	<!--begin::Timestamp=-->
																	<td class="pe-0 text-gray-600 text-end min-w-200px">10 Mar 2022, 2:40 pm</td>
																	<!--end::Timestamp=-->
																</tr>
																<!--end::Table row-->
																<!--begin::Table row-->
																<tr>
																	<!--begin::Event=-->
																	<td class="min-w-400px">Invoice
																	<a href="#" class="fw-bolder text-gray-900 text-hover-primary me-1">#SEP-45656</a>status has changed from
																	<span class="badge badge-light-warning me-1">Pending</span>to
																	<span class="badge badge-light-info">In Progress</span></td>
																	<!--end::Event=-->
																	<!--begin::Timestamp=-->
																	<td class="pe-0 text-gray-600 text-end min-w-200px">22 Sep 2022, 11:05 am</td>
																	<!--end::Timestamp=-->
																</tr>
																<!--end::Table row-->
															</tbody>
															<!--end::Table body-->
														</table>
														<!--end::Table-->
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
											<form class="form" action="#" id="kt_modal_update_user_form">
												<!--begin::Modal header-->
												<div class="modal-header" id="kt_modal_update_user_header">
													<!--begin::Modal title-->
													<h2 class="fw-bolder">Mettre à jour Détails Utilisateur</h2>
													<!--end::Modal title-->
													<!--begin::Close-->
													<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
														<span class="svg-icon svg-icon-1">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
																<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
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
													<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_user_header" data-kt-scroll-wrappers="#kt_modal_update_user_scroll" data-kt-scroll-offset="300px">
														<!--begin::User toggle-->
														<div class="fw-boldest fs-3 rotate collapsible mb-7" data-bs-toggle="collapse" href="#kt_modal_update_user_user_info" role="button" aria-expanded="false" aria-controls="kt_modal_update_user_user_info">Informations de l'utilisateur
														
													</div>
														<!--end::User toggle-->
														<!--begin::User form-->
														<div id="kt_modal_update_user_user_info" class="collapse show">
															<!--begin::Input group-->
															<div class="mb-7">
																<!--begin::Label-->
																<label class="fs-6 fw-bold mb-2">
																	<span>Mettre à jour image</span>
																	<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allowed file types: png, jpg, jpeg."></i>
																</label>
																<!--end::Label-->
																<!--begin::Image input wrapper-->
																<div class="mt-1">
																	<!--begin::Image input-->
																	<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
																		<!--begin::Preview existing avatar-->
																		<div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/avatars/300-6.jpg"></div>
																		<!--end::Preview existing avatar-->
																		<!--begin::Edit-->
																		<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
																			<i class="bi bi-pencil-fill fs-7"></i>
																			<!--begin::Inputs-->
																			<input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
																			<input type="hidden" name="avatar_remove" />
																			<!--end::Inputs-->
																		</label>
																		<!--end::Edit-->
																		<!--begin::Cancel-->
																		<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
																			<i class="bi bi-x fs-2"></i>
																		</span>
																		<!--end::Cancel-->
																		<!--begin::Remove-->
																		<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
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
																<label class="fs-6 fw-bold mb-2">Name</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="text" class="form-control form-control-solid" placeholder="" name="name" value="{{ $selectedUser->name }}"  />
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<div class="fv-row mb-7">
																<!--begin::Label-->
																<label class="fs-6 fw-bold mb-2">
																	<span>Email</span>
																	<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Email address must be active"></i>
																</label>
																<!--end::Label-->
																<!--begin::Input-->
																<input type="email" class="form-control form-control-solid" placeholder="" name="email" value="{{ $selectedUser->email }}"  />
																<!--end::Input-->
															</div>
															<!--end::Input group-->
															<!--begin::Input group-->
															<!-- <div class="fv-row mb-7">
																
																<label class="fs-6 fw-bold mb-2">Description</label>
																
																<input type="text" class="form-control form-control-solid" placeholder="" name="description" />
																
															</div> -->
															<!--end::Input group-->
															
														</div>
														
												</div>
												<!--end::Modal body-->
												<!--begin::Modal footer-->
												<div class="modal-footer flex-center">
													<!--begin::Button-->
													<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
													<!--end::Button-->
													<!--begin::Button-->
													<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
														<span class="indicator-label">Submit</span>
														<span class="indicator-progress">Please wait...
														<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
													</button>
													<!--end::Button-->
												</div>
												<!--end::Modal footer-->
											</form>
											<!--end::Form-->
										</div>
									</div>
								</div>
								<!--end::Modal - Update user details-->
								<!--begin::Modal - Add schedule-->
								<div class="modal fade" id="kt_modal_add_schedule" tabindex="-1" aria-hidden="true">
									<!--begin::Modal dialog-->
									<div class="modal-dialog modal-dialog-centered mw-650px">
										<!--begin::Modal content-->
										<div class="modal-content">
											<!--begin::Modal header-->
											<div class="modal-header">
												<!--begin::Modal title-->
												<h2 class="fw-bolder">Add an Event</h2>
												<!--end::Modal title-->
												<!--begin::Close-->
												<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
													<span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
															<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
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
												<form id="kt_modal_add_schedule_form" class="form" action="#">
													<!--begin::Input group-->
													<div class="fv-row mb-7">
														<!--begin::Label-->
														<label class="required fs-6 fw-bold form-label mb-2">Event Name</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input type="text" class="form-control form-control-solid" name="event_name" value="" />
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="fv-row mb-7">
														<!--begin::Label-->
														<label class="fs-6 fw-bold form-label mb-2">
															<span class="required">Date &amp; Time</span>
															<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Select a date &amp; time."></i>
														</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input class="form-control form-control-solid" placeholder="Pick date &amp; time" name="event_datetime" id="kt_modal_add_schedule_datepicker" />
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="fv-row mb-7">
														<!--begin::Label-->
														<label class="required fs-6 fw-bold form-label mb-2">Event Organiser</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input type="text" class="form-control form-control-solid" name="event_org" value="" />
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="fv-row mb-7">
														<!--begin::Label-->
														<label class="required fs-6 fw-bold form-label mb-2">Send Event Details To</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input id="kt_modal_add_schedule_tagify" type="text" class="form-control form-control-solid" name="event_invitees" value="smith@kpmg.com, melody@altbox.com" />
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Actions-->
													<div class="text-center pt-15">
														<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
														<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
															<span class="indicator-label">Submit</span>
															<span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
								<!--end::Modal - Add schedule-->
								<!--begin::Modal - Add task-->
								<div class="modal fade" id="kt_modal_add_task" tabindex="-1" aria-hidden="true">
									<!--begin::Modal dialog-->
									<div class="modal-dialog modal-dialog-centered mw-650px">
										<!--begin::Modal content-->
										<div class="modal-content">
											<!--begin::Modal header-->
											<div class="modal-header">
												<!--begin::Modal title-->
												<h2 class="fw-bolder">Add a Task</h2>
												<!--end::Modal title-->
												<!--begin::Close-->
												<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
													<span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
															<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
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
												<form id="kt_modal_add_task_form" class="form" action="#">
													<!--begin::Input group-->
													<div class="fv-row mb-7">
														<!--begin::Label-->
														<label class="required fs-6 fw-bold form-label mb-2">Task Name</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input type="text" class="form-control form-control-solid" name="task_name" value="" />
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="fv-row mb-7">
														<!--begin::Label-->
														<label class="fs-6 fw-bold form-label mb-2">
															<span class="required">Task Due Date</span>
															<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Select a due date."></i>
														</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input class="form-control form-control-solid" placeholder="Pick date" name="task_duedate" id="kt_modal_add_task_datepicker" />
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Input group-->
													<div class="fv-row mb-7">
														<!--begin::Label-->
														<label class="fs-6 fw-bold form-label mb-2">Task Description</label>
														<!--end::Label-->
														<!--begin::Input-->
														<textarea class="form-control form-control-solid rounded-3"></textarea>
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Actions-->
													<div class="text-center pt-15">
														<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
														<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
															<span class="indicator-label">Submit</span>
															<span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
												<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
													<span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
															<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
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
												<form id="kt_modal_update_email_form" class="form" action="#">
													<!--begin::Notice-->
													<!--begin::Notice-->
													<div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
														<!--begin::Icon-->
														<!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
														<span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black" />
																<rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black" />
															</svg>
														</span>
														<!--end::Svg Icon-->
														<!--end::Icon-->
														<!--begin::Wrapper-->
														<div class="d-flex flex-stack flex-grow-1">
															<!--begin::Content-->
															<div class="fw-bold">
																<div class="fs-6 text-gray-700">Veuillez noter qu'une adresse e-mail valide est requise pour terminer la vérification de l'e-mail.</div>
															</div>
															<!--end::Content-->
														</div>
														<!--end::Wrapper-->
													</div>
													<!--end::Notice-->
													<!--end::Notice-->
													<!--begin::Input group-->
													<div class="fv-row mb-7">
														<!--begin::Label-->
														<label class="fs-6 fw-bold form-label mb-2">
															<span class="required">Email</span>
														</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input class="form-control form-control-solid" placeholder="" name="email" value="{{ $selectedUser->email }}"  />
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Actions-->
													<div class="text-center pt-15">
														<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
														<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
															<span class="indicator-label">Submit</span>
															<span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
												<h2 class="fw-bolder">Mettre à jour Mot de passe</h2>
												<!--end::Modal title-->
												<!--begin::Close-->
												<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
													<span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
															<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
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
												<form id="kt_modal_update_password_form" class="form" action="#">
													<!--begin::Input group=-->
													<div class="fv-row mb-10">
														<label class="required form-label fs-6 mb-2">Mot de passe actuel</label>
														<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="current_password" autocomplete="off" />
													</div>
													<!--end::Input group=-->
													<!--begin::Input group-->
													<div class="mb-10 fv-row" data-kt-password-meter="true">
														<!--begin::Wrapper-->
														<div class="mb-1">
															<!--begin::Label-->
															<label class="form-label fw-bold fs-6 mb-2">Nouveau Mot de passe</label>
															<!--end::Label-->
															<!--begin::Input wrapper-->
															<div class="position-relative mb-3">
																<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="new_password" autocomplete="off" />
																<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
																	<i class="bi bi-eye-slash fs-2"></i>
																	<i class="bi bi-eye fs-2 d-none"></i>
																</span>
															</div>
															<!--end::Input wrapper-->
															<!--begin::Meter-->
															<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
																<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
																<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
																<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
																<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
															</div>
															<!--end::Meter-->
														</div>
														<!--end::Wrapper-->
														<!--begin::Hint-->
														<div class="text-muted">Utilisez 8 caractères ou plus avec un mélange de lettres, de chiffres et  &amp; symboles.</div>
														<!--end::Hint-->
													</div>
													<!--end::Input group=-->
													<!--begin::Input group=-->
													<div class="fv-row mb-10">
														<label class="form-label fw-bold fs-6 mb-2">Confirm New Password</label>
														<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="confirm_password" autocomplete="off" />
													</div>
													<!--end::Input group=-->
													<!--begin::Actions-->
													<div class="text-center pt-15">
														<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
														<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
															<span class="indicator-label">Submit</span>
															<span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
												<h2 class="fw-bolder">Mettre à jour un role</h2>
												<!--end::Modal title-->
												<!--begin::Close-->
												<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
													<span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
															<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
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
												<form id="kt_modal_update_role_form" class="form" action="#">
													<!--begin::Notice-->
													<!--begin::Notice-->
													<div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
														<!--begin::Icon-->
														<!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
														<span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
																<rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black" />
																<rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black" />
															</svg>
														</span>
														<!--end::Svg Icon-->
														<!--end::Icon-->
														<!--begin::Wrapper-->
														<div class="d-flex flex-stack flex-grow-1">
															<!--begin::Content-->
															<div class="fw-bold">
																<div class="fs-6 text-gray-700">Veuillez noter qu'en réduisant le rang d'un rôle d'utilisateur, cet utilisateur perdra tous les privilèges attribués au rôle précédent.</div>
															</div>
															<!--end::Content-->
														</div>
														<!--end::Wrapper-->
													</div>
													<!--end::Notice-->
													<!--end::Notice-->
													<!--begin::Input group-->
													<div class="mb-7">
														<!--begin::Label-->
														<label class="required fw-bold fs-6 mb-5">Role</label>
														
														<div class='separator separator-dashed my-5'></div>
														<!--begin::Input row-->
														<div class="d-flex fv-row flex-column">
															@foreach ($roles as $role)
																<!-- Radio Button avec le séparateur après chaque -->
																<div class="form-check form-check-custom form-check-solid mb-3">
																	<input class="form-check-input me-3" 
																		type="radio" 
																		name="user_role" 
																		value="{{ $role->id }}" 
																		id="role_option_{{ $role->id }}"
																		{{ $user->role_id == $role->id ? 'checked' : '' }} />
																	<label class="form-check-label" for="role_option_{{ $role->id }}">
																		<div class="fw-bolder text-gray-800">{{ $role->name }}</div>
																	</label>
																</div>
																
																<!-- Separator après chaque radio -->
																<div class='separator separator-dashed my-5'></div>
															@endforeach
														</div>
														<!--end::Input row-->
													</div>
													<div class="text-center pt-15">
														<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
														<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
															<span class="indicator-label">Submit</span>
															<span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
												<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
													<span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
															<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
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
													<div class="text-center mb-5" data-kt-add-auth-action="qr-code-label">Download the
													<a href="#">Authenticator app</a>, add a new account, then scan this barcode to set up your account.</div>
													<div class="text-center mb-5 d-none" data-kt-add-auth-action="text-code-label">Download the
													<a href="#">Authenticator app</a>, add a new account, then enter this code to set up your account.</div>
													<!--end::Label-->
													<!--begin::QR code-->
													<div class="d-flex flex-center" data-kt-add-auth-action="qr-code">
														<img src="assets/media/misc/qr.png" alt="Scan this QR code" />
													</div>
													<!--end::QR code-->
													<!--begin::Text code-->
													<div class="border rounded p-5 d-flex flex-center d-none" data-kt-add-auth-action="text-code">
														<div class="fs-1">gi2kdnb54is709j</div>
													</div>
													<!--end::Text code-->
												</div>
												<!--end::Content-->
												<!--begin::Action-->
												<div class="d-flex flex-center">
													<div class="btn btn-light-primary" data-kt-add-auth-action="text-code-button">Enter code manually</div>
													<div class="btn btn-light-primary d-none" data-kt-add-auth-action="qr-code-button">Scan barcode instead</div>
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
								<div class="modal fade" id="kt_modal_add_one_time_password" tabindex="-1" aria-hidden="true">
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
												<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
													<span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
															<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
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
													<div class="fw-bolder mb-9">Enter the new phone number to receive an SMS to when you log in.</div>
													<!--end::Label-->
													<!--begin::Input group-->
													<div class="fv-row mb-7">
														<!--begin::Label-->
														<label class="fs-6 fw-bold form-label mb-2">
															<span class="required">Mobile number</span>
															<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="A valid mobile number is required to receive the one-time password to validate your account login."></i>
														</label>
														<!--end::Label-->
														<!--begin::Input-->
														<input type="text" class="form-control form-control-solid" name="otp_mobile_number" placeholder="+6123 456 789" value="" />
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
														<input type="email" class="form-control form-control-solid" name="otp_email" value="smith@kpmg.com" readonly="readonly" />
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
														<input type="password" class="form-control form-control-solid" name="otp_confirm_password" value="" />
														<!--end::Input-->
													</div>
													<!--end::Input group-->
													<!--begin::Actions-->
													<div class="text-center pt-15">
														<button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Cancel</button>
														<button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
															<span class="indicator-label">Submit</span>
															<span class="indicator-progress">Please wait...
															<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
    