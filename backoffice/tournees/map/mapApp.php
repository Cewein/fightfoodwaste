<?php $actualDirectory=__DIR__; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8' />
        <title>Delivery App</title>
        <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
        <script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
        <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.53.1/mapbox-gl.js'></script>
        <link href="../../../css/general.css" rel="stylesheet">
        <link href="../../../css/header.css" rel="stylesheet">
        <link href="../../../css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>

    <?php
        require_once(__DIR__ . '/../header/adaptHeader.php');
    ?>

    <body>
        <iframe name="map" id="frame" src="map.php" width="100%" height="800px"></iframe>
        <script>
            function testAddPoint()
            {
                var coords = {
                    lng: 2.130122,
                    lat: 48.801408
                };

                var frame = window.map

                frame.newDropoff(coords);
            }
            function testAddPoint2()
            {
                var coords = {
                    lng: 2.161420,
                    lat: 48.434416
                };

                var frame = window.map

                frame.newDropoff(coords);
            }
            function reload()
            {
                window.map.location.reload(true);
            }
        </script>
        <button type="button" class="btn btn-outline-primary" onclick="testAddPoint()">Versailles</button>
        <button type="button" class="btn btn-outline-primary" onclick="testAddPoint2()">Etampes</button>
        <button type="button" class="btn btn-outline-warning" onclick="reload()">reload</button>
    </body>
</html>