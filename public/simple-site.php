<?php
// ensure we don't crash this page for very large data sets
ini_set('memory_limit', '-1');

// fix for local dev
$_SERVER['HTTP_HOST'] = $_SERVER['HTTP_HOST'] == 'wordpress.dev' ? 'api.qa1.seaaroundus.org' : $_SERVER['HTTP_HOST'];

// we will grab data from whatever environment the user is accessing the simple site on
$apiUrl = "http://{$_SERVER['HTTP_HOST']}/api/v1";

// this function gets the list of possible "regions" for a region type:
// EEZs for search by EEZ, taxa for search by Taxon, etc
function getRegions($regionType) {
  global $apiUrl;
  $regionType = $regionType == 'eez-bordering' ? 'eez' : $regionType;
  $regions = json_decode(file_get_contents("$apiUrl/$regionType/?nospatial=true"))->data;
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
  <a href="/">
    <img class="pull-left" src="/wp-content/uploads/2015/03/LogoSeaAroundUs.png" />
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
    <?php // this text is rendered by JS to ensure that users only see this if they have JS enabled ?>
    <script type="text/javascript">
      window.document.write("To try the full site with maps, graphs and full region profiles, click " +
      "<a href=\"javascript:document.cookie='ignoreOldBrowser=1';window.location='/'\">here</a> to " +
      "proceed (some functionality may be unavailable).");
    </script>
  </p>

  <?php
  // to add more regions add the appropriate variable assignment here...
  $eez = getRegions('eez');
  $lme = getRegions('lme');
  $rfmo = getRegions('rfmo');
  $fishingEntity = getRegions('fishing-entity');
  $taxon = getRegions('taxa');

  // ...and a config row here
  $rows = array(
      array('label'=> 'EEZ', 'type' => 'eez', 'data' => $eez),
      array('label'=> 'EEZ &amp; neighboring EEZs', 'type' => 'eez-bordering', 'data' => $eez),
      array('label'=> 'LME', 'type' => 'lme', 'data' => $lme),
      array('label'=> 'RFMO', 'type' => 'rfmo', 'data' => $rfmo),
      array('label'=> 'Fishing country', 'type' => 'fishing-entity', 'data' => $fishingEntity),
      array('label'=> 'Taxon', 'type' => 'taxa', 'data' => $taxon)
  );
  ?>

  <a class="feedback" href="/feedback/?referringURL=/simple-site.php">Feedback</a>
  <div class="clear"><!-- --></div>

  <div class="forms">
    <?php // this iterator creates the rows with dropdowns to select a region for data download ?>
    <?php foreach($rows as $row) {?>
      <form class="region-row" method="get" action="/simple-site.php">
        <span class="big-bold"><?= $row['label'] ?></span>

        <select class="regionId" name="regionId">
          <?php
          // add a special case here if the data needs to be sorted by something other than $region->title
          $data = $row['data'];
          if ($row['type'] == 'taxa') {
            uasort($data, function($a, $b) { return strcmp($a->scientific_name, $b->scientific_name); });
          } elseif ($row['type'] == 'rfmo') {
            uasort($data, function($a, $b) { return strcmp($a->long_title, $b->long_title); });
          }
          ?>
          <?php foreach($data as $region) { ?>
            <option value="<?= $row['type'] == 'taxa' ? $region->taxon_key : $region->id ?>">
              <?php
              // add a special case in this switch statement if $region->title won't display the correct label
              switch($row['type']) {
                case 'rfmo':
                      echo "{$region->long_title} ($region->title)";
                      break;
                case 'taxa':
                      echo "{$region->scientific_name} ($region->common_name)";
                      break;
                default:
                      echo $region->title;
              }
              ?>
            </option>
          <?php }?>
        </select>

        <label>Dimension</label>
        <?php // add conditionals around dimensions that aren't used for special regions (taxon for taxon, etc) ?>
        <select name="dim">
          <?php if (in_array($row['type'], array('eez-bordering', 'taxa', 'fishing-entity'))) {?>
            <option value="eez" label="EEZ">EEZ</option>
          <?php } ?>
          <?php if (in_array($row['type'], array('taxa', 'fishing-entity'))) {?>
            <option value="lme" label="LME">LME</option>
            <option value="highseas" label="High Seas">High Seas</option>
          <?php } ?>
          <?php if ($row['type'] != 'taxa') {?>
            <option value="taxon" label="Taxon">Taxon</option>
          <?php } ?>
          <option value="commercialgroup" label="Commercial groups">Commercial groups</option>
          <option value="functionalgroup" label="Functional groups">Functional groups</option>
          <?php if ($row['type'] != 'fishing-entity') {?>
            <option value="country" label="Fishing country">Fishing country</option>
          <?php } ?>
          <option value="sector" label="Fishing sector">Fishing sector</option>
          <option value="catchtype" label="Catch type">Catch type</option>
          <option value="reporting-status" label="Reporting status">Reporting status</option>
        </select>

        <label>Measure</label>
        <select name="measure">
          <option value="tonnage" label="Tonnage">Tonnage</option>
          <option value="value" label="Landed value">Landed value</option>
        </select>

        <input type="hidden" name="region" value="<?= $row['type'] ?>" />

        <input type="submit" value="Retrieve data" />
        <div class="clear"><!-- --></div>
      </form>
    <?php }?>

    <div class="method">
      <a href="/catch-reconstruction-and-allocation-methods/">Method</a>
    </div>
    <div class="clear"><!-- --></div>
  </div>

  <div class="disclaimer">
    Note: The data we present ('reconstructed data') combine official reported data and reconstructed estimates of
    unreported data (including major discards), with reference to individual EEZs. Official reported data are mainly
    extracted from the Food and Agriculture Organization of the United Nations (FAO) FishStat database. For
    background information on reconstruction data, refer to references included in the data download for
    the individual EEZs.
  </div>

  <div class="results">
    <?php
    // these assignments only occur once the form has been submit and this page has access to GET data
    if ($_GET) {
      $id = strip_tags($_GET['regionId']);
      $dim = strip_tags($_GET['dim']);
      $measure = strip_tags($_GET['measure']);
      $limit = strip_tags($_GET['limit']);
      $region = strip_tags($_GET['region']);
    }
    ?>

    <?php
    // this is the section that actually makes the call to the API
    if (isset($id, $region)) {
      $data = json_decode(file_get_contents("$apiUrl/$region/$id"))->data;
      $regionMetrics = $data->metrics;
      ?>
      <h3>
        <?php switch($region) {
          // add a special case here if $data->title doesn't display the correct title
          case 'rfmo':
            echo "{$data->long_title} ($data->title)";
            break;
          case 'taxa':
            echo "{$data->scientific_name} ($data->common_name)";
            break;
          default:
            echo $data->title;
        } ?>
      </h3>
      <h4>To review review catch data in .csv form, click Download data below.</h4>
      <i class="warning">
        Download may take several minutes depending upon data size and your connection. Some versions of Internet
        Explorer may not be compatible. To install an updated browser, click
        <a target="_blank" href="https://www.google.com/chrome/">here</a> to download Chrome.
      </i>
      <table>
        <tbody>
        <?php // we don't show the full data download in the page, just the metrics for a region ?>
        <?php foreach($regionMetrics as $metric) {?>
          <tr>
            <td><?= $metric->title ?></td>
            <td><?= number_format($metric->value, is_int($metric->value) ? 0 : 2) ?> <?= $metric->units ?></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    <?php } ?>

    <?php
    // here is where we allow the user to download the data
    if (isset($id, $dim, $measure, $limit, $region)) {
      $csvURL = "$apiUrl/$region/$measure/$dim/?region_id=$id&format=csv"
      ?>
      <a href="<?= $csvURL ?>" class="download-button" target="_blank">
        Download catch data
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
  <span>&copy; 2015 Sea Around Us</span>
  <a href="/contact/">Contact us</a>
  <a href="/citation-policy/">Citation Policy</a>
  <a href="/privacy-policy/">Privacy Policy</a>
  <a href="https://github.com/seaaroundus/" target="_blank">View source code</a>
</div>
</body>
</html>
