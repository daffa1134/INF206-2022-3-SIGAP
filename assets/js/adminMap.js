let map,
    namaApotek = ["Apotek Laris"];
const apotek = [{ lat: 5.562762993736273, lng: 95.32864104874757 }];
let clicked = 0;

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

    // Variabel untuk menyimpan lokasi
    save = document.getElementById("save");
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
                    myMarker(map, pos, namaApotek[0]);
                    if (clicked == 0) {
                        map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(save);
                    }
                    map.setCenter(pos);
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

function myMarker(map, pos, namaApotek) {
    defMarker = new google.maps.Marker({
        position: pos,
        map: map,
        title: namaApotek,
        icon: {
            url: "../assets/ico/my-location.png",
            scaledSize: new google.maps.Size(40, 40),
        },
    });

    defMarker.addListener("click", () => {
        infoWindow.setContent(namaApotek);
        infoWindow.open(map, defMarker);
    });
}
