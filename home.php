<!DOCTYPE html>
<html>

  <head>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="description" content="MDsrv : MD trajectory server">

    <link rel="stylesheet" type="text/css" media="screen" href="stylesheets/stylesheet.css">

    <title>MDsrv</title>
  </head>

  <body>

    <script src="data/ngl.js"></script>

    <script>
        document.addEventListener( "DOMContentLoaded", function() {
			function getModelURL( model ){
		        var href = window.location.href;
		        return href.substr( 0, href.lastIndexOf( "/" ) + 1 ) + model;
			}
            var stage = new NGL.Stage( "viewport" );
                stage.setParameters( { backgroundColor: "white" } );
          	stage.loadFile( getModelURL("data/md.gro"), { asTrajectory: true }  ).then( function( o ){
                o.addRepresentation( "cartoon", {color: "#c40000"});
                
                o.centerView();
	      		var trajComp = o.addTrajectory();
	      		var player = new NGL.TrajectoryPlayer(trajComp.trajectory, {start: 1, timeout: 200} );
	      		player.play();
            } );
            stage.setOrientation(
                [[28.074999809265137,28.16999912261963,27.22000026702881],[38.041256212103626,4.000447687884037,-11.16747719008557],[-29.3665595756232,2.0906799525729096,11.365819960687398],[0,0,0]]
            );
        } );

    </script>

<!-- HEADER AND SIDEBAR -->
<?php include 'include/headerSide.php';?>

<div id="main_content_wrap" class="outer">
 <div class="content">
 <br>
 <div id="viewport" style="width:300px; height:300px; margin:0 auto;">
</div>

<p align=justify ><strong>MDsrv</strong> is a web-based tool developed to enhance collaborative research by providing non-experts with easy and quick online access to molecular dynamics (MD) simulations. MDsrv channels MD trajectories through a web server using a powerful web application (<a target="_blank" href="https://github.com/arose/ngl">NGL viewer</a>) to visualize them.  

<p align=justify><strong>Highlights:</strong></p>

<ul>
  <li> <strong> Non-expert end users (e.g. research collaborators, students, etc.) only require a modern web browser to visualize MD simulations through MDsrv.</strong></li>
  <li> Direct meaningful display of raw simulation data by automatically handling periodic boundary conditions, centering and superposition.</li>
  <li> Further on-the-fly MD trajectory processing (e.g. by filtering out frames and/or atoms) allows generating customized sessions that can be easily shared.</li>
  <li> <a target="_blank" href="data/script.ngl">Script files</a> can be used to add specific self-written functions such as 'show/hide ligand' to customized sessions. </li>
  <li> MDsrv can display large molecular structures and animate MD trajectories to allow interactive exploration and collaborative visual analysis within a local network or over the Internet. </li>
</ul>  

<p align=justify>A small <strong>example of the usage</strong> of the MDsrv in combination with the <a target="_blank" href="https://github.com/arose/ngl">NGL viewer</a> is embedded on this page (above). It can be interactively moved, scaled and rotated. 
More capable example can be found <a href="examples.html">here</a>.</p>


<h3>
<a id="availability" class="anchor" href="#availability" aria-hidden="true"><span aria-hidden="true" class="octicon octicon-link"></span></a>Availability</h3>

<p align=justify>The source code is available under the
<a target="_blank" href="https://opensource.org/licenses/MIT">MIT License</a> from
<a target="_blank" href="https://github.com/arose/MDsrv">github.com/arose/mdsrv</a> and the Python
Package index
<a target="_blank" href="http://pypi.python.org/pypi/MDsrv">pypi.python.org/pypi/MDsrv</a>. The visualization capabilities of MDsrv require no previous installation other than a modern web browser. The streaming capabilities (i.e. from a local or a dedicated web-server) do require <a href="installation.html">installation</a> and have been fully tested for Linux and Mac OS operating systems. </p>

<h3>
<a id="participating" class="anchor" href="#participating" aria-hidden="true"><span aria-hidden="true" class="octicon octicon-link"></span></a>Participating</h3>

<p align=justify>If you have any <strong>questions</strong>, found some <strong>bugs</strong>, or want to report
<strong>enhancement requests</strong> use the <a target="_blank" href="https://github.com/arose/mdsrv/issues">Issue Tracker</a> or write a mail to
<a href="mailto:johanna.tiemann@gmail.com">johanna.tiemann@gmail.com</a> or
<a href="mailto:alexander.rose@weirdbyte.de">alexander.rose@weirdbyte.de</a>.</p>

<p align=justify>MDsrv is <strong>open source</strong> and welcomes <em>your</em> contributions. <a target="_blank" href="https://github.com/arose/mdsrv#fork-destination-box">Fork
the repository on GitHub</a> and submit a pull request.</p>


    </div>
</div>

<!-- FOOTER  -->
<?php include 'include/footer.php';?>


  </body>
</html>
