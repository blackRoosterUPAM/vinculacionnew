<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: false, lg: true}" data-kt-sticky-name="app-header-sticky" data-kt-sticky-offset="{default: false, lg: '300px'}">
	<!--begin::Header container-->
	<div class="app-container container-xxl d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
		<!--begin::Header mobile toggle-->
		<div class="d-flex align-items-center d-lg-none ms-n3 me-2" title="Show sidebar menu">
			<div class="btn btn-icon btn-color-gray-600 btn-active-color-primary w-35px h-35px" id="kt_app_header_menu_toggle">
				<i class="ki-outline ki-abstract-14 fs-2"></i>
			</div>
		</div>
		<!--end::Header mobile toggle-->
		<!--begin::Logo-->
		<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
			<a href="index.php?c=sedes&a=index">
				<img alt="Logo" src="assets/media/logos/upam.ico" class="h-50px d-lg-none" />
				<img alt="Logo" src="assets/media/logos/upamh.png" class="h-50px d-none d-lg-inline app-sidebar-logo-default theme-light-show" />
				<img alt="Logo" src="assets/media/logos/upamh.png" class="h-50px d-none d-lg-inline app-sidebar-logo-default theme-dark-show" />
			</a>
		</div>
		<!--end::Logo-->
		<!--begin::Header wrapper-->
		<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
			<!--begin::Menu wrapper-->
			<div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="100%" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
				<!--begin::Menu-->
				<!--begin::Menu-->
				<div class="menu menu-rounded menu-active-bg menu-state-primary menu-column menu-lg-row menu-title-gray-700 menu-icon-gray-500 menu-arrow-gray-500 menu-bullet-gray-500 my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">
					<!--begin:Menu item-->
					<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" data-kt-menu-offset="-50,0" class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
						<!--begin:Menu link-->
						<span class="menu-link">
							<span class="menu-title">Postulados</span>
							<span class="menu-arrow d-lg-none"></span>
						</span>
						<!--end:Menu link-->
						<!--begin:Menu sub-->
						<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown p-0 w-100 w-lg-200px">
							<!--begin:Dashboards menu-->
							<div class="menu-state-bg menu-extended overflow-hidden overflow-lg-visible" data-kt-menu-dismiss="true">
								<!--begin:Row-->
								<div class="row">
									<div class="col-12 mb-0">
										<div class="p-3">
											<!--begin:Menu item-->
											<div class="menu-item p-0 m-0">
												<!--begin:Menu link-->
												<a href="?c=sedes&a=confirmados" class="menu-link ">
													<span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
														<i class="ki-outline ki-element-11 text-primary fs-1"></i>
													</span>
													<span class="d-flex flex-column">
														<span class="fs-6 fw-bold text-gray-800">Aceptados</span>
													</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
										</div>
									</div>
									<div class="col-12">
										<div class="p-3" >
											<!--begin:Menu item-->
											<div class="menu-item p-0 m-0">
												<!--begin:Menu link-->
												<a href="?c=sedes&a=pendientes" class="menu-link">
													<span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
														<i class="ki-outline ki-element-11 text-primary fs-1"></i>
													</span>
													<span class="d-flex flex-column">
														<span class="fs-6 fw-bold text-gray-800">Pendientes</span>
													</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
										</div>
									</div>
								</div>


								<!--end:Row-->
							</div>
							<!--end:Dashboards menu-->
						</div>
						<!--end:Menu sub-->

					</div>
					<!--end:Menu item-->
				</div>
				<!--end::Menu-->
			</div>

			<!--end::Menu wrapper-->
			<!--begin::Navbar-->
			<div class="app-navbar flex-shrink-0">
				<div class="app-navbar-item ms-3 ms-lg-5" id="kt_header_user_menu_toggle">
					<!--begin::User account menu-->
					<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
					</div>
					<div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
						<a href="#" class="menu-link px-5">
							<span class="menu-title position-relative">Modo
							</span>
						</a>
						<!--begin::Menu-->
						<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
							<!--begin::Menu item-->
							<div class="menu-item px-3 my-0">
								<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
									<span class="menu-icon" data-kt-element="icon">
										<i class="ki-outline ki-night-day fs-2"></i>
									</span>
									<span class="menu-title">Claro</span>
								</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3 my-0">
								<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
									<span class="menu-icon" data-kt-element="icon">
										<i class="ki-outline ki-moon fs-2"></i>
									</span>
									<span class="menu-title">Oscuro</span>
								</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3 my-0">
								<a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
									<span class="menu-icon" data-kt-element="icon">
										<i class="ki-outline ki-screen fs-2"></i>
									</span>
									<span class="menu-title">Sistema</span>
								</a>
							</div>
							<!--end::Menu item-->
						</div>
						<!--end::Menu-->
					</div>
					<!--end::Menu item-->
					<!--begin::Menu item-->
					<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" data-kt-menu-offset="-100,0" class="menu-item menu-lg-down-accordion me-0 me-lg-2"">
					<a href="index.php?c=usuarios&a=prueba" class=" menu-link">Cerrar Sesión</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
