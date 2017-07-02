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
          <h1><a id="FAQ" class="anchor" target="_blank" href="#faq" aria-hidden="true"><span aria-hidden="true" class="octicon octicon-link"></span></a>FAQ</h1>

<h5>"import setuptools not found"</h5>
<p align=justify>Please install <a target="_blank" href="https://pip.pypa.io/en/stable/installing/">Pip</a> in order to install the MDsrv. It needs to be installed in advance to add underlying tools.</p>

<h5>How do I install the development version?</h5>
<p align=justify>Change within the terminal into the MDsrv repository. Execute <em>setup.py</em> with the <em>install</em> flag. If you want to see live changes of the code, link it by using the <em>develop</em> flag. Make sure that you have all needed rights.</p>

<pre><code>python setup.py install|develop
</code></pre>

<p align=justify>For further information, consult the <em>setuptools</em> <a target="_blank" href="http://setuptools.readthedocs.io/en/latest/setuptools.html#development-mode">documentation</a> .
</p>

<h5>Which browsers support NGL/WebGL?</h5>
<p align=justify>The NGL Viewer requires your browser to support WebGL. To see if your browser supports WebGL and what you might need to do to activate it, visit the <a target="_blank" href="https://get.webgl.org/">Get WebGL</a> page.</p>
<p align=justify>Generally, WebGL is available in recent browser versions of Mozilla Firefox (>29) or Google Chrome (>27). The Internet Explorer supports WebGL only since version 11. The Safari Browser since version 8 (though WebGL can be activated in earlier version: first enable the Develop menu in Safari’s Advanced preferences, then secondly in the now visible Develop menu enable WebGL).</p>
<p align=justify>See also <a target="_blank" href="https://www.khronos.org/webgl/wiki/BlacklistsAndWhitelists">this page</a> for details on which graphics card drivers are supported by the browsers.</p>

<h5>How to get a smoother appearance (using __WebGL draft extensions__)?</h5>
<p align=justify>For a smoother appearance of cylinders and spheres your browser needs to have the <strong>EXT_frag_depth</strong> extension available. The <a target="_blank" href="http://webglreport.com/">WebGL Report</a> should list the extension if active. If not, you can enable WebGL draft extensions in your browser following these instructions:</p>
<ul>
<li>Chrome: browse to <strong>about:flags</strong>, enable the <strong>Enable WebGL Draft Extensions</strong> option, then relaunch.</li>
<li>Firefox: browse to <strong>about:config</strong> and set <strong>webgl.enable-draft-extensions</strong> to <strong>true</strong>.</li>
<li>Safari: Currently, the <strong>EXT_frag_depth</strong> extension is not supported.</li>
<li>Internet Explorer: Currently, the <strong>EXT_frag_depth</strong> extension is not supported.</li>
</ul>







<h1>
<a id="more" class="anchor" href="#more" aria-hidden="true"><span aria-hidden="true" class="octicon octicon-link"></span></a>More</h1>

<p>If you have questions concerning the installation, feel free to use the
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
