function asukoht() {
    var myLatLng = {lat: 58.378202, lng: 26.714864};

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 17,
        center: myLatLng
    });

    var marker = new google.maps.Marker({
        position: myLatLng,
        animation: google.maps.Animation.BOUNCE,
        map: map,
        icon:{
            url: "/../public/pictures/meist/marker.png",
            scaledSize: new google.maps.Size(40, 45)
        },
        title: 'Siin me veedamegi enamuse enda ajast!'
    });
}
