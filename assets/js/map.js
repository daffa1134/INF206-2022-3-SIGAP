let map, namaApotek = ["Apotek Saya"];

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
    const save = document.createElement("div");
    findYourLoc(yourLocation, map);
    saveButton(save, map);

    map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(yourLocation);
    map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(save);
}

function saveButton(controlDiv, map) {
    const controlUI = document.createElement("div");

    controlUI.style.backgroundColor = "#fff";
    controlUI.style.border = "2px solid #fff";
    controlUI.style.borderRadius = "3px";
    controlUI.style.boxShadow = "0 2px 6px rgba(0,0,0,.3)";
    controlUI.style.cursor = "pointer";
    controlUI.style.marginLeft = "8px";
    controlUI.style.textAlign = "center";
    controlUI.title = "Click to recenter the map";
    controlDiv.appendChild(controlUI);

    // Set CSS for the control interior.
    const controlText = document.createElement("div");

    controlText.style.color = "rgb(25,25,25)";
    controlText.style.fontFamily = "Roboto,Arial,sans-serif";
    controlText.style.fontSize = "16px";
    controlText.style.lineHeight = "38px";
    controlText.style.paddingLeft = "5px";
    controlText.style.paddingRight = "5px";
    controlText.innerHTML = "Save Location";
    controlUI.appendChild(controlText);

    controlUI.addEventListener("click", () => {
        alert("Save this location?");
    });
}

function findYourLoc(controlDiv, map) {
    // Set CSS
    const controlUI = document.createElement("div");

    controlUI.style.backgroundColor = "#fff";
    controlUI.style.border = "2px solid #fff";
    controlUI.style.borderRadius = "180px";
    controlUI.style.marginRight = "8px";
    controlUI.style.cursor = "pointer";
    controlUI.title = "Click to find your location";
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
        marker = new google.maps.Marker({
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
}

window.initMap();
