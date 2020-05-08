<!DOCTYPE html>
<html>
<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!--    <meta http-equiv="refresh" content="60">-->
    <script>
        $(document).ready(function () {
            setInterval(function () {
                cache_clear()
            }, 600000000);
        });

        function cache_clear() {
            window.location.reload(true);
            // window.location.reload(); use this if you do not remove cache
        }

    </script>
</head>


<body>


<table id="tbl" border="1" style="float: right;width: 50%" >
    <tr>
        <th>
            DeviceId
        </th>

        <th>
            Latitude
        </th>

        <th>
            Longitude
        </th>
    </tr>


</table>




<div id="googleMap" style="width:50%;height:600px;float: left"></div>




<script>
    function myMap() {
        var myLatlng1 = new google.maps.LatLng(35.715298, 51.404343);
        var mapProp = {
            center: myLatlng1,
            zoom: 7,
            mapTypeId: google.maps.MapTypeId.ROADMAP

        };
        var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: "Hello World!"
        });

        <?php
        $cn = mysqli_connect("127.0.0.1", "root", "", "GpsLocationTest");
        $sql = "SELECT * FROM Locations ORDER BY LocationId DESC";
        $result = mysqli_query($cn, $sql);
        $cnt = mysqli_num_rows($result);
        //echo "alert($cnt);";



        $devices = array();
        while ($row = mysqli_fetch_assoc($result)) {

        $toadd = true;
        foreach ($devices as $device) {
            if ($device == $row['DeviceId']) {
                $toadd = false;
                break;
            }
        }

        if ($toadd == true){
        //echo "alert(ddd)";
        $devices[] = $row['DeviceId'];
        ?>


        $('#tbl').append("<tr> <td><?php echo $row["DeviceId"]; ?></td>        <td><?php echo $row["Latitude"]; ?></td>  <td><?php echo $row["Longitude"]; ?></td>          </tr>");
        //        alert(<?php //echo count($devices) ?>//);
        var myLatlng = new google.maps.LatLng(<?php echo $row["Latitude"]; ?>, <?php echo $row["Longitude"]; ?>);
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: "hello",
            icon: 'icon.png'
        });
        <?php
        }
        }
        ?>
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbb_EU0UuOoNsmzzkihQPBuwQu7YCBZug&callback=myMap"></script>


<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

</body>
</html>
