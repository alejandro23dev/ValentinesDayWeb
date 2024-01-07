<div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Añadir un Regalo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-12">
                    <input type="text" id="txt-name" placeholder="Descripción" autocomplete="off" class="form-control bg-transparent required<?php echo $uniqid; ?>">
                </div>
                <!-- Dropzone -->
                <div class="col-12 mt-6">
                    <div class="dropzone mb-5" id="dropzone">
                        <div class="dz-message needsclick">
                            <i class="ki-duotone ki-file-up fs-4x text-primary"><span class="path1"></span><span class="path2"></span></i>
                            <div class="ms-4">
                                <h3 class="fs-5 fw-bold text-gray-900 mb-1">Imagen</h3>
                                <span class="fs-7 fw-semibold text-gray-500">Examine o Arrastre</span>
                            </div>
                        </div>
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

    var myDropzone = new Dropzone("#dropzone", {
        url: '<?php echo base_url('Home/uploadPhoto'); ?>',
        method: 'post',
        acceptedFiles: '.jpeg,.jpg,.png',
        maxFiles: 1,
        addRemoveLinks: true,
        autoProcessQueue: false,
        paramName: 'file',
        uploadMultiple: false,
        init: function() {
            dropzone = this;
            this.on("sending", function(file, xhr, formData) {});
        }
    });

    $('#btn_save<?php echo $uniqid; ?>').on('click', function() {
        if ($('input').val() == '') {
            $('#txt-name').addClass('is-invalid');
            alert('warning', 'Complete la información');
        } else {
            if (myDropzone.files.length > 0) {
                myDropzone.processQueue();
                myDropzone.on("complete", function(response) {
                    $.ajax({
                        type: "post",
                        url: "<?php echo base_url('Home/uploadRegalo') ?>",
                        data: {
                            'name': $('#txt-name').val().toUpperCase()
                        },
                        dataType: "json",
                        success: function(response) {
                            if (response.error == 0) {
                                let formData = new FormData();
                                formData.append('file', $(myDropzone)[0].files[0]);
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
                });
            } else
                alert('warning', 'Seleccione una Imagen');
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