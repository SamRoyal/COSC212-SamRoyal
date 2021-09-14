
var map = (function() {
    var pub = {};
    var centralMarker,northMarker,southMarker;


    function onMapClick(e) {
        alert('You clicked the map at ' + e.latlng);
    }

    function centreMap(e) {
        if (this.textContent === 'Central') {
            markerLocation = [centralMarker.getLatLng()];
            markerBounds = L.latLngBounds(markerLocation);
            map.fitBounds(markerBounds);
        }
        else if (this.textContent === 'North') {
            markerLocation = [northMarker.getLatLng()];
            markerBounds = L.latLngBounds(markerLocation);
            map.fitBounds(markerBounds);
        }
        else if (this.textContent === 'South') {
            markerLocation = [southMarker.getLatLng()];
            markerBounds = L.latLngBounds(markerLocation);
            map.fitBounds(markerBounds);
        }
    }

    pub.setup = function () {
        var h, headings;
        map = L.map('map').setView([-45.875, 170.500], 15);
        centralMarker = L.marker([-45.873937, 170.50311]).addTo(map);
        centralMarker.bindPopup(("<b>Central Store</b>" +
            "<p>Specialising in Classic Cinema</p>" + "<img src="+"images/Metropolis.jpg" +">"));
        northMarker = L.marker([-45.862132, 170.511219]).addTo(map);
        northMarker.bindPopup(("<b>North Store</b>" +
            "<p>Specialising in SciFi Cinema</p>"+ "<img src="+"images/Plan_9_from_Outer_Space.jpg" +">"));
        southMarker = L.marker([-45.887648, 170.497953]).addTo(map);
        southMarker.bindPopup(("<b>South Store</b>" +
            "<p>Specialising in Hitchcock Cinema</p>"+ "<img src="+"images/The_Birds.jpg" +">"));

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            { maxZoom: 18,
                attribution: 'Map data &copy; ' +
                    '<a href="http://www.openstreetmap.org/copyright">' +
                    'OpenStreetMap contributors</a> CC-BY-SA'
            }).addTo(map);

        headings = document.getElementsByTagName("h3");
        for(h=0; h < headings.length; h+=1) {
            headings[h].onclick = centreMap;
        }


        map.on('click', onMapClick);
        };


    return pub;
}());

if (document.getElementById) {
    if (document.getElementById) {
        if (window.addEventListener) {
            window.addEventListener('load', map.setup);
        } else if (window.attachEvent) {
            window.attachEvent('onload', map.setup);
        } else {
            alert("Could not attach 'Map.setup' to the 'window.onload' event");
        }
    }
}





