@extends('layout')
@section('content')

<div>
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Toolbar-->
						
						<!--end::Toolbar-->
						<!--begin::Post-->
						<div class="post d-flex flex-column-fluid" id="kt_post">
							<!--begin::Container-->
							<div id="kt_content_container" class="container-xxl">
								<!--begin::Row-->
								<div class="row g-5 g-xl-10 mb-xl-10">
									<div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
										<!--begin::Card widget 4-->
										<div class="card card-flush h-md-50 mb-5 mb-xl-10">
											<!--begin::Header-->
											<div class="card-header pt-5">
												<!--begin::Title-->
												<div class="card-title d-flex flex-column">
													<!--begin::Info-->
													<div class="d-flex align-items-center">
														<!--begin::Currency-->
														<span class="fs-4 fw-bold text-gray-400 me-1 align-self-start">$</span>
														<!--end::Currency-->
														<!--begin::Amount-->
														<span class="fs-2hx fw-bolder text-dark me-2 lh-1">69,700</span>
														<!--end::Amount-->
														<!--begin::Badge-->
														<span class="badge badge-success fs-6 lh-1 py-1 px-2 d-flex flex-center" style="height: 22px">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr067.svg-->
														<span class="svg-icon svg-icon-7 svg-icon-white ms-n1">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.5" d="M13 9.59998V21C13 21.6 12.6 22 12 22C11.4 22 11 21.6 11 21V9.59998H13Z" fill="black" />
																<path d="M5.7071 7.89291C5.07714 8.52288 5.52331 9.60002 6.41421 9.60002H17.5858C18.4767 9.60002 18.9229 8.52288 18.2929 7.89291L12.7 2.3C12.3 1.9 11.7 1.9 11.3 2.3L5.7071 7.89291Z" fill="black" />
															</svg>
														</span>
														<!--end::Svg Icon-->2.2%</span>
														<!--end::Badge-->
													</div>
													<!--end::Info-->
													<!--begin::Subtitle-->
													<span class="text-gray-400 pt-1 fw-bold fs-6">Expected Earnings</span>
													<!--end::Subtitle-->
												</div>
												<!--end::Title-->
											</div>
											<!--end::Header-->
											<!--begin::Card body-->
											<div class="card-body pt-2 pb-4 d-flex align-items-center">
												<!--begin::Chart-->
												<div class="d-flex flex-center me-5 pt-2">
													<div id="kt_card_widget_4_chart" style="min-width: 70px; min-height: 70px" data-kt-size="70" data-kt-line="11"></div>
												</div>
												<!--end::Chart-->
												<!--begin::Labels-->
												<div class="d-flex flex-column content-justify-center w-100">
													<!--begin::Label-->
													<div class="d-flex fs-6 fw-bold align-items-center">
														<!--begin::Bullet-->
														<div class="bullet w-8px h-6px rounded-2 bg-danger me-3"></div>
														<!--end::Bullet-->
														<!--begin::Label-->
														<div class="text-gray-500 flex-grow-1 me-4">Shoes</div>
														<!--end::Label-->
														<!--begin::Stats-->
														<div class="fw-boldest text-gray-700 text-xxl-end">$7,660</div>
														<!--end::Stats-->
													</div>
													<!--end::Label-->
													<!--begin::Label-->
													<div class="d-flex fs-6 fw-bold align-items-center my-3">
														<!--begin::Bullet-->
														<div class="bullet w-8px h-6px rounded-2 bg-primary me-3"></div>
														<!--end::Bullet-->
														<!--begin::Label-->
														<div class="text-gray-500 flex-grow-1 me-4">Gaming</div>
														<!--end::Label-->
														<!--begin::Stats-->
														<div class="fw-boldest text-gray-700 text-xxl-end">$2,820</div>
														<!--end::Stats-->
													</div>
													<!--end::Label-->
													<!--begin::Label-->
													<div class="d-flex fs-6 fw-bold align-items-center">
														<!--begin::Bullet-->
														<div class="bullet w-8px h-6px rounded-2 me-3" style="background-color: #E4E6EF"></div>
														<!--end::Bullet-->
														<!--begin::Label-->
														<div class="text-gray-500 flex-grow-1 me-4">Others</div>
														<!--end::Label-->
														<!--begin::Stats-->
														<div class="fw-boldest text-gray-700 text-xxl-end">$45,257</div>
														<!--end::Stats-->
													</div>
													<!--end::Label-->
												</div>
												<!--end::Labels-->
											</div>
											<!--end::Card body-->
										</div>
										<!--end::Card widget 4-->
										<!--begin::Card widget 5-->
										<div class="card card-flush h-md-50 mb-xl-10">
											<!--begin::Header-->
											<div class="card-header pt-5">
												<!--begin::Title-->
												<div class="card-title d-flex flex-column">
													<!--begin::Info-->
													<div class="d-flex align-items-center">
														<!--begin::Amount-->
														<span class="fs-2hx fw-bolder text-dark me-2 lh-1">1,836</span>
														<!--end::Amount-->
														<!--begin::Badge-->
														<span class="badge badge-danger fs-6 lh-1 py-1 px-2 d-flex flex-center" style="height: 22px">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr068.svg-->
														<span class="svg-icon svg-icon-7 svg-icon-white ms-n1">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.5" d="M13 14.4V3.00003C13 2.40003 12.6 2.00003 12 2.00003C11.4 2.00003 11 2.40003 11 3.00003V14.4H13Z" fill="black" />
																<path d="M5.7071 16.1071C5.07714 15.4771 5.52331 14.4 6.41421 14.4H17.5858C18.4767 14.4 18.9229 15.4771 18.2929 16.1071L12.7 21.7C12.3 22.1 11.7 22.1 11.3 21.7L5.7071 16.1071Z" fill="black" />
															</svg>
														</span>
														<!--end::Svg Icon-->2.2%</span>
														<!--end::Badge-->
													</div>
													<!--end::Info-->
													<!--begin::Subtitle-->
													<span class="text-gray-400 pt-1 fw-bold fs-6">Orders This Month</span>
													<!--end::Subtitle-->
												</div>
												<!--end::Title-->
											</div>
											<!--end::Header-->
											<!--begin::Card body-->
											<div class="card-body d-flex align-items-end pt-0">
												<!--begin::Progress-->
												<div class="d-flex align-items-center flex-column mt-3 w-100">
													<div class="d-flex justify-content-between w-100 mt-auto mb-2">
														<span class="fw-boldest fs-6 text-dark">1,048 to Goal</span>
														<span class="fw-bolder fs-6 text-gray-400">62%</span>
													</div>
													<div class="h-8px mx-3 w-100 bg-light-success rounded">
														<div class="bg-success rounded h-8px" role="progressbar" style="width: 62%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
												<!--end::Progress-->
											</div>
											<!--end::Card body-->
										</div>
										<!--end::Card widget 5-->
									</div>
									<div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
										<!--begin::Card widget 6-->
										<div class="card card-flush h-md-50 mb-5 mb-xl-10">
											<!--begin::Header-->
											<div class="card-header pt-5">
												<!--begin::Title-->
												<div class="card-title d-flex flex-column">
													<!--begin::Info-->
													<div class="d-flex align-items-center">
														<!--begin::Currency-->
														<span class="fs-4 fw-bold text-gray-400 me-1 align-self-start">$</span>
														<!--end::Currency-->
														<!--begin::Amount-->
														<span class="fs-2hx fw-bolder text-dark me-2 lh-1">2,420</span>
														<!--end::Amount-->
														<!--begin::Badge-->
														<span class="badge badge-success fs-6 lh-1 py-1 px-2 d-flex flex-center" style="height: 22px">
														<!--begin::Svg Icon | path: icons/duotune/arrows/arr067.svg-->
														<span class="svg-icon svg-icon-7 svg-icon-white ms-n1">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.5" d="M13 9.59998V21C13 21.6 12.6 22 12 22C11.4 22 11 21.6 11 21V9.59998H13Z" fill="black" />
																<path d="M5.7071 7.89291C5.07714 8.52288 5.52331 9.60002 6.41421 9.60002H17.5858C18.4767 9.60002 18.9229 8.52288 18.2929 7.89291L12.7 2.3C12.3 1.9 11.7 1.9 11.3 2.3L5.7071 7.89291Z" fill="black" />
															</svg>
														</span>
														<!--end::Svg Icon-->2.6%</span>
														<!--end::Badge-->
													</div>
													<!--end::Info-->
													<!--begin::Subtitle-->
													<span class="text-gray-400 pt-1 fw-bold fs-6">Average Daily Sales</span>
													<!--end::Subtitle-->
												</div>
												<!--end::Title-->
											</div>
											<!--end::Header-->
											<!--begin::Card body-->
											<div class="card-body d-flex align-items-end px-0 pb-0">
												<!--begin::Chart-->
												<div id="kt_card_widget_6_chart" class="w-100" style="height: 80px"></div>
												<!--end::Chart-->
											</div>
											<!--end::Card body-->
										</div>
										<!--end::Card widget 6-->
										<!--begin::Card widget 7-->
										<div class="card card-flush h-md-50 mb-xl-10">
											<!--begin::Header-->
											<div class="card-header pt-5">
												<!--begin::Title-->
												<div class="card-title d-flex flex-column">
													<!--begin::Amount-->
													<span class="fs-2hx fw-bolder text-dark me-2 lh-1">6.3k</span>
													<!--end::Amount-->
													<!--begin::Subtitle-->
													<span class="text-gray-400 pt-1 fw-bold fs-6">New Customers This Month</span>
													<!--end::Subtitle-->
												</div>
												<!--end::Title-->
											</div>
											<!--end::Header-->
											<!--begin::Card body-->
											<div class="card-body d-flex flex-column justify-content-end pe-0">
												<!--begin::Title-->
												<span class="fs-6 fw-boldest text-gray-800 d-block mb-2">Today’s Heroes</span>
												<!--end::Title-->
												<!--begin::Users group-->
												<div class="symbol-group symbol-hover flex-nowrap">
													<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Alan Warden">
														<span class="symbol-label bg-warning text-inverse-warning fw-bolder">A</span>
													</div>
													<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Michael Eberon">
														<img alt="Pic" src="assets/media/avatars/300-11.jpg" />
													</div>
													<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Susan Redwood">
														<span class="symbol-label bg-primary text-inverse-primary fw-bolder">S</span>
													</div>
													<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Melody Macy">
														<img alt="Pic" src="assets/media/avatars/300-2.jpg" />
													</div>
													<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Perry Matthew">
														<span class="symbol-label bg-danger text-inverse-danger fw-bolder">P</span>
													</div>
													<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Barry Walter">
														<img alt="Pic" src="assets/media/avatars/300-12.jpg" />
													</div>
													<a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
														<span class="symbol-label bg-light text-gray-400 fs-8 fw-bolder">+42</span>
													</a>
												</div>
												<!--end::Users group-->
											</div>
											<!--end::Card body-->
										</div>
										<!--end::Card widget 7-->
									</div>
								</div>
								
								
							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>
					
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
</div>