<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link-->
        <a href="<?php echo BASE_URL; ?>/dashboard" class="brand-link"> <!--begin::Brand Image-->
            <img src="https://content.easy.jobs/assets/82042/company_logo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text-->
            <span class="brand-text fw-light">Home Task</span> <!--end::Brand Text-->
        </a> <!--end::Brand Link-->
    </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="<?php echo BASE_URL; ?>/dashboard" class="nav-link active dashboard">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item submissions">
                    <a href="#" class="nav-link "> <i class="nav-icon bi bi-pencil-square"></i>
                        <p>
                            Submissions
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href="<?php echo BASE_URL; ?>/submission/create" class="nav-link create"> <i class="nav-icon bi bi-circle"></i>
                                <p>Create Submission</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo BASE_URL; ?>/submission/list" class="nav-link list"> <i class="nav-icon bi bi-circle"></i>
                                <p>Submission List</p>
                            </a>
                        </li>

                    </ul>
                </li>


            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar--> <!--begin::App Main-->