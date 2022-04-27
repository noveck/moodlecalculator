<?php
/* ***** */
  
  // Getting Moodle Architecture Code (e.g. '1C2C3C4C') from main page.

  $q = $_GET["q"];

  // Opening Calculator_Combinations.xml, which stores all details related to each Architecture.
  // A database can also be used in-place of this.

  $xmlDoc = new DOMDocument();
  $xmlDoc->load("Calculator_Combinations.xml");
  $x = $xmlDoc->getElementsByTagName('code'); // Searching file by architecture code (which acts as an ID)

/* **************************************************************************************************** */

  // Searching for architecture code in XML file and storing its parent node (<record>) in $y.

  for ($i=0; $i<=$x->length-1; $i++) {

    //Process only element nodes
    if ($x->item($i)->nodeType==1) {
      if ($x->item($i)->childNodes->item(0)->nodeValue == $q) {
        $y=($x->item($i)->parentNode);
      }
    }
  }

  $record = ($y->childNodes);
  $array = array();

  // Creating a simple associative array with values in record.

  for ($i=0; $i<$record->length; $i++) {

    if ($record->item($i)->nodeType==1) {
      $array[$record->item($i)->nodeName] = $record->item($i)->childNodes->item(0)->nodeValue;
      //Example: $array['code'] = '1C2C3C4C'
    }
  }

  //print_r($array);

/* **************************************************************************************************** */

  // Main Function Calls

  $response = include_defaults($response, $array); // Adds Architecture Title

  if(isset($array['notes'])) $response = include_notes($response, $array); // Adds Notes if Available

  $response = include_web($response, $array); // Adds Web Server Details

  if(isset($array['db_core'])) $response = include_db($response, $array); // Adds Database Server Details
  if(isset($array['stor_core'])) $response = include_stor($response, $array); // Adds Storage Server Details
  if(isset($array['cache_core'])) $response = include_cache($response, $array); // Adds Cache Server Details

  $response = $response . "</div>"; // Closing div at the end of row.
  echo $response; // Returning response to be displayed on page.

/* **************************************************************************************************** */

  function include_defaults($response, $array){

    $response = $response . "

      <br>
      <hr>
      <br>

      <h3 class='text-center'><b>" . $array['architecture']  . "</b></h3>

    ";

    // For testing architecture code.

    //$response = $response . "<div class='container bg-success text-white text-center'>Code: " . $array['id'] . "</div>";

    return $response;

  }

/* **************************************************************************************************** */

  function include_notes($response, $array){
    $response = $response . "<div class='text-center'><i>" . $array['notes'] . "</i></div>";
    return $response;
  }

/* **************************************************************************************************** */

  function include_web($response, $array){

    $response = $response . "

      <br>

      <div class='row'>

        <div class='col-md-3'>

          <div class='text-center p-2' style='background-color:#f7ca18; color:#343434'>

            <h4><b class='rounded-circle text-center' style='background-color: #663399; color: white'> &nbsp;" . $array['num_web'] . " </b>&nbsp;

              <br>
    ";
            if($array['architecture'] == 'Single Server') $response = $response . "Server";
            else $response = $response . "Web Sever";

            if($array['num_web'] > 1) $response = $response . "s ";

    $response = $response . " 

              <i class='fas fa-globe'></i>
            </h4>
          </div>

          <div class='bg-light'>

            <br>

            <table class='table table-borderless table-hover' style='color:#663399'>
              <tr>
                <td class='text-right'><b>" . $array['web_core'] . "</b></td>
                <td>CPU Cores</td>
              </tr>
              <tr>
                <td class='text-right'><b>" . $array['web_mem'] . "</b></td>
                <td>GB RAM</td>
              </tr>
              <tr>
                <td class='text-right'><b>"   . $array['web_disk'] . "</b></td>
                <td>GB Storage</td>
              </tr>
            </table>

            <br>

          </div>

        </div>
    ";

    return $response;

  }

/* **************************************************************************************************** */

  function include_db($response, $array){

    $response = $response . "
      <div class='col-md-3'>

        <div class='text-center p-2' style='background-color:#f7ca18; color:#343434'>
          <h4>
            <b class='rounded-circle text-center' style='background-color: #663399; color: white'> &nbsp;" . $array['num_db'] . " </b>&nbsp; 

            <br> 

            Database Server <i class='fas fa-database'></i>
          </h4>
        </div>

        <div class='bg-light'>

          <br>
          
          <table class='table table-borderless table-hover' style='color:#663399'>

            <tr>
              <td class='text-right'><b>" . $array['db_core'] . "</b></td>
              <td>CPU Cores</td>
            </tr>
            <tr>
              <td class='text-right'><b>" . $array['db_mem'] . "</b></td>
              <td>GB RAM</td>
            </tr>
            <tr>
              <td class='text-right'><b>"   . $array['db_disk'] . "</b></td>
              <td>GB Storage</td>
            </tr>
          </table>

          <br>

        </div>

      </div>
    ";

    return $response;
  }

/* **************************************************************************************************** */

  function include_stor($response, $array){

    $response = $response . "
      <div class='col-md-3'>

        <div class='text-center p-2' style='background-color:#f7ca18; color:#343434'>
          <h4>
            <b class='rounded-circle text-center' style='background-color: #663399; color: white'> &nbsp;" . $array['num_stor'] . " </b>&nbsp; 

            <br> 

            Storage Server <i class='fas fa-hdd'></i>
          </h4>
        </div>

        <div class='bg-light'>

          <br>
          
          <table class='table table-borderless table-hover' style='color:#663399'>

            <tr>
              <td class='text-right'><b>" . $array['stor_core'] . "</b></td>
              <td>CPU Cores</td>
            </tr>
            <tr>
              <td class='text-right'><b>" . $array['stor_mem'] . "</b></td>
              <td>GB RAM</td>
            </tr>
            <tr>
              <td class='text-right'><b>"   . $array['stor_disk'] . "</b></td>
              <td>GB Storage</td>
            </tr>
          </table>

          <br>

        </div>

      </div>
    ";

    return $response;
  }

/* **************************************************************************************************** */

  function include_cache($response, $array){

    $response = $response . "
      <div class='col-md-3'>

        <div class='text-center p-2' style='background-color:#f7ca18; color:#343434'>
          <h4>
            <b class='rounded-circle text-center' style='background-color: #663399; color: white'> &nbsp;" . $array['num_cache'] . " </b>&nbsp; 

            <br> 

            Cache Server <i class='fas fa-memory'></i>
          </h4>
        </div>

        <div class='bg-light'>

          <br>
          
          <table class='table table-borderless table-hover' style='color:#663399'>

            <tr>
              <td class='text-right'><b>" . $array['cache_core'] . "</b></td>
              <td>CPU Cores</td>
            </tr>
            <tr>
              <td class='text-right'><b>" . $array['cache_mem'] . "</b></td>
              <td>GB RAM</td>
            </tr>
            <tr>
              <td class='text-right'><b>"   . $array['cache_disk'] . "</b></td>
              <td>GB Storage</td>
            </tr>
          </table>

          <br>

        </div>

      </div>
    ";

    return $response;
  }

/* ***** */
?>