<?php if (empty($regalos)) { ?>
    <div class="justify-content-center text-center">
        <img src="<?php echo base_url('public/assets/noregalos.png'); ?>" class="w-25 rounded" />
        <p class="fs-2 text-muted">Aún no has subido ningún regalo.</p>
    </div>
<?php } else { ?>
    <p class="fs-1 text-muted text-center">TUS REGALOS</p>
    <div class="row">
        <?php foreach ($regalos as $rg) { ?>
            <div class="col-lg-4 mt-4 hover-elevate-up">
                <div class="card overlay overflow" style="min-height: 100px;">
                    <div class="card-body p-0">
                        <div class="overlay-wrapper">
                            <img src="data:image/png;base64,<?php echo base64_encode($rg->image); ?>" class="w-100 rounded" style="height: 250px;" alt="Image">
                        </div>
                        <div class="overlay-layer bg-dark bg-hover-opacity-50 rounded">
                            <i id="<?php echo $rg->id; ?>" class="bi bi-trash-fill text-danger opacity-100 btn_deleteRegalo cursor-pointer" title="Eliminar" style="font-size: 40px;"></i>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <p class="text-muted fs-4"><?php echo $rg->name; ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
<?php } ?>

<script>
    $('#btn_uploadRegalo').on('click', function() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('Home/modalCreate'); ?>",
            dataType: "html",
            success: function(response) {
                $('#app-modal').html(response);
            },
            error: function(error) {
                globalError();
            }
        });
    });

    $('.btn_deleteRegalo').on('click', function() {
        Swal.fire({
            title: 'Estás seguro?',
            text: "Esta acción es irrevertible.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, Eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('Home/deleteRegalo'); ?>",
                    data: {
                        'id': $(this).attr('id')
                    },
                    dataType: "json",
                    success: function(response) {
                        alert('success', 'Regalo Eliminado');
                        getRegalos();
                    },
                    error: function(error) {
                        globalError();
                    }
                });
            }
        });
    });
</script>