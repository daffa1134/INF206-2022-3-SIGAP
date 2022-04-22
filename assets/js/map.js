let map;

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

                    addMyMarker(pos);
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

    function addMyMarker(position) {
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
    }
}

window.initMap();
