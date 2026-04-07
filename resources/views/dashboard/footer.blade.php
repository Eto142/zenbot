<!-- App Footer start -->
<div class="app-footer">
    <span>© Zen-bottrd 2023</span>
</div>
<!-- App footer end -->

</div>
<!-- Main container end -->

</div>
<!-- Page wrapper end -->

<!-- *************
************ Required JavaScript Files *************
************* -->



<script src="https://s3.tradingview.com/tv.js"></script>
<script src="asset/js/bundle.js"></script>
<link rel="stylesheet" type="text/css" href="js/cute-alert-master/style.css">
<script type="text/javascript" src="js/cute-alert-master/cute-alert.js"></script>
<script type="text/javascript">

$(document).ready(function(){

$(".sub").click(function() {
    placeTrade();
});
$(".sub2").click(function() {
    placeTrade();
});

function placeTrade(){
    cuteAlert({
      type: "warning",
      title: "Warning !!",
      message: "We strongly advice that you contact your account manager for live trading support to avoid losing capital",
      buttonText: "Okay"
    })
}
});
</script>

<!-- Required jQuery first, then Bootstrap Bundle JS -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/modernizr.js"></script>
<script src="assets/js/moment.js"></script>

<!-- *************
************ Vendor Js Files *************
************* -->

<!-- Overlay Scroll JS -->
<script src="assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
<script src="assets/vendor/overlay-scroll/custom-scrollbar.js"></script>

<!-- News ticker -->
<script src="assets/vendor/newsticker/newsTicker.min.js"></script>
<script src="assets/vendor/newsticker/custom-newsTicker.js"></script>

<!-- Apex Charts -->
<script src="assets/vendor/apex/apexcharts.min.js"></script>
<script src="assets/vendor/apex/custom/dash2/revenue.js"></script>
<script src="assets/vendor/apex/custom/dash2/analytics.js"></script>
<script src="assets/vendor/apex/custom/dash2/sparkline.js"></script>
<script src="assets/vendor/apex/custom/dash2/sales.js"></script>
<script src="assets/vendor/apex/custom/dash2/reports.js"></script>

<!-- Vector Maps -->
<script src="assets/vendor/jvectormap/jquery-jvectormap-2.0.5.min.js"></script>
<script src="assets/vendor/jvectormap/world-mill-en.js"></script>
<script src="assets/vendor/jvectormap/gdp-data.js"></script>
<script src="assets/vendor/jvectormap/continents-mill.js"></script>
<script src="assets/vendor/jvectormap/custom/world-map-markers4.js"></script>

<!-- Rating JS -->
<script src="assets/vendor/rating/raty.js"></script>
<script src="assets/vendor/rating/raty-custom.js"></script>

<!-- Main Js Required -->
<script src="assets/js/main.js"></script>
</body>

</html>