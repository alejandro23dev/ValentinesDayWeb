<?php if (empty($regalos)) { ?>
    <div class="justify-content-center text-center">
        <img src="<?php echo base_url('public/assets/noregalos.png'); ?>" class="w-25 rounded" />
        <p class="fs-2 text-muted">Aún no has subido ningún regalo.</p>
        <button type="button" id="btn_uploadRegalo" class="btn btn-primary rounded shadow">Añadir un regalo</button>
    </div>
<?php } else { ?>
    <p class="fs-1 text-muted text-center">TUS REGALOS</p>
    <div class="row">
        <?php foreach ($regalos as $rg) { ?>
            <div class="col-12 col-lg-4 mt-4">
                <div class="card overlay overflow" style="min-height: 100px;">
                    <div class="card-body p-0">
                        <div class="overlay-wrapper">
                            <img src="data:image/png;base64,<?php echo base64_encode($rg->image); ?>" class="w-100 rounded" style="height: 250px;" alt="Image">
                        </div>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <p class="fs-3 text-muted"><?php echo $rg->name; ?></p>
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
</script>