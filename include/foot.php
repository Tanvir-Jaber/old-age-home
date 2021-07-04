<script src="../../contents/js/jquery-3.2.1.min.js"></script>
<!--<script src="../../contents/js/jquery.min.js"></script>-->
<script src="../../contents/js/bootstrap.min.js"></script>
<script src="../../contents/js/popper.min.js"></script>
<script src="../../contents/plugins/bootstrap-notify.js"></script>
<script src="../../contents/plugins/perfect-scrollbar.jquery.min.js"></script>
<script src="../../contents/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
<script src="../../contents/demo/demo.js"></script>
<script src="../../contents/plugins/custom-scrollbar/jquery.mCustomScrollbar.js"></script>
<script src="../../contents/plugins/jquery-ui/jquery-ui.js"></script>
<script src="../../contents/plugins/jquery.fancybox.min.js"></script>
<script>
    $(document).ready(function() {
        $(".scroll-content").mCustomScrollbar({
            axis:"yx",
            theme:"my-theme"
        });

        $(".datepicker").datepicker({
            dateFormat:"yy-mm-dd"
        });
        // $(".fancy").fancybox();
        demo.initChartsPages();
        
        $(".fancy").click(function () {
            
        });
    });
</script>
</body>

</html>