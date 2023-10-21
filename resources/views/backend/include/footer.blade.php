 <footer id="footer" class="footer">

    <div class="copyright">

      &copy; Copyright <strong><span>BlackTECH Academy</span></strong>. All Rights Reserved

    </div>

    <div class="credits">

      Designed by <a href="#">Mobnapps</a>

    </div>

  </footer>

  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



  <!-- Vendor JS Files -->
  <script src="{{ URL::asset('assets/backend/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/vendor/chart.js/chart.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/vendor/quill/quill.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ URL::asset('assets/backend/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ URL::asset('assets/backend/js/main.js') }}"></script>


<!--online links-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js" ></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" ></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js" ></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.3/js/dataTables.fixedColumns.min.js" ></script>
<script type="text/javascript">
   $(document).ready(function() {
     $('#example1').DataTable( {
      dom: 'Bfrtip',
      buttons: [
                  {   
                    extend: 'excel',
                    text: 'Export',
                  },
                ],
      language: {
         searchPlaceholder: "Type here..."
        }
     } );
   } );
</script>
<script type="text/javascript">
   $(document).ready(function() {
     $('#example2').DataTable();
   } );
</script>
<script>
  $('.alert').fadeOut(6000);
</script>


</body>



</html>