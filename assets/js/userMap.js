let map,
    tempDist,
    markers = [],
    idApotek = [],
    namaApotek = [],
    apotek = [];

let clicked = 0;

// Fungsi untuk menghitung jarak antara 2 lokasi
function calculateDistance(myPos, destPos) {
    var R = 6371.0710; // Radius of the Earth in km
    var rlat1 = myPos.lat * (Math.PI / 180); // Convert degrees to radians
    var rlat2 = destPos.lat * (Math.PI / 180); // Convert degrees to radians
    var difflat = rlat2 - rlat1; // Radian difference (latitudes)
    var difflon = (destPos.lng - myPos.lng) * (Math.PI / 180); // Radian difference (longitudes)

    var d = 2 * R * Math.asin(Math.sqrt(Math.sin(difflat / 2) * Math.sin(difflat / 2) + Math.cos(rlat1) * Math.cos(rlat2) * Math.sin(difflon / 2) * Math.sin(difflon / 2)));
    return d;
}

function initMap() {
    // The map, centered at Banda Aceh
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 5.5525640240259575, lng: 95.31438965511126 },
        zoom: 17,
        mapId: "c00b786d13d6a102",
        mapTypeControl: false,
        fullscreenControl: false,
        streetViewControl: false,
    });

    infoWindow = new google.maps.InfoWindow();

    // Variabel untuk mecari lokasi apotek
    search = document.getElementById("search");
    // Variabel untuk mencari posisi sekarang
    loc = document.getElementById("find");
    // Meletakkan posisi icon "find" di kanan bawah
    map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(loc);

    loc.addEventListener("click", () => {
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };

                    map.setCenter(pos);

                    myMarker(map, pos);
                    if (clicked == 0) {
                        map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(search);
                    }
                    // Tombol search ditekan
                    search.addEventListener("click", () => {
                        // Dibandingkan dengan lokasi apotek dari database
                        for (let index = 0; index < temp.length; index++) {
                            if ((temp[index].longitude || temp[index].latitude) == null) {
                                continue;
                            }
                            tempDist = { lat: temp[index].latitude, lng: temp[index].longitude };
                            // Dicari lokasi apotek yang kurang dari 10 km dari posisi anda
                            if (calculateDistance(pos, tempDist) <= 5) {
                                idApotek.push(temp[index].id);
                                namaApotek.push(temp[index].nama_apotek);
                                apotek.push({
                                    lat: parseFloat(temp[index].latitude),
                                    lng: parseFloat(temp[index].longitude),
                                });
                            }
                        }
                        if (apotek == 0) {
                            alert("Tidak ada apotek yang ditemukan");
                        }
                        drop();
                    });

                    clicked = 1;
                },
                () => {
                    handleLocationError(true, infoWindow, map.getCenter());
                }
            );
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    });
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ? "Error: The Geolocation service failed." : "Error: Your browser doesn't support geolocation.");
    infoWindow.open(map);
}

// Marker lokasi anda
function myMarker(map, pos) {
    defMarker = new google.maps.Marker({
        position: pos,
        map: map,
        title: "You are here",
        icon: {
            url: "../assets/ico/my-location.png",
            scaledSize: new google.maps.Size(40, 40),
        },
    });
}

function drop() {
    clearMarkers();

    for (let i = 0; i < apotek.length; i++) {
        addMarkerWithTimeout(apotek[i], namaApotek[i], idApotek[i], i * 200);
    }
}

function addMarkerWithTimeout(position, namaApotek, idApotek, timeout) {
    var marker = new google.maps.Marker({
        position: position,
        map,
        animation: google.maps.Animation.DROP,
    });

    const infowindow = new google.maps.InfoWindow({
        content:
            "<div>" +
            '<p style="font-size: 20px;"><strong>' +
            namaApotek +
            "</strong></p>" +
            '<div class="d-grid d-md-flex justify-content-md-end">' +
            '<a class="btn btn-primary btn-sm" href="./UserDoc.php?idApotek=' +
            idApotek +
            '"' +
            'role="button">LIHAT</a>' +
            "</div>" +
            "</div>",
    });

    marker.addListener("click", () => {
        infowindow.open({
            anchor: marker,
            map,
            shouldFocus: false,
        });
    });

    window.setTimeout(() => {
        markers.push(marker);
    }, timeout);
}

function clearMarkers() {
    for (let i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
    }

    markers = [];
}