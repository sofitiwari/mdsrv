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
<h4>Why deploying the MDsrv?</h4>

<p align=justify>In order to add the MDsrv into your daily research, deploy and configure it to your system and your settings. The advantage is that you can add project folders permanently, including their security settings. By setting up an apache server (locally on your machine or global on a webserver), you are able to share your sessions and files with colleagues within the same network, collaborators or reviewers. Additionally, you can add a link to your cluster and inspect your unprocessed simulations remotely.</p>

<h4>Requirements for Linux and Mac OS</h4>

<p align=justify>To serve MDsrv as an <a target="_blank" href="http://httpd.apache.org/">Apache</a> Webserver via <a target="_blank" href="https://modwsgi.readthedocs.org">mod_wsgi</a>, install apache2 and libapache2-mod-wsgi to your system.</p>

<pre><code>sudo apt-get install apache2 libapache2-mod-wsgi
</code></pre>

<p align=justify>Support for Windows is currently under development.</p>

<h1>
<a id="deployment" class="anchor" href="#deployment" aria-hidden="true"><span aria-hidden="true" class="octicon octicon-link"></span></a>Deployment</h1>

<p align=justify>To deploy the MDsrv, just follow these 5 steps.</p>
<ol><li>
 <p align=justify>Add the content of <a target="_blank" href="data/apache.config">apache.config</a> into <em>/etc/apache2/sites-available/000-default.conf</em> or replace this file.</p>
 <img src="data/config.png" width=100% alt="apache configuration file">
  <p align=justify><strong>Important:</strong> Adjust the <em>user</em> and <em>group</em> according to your environment settings (e.g. local installation on a pc (nickname@pc) with <em>user=nickname</em> and <em>group=nickname</em>) so that the wsgi process can run with the specified <em>user</em> & <em>group</em>. Make also sure that the files and directories you want to serve are accessible with that user & group combination.
 For further information on <em>apache.config</em>, please consult the <a target="_blank" href="https://httpd.apache.org/docs/2.4/en/">documentation</a>.</p>
</li><li>
<p>Copy <a target="_blank" href="data/mdsrv.html">mdsrv.html</a> into the folder <em>/var/www/html/</em>.</p>
</li><li>
<p align=justify>Download the configuration file <a target="_blank" href="data/app.cfg">app.cfg</a> and save it within a secure directory (e.g. not within <em>/var/www/hmtl/</em>). Here, you can change the host and port, the list of directories where you store your structure and trajectory files (<em>DATA_DIRS</em>) and the security settings. The content and setting is explained <a href="configuration.html">elsewhere</a>.</p>
</li><li>
<p align=justify>Whenever the <a target="_blank" href="data/app.cfg">app.cfg</a> file is changed, the apache server has to be restarted. If content within the directories is changed, a restart is not necessary. To restart execute

<pre><code>sudo /etc/init.d/apache2 restart
</code></pre> or <pre><code>sudo service apache2 restart
</code></pre>
</p></li><li>
<p align=justify>Generate a folder mdsrv in <em>/var/www/</em> and place <a target="_blank" href="data/mdsrv.wsgi">mdsrv.wsgi</a> into this folder (<em>/var/www/mdsrv/mdsrv.wsgi</em>). Add the path of the configuration file (<a target="_blank" href="data/app.cfg">app.cfg</a>) into the <a target="_blank" href="data/mdsrv.wsgi">mdsrv.wsgi</a> file including the name of the file (<em>APP_CFG = '/home/nickname/important/app.cfg'</em>). Restart now the apache server.</p>
</li>
</ol>
<p align=justify>The MDsrv with the structures and trajectories within the defined folder can be reached at <em>http://localhost/mdsrv.html</em> by loading a structure via "File -> Import" and adding afterwards the trajectory within the structure menu by selecting "Remote trajectory - import".</p>

<h1>
<a id="server" class="anchor" href="#server" aria-hidden="true"><span aria-hidden="true" class="octicon octicon-link"></span></a>Webserver setup</h1>

<p align=justify>Setting up a computer as a webserver can be done easily. In the following, we will explain how to do this on a Linux OS and within <em>amazon web services</em>.</p>

<h2><a id="LinuxServer" class="anchor" href="#LinuxServer" aria-hidden="true"><span aria-hidden="true" class="octicon octicon-link"></span></a>Linux web-service setup</h2>

<h4><a id="server_requirements" class="anchor" href="#server_requirements" aria-hidden="true"><span aria-hidden="true" class="octicon octicon-link"></span></a>Requirements</h4>
<ul><li>
	<p align=justify><strong>Domain:</strong> In order to make your webside accessible via the world wide web, you need to own a domain name. Paid and non-paid web hosting services are available with different limits on usage. Your domain hosting service will connect your domain name with your local webserver by redirecting the domain name to your web page.</p>
</li>
<li>
	<p align=justify><strong>Webserver system requirements:</strong>To run MDsrv, you do not need a high-end computer, standard hardware works. Note that the computer will run continuosly, so you might consider to get a hard drive for server usage. Your hard drive space should be huge enough for your simulations.</p>
</li></ul>

<h4><a id="server_linux" class="anchor" href="#server_linux" aria-hidden="true"><span aria-hidden="true" class="octicon octicon-link"></span></a>Linux web-service setup</h4>
<p align=justify>Here we describe a minimal way to set up a Linux web-service. We do not provide a guide to set up your own server with several functions but will help you to make your simulations accessible with MDsrv. For more details, optimization and different functions, please consult a documentation as <em>"The Accidental Administrator: Linux server Step-by-Step configuration Guide"</em> by <em>Don R. Crawley</em>. </p>
<ol><li>
	<p align=justify><strong>Install a Linux OS on your machine</strong></p>
</li><li>
	<p align=justify><strong>Install Apache</strong></p>
	<pre><code>sudo apt-get update</code><code>sudo apt-get install apache2</code></pre>
</li><li>
	<p align=justify><strong>MDsrv setup: </strong> Deploy the MDsrv as described above.</p>
</li><li>
	<p align=justify><strong>Get your IP address</strong></p>
	<pre><code>hostname -I</code></pre>
</li><li>
	<p align=justify><strong>Set up your local hosts file:</strong> Edit your local host file located at <em>/etc/hosts</em> by adding the following lines, where the first part is your IP address (e.g. <em>144.42.XXX.44</em>) and the second your host adress (e.g. <em>example-page.com</em>):</p>
	<pre><code>144.42.XXX.44   example-page.com</code></pre>
</li><li>
	<p align=justify><strong>Restart the Apache Server</strong></p>
	<pre><code>sudo service apache2 restart</code></pre>
</li><li>
	<p align=justify><strong>Host redirection:</strong> Add a redirection to your IP adress at the host service.</p>
</li></ol>


<h2><a id="AmazonServer" class="anchor" href="#AmazonServer" aria-hidden="true"><span aria-hidden="true" class="octicon octicon-link"></span></a>Amazon Web Server setup</h2>

<p align=justify><strong>Under development: </strong>We are currently creating a script for a semi-automated setup of MDsrv on an <em>Amazon Web Server</em>. Content will follow soon!</p>


<h1>
<a id="more" class="anchor" href="#more" aria-hidden="true"><span aria-hidden="true" class="octicon octicon-link"></span></a>More</h1>

<p>If you have questions, feel free to use the
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