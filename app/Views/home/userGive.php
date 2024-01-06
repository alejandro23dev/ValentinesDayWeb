<div class="container">
    <div class="card card-dashed mt-10">
        <div class="card-body pt-9 pb-0">
            <div class="d-flex flex-wrap flex-sm-nowrap">
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                        <div class="d-flex flex-column">
                            <div class="d-flex align-items-center mb-2">
                                <span class="text-gray-900 fs-2 fw-bold me-1"><?php echo $user['name']; ?></span>
                            </div>
                            <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                <span class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2 cursor-pointer">
                                    <i class="ki-duotone ki-profile-circle fs-4 me-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i><?php echo $user['link']; ?></span>
                            </div>
                        </div>
                        <div class="d-flex my-4">
                            <a href="<?php echo base_url('/'); ?>" class="btn btn-sm btn-danger me-3">Salir</a>
                        </div>
                    </div>
                </div>
            </div>
            <p class="text-muted"><i class="bi bi-info-circle-fill text-warning"></i> Comparte tu nombre y tu enlace a tu pareja para que pueda registrarse</p>
        </div>
    </div>
    <div id="regalos" class="mt-20"></div>
</div>

<script>
    getRegalos();

    function getRegalos() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Home/getRegalos') ?>",
            dataType: "html",
            success: function(response) {
                $('#regalos').html(response);
            },
            error: function(error) {
                globalError();
            }
        });
    }
</script>