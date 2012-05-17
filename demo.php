<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Simple PHP Pagination</title>
<?php include_once('./pages.class.php'); ?>

<style type="text/css">
body {
	font-size: 12px;
	font-family: Arial;
	line-hight: 1.7;
	background-color: rgb(240,240,240);
	width: 800px;
	padding: 0;
	margin: 0 auto;
	border: 5px solid rgb(84,90,123);
	border-top: 0;
	border-bottom: 0;
}

h1 {
	border: 0;
	margin: 0;
	padding: 10px;
	background-color: rgb(173,176,199);
	border-bottom: 2px solid rgb(84,90,123);
}

h2, h3 {
	margin: 0;
}

h2, h3 {
	padding: 10px;
	border-top: 1px dotted rgb(66,71,103);
	border-bottom: 1px dotted rgb(66,71,103);
	margin-top: 10px;
	margin-bottom: 10px;
}

h3 {
	margin: 10px;
}

div div {
	margin-left: 20px;
	margin-right: 15px;
}

#content {
	padding: 10px;
	background-color: rgb(211,211,215);
}

ul {
	margin-left: 0;
	padding-left: 0;
	display: inline;
} 

ul li {
	margin-left: 0;
	padding: 5px 5px;
	list-style: none;
	display: inline;
}

ul li strong {
	padding: 0 3px 0 3px;
	border-bottom: 3px solid #000;
}

.methods code {
	border: 1px solid #000;
	padding: 3px;
}

p {
	line-height: 1.7;
}

#copyright {
	font-size: 9px;
	text-align: center;
	padding: 10px;
	background-color: #ddd;
}
</style>
</head>
<body>
	<h1>PHP Pagination Made Easy</h1>
	<div id="content">
		<div>
			<p>This is a PHP pagination class for PHP that can be easily customized however you wish.</p>
		</div>

		<h2>Download</h2>
		<div>
			<a href="http://bible.ministrytalk.com/pagination/pagination.zip">Download</a> the PHP pages class for free.
		</div>

		<h2>Examples</h2>
		<h3>Example 1</h3>
		<div>
			<p>
			<ul>
				<?php
					$pages = new Pages();
					echo $pages->getPages(0, 60, '#');
				?>
			</ul>
			</p>
			<h4>Source</h4>
			<div class="source">
				<?php
					$test = '<?php'."\n\t".'$pages = new Pages();'."\n\t".'echo $pages->getPages(0, 60, \'#\');'."\n".'?>';
					echo highlight_string($test, true);
				?>
			</div>
		</div>
		<h3>Example 2</h3>
		<div>
			<p>
			<ul>
				<?php
					$pages = new Pages(50);
					$pages->firstlink = 'First';
					$pages->prevlink = 'Prev';
					$pages->nextlink = 'Next';
					$pages->lastlink = 'Last';
					echo $pages->getPages(500, 5000, '#');
				?>
			</ul>
			</p>
			<h4>Source</h4>
			<div class="source">
				<?php
					$test = '<?php'."\n\t".'$pages = new Pages(50);'."\n\t".'$pages->firstlink = \'First\';'."\n\t".'$pages->prevlink  = \'Prev\';'."\n\t".'$pages->nextlink  = \'Next\';'."\n\t".'$pages->lastlink  = \'Last\';'."\n\t".'echo $pages->getPages(500, 5000, \'#\');'."\n".'?>';
					echo highlight_string($test, true);
				?>
			</div>
		</div>
		<h3>Live Demo</h3>
		<div>
			<p>The following is a page that makes use of the pages class: <a href="http://bible.ministrytalk.com/#bibleid=kjv&input=love">bible.search</a></p>
		</div>
		<h2>Methods</h2>
		<h3>Creating the instance</h3>
		<div class="methods">
			<p><code>$pages = new Pages([$maxperpage, $maxpagelinks]);</code></p>
			<p><code>$maxperpage</code> is optional, the default is 30. This is the number of results per page and should coincide with your SQL LIMIT statement</p>
			<p><code>$maxpagelinks</code> is optional, the default is 10. This is the max number of pages to show per page.  For example, if there are 50 pages, only 10 will be shown.</p>
		</div>
		<h3>Creating the pages</h4>
		<div class="methods">
			<p><code>$pages->getPages($startpage, $numberofresults[, $link, debug]);</code></p>
			<p><code>$startpage</code> is required. This is result number you are on.</p>
			<p><code>$numberofresults</code> is required. This is the number of results returned.</p>
			<p><code>$link</code> is optional, but generally required unless you change <code>$pages->linkformat</code>. This should be the link to the next/previous pages, minus the number. For example, <code>index.php?start=</code>.
			<p><code>$debug</code> is optional, the default is <code>false</code>. A <code>true</code> value will show variables uses within the getPages method.</code>.
		</div>
		<h3>Optional Parameters</h3>
		<div class="methods">
			<p><code>$pages->linkformat</code>, default is <code><?php echo htmlentities('<li><a href="#pageslink#">#pagenumber#</a></li>'); ?></code>. #pagelinks# is replaced by the link. #pagenumber# is replaced by the page number.</p>
			<p><code>$pages->onpagenumber</code>, default is <code><?php echo htmlentities('<li><strong>#pagenumber#</strong></li>'); ?></code>. #pagenumber# is replaced by the page number you are currently on.</p>
			<p><code>$pages->seperator</code>, default is LF (<code>\n</code>)</p>
			<p><code>$pages->firstlink</code>, default is &lsaquo; (<code>&amp;lsaquo;</code>)</p>
			<p><code>$pages->prevlink</code>, default is &laquo; (<code>&amp;laquo;</code>)</p>
			<p><code>$pages->nextlink</code>, default is &rsaquo; (<code>&amp;rsaquo;</code>)</p>
			<p><code>$pages->lastlink</code>, default is &raquo; (<code>&amp;raquo;</code>)</p>
		</div>
	</div>
	<div id="copyright">
		&copy; 2008 <a href="http://www.justinosborne.com">Justin Osborne</a><br /><br />
		<!-- Creative Commons License -->
		<a href="http://creativecommons.org/licenses/LGPL/2.1/">
		<img alt="CC-GNU LGPL" border="0" src="http://creativecommons.org/images
		/public/cc-LGPL-a.png" /></a><br />
		This software is licenced under the <a href="<span>http://creativecommons.org/licenses/LGPL/2.1/</span>">CC-GNU <span>LGPL</span></a>.
		<!-- /Creative Commons License -->

		<!--

		<rdf:RDF xmlns="http://web.resource.org/cc/"
		    xmlns:dc="http://purl.org/dc/elements/1.1/"
		    xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#">
		<Work rdf:about="">
		   <license rdf:resource="http://creativecommons.org/licenses/LGPL/2.1/" />
		   <dc:type rdf:resource="http://purl.org/dc/dcmitype/Software" />
		</Work>

		<License rdf:about="http://creativecommons.org/licenses/LGPL/2.1/">
		<permits rdf:resource="http://web.resource.org/cc/Reproduction" />
		   <permits rdf:resource="http://web.resource.org/cc/Distribution" />
		   <requires rdf:resource="http://web.resource.org/cc/Notice" />
		   <permits rdf:resource="http://web.resource.org/cc/DerivativeWorks" />
		   <requires rdf:resource="http://web.resource.org/cc/ShareAlike" />
		   <requires rdf:resource="http://web.resource.org/cc/SourceCode" />
		</License>

		</rdf:RDF>

		-->
	</div>
	<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
	var pageTracker = _gat._getTracker("UA-1188045-6");
	pageTracker._initData();
	pageTracker._trackPageview();
	</script>
</body>
</html>