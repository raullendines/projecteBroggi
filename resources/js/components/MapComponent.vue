<template>
  
  <div id='map' class="map-size"></div>
    
</template>

<script>

export default {
  
import mapboxgl from 'mapbox-gl'; // or "const mapboxgl = require('mapbox-gl');"

mapboxgl.accessToken = 'pk.eyJ1IjoicmF1bDEyNDMiLCJhIjoiY2wxMHM1dnN3MDB5MTNsb2Jnc3Z6eTFqMSJ9.38of2U9_JEHowPDEehuuvA';

const map = new mapboxgl.Map({
    container: 'map', // container ID
    style: 'mapbox://styles/mapbox/streets-v11', // style URL
    center: [-74.5, 40], // starting position [lng, lat]
    zoom: 9 // starting zoom
}); 
</script>
