<div class="container">
    <div class="mt-10 ms-10">
        <div class="row">
            <div class="col-6">
                <label for="name">Nombre</label>
                <input type="text" id="txt-name" class="form-control">
            </div>
            <div class="col-6">
                <input type="file" id="file" class="mt-8">
            </div>
        </div>
        <button type="button" class="btn btn-primary mt-6">Añadir Regalo</button>
    </div>
</div>

<script>
    $('.btn').on('click', function() {
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
                            success: function(response) {},
                            error: function(error) {}
                        });
                    }
                }
            });
        }
    });
</script>