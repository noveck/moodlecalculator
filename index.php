<!DOCTYPE html>
<html lang="en">

<!-- Site colors: Grey: 343434, Purple: 663399, Yellow: F7CA18 -->

<!-- **************************************************************************************************** -->

<head>

  <title>LMS Architecture Calculator - Tucuche Consulting</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="css/bootstrap431.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <style type="text/css">
    body {font-family: 'Roboto', sans-serif;}
  </style>

  <script src="js/jquery341.min.js"></script>
  <script src="js/popper1147.min.js"></script>
  <script src="js/bootstrap431.min.js"></script>

  <link rel="stylesheet" href="css/customSlider.css">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-133279615-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-133279615-1');
  </script>

</head>

<!-- **************************************************************************************************** -->

<!-- Show Terms & Conditions on Page Load and Hide results_section -->

<script type="text/javascript">
  $(document).ready(function(){
    $("#terms").modal('show');
    $("#result_section").hide();
  });
</script>

<!-- **************************************************************************************************** -->
<body id="everything">
<!-- **************************************************************************************************** -->

<!-- Top Navigation Bar -->

  <nav class="navbar container">

    <a class="navbar-brand" href="https://tucuche-consulting.com/">
      <img class="img-fluid" src="images/logo.png" alt="Logo" style="height:65px">
    </a>

    <ul class="navbar-nav float-right">
      <li class="nav-item">
        <a class="nav-link text-dark" href="https://tucuche-consulting.com/">
          <i class="far fa-times-circle fa-1x"></i> Close
        </a>
      </li>
    </ul>

  </nav>

<!-- **************************************************************************************************** -->

<!-- Terms & Conditions -->

<div class="container">
  <div id="terms" class="modal fade" data-keyboard="false" data-backdrop="static">

  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
  <div class="modal-content">

    <!-- Modal Header -->
    <div class="modal-header">
      <h4 class="modal-title">Terms & Conditions</h4>
      <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
    </div>

    <!-- Modal Body -->
    <div class="modal-body">

      We have developed this LMS Server Architecture Calculator to provide some examples of various usage scenarios, based on our assumptions as well as the information you provide. This tool was developed to work with Moodle, and other similar LMS platforms.
      While these calculations are based on a range of sources and experience that we believe are valid in the field, your actual outcomes will depend on a number of factors that are outside our control. 
      
      <br><br>

      This calculator / simulation is provided at no cost and the resulting calculations are intended to be used as estimates only; 
      and they are not meant to be used as a substitute for professional systems engineering or architecture advice. 
      The figures and formulae used within this calculator may change at any time without notice. 

      <br><br>

      You should not rely on this calculator when making final decisions about a particular architecture solution or strategy. 
      This page is intended to be a starting point and we can work with you to further refine the results or to create a tailored solution for you at a cost. 
      Please contact us to find out more.

      <br><br>

      Tucuche Consulting Ltd and our extended team does not guarantee, either express or implied, the accuracy and completeness of this calculator / simulator. 
      We do not accept any liability for loss or damage of whatsoever nature which may be attributable to the reliance on and use of this calculator.
      We are not affiliated in any way with Moodle Pty Ltd.

      <br><br>

      Any information provided is confidential and anonymous. Your personal information is neither collected nor stored by our site.

      <br><br>

      If you have any questions about this calculator / simulator, or would like to provide feedback, please contact us: <a href="mailto:info@tucuche-consulting.com">info@tucuche-consulting.com</a>

      <br><br>

    </div>

    <!-- Modal Footer -->
    <div class="modal-footer">
      <button type="button" class="btn btn-dark" onclick="location.href='https://tucuche-consulting.com/'">
        <i class="fas fa-chevron-circle-left"></i> Return
      </button>

      <button type="button" class="btn btn-dark" data-dismiss="modal">
        Agree <i class="fas fa-chevron-circle-right"></i>
      </button>
    </div>

  </div>
  </div>

  </div>
</div>

<!-- **************************************************************************************************** -->

<!-- Introduction -->

<div class="container text-center" style="color: #343434;">

  <br>

  <h3>
    <b>LMS Architecture Calculator </b>
    <sup>
      <small>
        <span class="badge badge-pill badge-warning">Beta</span>
      </small>
    </sup>
  </h3>

  <p>
    <i>
      Select a configuration below to get started!
      
      <br>
      
      <small>
        For a detailed solution tailored to your requirements, please contact us: <a href="mailto:info@tucuche-consulting.com">info@tucuche-consulting.com</a>
      </small>
    </i>
  </p>

  <br>

</div>

<!-- **************************************************************************************************** -->

<div class="container">
<div class="row text-white p-3" style="background-color: #343434">

  <script>

  $(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
  });

  function recalculate(){

    //This functions generates an architecture code based on the current user selections on page. 
    //The code is then used to dynamically generate resulting table.

    var code = '';

    var users = document.getElementById('rangeUsers').value;
    var usage = document.getElementById('rangeUsage').value
    var courses = document.getElementById('rangeCourses').value
    var size = document.getElementById('rangeSize').value

    if(users < 1000) code = code + '1A';
    else if(users >= 1000 && users < 10000) code = code + '1B';
    else code = code + '1C';

    if(usage < 40) code = code + '2A';
    else if(usage >= 40 && usage < 75) code = code + '2B';
    else code = code + '2C';

    if(courses < 100) code = code + '3A';
    else if(courses >= 100 && courses < 1000) code = code + '3B';
    else code = code + '3C';

    if (size < 250) code = code + '4A';
    else if(size >= 250 && size < 1000) code = code + '4B';
    else code = code + '4C';

    //alert(code);

    populate_page(code);
  }


  function populate_page(code){

    //Querying fetch.php file, which returns HTML code.

    if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    } else {  // code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("result_section").innerHTML=this.responseText;
        $("#result_section").slideDown("slow");
        $("#result_section").fadeIn("slow");
      }
    }

    xmlhttp.open("GET","fetch.php?q="+code,true);
    xmlhttp.send();

  }

  </script>

<!-- **************************************************************************************************** -->

  <div class="col-md-3">
  <div class="border border-white rounded p-3 m-1">

    <p class="text-right">
      <a href="#" title="Users" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Total number of expected users. i.e. Students, Teachers, Admins, etc.">
        <i class="fas fa-question-circle text-white"></i>
      </a>
    </p>

    <h5 class="text-center">
      <i class="fas fa-user-graduate fa-2x"></i> 
      <br>
      Users: <span id="valueUsers"></span>
    </h5>

    <div class="slidecontainer">
      <input type="range" min="1" max="10000" value="5000" class="slider" id="rangeUsers">
    </div> 

    <br>

    <script>
      var sliderUsers = document.getElementById("rangeUsers");
      var outputUsers = document.getElementById("valueUsers");
      outputUsers.innerHTML = sliderUsers.value;

      sliderUsers.oninput = function() {
        outputUsers.innerHTML = this.value;
        if(this.value == 10000) outputUsers.innerHTML = this.value + '+';
        //recalculate();
      }
    </script>

  </div>
  </div>

<!-- ********** -->

  <div class="col-md-3">
  <div class="border border-white rounded p-3 m-1">

    <p class="text-right">
      <a href="#" title="Usage" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Expected usage per hour. i.e. Percentage of total users.">
        <i class="fas fa-question-circle text-white"></i>
      </a>
    </p>

    <h5 class="text-center">
      <i class="fas fa-chart-line fa-2x"></i>
      <br>
      Usage: <span id="valueUsage"></span>%
    </h5>

    <div class="slidecontainer">
      <input type="range" min="1" max="100" value="50" class="slider" id="rangeUsage">
    </div>

    <br>

    <script>
      var sliderUsage = document.getElementById("rangeUsage");
      var outputUsage = document.getElementById("valueUsage");
      outputUsage.innerHTML = sliderUsage.value;

      sliderUsage.oninput = function() {
        outputUsage.innerHTML = this.value;
        //recalculate();
      }
    </script>

  </div>
  </div>

<!-- ********** -->

  <div class="col-md-3">
  <div class="border border-white rounded p-3 m-1">

    <p class="text-right">
      <a href="#" title="Courses" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Total number of active courses.">
        <i class="fas fa-question-circle text-white"></i>
      </a>
    </p>

    <h5 class="text-center">
      <i class="fas fa-chalkboard-teacher fa-2x"></i>
      <br>
      Courses: <span id="valueCourses"></span>
    </h5>

    <div class="slidecontainer">
      <input type="range" min="1" max="1000" value="500" class="slider" id="rangeCourses">
    </div>

    <br>

    <script>
      var sliderCourses = document.getElementById("rangeCourses");
      var outputCourses = document.getElementById("valueCourses");
      outputCourses.innerHTML = sliderCourses.value;

      sliderCourses.oninput = function() {
        outputCourses.innerHTML = this.value;
        if(this.value == 1000) outputCourses.innerHTML = this.value + '+';
        //recalculate();
      }
    </script>

  </div>
  </div>

<!-- ********** -->

  <div class="col-md-3">
  <div class="border border-white rounded p-3 m-1">

    <p class="text-right">
      <a href="#" title="Course Size" data-toggle="popover" data-trigger="focus" data-placement="bottom" data-content="Average size of each course. i.e. Resources, Documents, Videos, etc.">
        <i class="fas fa-question-circle text-white"></i>
      </a>
    </p>

    <h5 class="text-center">
      <i class="fas fa-database fa-2x"></i>
      <br>
      Course Size: <span id="valueSize"></span>MB
    </h5>

    <div class="slidecontainer">
      <input type="range" min="1" max="1000" value="50" class="slider" id="rangeSize">
    </div>

    <br>

    <script>
      var sliderSize = document.getElementById("rangeSize");
      var outputSize = document.getElementById("valueSize");
      outputSize.innerHTML = sliderSize.value;

      sliderSize.oninput = function() {
        outputSize.innerHTML = this.value;
        if(this.value == 1000) outputSize.innerHTML = this.value + '+';
        //recalculate();
      }
    </script>

  </div>
  </div>

<!-- **************************************************************************************************** -->

</div> <!-- End Row -->
</div> <!-- End Container -->

<!-- **************************************************************************************************** -->

<div class="container p-3" style="background-color: #343434">
  <div class="d-flex justify-content-center">
    <button class="btn btn-light" id="submitBtn" type="button" onclick="recalculate()">Go <i class="fas fa-check-circle"></i></button>
  </div>
</div>

<!-- **************************************************************************************************** -->

<div class="container" id="result_section" style="color: #663399">

</div>

<br>

<!-- **************************************************************************************************** -->
</body>
<!-- **************************************************************************************************** -->
</html>