<footer>
  <div class="footer clearfix mb-0 text-muted">
    <div class="float-start">
      <?php $tahun = date('Y');?>
      <p>Hak Cipta &copy; <?php echo $tahun;?>, PT. United Can</p>
    </div>
    <div class="float-end">

    </div>
  </div>
</footer>
</div>
</div>


<script src="<?php echo base_url() . "assets/admin/"; ?>vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?php echo base_url() . "assets/admin/"; ?>js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() . "assets/admin/"; ?>vendors/simple-datatables/simple-datatables.js"></script>
<script src="<?php echo base_url() . "assets/admin/"; ?>vendors/apexcharts/apexcharts.js"></script>
<script src="<?php echo base_url() . "assets/admin/"; ?>js/pages/dashboard.js"></script>


<script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
      </script>
      <script src="<?php echo base_url() . "assets/admin/"; ?>vendors/jquery/jquery.min.js"></script>
      <script src="<?php echo base_url() . "assets/admin/"; ?>vendors/summernote/summernote-lite.min.js"></script>
      <script>
        $('#summernote').summernote({
          tabsize: 2,
          height: 120,
        })
        $("#hint").summernote({
          height: 100,
          toolbar: false,
          placeholder: 'type with apple, orange, watermelon and lemon',
          hint: {
            words: ['apple', 'orange', 'watermelon', 'lemon'],
            match: /\b(\w{1,})$/,
            search: function (keyword, callback) {
              callback($.grep(this.words, function (item) {
                return item.indexOf(keyword) === 0;
              }));
            }
          }
        });

      </script>

      <script src="<?php echo base_url() . "assets/admin/"; ?>js/main.js"></script>

      <!-- sweetalerts -->
      <script src="<?php echo base_url() . "assets/admin/alert/"; ?>js/main.js"></script>
      <script src="<?php echo base_url() . "assets/admin/alert/"; ?>js/extensions/sweetalert2.js"></script>
      <script src="<?php echo base_url() . "assets/admin/alert/"; ?>vendor/sweetalert2/sweetalert2.all.min.js"></script>



      <!-- msg -->
      <?php if ($this->session->flashData('msg') == 'warning') : ?>
        <script type="text/javascript">
          Swal.fire({
            type: 'warning',
            title: 'Perhatian !',
            heading: 'Success',
            text: "Proses Gagal !",
            showHideTransition: 'slide',
            icon: 'warning',
            hideAfter: false,
            bgColor: '#7EC857'
          });
        </script>

        <?php elseif ($this->session->flashData('msg') == 'success') : ?>
          <script type="text/javascript">
            Swal.fire({
              type: 'success',
              title: 'Sukses',
              heading: 'Success',
              text: "Data Berhasil Di Tambahkan.",
              showHideTransition: 'slide',
              icon: 'success',
              hideAfter: false,
              bgColor: '#7EC857'
            });
          </script>
          <?php elseif ($this->session->flashData('msg') == 'info-update') : ?>
            <script type="text/javascript">
              Swal.fire({
                type: 'success',
                title: 'Sukses',
                heading: 'Success',
                text: "Data Berhasil Di Update.",
                showHideTransition: 'slide',
                icon: 'success',
                hideAfter: false,
                bgColor: '#7EC857'
              });
            </script>
            <?php elseif ($this->session->flashData('msg') == 'success_hapus') : ?>
              <script type="text/javascript">
                Swal.fire({
                  type: 'success',
                  title: 'Sukses',
                  heading: 'Success',
                  text: "Data Berhasil dihapus.",
                  showHideTransition: 'slide',
                  icon: 'success',
                  hideAfter: false,
                  bgColor: '#7EC857'
                });
              </script>
              <?php else : ?>

              <?php endif; ?>
