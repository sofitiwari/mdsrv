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

<!-- HEADER AND SIDEBAR -->
<?php include 'include/headerSide.php';?>

<div class="content">

<h1>
<a id="language" class="anchor" href="#language" aria-hidden="true"><span aria-hidden="true" class="octicon octicon-link"></span></a>NGL selection language</h1>

<p align=justify>The MDsrv uses the NGL Viewer as web application for molecular visualization. It has several features and options for representations. The full documentation can be found <a target="_blank" href="http://arose.github.io/ngl/api/manual/index.html">here</a>. As <em>.js / .ngl</em> scripts are used to prepair a MDsrv session, have a look at all available functions and their corresponding names. You can also try it out by selecting examples from the <a target="_blank" href="http://arose.github.io/ngl/gallery/index.html">gallery</a> and <em>View/Edit</em> them within <a target="_blank" href="https://codepen.io/">https://codepen.io/</a>.</p>

<p align=justify>Below you can find some basic features.</p>

<pre><code>//selection language:
"*"         //= all
"not #h"    //= no hydrogens
"protein"   //= protein (no ions, lipids, water, HETATMs)
"hetero"    //= hetero atoms/HETATM
":B"        //= chain
".CA"       //= atom
"@703"      //= atomindex
"10-15"     //= range of atoms</code></pre>
<br>
<pre><code>//panel settings:
panel.setName( "Controls" );
<br>
//stage settings:
stage.setParameters( { theme: "light" } ); 
      //options: "light", "dark"
stage.setParameters( { backgroundColor: "white" } ); 
      //options: "white", "black"
stage.setParameters( { cameraType: "perspective" } ); 
      //options: "perspective", "orthographic"
stage.setParameters( { lighthoverTimeout: -1 } ); 
      //-1 sets of the popup labeling of atoms
stage.setParameters( { workerDefault: false } ); 
      //default: true; worker for faster handling, under development 
      //(may cause problems, e.g. surface representation)
stage.centerView();
stage.viewer.container.addEventListener( "dblclick", function(){
    stage.toggleFullscreen();
} );
stage.setSpin( [ 0, 1, 0 ], 0.005 );
stage.setSpin( null, null );
console.log(stage.getOrientation())
stage.setOrientation([
    [28.074999809265137,28.16999912261963,27.22000026702881],
    [38.041256212103626,4.000447687884037,-11.16747719008557],
    [-29.3665595756232,2.0906799525729096,11.365819960687398],
    [0,0,0]
]);
</code></pre>
<br>
<pre><code>
//component settings:
stage.loadFile( sysPath ).then( function( comp ){
    comp.setName();
    comp.setSelection();
    comp.addRepresentation();    //options: axes, ball+stick, backbone, base,
                                // cartoon, contact, distance, helixorient,
                                // licorice, hyperball, label, line surface,
                                // point, ribbon, rocket, rope, spacefill,
                                // trace, tube, unitcell
    comp.addTrajectory();
    comp.centerView();
    ...
} );
</code></pre>

<br>
<pre><code>
//options for adding representations:
comp.addRepresentation( "cartoon", { * } );
* = color: "#55eb86", sele: "*", visible: false, colorScheme: "element",
    colorValue: "blue", opacity: 0.5, wireframe: true, ...
</code></pre>
<p align=justify>For more see the representation choice within the viewer. Off note: use either color or colorScheme + colorValue.</p>
<br>
<pre><code>//representation examples
com.addRepresentation("label", {labelType: "text", labelText:  {65: "atom index 65"}})</code></pre>



<h1>
<a id="more" class="anchor" href="#more" aria-hidden="true"><span aria-hidden="true" class="octicon octicon-link"></span></a>More</h1>

<p>If you have question, feel free to use the
<a target="_blank" href="https://github.com/arose/mdsrv/issues">Issue Tracker</a> or write a mail to
<a href="mailto:johanna.tiemann@gmail.com">johanna.tiemann@gmail.com</a> or
<a href="mailto:alexander.rose@weirdbyte.de">alexander.rose@weirdbyte.de</a>.</p>

<p>Please give us <strong>feedback</strong>!</p>

    </div>
    </div>
    
<!-- FOOTER  -->
<?php include 'include/footer.php';?>




  </body>
</html>