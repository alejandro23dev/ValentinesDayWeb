<!-- TOP MENU-->
<div class="d-flex bg-dark align-items-stretch justify-content-between flex-lg-grow-1 h-100px " id="kt_app_header_wrapper"></div>
<div class="container">
    <div class="row">
        <div class="col-4">
            <img src="<?php echo base_url('public/assets/hvd2.png'); ?>" class="w-100 " alt="">
        </div>
        <div class="col-8 mt-20">
            <div class="card card-dashed bg-light-white border-danger border-2 p-5 mt-20">
                <h1 class="">En este día especial, quiero recordarte lo increíble que eres y lo afortunado que me siento de tenerte a mi lado. Tu amor ilumina cada uno de mis días, y no puedo esperar para seguir construyendo un futuro juntos. </h1>
                <h1>¡Feliz Día de San Valentín, Mi Amor!</h1>
            </div>
        </div>
        <!-- TXT ESCOGER REGALO -->
        <div class="col-12 text-center ">
            <?php if (!empty($regalos)) { ?>
                <h1><i class="bi bi-balloon-heart-fill fs-1 text-danger "></i> <span id="response">ESCOGE UNO DE ESTOS <?php echo count($regalos); ?> REGALOS POR EL DÍA DE SAN VALENTÍN </span> <i class="bi bi-balloon-heart-fill fs-1 text-danger"></i></h1>
            <?php } ?>
        </div>
        <?php if (empty($regalos)) { ?>
            <div class="justify-content-center text-center">
                <img src="<?php echo base_url('public/assets/noregalos.png'); ?>" class="w-25 rounded" />
            </div>
            <p class="fs-2 text-muted text-center">Tú pareja aún no ha añadido regalos.</p>
        <?php } else { ?>
            <?php foreach ($regalos as $rg) { ?>
                <div class="col-lg-4 mt-4 hover-elevate-up">
                    <div class="card overlay overflow" style="min-height: 100px;">
                        <div class="card-body p-0">
                            <div class="overlay-wrapper">
                                <img src="<?php echo base_url('public/assets/regalo.png'); ?>" class="w-100 regalos regalo-<?php echo $rg->id; ?> rounded" />
                                <img src="data:image/png;base64,<?php echo base64_encode($rg->image); ?>" class="w-100 rounded images image-<?php echo $rg->id; ?>" style="height: 250px;" alt="Image" hidden>
                            </div>
                            <div class="overlay-layer rounded button-open-1">
                                <span data-id="<?php echo $rg->id; ?>" class="btn btn-light-danger open btn-shadow ms-2"><i class="bi bi-arrow-through-heart-fill fs-3"></i> ABRIR REGALO <i class="bi bi-arrow-through-heart-fill fs-3"></i></span>
                            </div>
                            <span id="response-<?php echo $rg->id; ?>" data-response="<?php echo $rg->name; ?>" hidden></span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
<!-- FOOTER -->
<div id="kt_app_footer" class="app-footer bg-dark mt-10 rounded shadow">
    <div class="app-container d-flex container flex-column flex-md-row flex-center flex-md-stack py-3">
        <div class="text-dark order-2 order-md-1">
            <span class="text-muted fw-semibold me-1"><?php echo date('Y'); ?>©</span>
            <a href="" target="_blank" class="text-white text-hover-primary">Created By ANDRO DEV</a>
        </div>
        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
            <li class="menu-item">
                <a href="" target="_blank" class="menu-link px-2"><i class="bi bi-facebook text-primary fs-1 me-2"></i>Facebook</a>
            </li>
            <li class="menu-item">
                <a href="" target="_blank" class="menu-link px-2"><i class="bi bi-instagram text-danger fs-1 me-2"></i>Instagram</a>
            </li>
        </ul>
    </div>
</div>

<script>
    $('.open').on('click', function() {
        var id = $(this).attr('data-id');
        var response = $('#response-' + id).attr('data-response');
        $('.open').attr('hidden', true);
        $('#app-loading').removeAttr('hidden');
        countDown();
        setInterval(countDown, 1000);
        var typed = new Typed("#wait-text", {
            strings: ["Cuál regalo habrás escogido?", "Será una sorpresa. <i class='bi bi-emoji-smile-fill fs-1 text-white'></i> ", "Ya casi..."],
            typeSpeed: 90
        });
        setTimeout(() => {
            $('.image-' + id).removeAttr('hidden');
            $('.regalo-' + id).attr('hidden', true);
            $('#app-loading').attr('hidden', true);
            $('#response').html(response);
            $.ajax({
                type: "post",
                url: "<?php echo base_url('Home/obtainRegalo'); ?>",
                dataType: "json",
                success: function(response) {

                },
                error: function(error) {
                    globalError();
                }
            });
        }, "15000");
        setTimeout(() => {
            $('.images').removeAttr('hidden');
            $('.regalos').attr('hidden', true);
            $('.images').each(function() {
                if (!$(this).hasClass('image-' + id)) {
                    $(this).addClass('opacity-50');
                }
            });
        }, "17000");
    });

    var seconds = 15;

    function countDown() {
        $('#seconds').html(seconds);
        seconds--;
    };
</script>