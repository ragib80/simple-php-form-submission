<?php
$content = isset($content) ? $content : '';
$title = isset($title) ? $title : '';
$external_js = isset($external_js) ? $external_js : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title> <?php echo $title; ?> </title><!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ColorlibHQ">
    <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"><!--end::Primary Meta Tags--><!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous"><!--end::Fonts--><!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous"><!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous"><!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="<?= BASE_URL; ?>/dist/css/adminlte.css"><!--end::Required Plugin(AdminLTE)--><!-- apexcharts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
    <div class="app-wrapper"> <!--begin::Header-->
        <?php include('includes/header.php'); ?>
        <?php include('includes/sidebar.php'); ?>
        <script>
            var baseUrl = "<?php echo BASE_URL; ?>";
        </script>
        <main class="app-main">
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content Header--> <!--begin::App Content-->
            <div class="app-content">
                <?php echo $content; ?>
            </div>
        </main>
        <footer class="app-footer"> <!--begin::To the end-->
            <!-- <div class="float-end d-none d-sm-inline">Anything you want</div> -->
            <strong>
                Copyright &copy;2024&nbsp;
                <a href="https://ragib-shahriar.my.id/" class="text-decoration-none">Ragib Shahriar</a>.
            </strong>
            All rights reserved.
            <!--end::Copyright-->
        </footer>
    </div>
    <!-- Include JavaScript files -->
    <?php if (!empty($external_js)) : ?>
        <script src="<?= BASE_URL . '/' . $external_js; ?>"></script>
    <?php endif; ?>


    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script> <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script> <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="<?= BASE_URL; ?>/dist/js/adminlte.js"></script> <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
        const Default = {
            scrollbarTheme: "os-theme-light",
            scrollbarAutoHide: "leave",
            scrollbarClickScroll: true,
        };
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (
                sidebarWrapper &&
                typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
        $(document).ready(function() {
            var currentUrl = window.location.pathname;
            if (currentUrl.includes('/dashboard') || currentUrl.includes('/')) {
                $('.nav-link.active').removeClass('active');
                $('.nav-item > a[href*="/dashboard"]').addClass('active');
            }
            if (currentUrl.includes('/submission/list')) {
                $('.nav-link.active').removeClass('active');
                $('.nav-item > a[href*="/submission/list"]').addClass('active');
                $('.submissions').addClass('menu-open');
            }
            if (currentUrl.includes('/submission/create')) {
                $('.nav-link.active').removeClass('active');
                $('.nav-item > a[href*="/submission/create"]').addClass('active');
                $('.submissions').addClass('menu-open');
            }
        });
    </script> <!--end::OverlayScrollbars Configure--> <!--end::Script-->
</body>

</html>