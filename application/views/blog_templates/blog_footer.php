<!-- JS here -->

<!-- All JS Custom Plugins Link Here here -->
<script src="<?= base_url('vendor/assets/js')  ?>/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="<?= base_url('vendor/assets/js')  ?>/vendor/jquery-1.12.4.min.js"></script>
<script src="<?= base_url('vendor/assets/js')  ?>/popper.min.js"></script>
<script src="<?= base_url('vendor/assets/js')  ?>/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="<?= base_url('vendor/assets/js')  ?>/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="<?= base_url('vendor/assets/js')  ?>/owl.carousel.min.js"></script>
<script src="<?= base_url('vendor/assets/js')  ?>/slick.min.js"></script>
<script src="<?= base_url('vendor/assets/js')  ?>/price_rangs.js"></script>

<!-- One Page, Animated-HeadLin -->
<script src="<?= base_url('vendor/assets/js')  ?>/wow.min.js"></script>
<script src="<?= base_url('vendor/assets/js')  ?>/animated.headline.js"></script>
<script src="<?= base_url('vendor/assets/js')  ?>/jquery.magnific-popup.js"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="<?= base_url('vendor/assets/js')  ?>/jquery.scrollUp.min.js"></script>
<script src="<?= base_url('vendor/assets/js')  ?>/jquery.nice-select.min.js"></script>
<script src="<?= base_url('vendor/assets/js')  ?>/jquery.sticky.js"></script>

<!-- contact js -->
<script src="<?= base_url('vendor/assets/js')  ?>/contact.js"></script>
<script src="<?= base_url('vendor/assets/js')  ?>/jquery.form.js"></script>
<script src="<?= base_url('vendor/assets/js')  ?>/jquery.validate.min.js"></script>
<script src="<?= base_url('vendor/assets/js')  ?>/mail-script.js"></script>
<script src="<?= base_url('vendor/assets/js')  ?>/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="<?= base_url('vendor/assets/js')  ?>/plugins.js"></script>
<script src="<?= base_url('vendor/assets/js')  ?>/main.js"></script>


<!-- <script>
        $(document).ready(function({

            $('#kategori').change(function(){
                var id=$(this).val();
                $.ajax({
                    url: "<?= base_url('blog'); ?>",
                    method: "POST",
                    data: {id: id},
                    async: true,
                    dataType: 'json',
                    success: function(data){
                        var html = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            html += '<option value='+data[i].subKategori_id+'>'+data[i].subKategori_name+'</option>';
                        }
                        $('#subKategori').html(html);
                    }
                });
                return false;
            });
        }));
        </script> -->

</body>

</html>