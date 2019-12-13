
<?php 

    
?>

<div class="weather-report-container">

<div class="weather-day-container header">
        <div class=""> </div>
            <div class="weather-data-point "> 
                <span class="upper">Date</span>
            </div>
            <div class="weather-data-point"> Summary</div>
            <div class="weather-data-point"> 
                <span class="upper"> Highest</span>
                <span class="lower"> Lowest </span> 
            </div>
            <div class="weather-data-point"> Wind speed</div>
        </div>
    <?php foreach($data['weather'] as $day) : ?>
    
        <div class="weather-day-container">
        <div class=""> </div>
            <div class="weather-data-point"> 
                <span class="upper"><?= $day['day'] ?> </span>
                <span class="lower"><?= $day['date'] ?></span>
            </div>
            <div class="weather-data-point"> <?= $day['summary'] ?></div>
            <div class="weather-data-point"> 
                <span class="upper"> <?= $day['temperatureHigh']?>°C</span>
                <span class="lower"> <?= $day['temperatureLow'] ?>°C </span> 
            </div>
            <div class="weather-data-point"> <?= $day['windSpeed'] ?>m/s</div>
        </div>

<?php endforeach; ?>


</div>

