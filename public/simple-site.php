<?php
ini_set('memory_limit', '-1');

const API_URL = 'http://sau-web-lb-qa-892050803.us-west-2.elb.amazonaws.com/api/v1/';

function getRegions($regionType) {
  $regions = json_decode(file_get_contents(API_URL . $regionType . '/?nospatial=true'))->data;
  usort($regions, function($a, $b) { return strcmp($a->title, $b->title); });
  return $regions;
}
?>
<html>
<head>
  <title>Basic Site | Sea Around Us Project</title>
  <link rel="stylesheet" href="simple-site.css" media="all" />
</head>
<body>
<div class="header">
  <img class="pull-left" src="/wp-content/uploads/2015/03/LogoSeaAroundUs.png" />
  <a href="http://www.vulcan.com" target="_blank">
    <img class="pull-right" src="/wp-content/uploads/2015/03/BannerLogoVulcan.png" />
  </a>
  <div class="clear"><!-- --></div>
</div>
<div class="content">
  <h1>BASIC SITE</h1>
  <p>
    Your browser, operating system or connection speed may require extra time for data to load, and/or
    some features like maps and graphs may not be supported. You can still retrieve data using the
    controls below. <a href="#faq">What can I do to update my system?</a>
  </p>

  <p>
    If you wish to continue with reduced functionality, use the dropdowns below to select the data you
    would like to retrieve.
    <script type="text/javascript">
      window.document.write("To try the full site with maps, graphs and full region profiles, click " +
      "<a href=\"javascript:document.cookie='ignoreOldBrowser=1';window.location='/'\">here</a> to " +
      "proceed (some functionality may be unavailable).");
    </script>
  </p>

  <?php
  $eez = getRegions('eez');
  $lme = getRegions('lme');

  $rows = array(
      array('type'=> 'eez', 'data' => $eez),
      array('type'=> 'lme', 'data' => $lme)
  );
  ?>

  <div class="forms">
    <?php foreach($rows as $row) {?>
      <form class="region-row" method="get" action="/simple-site.php">
        <span class="big-bold"><?= strtoupper($row['type']) ?></span>

        <label>Region</label>
        <select class="regionID" name="regionID">
          <?php foreach($row['data'] as $region) {?>
            <option value="<?= $region->id ?>"><?= $region->title ?></option>
          <?php }?>
        </select>

        <label>Dimension</label>
        <select name="dim">
          <option value="taxon" label="Taxon">Taxon</option>
          <option value="commercialgroup" label="Commercial groups">Commercial groups</option>
          <option value="functionalgroup" label="Functional groups">Functional groups</option>
          <option value="country" label="Fishing country">Fishing country</option>
          <option value="sector" label="Fishing sector">Fishing sector</option>
          <option value="catchtype" label="Catch type">Catch type</option>
          <option value="reporting-status" label="Reporting status">Reporting status</option>
        </select>

        <label>Measure</label>
        <select name="measure">
          <option value="tonnage" label="Tonnage">Tonnage</option>
          <option value="value" label="Landed value">Landed value</option>
        </select>

        <label>Limit</label>
        <select name="limit">
          <option value="5" label="5">5</option>
          <option value="10" selected="selected" label="10">10</option>
          <option value="15" label="15">15</option>
          <option value="20" label="20">20</option>
        </select>

        <input type="hidden" name="region" value="<?= $row['type'] ?>" />

        <input type="submit" value="Retrieve data" />
        <div class="clear"><!-- --></div>
      </form>
    <?php }?>
  </div>

  <div class="results">
    <?php
    if ($_GET) {
      $id = strip_tags($_GET['regionID']);
      $dim = strip_tags($_GET['dim']);
      $measure = strip_tags($_GET['measure']);
      $limit = strip_tags($_GET['limit']);
      $region = strip_tags($_GET['region']);
    }
    ?>

    <?php
    if (isset($id, $region)) {
      $data = json_decode(file_get_contents(API_URL . "$region/$id"))->data;
      $regionMetrics = $data->metrics;
      ?>
      <h3><?= $data->title ?></h3>
      <table>
        <tbody>
        <?php foreach($regionMetrics as $metric) {?>
          <tr>
            <td><?= $metric->title ?></td>
            <td><?= $metric->value ?> <?= $metric->units ?></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    <?php } ?>

    <?php
    if (isset($id, $dim, $measure, $limit, $region)) {
      $csvURL = API_URL . "$region/$measure/$dim/?limit=$limit&region_id=$id&format=csv"
      ?>
      <a href="<?= $csvURL ?>" target="_blank">
        <input type="button" value="Download catch data" />
      </a>
    <?php }?>
  </div>


  <a name="faq"></a>
  <h3 class="faq">What can I do to update my system?</h3>
  <p>
    To use all of the functionality on the Sea Around Us site, you must have an up-to-date browser with JavaScript enabled.
  </p>

  <ul>
    <li>
      To read how to enable JavaScript on common browsers,
      click <a target="_blank" href="http://www.wikihow.com/Turn-on-Javascript-in-Internet-Browsers">here</a>.
    </li>
    <li>
      To install an updated browser, click <a target="_blank" href="https://www.google.com/chrome/">here</a>
      to download Chrome for free.
    </li>
  </ul>
</div>
<div class="footer">
  &copy; 2015 Sea Around Us
</div>
</body>
</html>
