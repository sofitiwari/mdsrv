<!DOCTYPE html>
<html>

  <head>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="description" content="MDsrv : MD trajectory server">

    <link rel="stylesheet" type="text/css" media="screen" href="stylesheets/stylesheet.css">
		<style>
      table, td, th { border: 0 solid black; }
    </style>
    <title>MDsrv</title>
  </head>

  <body>

    <!-- NGL -->
    <script src="data/mdsrv/webapp/js/ngl.js"></script>

    <!-- UI -->
    <script src="data/mdsrv/webapp/js/lib/signals.min.js"></script>
    <script src="data/mdsrv/webapp/js/lib/tether.min.js"></script>
    <script src="data/mdsrv/webapp/js/lib/colorpicker.min.js"></script>
    <script src="data/mdsrv/webapp/js/ui/ui.js"></script>
    <script src="data/mdsrv/webapp/js/ui/ui.extra.js"></script>
    <script src="data/mdsrv/webapp/js/ui/ui.ngl.js"></script>
    <script src="data/mdsrv/webapp/js/ui/ui.helper.js"></script>
    <script src="data/mdsrv/webapp/js/gui.js"></script>

    <!-- MDSRV -->
    <script src="data/mdsrv/webapp/js/mdsrv.js"></script>

    <script>
        NGL.cssDirectory = "data/mdsrv/webapp/css/";
        NGL.documentationUrl = "http://arose.github.io/ngl/api/";

        // Datasources
        NGL.DatasourceRegistry.add(
            "file", new MdsrvDatasource( window.location.origin + "/mdsrv/" )
        );
        NGL.DatasourceRegistry.listing = NGL.DatasourceRegistry.get( "file" );
        NGL.DatasourceRegistry.trajectory = NGL.DatasourceRegistry.get( "file" );
        document.addEventListener( "DOMContentLoaded", function(){
            stage = new NGL.Stage( "viewport" );
            stage.loadFile( "data/md.gro", { defaultRepresentation: true, asTrajectory: true } ).then( function( comp ){
        	    comp.setName( "simulation-name" );
	            comp.setSelection( "protein and not #h" );
							comp.addRepresentation( "licorice", {visible: false} );
							comp.addTrajectory( );

	        } );
            var toggleTheme = document.getElementById( "toggleTheme" );
            var isLight = false;
            toggleTheme.addEventListener( "click", function(){
		        if( !isLight ){
                    stage.setParameters( { backgroundColor: "white" } );
                    isLight = true;
                }else{
                    stage.setParameters( { backgroundColor: "black" } );
                    isLight = false;
                }
            } );
            var toggleSpin = document.getElementById( "toggleSpin" );
            var isSpinning = false;
            toggleSpin.addEventListener( "click", function(){
                if( !isSpinning ){
                    stage.setSpin( [ 0, 1, 0 ], 0.01 );
                    isSpinning = true;
                }else{
                    stage.setSpin( null, null );
                    isSpinning = false;
                }
            } );
            var toggleLicorice = document.getElementById( "toggleLicorice" );
            toggleLicorice.addEventListener( "click", function(){
							stage.getRepresentationsByName( "licorice" ).list.forEach( function( repre ){
									repre.setVisibility( !repre.visible );
							} );
            } );
            var toggleRunMDs = document.getElementById( "toggleRunMDs" );
            var isRunning = false;
            toggleRunMDs.addEventListener( "click", function(){
				var trajComp = stage.getComponentsByName("simulation-name").list[0].trajList[0];
				var player = new NGL.TrajectoryPlayer(trajComp.trajectory, {timeout: 200});
				if( !isRunning ){
					player.play();
					isRunning = true;
				}else{
			   	 player.play();
					player.pause();
					isRunning = false;
				}
            } );

        } );
    </script>



<!-- HEADER AND SIDEBAR -->
<?php include 'include/headerSide.php';?>

<div class="content">

<h3><a id="example_embedded" class="anchor" href="#example_embedded" aria-hidden="true"><span aria-hidden="true" class="octicon octicon-link"></span></a>Examples: MDsrv embedded</h3>
<p align=justify><strong>Interactive picture:</strong><br>As already shown on the <a href="home.html">home</a> page, simulations can be embedded and automatically played within a web site. It can be interactively moved, scaled, centered and rotated.</p>
<strong>Simple functions:</strong>
<table><tr><td>
    <div style="width:300px;">
        <button id="toggleSpin">spin on/off</button>
        <button id="toggleTheme">light/dark background</button>
        <button id="toggleLicorice">sidechains on/off</button>
        <button id="toggleRunMDs">run/pause MD</button>
    </div>
		<div id="viewport" style="width:300px; height:300px; margin:0 auto;"></div>

</td><td>
<div style="width:auto;"><p align=justify>Another embedded example with function button is shown on the left. A html file with those functions can be <a target="_blank" href="data/mdsrv-embedded.html">downloaded</a> and is further explained within the <a href="scripting.html#embedded">scripting section</a>.
</p></div>
</td></tr></table>

<h3><a id="example_1" class="anchor" href="#example_1" aria-hidden="true"><span aria-hidden="true" class="octicon octicon-link"></span></a>Examples: MDsrv with NGL gui </h3>
<p align=justify><strong>Simulation of Rhodopsin with Gt peptide (3PQR):</strong><br>By providing a simulation session within the NGL GUI, a greater flexibility and more features are provided. As explained within the <a target="_blank" href="usage.html#gui">NGL GUI guide</a>, additional simulations, representations and playing settings can be changed. An example can be found <a target="_blank" href="http://proteinformatics.charite.de/MDsrv-example1">here</a>. There, the simulation can be run by pressing the 'play' button. Additionally, the <a target="_blank" href="data/script.ngl">.ngl script file</a> which is used to generate the example (more information <a target="_blank" href="scripting.html">here</a>) gives the possibility to add specific self-written functions as 'show/hide all' or 'sidechains on/off'.</p>

<p align=justify><strong>Spontaneous binding of cholesterol into A<sub>2A</sub> receptor:</strong><br>Guixà-González et al. (Nat Commun 2017) observed spontaneous binding of membrane cholesterol into A<sub>2A</sub> receptor. The simulation is deposed by using the MDsrv <a target="_blank" href="http://proteinformatics.charite.de/MDsrv-example2">here</a>.</p>

<p align=justify><strong>Simulation of a GPCR in complex with its G protein:</strong><br>500ns of &beta;2AR in complex with GTP-Gs protein <a target="_blank" href="http://proteinformatics.charite.de/MDsrv-example3">(classical MDs)</a>.</p>

<h1>


    </div>
    </div>
<!-- FOOTER  -->
<?php include 'include/footer.php';?>


  </body>
</html>
