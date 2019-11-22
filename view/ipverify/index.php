<?php

namespace Anax\View;

?>



<div class="page-container">

<form class="basic-form" method="POST" action="verify">
<label for="ipadress">
    Enter IP-Adress
    </label>
    <input type="text" name="ipadress" required="true">
    <input type="Submit" value="Check" name="submit">
</form>




<form class="basic-form" method="POST">
<label for="ipadress">
    Enter IP-Adress
    </label>
    <input type="text" name="ipadress" required="true">
    <input type="Submit" value="Check Json" name="submitJson">
</form>

<?php 

    if($data != null && $data["valid"]) : ?>
    <div class="valid">
    <ul>
    <li>Ip: <?= $data["ip"] ?> </li>
    <li>Domain: <?= $data["domainInfo"]['domain'] ?> </li>
     <li>Country: <?= $data["domainInfo"]['country'] ?> </li>
     <li>Isp: <?= $data["domainInfo"]['isp'] ?> </li>
     <li>Orgin: <?= $data["domainInfo"]['org'] ?> </li>
     <li>As: <?= $data["domainInfo"]['as'] ?> </li>
    </ul>

     <div>
    <? 
    elseif ($data != null and !$data['valid']): ?>
    <div class="not-valid">
    <p>Not a valid IP-adress.</p>
    </div>

<?

endif;
?>

<div class="text-listed">
    <h5>  The api: </h5>
    <span>   * Returns a json-formated string.</span>
    <span>   Usage: </span>
    <span>   - /api/json/*ipadress*    </span>
    <span>   - /api/prettyJson/*ipadress*   (Only for easy to read json in browser)</span>

</div>

<div class="text-listed">
    <h5>  Test routes: </h5>
    <a href="http://localhost:8080/ramverk1/me/redovisa/htdocs/api/json/66.220.144.0">66.220.144.0 (Ipv4)</a>
    <a href="http://localhost:8080/ramverk1/me/redovisa/htdocs/api/json/64.233.160.0">64.233.160.0 (Ipv4)</a>
    <a href="http://localhost:8080/ramverk1/me/redovisa/htdocs/api/json/44.124.22.22"> 44.124.22.22 (Ipv4)</a>
    <a href="http://localhost:8080/ramverk1/me/redovisa/htdocs/api/json/2a03:2880:f003:c07:face:b00c::2">2a03:2880:f003:c07:face:b00c::2    (Ipv6)</a>
    <a href="http://localhost:8080/ramverk1/me/redovisa/htdocs/api/prettyJson/2a03:2880:f003:c07:face:b00c::2">2a03:2880:f003:c07:face:b00c::2     (Ipv6, pretty)</a>


</div>
</div>