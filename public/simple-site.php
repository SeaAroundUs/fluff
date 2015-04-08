<html>
<head>
  <title>Sea Around Us</title>
  <link rel="stylesheet" href="simple-site.css" media="all" />
</head>
<body>
<?php
ini_set('memory_limit', '-1');

const API_URL = 'http://sau-web-lb-qa-892050803.us-west-2.elb.amazonaws.com/api/v1/';

function getRegions($regionType) {
  $regions = json_decode(file_get_contents(API_URL . $regionType . '/?nospatial=true'))->data;
  usort($regions, function($a, $b) { return strcmp($a->title, $b->title); });
  return $regions;
}
$eez = getRegions('eez');
$lme = getRegions('lme');

$rows = array(
    array('type'=> 'eez', 'data' => $eez),
    array('type'=> 'lme', 'data' => $lme)
);
?>
<h1>Sea Around Us</h1>
<h2>Basic Site</h2>
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

<div class="content">
  <?php foreach($rows as $row) {?>
    <form class="region-row" method="get" action="/simple-site.php">
      <span class="big-bold"><?= strtoupper($row['type']) ?></span>

      <label for="regionID">Region</label>
      <select id="regionID" name="regionID">
        <?php foreach($row['data'] as $region) {?>
          <option value="<?= $region->id ?>"><?= $region->title ?></option>
        <?php }?>
      </select>

      <label for="dim">Dimension</label>
      <select id="dim" name="dim">
        <option value="taxon" label="Taxon">Taxon</option>
        <option value="commercialgroup" label="Commercial groups">Commercial groups</option>
        <option value="functionalgroup" label="Functional groups">Functional groups</option>
        <option value="country" label="Fishing country">Fishing country</option>
        <option value="sector" label="Fishing sector">Fishing sector</option>
        <option value="catchtype" label="Catch type">Catch type</option>
        <option value="reporting-status" label="Reporting status">Reporting status</option>
      </select>

      <label for="measure">Measure</label>
      <select id="measure" name="measure">
        <option value="tonnage" label="Tonnage">Tonnage</option>
        <option value="value" label="Landed value">Landed value</option>
      </select>

      <label for="limit">Limit</label>
      <select id="limit" name="limit">
        <option value="5" label="5">5</option>
        <option value="10" selected="selected" label="10">10</option>
        <option value="15" label="15">15</option>
        <option value="20" label="20">20</option>
      </select>

      <input type="hidden" name="region" value="<?= $row['type'] ?>" />

      <input type="submit" value="Retrieve data" />
    </form>
  <?php }?>

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
        <input type="button" value="Download data" />
      </a>
    <?php }?>
  </div>
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

</body>
</html>
