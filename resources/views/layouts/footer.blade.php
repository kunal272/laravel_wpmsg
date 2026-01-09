  <!-- footer start-->
  <footer class="footer">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-6 footer-copyright">
                  <p class="p-2">Copyright © {{ date('Y') }} <strong>NPAV</strong>. All rights
                      reserved.</p>
              </div>
              <div class="col-md-6">
                  <p class="float-end mb-0">Hand crafted &amp; made with
                      <svg class="svg-color footer-icon">
                          <use href="{{ url('/public/assets/svg/iconly-sprite.svg') }}#footer-heart">
                          </use>
                      </svg>
                  </p>
              </div>
          </div>
      </div>
  </footer> <!-- footer end-->

  </div>
  </main>


  <!-- jquery-->
  <script src="{{ url('/public/assets/js/vendors/jquery/dist/jquery.min.js') }}"></script>

  <!-- bootstrap js-->
  <script src="{{ url('/public/assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('/public/assets/js/config.js') }}"></script>

  <!-- Sidebar js-->
  <script src="{{ url('/public/assets/js/sidebar.js') }}"></script>

  {{-- <script src="{{ url('/public/assets/js/vendors/apexcharts/dist/apexcharts.min.js') }}"></script> --}}
  <script src="{{ url('/public/assets/js/vendors/chart.js/dist/chart.umd.js') }}"></script>
  {{-- <script src="{{ url('/public/assets/js/vendors/simple-datatables/dist/umd/simple-datatables.js') }}"></script> --}}
  {{-- <script src="https://larathemes.pixelstrap.com/edmin/assets/js/datatable/datatables/jquery.dataTables.min.js"></script> --}}
  {{-- <script src="{{ url('/public/assets/js/dashboard/default.js') }}"></script> --}}

  <!-- data table-->
  <script src="{{ url('/public/assets/js/datatable/jquery.dataTables.min.js') }}"></script>

  <script src="https://cdn.datatables.net/fixedcolumns/4.3.0/js/dataTables.fixedColumns.min.js"></script>

  <!-- scrollbar js-->
  <script src="{{ url('/public/assets/js/scrollbar/simplebar.js') }}"></script>

  {{-- flatpickr js --}}
  {{-- <script src="https://larathemes.pixelstrap.com/edmin/assets/js/vendors/flatpickr/dist/flatpickr.min.js"></script> --}}

  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>

  <!-- MonthSelect Plugin (for year picker grid) -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>

  <script src="{{ url('/public/assets/js/sweetalert/sweetalert2.min.js') }}"></script>
  <script src="{{ url('/public/assets/js/sweetalert/sweetalert-custom.js') }}"></script>
  <script src="{{ url('/public/assets/js/scrollbar/custom.js') }}"></script>

  <!-- SELECT2 js -->
  <script src="{{ url('/public/assets/js/select2/select2.full.min.js') }}"></script>

  <!-- validation -->
  <script src="{{ url('/public/assets/js/jquery.validate.min.js') }}"></script>

  <!-- customizer-->
  <script src="{{ url('/public/assets/js/theme-customizer/customizer.js') }}"></script>

  <!-- toastr -->
  <script src="{{ url('/public/assets/js/toastr.min.js') }}"></script>

  <!-- custom script -->
  <script src="{{ url('/public/assets/js/script.js') }}"></script>





  <script>
      $(document).ready(function() {
          $(document).on('change', '.toggle-status', function() {

              let status = $(this).prop('checked') ? 1 : 0;
              let url = $(this).data('route');
              let clickedToggle = $(this);
              $.ajax({
                  type: "PUT",
                  url: url,
                  data: {
                      status: status,
                      _token: '4DLvIWv06eGoHVbFBYn3x7CxS2tz1MsTeuInqwP2',
                  },
                  success: function(data) {
                      clickedToggle.prop('checked', status);
                      toastr.success("Status Updated Successfully");
                  },
                  error: function(xhr, status, error) {
                      console.log(error)
                  }
              });
          });
      });
  </script>

  <script>
      $(document).ready(function() {
          $('#country_code').select2({
              templateResult: function(data) {
                  if (!data.id) {
                      return data.text;
                  }
                  var $result = $('<span><img src="' + $(data.element).data('image') +
                      '" class="flag-img" /> +' + data.text.trim() + '</span>');
                  return $result;
              },
              templateSelection: function(selection) {
                  if (selection.text == ' ') {
                      return selection.text;
                  }
                  return ' + ' + selection.text;
              }
          });
      });
  </script>
  <script>
      $(document).ready(function() {
          $('.toastr-message').each(function() {
              var messageType = $(this).data('type');
              var messageText = $(this).text();
              toastr.options = {
                  "closeButton": false,
                  "progressBar": true,
                  "extendedTimeOut": 0,
                  "timeOut": 0,
              };

              switch (messageType) {
                  case 'success':
                      toastr.success(messageText);
                      break;
                  case 'error':
                      toastr.error(messageText);
                      break;
                  case 'info':
                      toastr.info(messageText);
                      break;
                  case 'warning':
                      toastr.warning(messageText);
                      break;
                  default:
                      toastr.info(messageText);
              }
          });
      });
  </script>


  </body>

  </html>
