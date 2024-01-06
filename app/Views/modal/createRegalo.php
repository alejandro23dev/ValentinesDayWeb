<div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Añadir un Regalo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <label for="name">Nombre</label>
                        <input type="text" id="txt-name" class="form-control">
                    </div>
                    <div class="col-6">
                        <input type="file" id="file" class="mt-8">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_save<?php echo $uniqid; ?>" class="btn btn-primary rounded shadow">Añadir</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#modal').modal('show');
    $('#modal').on('hidden.bs.modal', function(event) {
        $('#app-modal').html('');
    });

    $('#btn_save<?php echo $uniqid; ?>').on('click', function() {
        if ($('input').val() == '')
            console.log('INPUTS VACIOS');
        else {
            $.ajax({
                type: "post",
                url: "<?php echo base_url('Home/uploadRegalo') ?>",
                data: {
                    'name': $('#txt-name').val().toUpperCase()
                },
                dataType: "json",
                success: function(response) {
                    if (response.error == 0) {
                        getRegalos();
                        let formData = new FormData();
                        formData.append('file', $("#file")[0].files[0]);
                        formData.append('id', response.id);
                        $.ajax({
                            type: "post",
                            url: "<?php echo base_url('Home/uploadPhoto'); ?>",
                            data: formData,
                            dataType: "json",
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                getRegalos();
                            },
                            error: function(error) {}
                        });
                    }
                }
            });
        }
    });

    function checkRequiredValues() {
        let result = 0;
        let value = "";
        $('.required<?php echo $uniqid; ?>').each(function() {
            value = $(this).val();
            if (value == "") {
                $(this).addClass('is-invalid');
                result = 1;
            }
        });
        return result;
    }

    $('.required<?php echo $uniqid; ?>').on('focus', function() {
        $(this).removeClass('is-invalid');
    });
</script>