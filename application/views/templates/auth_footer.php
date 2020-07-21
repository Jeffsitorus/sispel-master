 <!-- General JS Scripts -->
 <script src="<?= base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
 <script src="<?= base_url('assets/js/popper.min.js'); ?>"></script>
 <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
 <script src="<?= base_url('assets/js/jquery.nicescroll.min.js'); ?>"></script>
 <script src="<?= base_url('assets/js/moment.min.js'); ?>"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
 <script src="<?= base_url('assets/js/flash.js'); ?>"></script>
 <script src="<?= base_url('assets/js/datatable/jquery.dataTables.min.js'); ?>"></script>
 <script src="<?= base_url('assets/js/datatable/dataTables.bootstrap4.min.js'); ?>"></script>
 <script src="<?= base_url('assets/js/datatable/custom.dataTables.js'); ?>"></script>
 <script src="<?= base_url('assets/') ?>js/stisla.js"></script>

 <!-- JS Libraies -->
 <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

 <!-- Template JS File -->
 <script src="<?= base_url('assets/') ?>js/scripts.js"></script>
 <script src="<?= base_url('assets/') ?>js/custom.js"></script>
 <script src="<?= base_url('assets/') ?>js/sweetalert2.min.js"></script>

 <!-- Page Specific JS File -->
 <script>
   $('#datepicker').datepicker({
     uiLibrary: 'bootstrap4'
   });
 </script>

 <script>
   $('.custom-file-input').on('change', function() {
     let filename = $(this).val().split('\\').pop();
     $(this).next('.custom-file-label').addClass("selected").html(filename);
   });

   $('.custom-switch-input').on('click', function() {
     const menuID = $(this).data('menu');
     const roleID = $(this).data('role');
     $.ajax({
       url: "<?= base_url('admin/ubah_akses'); ?>",
       type: 'post',
       data: {
         menuID: menuID,
         roleID: roleID
       },
       success: function() {
         document.location.href = "<?= base_url('admin/akses_role/'); ?>" + roleID;
       }
     });
   });
   CKEDITOR.replace('editor1');
 </script>
 <script>
   $(document).ready(function() {
     $('#show-password').click(function() {
       if ($('#password').attr('type') == 'password') {
         $('#password').attr('type', 'text');
       } else {
         $('#password').attr('type', 'password');
       }
     });

     $('#tampilkan-password').click(function() {
       if ($('#password1').attr('type') == 'password' || $('#password2').attr('type') == 'password') {
         $('#password1').attr('type', 'text');
         $('#password2').attr('type', 'text');
       } else {
         $('#password1').attr('type', 'password');
         $('#password2').attr('type', 'password');
       }
     });
   });
 </script>
 </body>

 </html>