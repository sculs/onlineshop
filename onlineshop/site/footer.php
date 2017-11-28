
<!-- Footer -->
<footer class="py-3 bg-dark fixed-bottom">
    <div class="container">
        <p class="m-0 text-center text-white">
            Copyright &copy; Our Book Store <?php echo date("Y");?>
        </p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<script>
    //maps
    function myMap() {
        var myCenter = new google.maps.LatLng(59.347466,18.110955);
        var mapCanvas = document.getElementById("map");
        var mapOptions = {center: myCenter, zoom: 15};
        var map = new google.maps.Map(mapCanvas, mapOptions);
        var marker = new google.maps.Marker({position:myCenter});
        marker.setMap(map);
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLOLcbK-_9sJgwM3h-P8KJQ0yuIkNuWC4&callback=myMap"></script>

</body>

</html>