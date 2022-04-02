<!-- Control Sidebar -->
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('asset/AdminLTE/') ?>dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('asset/AdminLTE/') ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('asset/AdminLTE/') ?>dist/js/demo.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- jQuery -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/jquery/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- DataTables -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- Summernote -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function() {
        $(".datepicker").datepicker();
    });
</script>
<script>
    $(function() {
        //Add text editor
        $('.compose-textarea').summernote()
    })
</script>
<script type="text/javascript">
    $(function() {
        $("#btn_send_chat").click(function() {
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: '<?= site_url('Admin/c_dasboard/send_mgs_chat') ?>',
                data: {
                    'msg': $('#text_message_chat').val(),
                    'id_pelanggan': $('#text_id_pelanggan').val()
                },
                success: function(msg) {
                    console.log(msg);
                    //alert('wow' + msg);
                    $('.direct-chat-messages').append('<div class="direct-chat-msg right"><div class="direct-chat-infos clearfix"><span class="direct-chat-name float-right">' + msg.nama_user + ' </span><span class="direct-chat-timestamp float-left">' + msg.time_chatting + '</span ></div><div class="direct-chat-text">' + msg.admin_send + '</div></div>');
                }
            });
            $('#text_message_chat').val('');
            $('#text_message_chat').focus();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $.ajax({
            //memasukkan data provinsi
            type: "POST",
            url: "<?= base_url('Admin/c_raja_ongkir/provinsi') ?>",
            success: function(hasil_provinsi) {
                //console.log(hasil_provinsi);
                $("select[name=provinsi]").html(hasil_provinsi);
            }
        });
        //memasukkan data kota

        $("select[name=provinsi]").on("change", function() {
            var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");

            $.ajax({
                type: "POST",
                url: "<?= base_url('Admin/c_raja_ongkir/kota') ?>",
                data: 'id_provinsi=' + id_provinsi_terpilih,
                success: function(hasil_kota) {
                    $("select[name=kota").html(hasil_kota);
                }
            });
        });
    });
</script>
</script>
<script>
    $(function() {
        $(".example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            "language": {
                "url": "<?= base_url('asset/Indonesian.json') ?>"
            }
        });
        // $("#data_user").DataTable({
        //     "responsive": true,
        //     "autoWidth": false,
        // });
        // $("#data_user2").DataTable({
        //     "responsive": true,
        //     "autoWidth": false,
        // });
        // $("#data_user3").DataTable({
        //     "responsive": true,
        //     "autoWidth": false,
        // });
    });
</script>
<script>
    $("#hide_card").click(function() {
        $(".card_laporan_tracking").slideUp("slow");
    });
    $('.example1 tbody').on('click', 'button', function() {
        console.log($(this).attr("data-order"));
        $.ajax({
            url: '<?= base_url() ?>/Admin/c_order/view_json/' + $(this).attr("data-order"),
            dataType: 'json',
            type: 'get',
            contentType: 'application/x-www-form-urlencoded',
            data: $(this).serialize(),
            success: function(data, textStatus, jQxhr) {
                $('#list_laporan_tracking').html("");
                console.log(data.view_tracking.length);
                for (var i = 0; i < data.view_tracking.length; i++) {
                    $('#list_laporan_tracking').append("<li class=\"list-group-item\"><i class=\"fas fa-angle-double-right\"></i>" + data.view_tracking[i].time + "</li><li class=\"list-group-item\"><i class=\"fas fa-map-pin\"></i><b>" + data.view_tracking[i].status_pengiriman + "</b> | " + data.view_tracking[i].keterangan + "<a class=\"float-right\"></a></li>");
                }
                $('.card_laporan_tracking').slideDown('slow');
            },
            error: function(jqXhr, textStatus, errorThrown) {
                console.log(errorThrown);
            }
        });
    });
</script>
<script>
    window.setTimeout(function() {
        $(".callout").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000)
</script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000)
</script>
<script type="text/javascript">
    $(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
    });
</script>
</body>

</html>