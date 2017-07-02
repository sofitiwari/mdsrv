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








<h1><a id="local" class="anchor" href="#local" aria-hidden="true"><span aria-hidden="true" class="octicon octicon-link"></span></a>RESTful API</h1>

<p align=justify>The RESTful API is the interface through which the web application gets all data but it may be also used to access the served trajectory data from other applications.</p>

<h2>File content</h2>

<p align=justify>To retrieve a file from <strong>data_dir</strong> <strong>&ltroot&gt</strong> with file path <strong>&ltfilename&gt</strong> call:</p>

<pre><code>/file/&ltroot&gt/&ltfilename&gt</code></pre>


<h2>Directory content description</h2>

<p align=justify>To get a JSON description of available <strong>data_dir</strong> directories call:</p>
<pre><code>/dir/</code></pre>
To get a JSON description of the directory content in <strong>data_dir</strong> <strong>&ltroot&gt</strong> call:
<pre><code>/dir/&ltroot&gt/</code></pre>
To get a JSON description of the directory content in <strong>data_dir</strong> <strong>&ltroot&gt</strong> at path <strong>&ltpath&gt</strong> call:
<pre><code>/dir/&ltroot&gt/&ltpath&gt</code></pre>
The JSON description is a list of file or sub-directory entries:
<pre><code>
[
    {
        "name": "name of sub-directory",
        "path": "path relative to <strong>&ltroot&gt</strong>",
        "dir": "<strong>true</strong> if entry is a directory",
        "restricted": "<strong>true</strong> if access is restricted"
    },
    {
        "name": "name of the file",
        "path": "path relative to <strong>&ltroot&gt</strong>",
        "size": "file size in bytes"
    },
    {
        ...
    }
]
</code></pre>

<h2>Frame count</h2>
To get the number of frames the trajectory in <strong>data_dir</strong> <strong>&ltroot&gt</strong> with file path <strong>&ltfilename&gt</strong> has call:
<pre><code>/traj/numframes/&ltroot&gt/&ltfilename&gt</code></pre>


<h2>Frame coordinates</h2>
To get the coordinates of frame number <strong>&ltframe&gt</strong> of the trajectory in <strong>data_dir</strong> <strong>&ltroot&gt</strong> with file path <strong>&ltfilename&gt</strong> call:

<pre><code>/traj/frame/&ltframe&gt/&ltroot&gt/&ltfilename></code></pre>


The set of atoms for which coordinates should be returned can be restricted by <strong>POST</strong>ing an <strong>atomIndices</strong> parameter with the following format. A list of index ranges is defined by pairs of integers separated by semi-colons (<strong>;</strong>) where the two integers within a pair are separated by a comma (<strong>,</strong>). To select atoms with indices (starting at zero) 5 to 10 and 22 to 30 send:

    5,10;22,30


The coordinate frame is returned in binary format and also contains the frame number, the simulation time (when available) and the box vectors.
<pre><code>| Offset | Size |  Type | Description                  |
| -----: | ---: | ----: | :--------------------------- |
|      0 |    4 |   int | frame number                 |
|      4 |    4 | float | simulation time              |
|      8 |    4 | float | X coordinate of box vector A |
|     12 |    4 | float | Y                            |
|     16 |    4 | float | Z                            |
|     20 |    4 | float | X coordinate of box vector B |
|     24 |    4 | float | Y                            |
|     28 |    4 | float | Z                            |
|     32 |    4 | float | X coordinate of box vector C |
|     36 |    4 | float | Y                            |
|     40 |    4 | float | Z                            |
|     44 |    4 | float | X coordinate of first atom   |
|     48 |    4 | float | Y                            |
|     52 |    4 | float | Z                            |
|    ... |  ... |   ... | ...                          |
</code></pre>




<h1><a id="more" class="anchor" href="#more" aria-hidden="true"><span aria-hidden="true" class="octicon octicon-link"></span></a>More</h1>

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

