<?php
/**
 * Created by PhpStorm.
 * User: serg
 * Date: 13.05.2017
 * Time: 17:30
 */
    require_once ("app/autoload.php");
?>
<?

?>

<?
    $users = User::getUsers();
?>

<!DOCTYPE html>
<html>
<head>
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <header>
        <a href="\app\users.php">Manage users</a>
    </header>


<div id="map"></div>
<script>
    function initMap() {
        var poz = {lat: 50.0071481, lng: 36.2373511};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: poz
        });

        var markers = new Array();
        var infowindows = new Array();
        var i = 0;
        <? foreach ($users as $user) {?>

        var src = "<?= addslashes($user['image'])?>";
        var name = "<?= $user['name']?>";
        var address = "<?= $user['address']?>";

        var contentString = '<div id="content">' +
                '<img src="' + src + '" alt="" id="useravatar">' +
                '<div id="userinfo">' + name + '<br>' + address +
                '</div></div>';
        infowindows[i] = new google.maps.InfoWindow({
            content: contentString
        });

        var markerpoz = {lat: <?if($user['lat']) echo $user['lat']; else echo '0'?>, lng: <?if($user['lng']) echo $user['lng']; else echo '0'?>};
        markers[i] = new google.maps.Marker({
            position: markerpoz,
            map: map,
            title: name
        });
        i++;
        <? } ?>
        markers.forEach(function(marker, i, markers) {
            marker.addListener('click', function () {
                infowindows[i].open(map, marker);
            });
        });

    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC122AmktTFovxuyVAvhZjfjiMbO_UYjxQ&callback=initMap">
</script>
</body>
</html>
