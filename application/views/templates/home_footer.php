  <div class="mt-4" style="position: absolute; left: 50%; bottom: 10px;">
      <div style="position: relative; left: -50%;">
          <div class="copyright text-center my-auto">
          </div>
      </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url() ?>assets/js/demo/datatables-demo.js"></script>

  <!-- untuk memunculkan nama file gambar -->
  <script>
      $('.custom-file-input').on('change', function() {
          let fileName = $(this).val().split('\\').pop();
          $(this).next('.custom-file-label').addClass("selected").html(fileName);
      });
  </script>

  <script>
      function isNumber(evt) {
          evt = (evt) ? evt : window.event;
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode > 31 && (charCode < 48 || charCode > 57)) {
              return false;
          }
          return true;
      }
  </script>

  <script>
      $(document).ready(function() {
          $("#metode_bap").change(function() {
              var val = $(this).val();
              if (val == "Walk in") {
                  $("#walkInModal").modal();
              } else if (val == "On the spot") {
                  $("#onTheSpotModal").modal();
              } else if (val == "Zoom") {
                  $("#zoomModal").modal();
              }
          });
      });

      var modalShown = false;

      function showModal() {
          if (!modalShown) {
              $('#noPaspor').modal();
              modalShown = true;
          }
      }

      function showModal2() {
          $('#noPaspor').modal();
      }

      function goBack() {
          window.history.back();
      }
  </script>

  </body>

  </html>