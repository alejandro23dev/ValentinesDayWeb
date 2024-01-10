<div class="d-flex flex-column flex-root" id="kt_app_root">
    <style>
        body {
            background-image: url('<?php echo base_url('public/assets/fondo3.jpg'); ?>');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
    </style>
    <div class="d-flex flex-column flex-column-fluid flex-lg-row">
        <!-- LEFT CONTENT-->
        <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20 opacity-50 opacity-100-hover">
            <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
                <div class="d-flex flex-center flex-column flex-column-fluid ">
                    <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="../../demo1/dist/index.html" action="#">
                        <div class="text-center mb-11">
                            <img src="<?php echo base_url('public/assets/iconUsers.jpg') ?>" class="w-25 rounded mb-6" alt="IMAGE">
                            <h1 class="text-dark fw-bolder mb-3">Registrate o Inicia Sesión</h1>
                            <div class="text-gray-500 fw-semibold fs-6">Empezemos por escoger una opción</div>
                        </div>
                        <div class="row g-3 mb-9">
                            <div class="col-md-6">
                                <a href="#" id="give" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100 actions<?php echo $uniqid; ?>" data-selected="" data-action="give">
                                    <img alt="Logo" src="<?php echo base_url('public/assets/regalo.png') ?>" class="h-25px me-3 rounded-circle">Hacer un Regalo</a>
                            </div>
                            <div class="col-md-6">
                                <a href="#" id="obtain" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100 actions<?php echo $uniqid; ?>" data-selected="" data-action="obtain">
                                    <img alt="Logo" src="<?php echo base_url('public/assets/regalo.png') ?>" class="h-25px me-3 rounded-circle">Obtener Regalo</a>
                            </div>
                        </div>
                        <div class="separator separator-content my-14">
                            <span class="w-125px text-gray-500 fw-semibold fs-7">Llena este formulario</span>
                        </div>
                        <div class="fv-row mb-4 fv-plugins-icon-container">
                            <input type="text" id="name<?php echo $uniqid; ?>" placeholder="Nombre / Apodo" autocomplete="off" class="form-control bg-transparent required<?php echo $uniqid; ?>">
                            <label for="name" class="text-muted fs-8 ms-4 mt-1">Introduce un Nombre / Apodo por el que tu pareja te llame</label>
                        </div>
                        <div class="fv-row mb-3 fv-plugins-icon-container">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><?php echo COMPANY_MARK; ?></span>
                                <input type="text" id="link<?php echo $uniqid; ?>" placeholder="Enlace" autocomplete="off" class="form-control bg-transparent required<?php echo $uniqid; ?>" aria-describedby="basic-addon1">
                                <label for="link" class="text-muted fs-8 ms-4 mt-1">Compartirás con tu pareja este enlace para que pueda registarse</label>
                            </div>
                        </div>
                        <div class="fv-row mb-3 fv-plugins-icon-container">
                            <input type="password" id="password<?php echo $uniqid; ?>" placeholder="Contraseña" autocomplete="off" class="form-control bg-transparent required<?php echo $uniqid; ?>">
                            <label for="password<?php echo $uniqid; ?>" class="text-muted fs-8 ms-4 mt-1">Compartirás con tu pareja esta contraseña para que pueda registarse</label>
                        </div>
                        <div class="row mt-2">
                            <div class="d-grid col-12 col-lg-6">
                                <button type="button" id="btn_register<?php echo $uniqid; ?>" class="btn btn-primary shadow" disabled>
                                    <span class="indicator-label">Registrame</span>
                                    <span class="indicator-progress">Por Favor Espera...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <div class="d-grid col-12 col-lg-6">
                                <button type="button" id="btn_login<?php echo $uniqid; ?>" class="btn btn-secondary shadow" disabled>
                                    <span class="indicator-label">Iniciar Sesion</span>
                                    <span class="indicator-progress">Por Favor Espera...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row mt-6">
                    <div class="col-12">
                        <p class="text-center fs-4 text-muted text-uppercase">Contacto</p>
                    </div>
                    <div class="col-12 col-lg-4">
                        <a href=""><i class="bi bi-whatsapp text-success fs-1"></i> <span class="text-muted fs-4">Whatsapp</span></a>
                    </div>
                    <div class="col-12 col-lg-4">
                        <a href=""><i class="bi bi-facebook text-primary fs-1"></i> <span class="text-muted fs-4">Facebook</span></a>
                    </div>
                    <div class="col-12 col-lg-4">
                        <a href=""><i class="bi bi-instagram text-danger fs-1"></i> <span class="text-muted fs-4">Instagram</span></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- RIGHT CONTENT-->
        <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
            <div class="d-flex flex-center flex-lg-start flex-column">
                <p class="text-white fw-normal m-0" style="font-family: 'Times New Roman', Times, serif; font-size: 30px;">Buscas una manera de regalarle algo a tu pareja y la sorprendas?! Registrate y ya verás</p>
            </div>
        </div>

    </div>
</div>

<script>
    var session = "<?php echo $session; ?>";
    if (session == "expired") {
        alert('warning', 'Sessión Expirada');
    }
    var action = '';
    var url = '';
    var href = '';
    //ACTION
    $('.actions<?php echo $uniqid; ?>').on('click', function(e) {
        $('#btn_login<?php echo $uniqid; ?>').removeAttr('disabled');
        e.preventDefault();
        let id = $(this).attr('id');
        $('.actions<?php echo $uniqid; ?>').each(function() {
            $(this).attr('data-selected', '');
            $(this).removeClass('btn-primary');
            $(this).addClass('btn-active-color-primary');
        });
        $('#' + id).attr('data-selected', 1);
        $(this).removeClass('btn-active-color-primary');
        $(this).addClass('btn-primary');
        action = $(this).attr('id');
    });

    $('#give').on('click', function() {
        $('#btn_register<?php echo $uniqid; ?>').removeAttr('disabled');
    });

    $('#obtain').on('click', function() {
        $('#btn_register<?php echo $uniqid; ?>').attr('disabled', true);
    });

    //REGISTER
    $('#btn_register<?php echo $uniqid; ?>').on('click', function() {
        let result = checkRequiredValues();
        if (result == 0) {
            if (action != '') {
                if (action == 'give') {
                    url = "<?php echo base_url('Login/registerUser') ?>";
                    href = "<?php echo base_url('Home/userGive'); ?>"
                }
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        'name': $('#name<?php echo $uniqid; ?>').val(),
                        'link': $('#link<?php echo $uniqid; ?>').val(),
                        'password': $('#password<?php echo $uniqid; ?>').val()
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response == 0) {
                            alert('success', 'Bienvenido');
                            setTimeout(() => {
                                window.location.href = href;
                            }, "2000");
                        } else if (response == 'EXISTS_LINK') {
                            $('#link<?php echo $uniqid; ?>').addClass('is-invalid');
                            alert('warning', 'Enlace no disponible');
                        }
                    },
                    error: function(error) {
                        globalError();
                    }
                });
            } else
                alert('warning', 'Escoja una opción')
        } else
            alert('warning', 'Rellene el formulario');


    });

    //LOGIN
    $('#btn_login<?php echo $uniqid; ?>').on('click', function() {
        let result = checkRequiredValues();
        if (result == 0) {
            if (action != '') {
                if (action == 'give') {
                    url = "<?php echo base_url('Login/loginUserGive') ?>";
                    href = "<?php echo base_url('Home/userGive'); ?>"
                } else if (action == 'obtain') {
                    url = "<?php echo base_url('Login/loginUserObtain') ?>";
                    href = "<?php echo base_url('Home/userObtain'); ?>"
                }
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        'name': $('#name<?php echo $uniqid; ?>').val(),
                        'link': $('#link<?php echo $uniqid; ?>').val(),
                        'password': $('#password<?php echo $uniqid; ?>').val()
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response == 0) {
                            alert('success', 'Bienvenido');
                            setTimeout(() => {
                                window.location.href = href;
                            }, "2000");
                        } else if (response == 'USER_NOT_FOUND') {
                            $('#link<?php echo $uniqid; ?>').addClass('is-invalid');
                            $('#name<?php echo $uniqid; ?>').addClass('is-invalid');
                            alert('warning', 'Credenciales Incorrectas');
                        } else if (response == 'INVALID_PASSWORD') {
                            $('#password<?php echo $uniqid; ?>').addClass('is-invalid');
                            alert('warning', 'Contraseña incorrecta');
                        }
                    },
                    error: function(error) {
                        globalError();
                    }
                });
            } else
                alert('warning', 'Escoja una opción')
        } else
            alert('warning', 'Rellene el formulario');


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