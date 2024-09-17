 <!-- Bootstrap core JavaScript-->
 <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
 <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

 <!-- Page level plugins -->
 <script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

 <!-- Page level custom scripts -->
 <script src="<?php echo base_url() ?>assets/js/demo/chart-area-demo.js"></script>
 <script src="<?php echo base_url() ?>assets/js/demo/chart-pie-demo.js"></script>
 <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


 <script>
     $('.custom-file-input').on('change', function() {
         let fileName = $(this).val().split('\\').pop();
         $(this).next('.custom-file-label').addClass("selected").html(fileName);
     });

     $(document).ready(function() {
         $("#id_kategori").hide();

         loadkategori();

         function loadkategori() {
             $("#id_supplier").change(function() {
                 var getsupplier = $("#id_supplier").val();

                 $.ajax({
                     type: "POST",
                     dataType: " JSON",
                     url: "<?= base_url(); ?>select/getdatakategori",
                     data: {
                         provinsi: getsupplier
                     },
                     success: function(data) {
                         console.log(data);

                         var html = "";
                         var i;
                         for (i = 0; i < data.length; i++) {

                             html += '<option value="' + data[i].id_kategori + '">' + data[i].kategori + '</option>';
                         }

                         $("#id_kategori").html(html);
                         $("#id_kategori").show();
                     }
                 });
             });
         }
     });
 </script>

 </body>

 </html>