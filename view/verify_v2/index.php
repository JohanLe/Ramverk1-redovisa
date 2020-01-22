<?php 


?>

<div class="main-container-v2">

    <form class="basic-form" method="POST" action="verify_geo">
        <label>Enter ip-adress: </label>
        <input name="ipadress" type="text" value="<?=$data['userIp'] ?>" required>
        <input type="submit" name="standard" value="Submit">
    
    </form>
    <form class="basic-form" method="POST" action="verify_geo/api">
        <label>Enter ip-adress: </label>
        <input name="ipadress" type="text" value="<?=$data['userIp'] ?>" required>
        <input type="submit" name="apis" value="Submit Api">
    </form>

    <div class="show-content-v2">
        <?php if($data['ipData']): ?>
            <table>
                <tr>                
                    <th>Ip  </th>
                    <th>Type  </th>
                    <th>Longitude  </th>
                    <th>Latitude  </th>
                    <th>Country  </th>
                    <th>Continent  </th>

                </tr>
                <tr>
                    <td> |  <?= $data['ipData']->ip ?> </td>
                    <td> |  <?= $data['ipData']->type ?> </td>
                    <td> |  <?= $data['ipData']->longitude ?> </td>
                    <td> |  <?= $data['ipData']->latitude ?> </td>
                    <td> |  <?= $data['ipData']->country_name ?> </td>
                    <td> |  <?= $data['ipData']->continent_name ?> </td>
                </tr>

            </table>
        <?php endif; ?> 
    </div>

    <div class="info-box">
    <h6>Api-Documentaion</h6>
    <p>Usage: </p>
    <p>
     - htdocs/api-geo/json/'ipadress'

    </p>
    <p>
        Test routes:
    </p>
    <a href="http://www.student.bth.se/~joll18/dbwebb-kurser/ramverk1/me/redovisa/htdocs/api-geo/json/a03:2880:f003:c07:face:b00c::2">IP: 2a03:2880:f003:c07:face:b00c::2</a> </br>
    <a href="http://www.student.bth.se/~joll18/dbwebb-kurser/ramverk1/me/redovisa/htdocs/api-geo/json/2001:4860:4860::8888">IP: 2001:4860:4860::8888 </a> </br>
    <a href="http://www.student.bth.se/~joll18/dbwebb-kurser/ramverk1/me/redovisa/htdocs/api-geo/json/2001:4860:4860::8844">IP: 2001:4860:4860::8844</a> </br>
    <a href="http://www.student.bth.se/~joll18/dbwebb-kurser/ramverk1/me/redovisa/htdocs/api-geo/json/213.112.139.9">IP: 213.112.139.9</a> </br>
    </div>

</div>