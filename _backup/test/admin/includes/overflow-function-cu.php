<div class="overFlowBar">
<?php

if ($offset>=10) {
    $prevoffset=$offset-10;
    print "<a class=\"overFlow\" id=\"overflowPrev\" href=\"contactedEnquiries.php?offset=$prevoffset\">PREV</a> &nbsp; \n";
}

$pages=intval($numrows/$limit);

if ($numrows%$limit) {
    $pages++;
}

/*
for ($i=1;$i<=$pages;$i++) {
    $newoffset=$limit*($i-1);
    print "<a href=\"demo.php?offset=$newoffset\">$i</a> &nbsp; \n";
}
*/

if (!(($offset/$limit)>=$pages) && $pages!=1) {
    $newoffset=$offset+$limit;
    print "<a class=\"overFlow\" id=\"overflowNext\" href=\"contactedEnquiries.php?offset=$newoffset\">NEXT</a><p>\n";
}

?>
</div>