<?php
/*   Simple Pagination - Pagination class for PHP
	Copyright (C) 2008 Justin Osborne, http://www.revolutionreality.com

	This library is free software; you can redistribute it and/or
	modify it under the terms of the GNU Library General Public
	License as published by the Free Software Foundation; either
	version 2 of the License, or (at your option) any later version.

	This library is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
	Library General Public License for more details.

	You should have received a copy of the GNU Library General Public
	License along with this library; if not, write to the Free
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	
	--------------------------------------------------------------------------

	For love is as strong as death, and its jealousy is as enduring as the
	grave. Love flashes like fire, the brightest kind of flame. Many waters
	cannot quench love; neither can rivers drown it. If a man tried to buy
	love with everything he owned, his offer would be utterly despised.
		—Song of Songs 8:6-7 NLT
*/

class Pages {
	private $maxperpage;
	private $maxpagelinks;

	public $linkformat = '<li><a href="#pageslink#">#pagenumber#</a></li>';
	public $onpageformat = '<li><strong>#pagenumber#</strong></li>';
	public $seperator = "\n";
	public $firstlink = '&lsaquo;';
	public $prevlink = '&laquo;';
	public $nextlink = '&rsaquo;';
	public $lastlink = '&raquo;';

	public function __construct($maxperpage = 30, $maxpagelinks = 10) {
		$this->maxperpage = $maxperpage;
		$this->maxpagelinks = $maxpagelinks;
	}

	public function getPages($startcount, $resultcount, $link = '', $debug = false) {
		if($startcount == 0) $startcount = 1;
		$numberofpages = ceil($resultcount/$this->maxperpage);
		$onpagenumber = ceil(($startcount+1)/$this->maxperpage);
		if($numberofpages == 0) $numberofpages = 1;
		if($startcount > $resultcount) $startcount = 1;

		$middlepagelink = ceil($this->maxpagelinks/2);

		$startpagelinks = $onpagenumber-$middlepagelink;
		$endpagelinks = $onpagenumber+$middlepagelink;
		if($startpagelinks < 1) $startpagelinks = 1;
		if($endpagelinks > $numberofpages) $endpagelinks = $numberofpages;

		if(($startpagelinks + $endpagelinks) < $this->maxpagelinks) {
			if($startpagelinks != 1) $startpagelinks = ($startpagelinks + $endpagelinks)-$this->maxpagelinks;
			elseif($endpagelinks != $numberofpages) $endpagelinks = ($endpagelinks-$startpagelinks)+$middlepagelink;

			if($startpagelinks < 1) $startpagelinks = 1;
			if($endpagelinks > $numberofpages) $endpagelinks = $numberofpages;
		}

		$pages = array();

		if($startpagelinks > 1) $pages[] = str_replace('#pageslink#', ($link.'0'), str_replace('#pagenumber#', $this->firstlink, $this->linkformat));
		if($onpagenumber > 1) $pages[] = str_replace('#pageslink#', ($link.(($onpagenumber-2)*$this->maxperpage)), str_replace('#pagenumber#', $this->prevlink, $this->linkformat));

		for($x = $startpagelinks; $x <= $endpagelinks; ++$x) {
			$pagelink = $link.(($x-1)*$this->maxperpage);

			if($x == $onpagenumber) $pages[] = str_replace('#pagenumber#', $x, $this->onpageformat);
				else $pages[] = str_replace('#pageslink#', $pagelink, str_replace('#pagenumber#', $x, $this->linkformat));
		}

		if($onpagenumber < $endpagelinks) $pages[] = str_replace('#pageslink#', ($link.(($onpagenumber)*$this->maxperpage)), str_replace('#pagenumber#', $this->nextlink, $this->linkformat));
		if($endpagelinks < $numberofpages) $pages[] = str_replace('#pageslink#', ($link.(($numberofpages-1)*$this->maxperpage)), str_replace('#pagenumber#', $this->lastlink, $this->linkformat));

		$pages = implode($this->seperator,$pages);

		if($debug) {
			$list = "maxperpage: $this->maxperpage <br />startcount: $startcount<br />resultcount: $resultcount<br />onpagenumber: $onpagenumber<br />numberofpages: $numberofpages<br />pagelinks: $pages<br />start: $startpagelinks<br />end: $endpagelinks";
			echo("$list");
		}

		return($pages);
	}
}
?>