This is a tiny application to harvest train data (speed and location in longitude and latitude from gps) from german ICE trains with T-Mobile hotspot (works even if you don't pay for internet).

===Installation===
* clone the repository into your webservers file directory
* add a database called "train_info"
* add your database login to connect.php

===how to use===
* open index.php it will get the train data every second
* open display.php it will show you a chart with the speeddata corresponding to the time

===additional info===
there is a database dump from data driving from aschaffenburg to munich and back.
Data from the first trip isn't complete also the right timestamp is missing. The trip back should be a complete dataset.

Please feel free to develop it further or just use the data for something else.
