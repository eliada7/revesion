<?php
// INSTRUMENTS(id, name, type, price)
// BANDS(id, name, bio)
// INSTRUMENTS_IN_BAND(#band_id, #instrument_id)
// You need, in a separate TXT/SQL file, to write the query to:
// 1. display all the guitars (type) which the price is lower than 100
// 2. display all instruments (name) for band_id = 5
// Note: Only write the SQL query, no PHP.




// 1

// SELECT  * FROM `instruments` WHERE  type = "guitars" AND `price` < 20

//2

// SELECT  instruments.name
// FROM instruments 
// INNER JOIN instrument_in_bands ON instruments.id = instrument_in_bands.instrument_id
// INNER JOIN bands ON bands.id = instrument_in_bands.band_id
// WHERE bands.id = 1
