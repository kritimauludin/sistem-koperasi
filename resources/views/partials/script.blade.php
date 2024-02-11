<!-- Bootstrap core JavaScript-->
<script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('admin/js/demo/datatables-demo.js') }}"></script>
<!-- jQuery -->


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
          @if (session('error'))
          <script type="text/javascript">
            Swal.fire({
                title: 'Failed',
                text: '{{ session('error') }}',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
            </script>
            @endif

            @if (session('success'))
            <script type="text/javascript">
              Swal.fire({
                  title: 'Success!',
                  text: '{{ session('success') }}',
                  icon: 'primary',
                  confirmButtonText: 'OK'
              });
              </script>
            @endif
