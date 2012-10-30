<?php

require("config.php");

require("includes/header.php");

$sample_tags = array("open source","work","github","personal","my buddy, donald");

if(isset($_GET['sample']) and $_GET['sample']=="main"){
?>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="brand" href="#">TimeSuck</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">Reports</a></li>
              <li><a href="#contact">Help</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  Account
                  <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                  <li><a href="#contact">Settings & Profile</a></li>
                  <li><a href="#contact">Logout</a></li>
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="span2"><?php $email = "seppi@josefnpat.com"; ?>
        <img src="https://www.gravatar.com/avatar/<?php echo md5( strtolower( trim( $email ) ) ); ?>?s=128" />
        <div id="chart_div"></div>
        <h5>0:00 This Week.</h5>
      </div>
      <div class="span10">
        <h2>What are you working on?</h2>
        <div class="input-append">
          <input class="span5" id="appendedInputButtons" type="text">
          <select>
            <option>TimeSuck</option>
          </select>
          <button class="btn btn-primary" type="button"><i class="icon-play icon-white"></i></i></button>
        </div>
        
<div class="btn-group">
  <a class="btn btn-mini" href="#"><i class="icon-list-alt"></i></a>
  <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="#"><i class="icon-book"></i> Mark selected entries as billable</a></li>
    <li><a href="#"><i class="icon-book"></i> Mark selected entries as non-billable</a></li>
    <li><a href="#"><i class="icon-trash"></i> Delete selected entries.</a></li>
  </ul>
</div>
        
<?php
for($day = 0;$day < 6; $day++){
?>
          <h4><?php echo date("r",time()-$day*60*60*24); ?></h4>
        <table class="table table-striped table-hover">
<?php
for($task = 1; $task <= rand(1,2); $task++){
?>

          <tbody>
            <tr>
              <td style="width:16px;"><input type="checkbox" /></td>
              <td>Write TimeSuck</td>
              <td>TimeSuck</td>
              <td>2:12</td>
              <td>1:00<sup>AM</sup> &rarr; 3:12<sup>PM</sup></td>
              <td style="width:120px;">
              <?php for($i=1;$i<=rand(0,2);$i++){ ?>
                <span class="label"><?php echo $sample_tags[array_rand($sample_tags)];?></span>
              <?php } ?>
              
              </td><?php $billable = rand(0,1); ?>
              <td><button class="btn<?php echo ($billable)?(" btn-success"):(""); ?>"><i class="icon-briefcase<?php echo ($billable)?(" icon-white"):(""); ?>"></i></button></td>
              <td>
<div class="btn-group">
  <button class="btn btn-primary"><i class="icon-play icon-white"></i></button>
  <button class="btn"><i class="icon-edit"></i></button>
  <button class="btn"><i class="icon-tags"></i></button>
  <button class="btn"><i class="icon-trash"></i></button>
</div>
              
              </td>
            </tr>
          </tbody>
<?php
}
?>
        </table>
<?php
}
?>

<div class="pagination">
  <ul>
    <li><a href="#">Previous Week</a></li>
    <li class="active"><a href="#">Oct 23, 2012 &rarr; Oct 30, 2012</a></li>
    <li class="disabled"><a href="#">Next Week</a></li>
  </ul>
</div>
    
      </div>
    </div>

        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
          google.load("visualization", "1", {packages:["corechart"]});
          google.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
              ['Work',     11],
              ['Eat',      2],
              ['Commute',  2],
              ['Watch TV', 2],
              ['Sleep',    7]
            ]);

            var options = {
              legend: {position: 'none'},
              chartArea:{width:"90%",height:"100%"},
              backgroundColor: {fill: '#F5F5F5'}
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
          }
        </script>

<?php
} else {
?>
      <form class="form-signin" method="GET" action="">
      <input type="hidden" name="sample" value="main" />
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="input-block-level" placeholder="Email address">
        <input type="password" class="input-block-level" placeholder="Password">
        <button class="btn btn-primary" type="submit">Sign in</button>
      </form>
<?php

}
require("includes/footer.php");
