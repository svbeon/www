<?php
  if ($_GET["type"] == "One time")
  {
    header ("Location: http://freenode.net/pdpc_onetime.shtml");
  }
  elseif ($_GET["type"] == "Monthly")
  {
    header ("Location: http://freenode.net/pdpc_monthly.shtml");
  }
  elseif ($_GET["type"] == "Yearly")
  {
    header ("Location: http://freenode.net/pdpc_yearly.shtml");
  }
  else
  {
    header ("Location: http://freenode.net/");
  }
?>
