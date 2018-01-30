      <?php
        if ($site_config["MIDDLENAV"]){
            middleblocks();
        } //MIDDLENAV ON/OFF END
      ?>
      <div id='credits'>
		<?php
        //
        // *************************************************************************************************************************************
        //			PLEASE DO NOT REMOVE THE POWERED BY LINE, SHOW SOME SUPPORT! WE WILL NOT SUPPORT ANYONE WHO HAS THIS LINE EDITED OR REMOVED!
        // *************************************************************************************************************************************
        print ("<CENTER>Powered by <a href=\"http://www.torrenttrader.org\" target=\"_blank\">TorrentTrader v".$site_config["ttversion"]."</a><br />");
        $totaltime = array_sum(explode(" ", microtime())) - $GLOBALS['tstart'];
        printf("Page generated in %f", $totaltime);
        print ("<br /><a href='rss.php'><img src='".$site_config["SITEURL"]."/images/icon_rss.gif' border='0' width='13' height='13' alt='' /> - <a href=rss.php?custom=1>Feed Info</a><br />Theme By: <a href=\"http://wolf-designs.com\" target=\"_blank\">Wolf-Designs</a></CENTER>");
        //
        // *************************************************************************************************************************************
        //			PLEASE DO NOT REMOVE THE POWERED BY LINE, SHOW SOME SUPPORT! WE WILL NOT SUPPORT ANYONE WHO HAS THIS LINE EDITED OR REMOVED!
        // *************************************************************************************************************************************
        //
        ?>
      </div>
      </div>
      <?php if ($site_config["RIGHTNAV"]){ ?>
      <aside class='tRow' id='rCol'>
      <?php rightblocks(); ?>
      </aside>
      <?php } ?>
    </div>
  </section>
</div>
</body>
</html>
