<footer class="main-footer">
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('asset/AdminLTE/') ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('asset/AdminLTE/') ?>dist/js/demo.js"></script>
</body>

<script>
    $("#hide_card").click(function() {
        $(".card_laporan_tracking").slideUp("slow");
    });
    $('.timeline-footer').on('click', 'button', function() {
        console.log($(this).attr("data-jasa"));
        $.ajax({
            url: '<?= base_url() ?>/jasa_pengiriman/c_jasa_pengiriman/view_json/' + $(this).attr("data-jasa"),
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

</html>