let map,
    markers = [],
    namaApotek = ["Apotek Laris", "Apotek Sejahtera", "Apotek Mangga"];
const apotek = [
    { lat: 5.562762993736273, lng: 95.32864104874757 },
    { lat: 5.5607209257230545, lng: 95.32791597386056 },
    { lat: 5.560118305951542, lng: 95.32770537603727 },
];

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

    const yourLocation = document.createElement("div");

    findYourLoc(yourLocation, map);

    map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(yourLocation);
}

function showApotek(controlDiv) {
    const controlUI = addButton("Click to Show Nearest Clinic");
    controlUI.style.marginLeft = "8px";
    controlDiv.appendChild(controlUI);

    // Set CSS for the control interior.
    const controlText = document.createElement("div");

    controlText.style.color = "rgb(25,25,25)";
    controlText.style.fontFamily = "Roboto,Arial,sans-serif";
    controlText.style.fontSize = "16px";
    controlText.style.lineHeight = "38px";
    controlText.style.paddingLeft = "5px";
    controlText.style.paddingRight = "5px";
    controlText.innerHTML = "Temukan Apotek";
    controlUI.appendChild(controlText);

    return controlUI;
}

function addButton(msg) {
    // Set CSS
    const ui = document.createElement("div");
    ui.style.backgroundColor = "#fff";
    ui.style.border = "2px solid #fff";
    ui.style.boxShadow = "0 2px 6px rgba(0,0,0,.3)";
    ui.style.cursor = "pointer";
    ui.title = msg;

    return ui;
}

function findYourLoc(controlDiv, map) {
    // Set CSS
    const controlUI = addButton("Click to find your location");
    controlUI.style.borderRadius = "180px";
    controlUI.style.marginRight = "8px";
    controlDiv.appendChild(controlUI);

    const controlImage = document.createElement("div");
    controlImage.innerHTML = "<img src='../assets/ico/precision.png' width='40px'></>";
    controlUI.appendChild(controlImage);

    controlUI.addEventListener("click", () => {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    // Menuju current position
                    map.setCenter(pos);

                    addMyMarker(map, pos, namaApotek[0]);

                    const nearApotek = document.createElement("div");
                    const test = showApotek(nearApotek);
                    map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(nearApotek);
                    test.addEventListener("click", () => {
                        drop();
                    });
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

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ? "Error: The Geolocation service failed." : "Error: Your browser doesn't support geolocation.");
        infoWindow.open(map);
    }

    function addMyMarker(map, position, namaApotek) {
        const marker = new google.maps.Marker({
            position,
            map,
            title: "You Are Here",
            icon: {
                url: "../assets/ico/my-location.png",
                scaledSize: new google.maps.Size(40, 40),
            },
            animation: google.maps.Animation.DROP,
        });

        marker.addListener("click", () => {
            infoWindow.setContent(namaApotek);
            infoWindow.open(map, marker);
        });
    }

    function drop() {
        clearMarkers();

        for (let i = 0; i < apotek.length; i++) {
            addMarkerWithTimeout(apotek[i], i * 200);
        }
    }

    function addMarkerWithTimeout(position, timeout) {
        window.setTimeout(() => {
            markers.push(
                new google.maps.Marker({
                    position: position,
                    map,
                    animation: google.maps.Animation.DROP,
                })
            );
        }, timeout);
    }

    function clearMarkers() {
        for (let i = 0; i < markers.length; i++) {
            markers[i].setMap(null);
        }

        markers = [];
    }
}

window.initMap();
