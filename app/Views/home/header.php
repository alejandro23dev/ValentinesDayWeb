<!DOCTYPE html>
<html>

<head>
    <title><?php echo COMPANY_MARK;?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Assets CSS -->
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="<?php echo base_url('public/assets/hvd2.png'); ?>" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="<?php echo base_url('public/assets/plugins/global/plugins.bundle.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('public/assets/css/style.bundle.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('public/assets/plugins/global/plugins.bundle.css'); ?>" rel="stylesheet" type="text/css" />

    <script>
        var hostUrl = "<?php echo base_url('public/assets/'); ?>";
    </script>
    <!-- Assets JS -->
    <script src="<?php echo base_url('public/assets/plugins/global/plugins.bundle.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/js/scripts.bundle.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/js/widgets.bundle.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/js/custom/widgets.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/plugins/global/plugins.bundle.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/plugins/custom/typedjs/typedjs.bundle.js'); ?>"></script>


</head>

<script>
    function alert(icon, text) {
        Swal.fire({
            text: text,
            icon: icon,
        });
    }

    function globalError() {
        Swal.fire({
            text: "Ha ocurrido un error",
            icon: "error",
        });
    }
</script>

<body id="kt_app_body" data-kt-app-layout="dark-header" data-kt-app-header-fixed="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!-- Page -->
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <div id="app-modal"> </div>
            <div id="app-loading" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on" hidden>
                <div class="page-loader flex-column bg-dark bg-opacity-50">
                    <span id="seconds" class="text-white" style="font-family:Georgia, 'Times New Roman', Times, serif ; font-size: 100px;"></span>
                    <span id="wait-text" class="text-white fw-semibold mt-5" style="font-family:Georgia, 'Times New Roman', Times, serif ; font-size: 50px;"></span>
                </div>
            </div>
            <!-- PAGE -->
            <?php echo view($page); ?>
        </div>
    </div>
</body>