<!--#set var="more_meta" value="" --><!--#set var="page_title" value="freenode news" -->
<!--#set var="content_title" value="" --><!--#include file="include/header-mainlogos.shtml" -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php
	$sXML = file_get_contents("http://blog.freenode.net/feed/");
	if (empty($sXML))
		die("Cannot retrieve XML feed!");

	$oXML = new SimpleXMLElement($sXML);

	$oXML = simplexml_load_file("http://blog.freenode.net/feed/", "SimpleXMLElement", LIBXML_NOCDATA);

	// Yeah. Um, this is a bit gross.
	$ns = array
	(
		"content" => "http://purl.org/rss/1.0/modules/content/",
		"wfw" => "http://wellformedweb.org/CommentAPI/",
		"dc" => "http://purl.org/dc/elements/1.1/"
	);

	foreach ($oXML->channel->item as $oBlogPost)
	{
		// get data held in namespaces
		$sContent = $oBlogPost->children($ns['content']);
		//$wfw     = $oBlogPost->children($ns['wfw']);
		$sCreator      = $oBlogPost->children($ns['dc']);

		echo '<a href="' . $oBlogPost->link . '"><h3>' . $oBlogPost->title . '</h3></a>';
		echo $oBlogPost->pubDate . " by " . $sCreator;
		echo '<div>';
			echo $sContent;
		echo '</div>';

	}
?>


<!--#include file="include/trailer.shtml" -->

