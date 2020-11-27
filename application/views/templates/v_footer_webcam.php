<footer>

</footer>
<script src="<?php echo base_url(); ?>js/jquery.js"></script>
<script src="<?php echo base_url(); ?>js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.bundle.min.js"></script>


<script src="<?php echo base_url(); ?>js/webcam.min.js"></script>
<script src="<?php echo base_url(); ?>js/recta.js"></script>

<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 320,
        height: 240,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach('#my_camera');

    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('my_camera').style.display = 'none';
            document.getElementById('results').innerHTML = '<img src="' + data_uri + '" id="snapshot"/>';

        });
    }

    function resetSnap() {
        document.getElementById('my_camera').style.display = 'block';
        is_hide = false;
        $("#snapshot").remove()

    };
</script>

</body>

</html>