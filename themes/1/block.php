<?php
//BEGIN FRAME
function begin_frame($caption = "-", $align = "justify"){
    global $THEME, $site_config;
    print("<article class='myBlock'>
            <div class='myCaption'>$caption<span></span></div>
              <div class='myContent'>");
}


//END FRAME
function end_frame() {
    global $THEME, $site_config;
    print("</div>
          </article>");
}

//BEGIN BLOCK
function begin_block($caption = "-", $align = "justify"){
    global $THEME, $site_config;
    print("<article class='myBlock'>
            <div class='myCaption'>$caption<span></span></div>
              <div class='myContent'>");
}

//END BLOCK
function end_block(){
    global $THEME, $site_config;
    print("</div>
          </article>");
}

function begin_table(){
    print("<table align='center' cellpadding='0' cellspacing='0' class='ttable_headinner' width='100%'>\n");
}

function end_table()  {
    print("</table>\n");
}

function tr($x,$y,$noesc=0) {
    if ($noesc)
        $a = $y;
    else {
        $a = htmlspecialchars($y);
        $a = str_replace("\n", "<br />\n", $a);
    }
    print("<tr><td class='heading' valign='top' align='right'>$x</td><td valign='top' align=left>$a</td></tr>\n");
}
?>