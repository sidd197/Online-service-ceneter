<?php
    require "config.php";
    $result = $conn->query("SELECT * FROM locations WHERE city='Hyderabad' ");
    $result2 = $conn->query("SELECT * FROM locations WHERE city='Hyderabad' ");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Maps</title>
        <style>
            #mapCanvas {
                width: 100%;
                height: 750px;
            }
        </style>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAov2sc2rGZWjYStf6G30YxgGN_qHvTwYg"></script>
        <script>
            function initMap() {
                var map;
                var bounds = new google.maps.LatLngBounds();
                var mapOptions = {
                    mapTypeId: 'roadmap'
                };
                map = new google.maps.Map(document.getElementById("mapCanvas"));
                map.setTilt(100);
                var markers = [
                    <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '["'.$row['name'].'", '.$row['latitude'].', '.$row['longitude'].', "'.$row['icon'].'"],';
                            }
                        }
                        ?>
                ];
                var infoWindowContent = [
                    <?php
                        if ($result2->num_rows > 0) {
                            while ($row = $result2->fetch_assoc()) {
                                ?>
                                ['<div class="info_content">' + '<h3><?php echo $row['name']; ?></h3>' + '</div'],
                                <?php
                            }
                        }
                        ?>
                ];
                var infoWindw = new google.maps.InfoWindow(), marker, i;
                for (i=0;i<markers.length;i++) {
                    var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                    bounds.extend(position);
                    marker = new google.maps.Marker({
                        position: position,
                        map: map,
                        icon: markers[i][3],
                        title: markers[i][0]
                    });
                    google.maps.event.addListener(marker, 'click', (function(marker,i) {
                        return function() {
                            infoWindow.setContent(infoWindowContent[i][0]);
                            infoWindow.open(map,marker);
                        }
                    })(marker,i));
                    map.fitBounds(bounds);
                }
                var boundsListener = google.maos.event.addListener((map), 'bounds_changed', function(event) {
                    this.setZoom(14);
                    google.maps.event.removeListener(boundsListener);
                });
            }
            google.maps.event.addDomListener(window, 'load', initMap);
        </script>
    </head>
    <body>
        <div id="mapContainer">
            <div id="mapCanvas"></div>
        </div>
    </body>

</html>