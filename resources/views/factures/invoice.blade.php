

<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
		<!-- <title>Metronic - the world's #1 selling Bootstrap Admin Theme Ecosystem for HTML, Vue, React, Angular &amp; Laravel by Keenthemes</title> -->
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Vendor Stylesheets(used by this page)-->
		<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="print-content-only header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
        <div class="d-flex flex-column flex-root">
            <div class="page d-flex flex-row flex-column-fluid">
                <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <div class="post d-flex flex-column-fluid" id="kt_post">
                                        <!--begin::Container-->
                                        <div id="kt_content_container" class="container-xxl">
                                            <!-- begin::Invoice 3-->
                                            <div class="card">
                                                <!-- begin::Body-->
                                                <div class="card-body py-20">
                                                    <!-- begin::Wrapper-->
                                                    <div class="mw-lg-950px mx-auto w-100">
                                                        <!-- begin::Header-->
                                                        <div class="d-flex justify-content-between flex-column flex-sm-row mb-19">
                                                            <h4 class="fw-boldest text-gray-800 fs-2qx pe-5 pb-7">Facture N° #{{ $vente->id }} </h4>
                                                            <!--end::Logo-->
                                                            <div class="text-sm-end">
                                                                <!--begin::Logo-->
                                                                <a href="#" class="d-block  ms-sm-auto">
                                                                    <img alt="Logo" src="{{ asset('assets/media/logos/LOGO_2.png') }}" class="h-100px" />
                                                                </a>
                                                                <!--end::Logo-->
                                                                <!--begin::Text-->
                                                                <div class="text-sm-end fw-bold fs-4 text-muted mt-7">
                                                                    <div>MARIA GLETA, CALAVI</div>
                                                                    <!-- <div>Mississippi 96522</div> -->
                                                                </div>
                                                                <!--end::Text-->
                                                            </div>
                                                        </div>
                                                        <!--end::Header-->
                                                        <!--begin::Body-->
                                                        <div class="pb-12">
                                                            <!--begin::Wrapper-->
                                                            <div class="d-flex flex-column gap-7 gap-md-10">
                                                                <!--begin::Message-->
                                                                <!-- <div class="fw-bolder fs-2">Dear Lucy Kunic -->
                                                                <!-- <span class="fs-6">(lucy.m@fentech.com)</span>, -->
                                                                <br />
                                                                </div>
                                                                <!--begin::Message-->
                                                                <!--begin::Separator-->
                                                                <div class="separator"></div>
                                                                <!--begin::Separator-->
                                                                <!--begin::Order details-->
                                                                <div class="d-flex flex-column flex-sm-row gap-7 gap-md-10 fw-bolder">
                                                                    <!-- <div class="flex-root d-flex flex-column">
                                                                        <span class="text-muted">Produits ID</span>
                                                                        <span class="fs-5"></span>
                                                                    </div> -->
                                                                    <div class="flex-root d-flex flex-column">
                                                                        <span class="text-muted">Date</span>
                                                                        <span class="fs-5">{{ $vente->created_at->format('d F Y') }}</span>
                                                                    </div>
                                                                    <div class="flex-root d-flex flex-column">
                                                                        <span class="text-muted">Caissier(e)</span>
                                                                        <span class="fs-5">{{ auth()->user()->name }}</span>
                                                                    </div>
                                                                    <!-- <div class="flex-root d-flex flex-column">
                                                                        <span class="text-muted">Shipment ID</span>
                                                                        <span class="fs-5">#SHP-0025410</span>
                                                                    </div> -->
                                                                </div>
                                                                <!--end::Order details-->
                                                                <!--begin::Billing & shipping-->
                                                                
                                                                <!--end::Billing & shipping-->
                                                                <!--begin:Order summary-->
                                                                <div class="d-flex justify-content-between flex-column">
                                                                    <!--begin::Table-->
                                                                    <div class="table-responsive border-bottom mb-9">
                                                                        <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                                                            <thead>
                                                                                <tr class="border-bottom fs-6 fw-bolder text-muted">
                                                                                    <th class="min-w-175px pb-2">Products</th>
                                                                                    <th class="min-w-70px text-end pb-2">Prix unitaire</th>
                                                                                    <th class="min-w-80px text-end pb-2">Quantité</th>
                                                                                    <th class="min-w-100px text-end pb-2">Total</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody class="fw-bold text-gray-600">
                                                                                <!--begin::Products-->
                                                                                @foreach($venteDetails as $detail)
                                                                                <tr>
                                                                                    <!--begin::Product-->
                                                                                    <td>
                                                                                        <div class="d-flex align-items-center">
                                                                                            <!--begin::Thumbnail-->
                                                                                            <a href="../../demo1/dist/apps/ecommerce/catalog/edit-product.html" class="symbol symbol-50px">
                                                                                                <span class="symbol-label" style="background-image:url(assets/media//stock/ecommerce/1.gif);"></span>
                                                                                            </a>
                                                                                            <!--end::Thumbnail-->
                                                                                            <!--begin::Title-->
                                                                                            <div class="ms-5">
                                                                                                <div class="fw-bolder">{{ $detail->produit->name }}</div>
                                                                                                <!-- <div class="fs-7 text-muted">Delivery Date: 11/02/2022</div> -->
                                                                                            </div>
                                                                                            <!--end::Title-->
                                                                                        </div>
                                                                                    </td>
                                                                                    <!--end::Product-->
                                                                                    <!--begin::SKU-->
                                                                                    <td class="text-end">{{ number_format($detail->prix_unitaire, 2) }} FCFA</td>
                                                                                    <!--end::SKU-->
                                                                                    <!--begin::Quantity-->
                                                                                    <td class="text-end">{{ $detail->quantite }}</td>
                                                                                    <!--end::Quantity-->
                                                                                    <!--begin::Total-->
                                                                                    <td class="text-end">{{ number_format($detail->montant_total, 2) }} FCFA</td>
                                                                                    <!--end::Total-->
                                                                                </tr>
                                                                                @endforeach
                                                                                <!--end::Products-->
                                                                                <!--begin::Subtotal-->
                                                                                <tr>
                                                                                    <td colspan="3" class="text-end">Total</td>
                                                                                    <td class="text-end">{{ number_format($vente->montant_total, 2) }} FCFA</td>
                                                                                </tr>
                                                                                <!--end::Subtotal-->
                                                                                <!--begin::VAT-->
                                                                                <tr>
                                                                                    <td colspan="3" class="text-end">TVA (18%)</td>
                                                                                    <td class="text-end">0.00 FCFA</td>
                                                                                </tr>
                                                                                <!--end::VAT-->
                                                                                <!--begin::Shipping-->
                                                                                <!-- <tr>
                                                                                    <td colspan="3" class="text-end">Shipping Rate</td>
                                                                                    <td class="text-end">5.00 FCFA</td>
                                                                                </tr> -->
                                                                                <!--end::Shipping-->
                                                                                <!--begin::Grand total-->
                                                                                <tr>
                                                                                    <td colspan="3" class="fs-3 text-dark fw-bolder text-end">Grand Total</td>
                                                                                    <td class="text-dark fs-3 fw-boldest text-end">{{ number_format($vente->montant_total * 1.18, 2) }} FCFA</td>
                                                                                </tr>
                                                                                <!--end::Grand total-->
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <span class="text-muted fs-5">Nous vous remercions de votre achat.</span>
                                                                    <!--end::Table-->
                                                                </div>
                                                                <!--end:Order summary-->
                                                            </div>
                                                            <!--end::Wrapper-->
                                                        </div>
                                                        <!--end::Body-->
                                                        <!-- begin::Footer-->
                                                        <div class="d-flex flex-stack flex-wrap mt-lg-20 pt-13">
                                                            <!-- begin::Actions-->
                                                            <div class="my-1 me-5">
                                                                <!-- begin::Pint-->
                                                                <button type="button" class="btn btn-success my-1 me-12" onclick="window.print();"> Imprimer</button>
                                                                <!-- end::Pint-->
                                                                <!-- begin::Download-->
                                                                <a href="{{ route('invoices.download', $vente->id) }}" class="btn btn-light-success my-1">Télécharger la facture PDF</a>
                                                                <!-- end::Download-->
                                                            </div>
                                                            <!-- end::Actions-->
                                                            <!-- begin::Action-->
                                                            <a href="ventes/create" class="btn btn-primary my-1">Retour à la vente</a>
                                                            <!-- end::Action-->
                                                        </div>
                                                        <!-- end::Footer-->
                                                    </div>
                                                    <!-- end::Wrapper-->
                                                </div>
                                                <!-- end::Body-->
                                            </div>
                                            <!-- end::Invoice 1-->
                                        </div>
                                        <!--end::Container-->
                                    </div>
                    </div>
                </div>
            </div>
        </div>

<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="assets/js/widgets.bundle.js"></script>
		<script src="assets/js/custom/widgets.js"></script>
		<script src="assets/js/custom/apps/chat/chat.js"></script>
		<script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
		<script src="assets/js/custom/utilities/modals/create-app.js"></script>
		<script src="assets/js/custom/utilities/modals/users-search.js"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>