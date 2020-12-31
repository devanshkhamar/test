<?php
 $city    = 'london';
    $jsonfile    = file_get_contents( 'http://api.openweathermap.org/data/2.5/weather?q=' . $city . '&units=metric&lang=en&appid=c0c4a4b4047b97ebc5948ac9c48c0559' );
    $jsondata    = json_decode( $jsonfile );
    $temp        = $jsondata->main->temp;
    $pressure    = $jsondata->main->pressure;
    $mintemp     = $jsondata->main->temp_min;
    $maxtemp     = $jsondata->main->temp_max;
    $wind        = $jsondata->wind->speed;
    $humidity    = $jsondata->main->humidity;
    $desc        = $jsondata->weather[0]->description;
    $maind       = $jsondata->weather[0]->main;
    $currentTime = time();
    ?>
    <style>
    body {
        font-family: Arial;
        font-size: 0.95em;
        color: #929292;

    }

    .report-container {
        border: #E0E0E0 1px solid;
        padding: 20px 40px 40px 40px;
        border-radius: 2px;
        width: 550px;
        margin: 0 auto;
    }

    .weather-icon {
        vertical-align: middle;
        margin-right: 20px;
    }

    .weather-forecast {
        color: #212121;
        font-size: 1.2em;
        font-weight: bold;
        margin: 20px 0px;
    }

    span.min-temperature {
        margin-left: 15px;
        color: #929292;
    }

    .time {
        line-height: 25px;
    }
    </style>
    <body>
    <div class="report-container">
            <h2><?php echo $jsondata->name; ?> Weather Status</h2>
            <div class="time">
                <div><?php echo date( 'l g:i a', $currentTime ); ?></div>
                <div><?php echo date( 'jS F, Y', $currentTime ); ?></div>
                <div><?php echo $desc; ?></div>
            </div>
            <div class="weather-forecast">
                <img
                    src="http://openweathermap.org/img/w/<?php echo $jsondata->weather[0]->icon; ?>.png"
                    class="weather-icon" /> <?php echo $mintemp; ?>°C<span
                    class="min-temperature"><?php echo $maxtemp; ?>°C</span>
            </div>
            <div class="time">
                <div>Humidity: <?php echo $humidity; ?> %</div>
                <div>Wind: <?php echo $wind; ?> km/h</div>
            </div>
        </div>
        </body>
