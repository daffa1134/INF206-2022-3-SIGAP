let map,
    oldMarker,
    namaApotek = datas.nama_apotek;
let clicked = 0;

saveLokasi();

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

    // Jika sudah pernah disimpan posisi, langsung arahkan ke tempatnya
    if ((datas.latitude && datas.longitude) != 0) {
        var pos = { lat: datas.latitude, lng: datas.longitude };
        oldMarker = myMarker(map, pos, namaApotek);
        oldMarker;
        map.setCenter(pos);
    }

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
                    // Hapus yang lama
                    if ((datas.latitude && datas.longitude) != 0) {
                        oldMarker.setMap(null);
                    }
                    // Tampilkan yang baru
                    myMarker(map, pos, namaApotek);
                    // Assign nilainya untuk kemudian dikirim
                    datas.longitude = pos.lng;
                    datas.latitude = pos.lat;

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

    return defMarker;
}

function saveLokasi() {
    $(".simpan").click(function () {
        $.ajax({
            url: "../web/Controller/AdminController.php",
            method: "post",
            data: {
                simpan: "lokasi",
                id: datas.id,
                latitude: datas.latitude,
                longitude: datas.longitude,
            },
            success: function (data) {
                document.location.href = "../web/AdminHome.php";
            },
        });
    });
}
