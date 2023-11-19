@extends('site.layouts.app')

@section('css')
    
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&libraries=places" defer></script> --}}
@endsection
@section('content')
    <div id="map" style="height: 400px;"></div>
@endsection
@section('js')
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([0, 0], 2); // Initial map center

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Add a marker on click
        map.on('click', function(e) {
            console.log(e)
            var marker = L.marker(e.latlng).addTo(map);
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;

            // Send coordinates to the server using AJAX
            fetch(`/pickup/store`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        latitude: lat,
                        longitude: lng
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Coordinates sent successfully');
                    } else {
                        console.error('Failed to send coordinates');
                    }
                });
        });
    </script>
@endsection
