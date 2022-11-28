<!-- Given this database structure :
INSTRUMENTS(id, name, type, price)
BANDS(id, name, bio)
INSTRUMENTS_IN_BAND(#band_id, #instrument_id)
You need, in a separate TXT/SQL file, to write the query to:
1. display all instruments (name) for the band ‘metallica’.
2. display number of instruments per band. For each band, display the name of the band +
number of instruments. -->

<?php
// 1- 
$query = "SELECT instruments.* FROM instruments
INNER JOIN instruments_in_band ON instruments.id = instruments_in_band.instrument_id
INNER JOIN bands ON bands.id = instruments_in_band.band_id
WHERE bands.name ='metallica'";

//2- 

$query = "SELECT bands.name_band, COUNT(*) as nbInstruments FROM bands
INNER JOIN instruments_in_band ON bands.id = instruments_in_band.band_id
GROUP BY bands.id";
