<?php
session_start();
?>
<!--#set var="more_meta" value="" --><!--#set var="page_title" value="freenode: Group Registration Form" --><!--#set var="content_title" value="Group Registration Form" --><!--#include file="include/header-mainlogos.shtml" -->
<script src="static/javascript/wz_tooltip/wz_tooltip.js" type="text/javascript"></script>
<script src="static/javascript/SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="static/javascript/SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function showinfo()
{
	fngmstabs.showPanel(0);
}
function showgroup()
{
	fngmstabs.showPanel(1);
}
function showreq()
{
	fngmstabs.showPanel(2);
}
function showconf()
{
	fngmstabs.showPanel(3);
}

function updatereqform(x)
{
  var reqform = document.getElementById(x);
  if (reqform.value == 'primary')
  {
	document.getElementById('alternate-options').style.display = 'none';
	document.getElementById('replacement-options1').style.display = 'none';
	document.getElementById('replacement-options2').style.display = 'none';
  }
  else if (reqform.value == 'alternate')
  {
    document.getElementById('alternate-options').style.display = '';
	document.getElementById('replacement-options1').style.display = 'none';
	document.getElementById('replacement-options2').style.display = 'none';
  }
  else if (reqform.value == 'replacement')
  {
  	document.getElementById('alternate-options').style.display = 'none';
	document.getElementById('replacement-options1').style.display = '';
	document.getElementById('replacement-options2').style.display = '';
  }
}

function groupaddress(x)
{
  var groupaddressyn = document.getElementById(x);
  if (groupaddressyn.value == 'y')
  {
  	document.getElementById('nogroupaddress').style.display = 'none';
	document.getElementById('groupaddress1').style.display = '';
	document.getElementById('groupaddress2').style.display = '';
	document.getElementById('groupaddress3').style.display = '';
	document.getElementById('groupaddress4').style.display = '';
	document.getElementById('groupaddress5').style.display = '';
	document.getElementById('groupaddress6').style.display = '';
	document.getElementById('groupaddress7').style.display = '';
  }
  else if (groupaddressyn.value == 'n')
  {
	document.getElementById('nogroupaddress').style.display = '';
	document.getElementById('groupaddress1').style.display = 'none';
	document.getElementById('groupaddress2').style.display = 'none';
	document.getElementById('groupaddress3').style.display = 'none';
	document.getElementById('groupaddress4').style.display = 'none';
	document.getElementById('groupaddress5').style.display = 'none';
	document.getElementById('groupaddress6').style.display = 'none';
	document.getElementById('groupaddress7').style.display = 'none';
  }
}

function linkinfo(x)
{
  var linkyn = document.getElementById(x);
  if (linkyn.value == 'y')
  {
  	document.getElementById('linkinfo1').style.display = '';
	document.getElementById('linkinfo2').style.display = '';
  }
  else if (linkyn.value == 'n')
  {
	document.getElementById('linkinfo1').style.display = 'none';
	document.getElementById('linkinfo2').style.display = 'none';
  }
}
</script>

<?php
/*
 * Copyright (c) 2008-2009 Robin Burchell <w00t@inspircd.org>
 * Copyright (c) 2008-2009 Paul Williams <paul@skenmy.com>
 * Copyright (c) 2008-2009 PDPC & freenode <code@freenode.net>
 *
 * Form for registration of a group.
 */

$sRet = "";

/* Create an empty list of errors with the registration. */
$aErrors = array();

// Some weird escaping. The original form had this, so I will keep it.
function e($sStr)
{
    return addcslashes($sStr, "\0..\11\13\14\16..\037");
}

function man($sField, $iMin = 2, $iMax = 30, $sRegex = "")
{
	if (!isset($_POST[$sField]))
		return false;

	return opt($sField, $iMin, $iMax, $sRegex);
}

function opt($sField, $iMin = 2, $iMax = 30, $sRegex = "")
{
	if (strlen($_POST[$sField]) < $iMin || strlen($_POST[$sField]) > $iMax)
		return false;

	if ($sRegex && preg_match($sRegex, $_POST[$sField]))
	{
		mail("christel@freenode.net", "regex validation for field " . $sField . " failed", "regex: " . $sRegex . "value: " . e($_POST[$sField]));
		return false;
	}

	return true;
}

function g($sField)
{
	if (isset($_POST[$sField]))
		return htmlentities($_POST[$sField]);
	
	return "";
}

if (isset($_POST['group-name']))
{
        require_once('recaptchalib.php');
        $privatekey = "6LeMhLoSAAAAAHmqTDtLoGhe-q-YQraTYKuoVNmg";
        $recaptcharesp = recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

        if (!$recaptcharesp->is_valid  )
	{
		$aErrors[] = "You provided an incorrect captcha. Captchas are unfortunately necessary to prevent spam and automated registrations.";
	}
}

if (isset($_POST['group-name']) && empty($aErrors))
{
	/* Assume someone is attempting to register a new group. */

	/* First, for ease of use, and to make sure we validate things, get stuff *out* of the POST array. */
	if (!man("group-name", 2, 50, ""))
	{
		$aErrors[] = "Your group name must be between 2 and 50 characters";
	}

	if (!man("group-url", 2, 50, "/[^a-z0-9:\/~.-]/i"))
	{
		$aErrors[] = "Your group URL must be between 2 and 50 characters, and be comprised of sensible characters only.";
	}

	if (!man("channel-namespace", 2, 50, "/^##?\[a-Z0-9\-_\.]+\,?$/i"))
	{
		$aErrors[] = "Your channel namespace must be a list of channel masks between 2 and 50 characters, and be comprised of alphanumeric characters (and -_.) only.";
	}

	if ($_POST['channel-namespace'][0] == '#' && $_POST['channel-namespace'][1] == '#')
	{
		$aErrors[] = "Group requests for channels in the about namespace (##) are not currently being accepted, due to a large backlog of requests. Sorry for the inconvenience!";
	}

	if (!man("requestor-name", 5, 50, "/[^a-z0-9\'\.]\s/i"))
	{
		$aErrors[] = "Your name must be between 5 and 50 characters, and be comprised of alphanumeric characters only.";
	}

	if (!man("requestor-nickname", 1, 16, "/[^a-z0-9\_\`\[\]\{\}-]/i"))
	{
		$aErrors[] = "Your nickname must be between 1 and 16 characters, and contain valid nickname characters only.";
	}

	if (!man("requestor-role", 5, 50, "/[^a-z0-9\'\s]/i"))
	{
		$aErrors[] = "Your role in the project must be between 5 and 50 characters, and be comprised of alphanumeric characters only.";
	}

        if (!man("requestor-contact1", 7, 50, "/[^0-9\s\(\)\+-]/i"))
        {
                $aErrors[] = "Your contact number doesn't look like a valid international telephone number.";
        }

#	if (!man("requestor-address1", 5, 50, "/[^a-z0-9\'\s\.\,]/i"))
#	{
#		$aErrors[] = "Your address must be between 5 and 50 characters, and be comprised of alphanumeric characters only.";
#	}

#	if (!man("requestor-city", 3, 50, "/[^a-z0-9\'\sé]/i"))
#	{
#		$aErrors[] = "Your city must be between 3 and 50 characters, and be comprised of alphanumeric characters only.";
#	}

#	if (!man("requestor-country", 3, 50, "/[^a-z0-9\'\s]/i"))
#	{
#		$aErrors[] = "Your country must be between 3 and 50 characters, and be comprised of alphanumeric characters only.";
#	}




	if (!count($aErrors))
	{
		/* No errors - let's register! */
		$sRequestorName = $_POST['requestor-name'];
		$sRequestorNick = $_POST['requestor-nickname'];
		$sRequestorEmail = $_POST['requestor-email'];
		$sGroupURL = $_POST['group-url'];
		
		$aMails = array
		(
			"gc606438@freenode.net",
			"christel@freenode.net",
		);

		$subject = 'freenode Group Registration: '.e($_POST['group-name']);

		// Generate message
		$sMsg = "";
		foreach ($_POST as $sKey => $sValue)
		{
			$sMsg .= $sKey . ": " . $sValue . "\n";
		}
		$message = e($sMsg);
		$headers = 'From: freenode Group Registration System <groups@freenode.net>' . "\r\n";

		foreach ($aMails as $sMail)
			mail($sMail, $subject, $message, $headers);
		
		echo "<p>Your group has been registered successfully, and is now in the moderation queue for review by freenode staff. Please be patient, as approval may take some time.</p>";
	}
}

if (count($aErrors))
{
	echo '<div style="border: 1px solid red;">';
	echo "There were some problems with processing your group registration. Please address them and try again:";
	echo "<ul>";

	foreach ($aErrors as $sError)
	{
		echo "<li>" . $sError . "</li>";
	}

	echo "</ul></div>";
}

?>
<p>
  Please use this form to enter a freenode contact record for your
  organization and/or projects.  Make sure you're read the

  <a href="group_registration.shtml">explanation</a>

  of group registration.  Provide as much information as you can, to help us
  research your application to make sure your status as contact is
  sanctioned officially by your project or group. We keep your contact
  information private in accordance with our

  <a href="group_privacy.shtml">privacy policy</a>.
</p>

<form class="none" action="group_registration_form.php" method="post" style="width:100%; font-size:12px;">
    <div id="fngmstabs" class="TabbedPanels" style="width:100%;">
      <ul class="TabbedPanelsTabGroup">
        <li class="TabbedPanelsTab" tabindex="0" style="font-size: 12px;">Request Type</li>
        <li class="TabbedPanelsTab" tabindex="0" style="font-size: 12px;">Group Information</li>
        <li class="TabbedPanelsTab" tabindex="0" style="font-size: 12px;">Requestor Information</li>
        <li class="TabbedPanelsTab" tabindex="0" style="font-size: 12px;">Confirmation</li>
      </ul>
      <div class="TabbedPanelsContentGroup" style="width:100%;">
        <div class="TabbedPanelsContent" style="width:100%;">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="4%">&nbsp;</td>
              <td width="30%"><div align="right"><strong>
                <label for="request-type">Request Type</label>
              </strong></div></td>
              <td width="2%">&nbsp;</td>
              <td width="58%">
                <div align="left">
                  <select name="request-type" id="request-type" onchange="updatereqform(this.id)">
                    <option value="primary" selected="selected">Primary</option>
                    <option value="alternate">Alternate</option>
                    <option value="replacement">Replacement</option>
                  </select>
		<img src="/static/images/info.gif"
		onmouseover="Tip('\
      <b>Primary</b><br />\
      To register a new group, select this option.<br />\
      Please note that when registering\
      a new group, you will be listed as the primary contact,<br />\
      so ensure that you may represent your project in this way.<br /><br />\
      <b>Alternate</b><br />\
      If your group is already registered, and you are filing as an additional contact\
      for your group,<br />\
      please select this option.<br /><br />\
      <b>Replacement</b><br />\
      If your group is already registered, but your filed contacts have lost touch,<br />\
      please select this option to file a request to take over the group.')"
      onmouseout="UnTip()" />
                </div></td>
              <td width="6%">&nbsp;</td>
            </tr>
            <tr id="alternate-options">
              <td>&nbsp;</td>
              <td><div align="right"><strong>
                <label for="approved-by">Approved By</label>
              </strong></div></td>
              <td>&nbsp;</td>
              <td>
                <div align="left">
                  <input name="approved-by" type="text" id="approved-by" size="48" value="<?php echo g('approved-by'); ?>" />
		<img src="static/images/info.gif"
		onmouseover="Tip('\
      <b>Approved By</b><br />\
      List the individual(s) or committee approving the contact person.<br />\
      If you\'re the person approving the contact, this is your name.<br />\
      If you\'re approving yourself as contact, specify <i>self</i>.')" onmouseout="UnTip()" />
                </div>
		</td>
              <td>&nbsp;</td>
            </tr>
            <tr id="replacement-options1">
              <td>&nbsp;</td>
              <td><div align="right"><strong>
                <label for="replacing">Replacing (name of previous contact)</label>
              </strong></div></td>
              <td>&nbsp;</td>
              <td>
                <div align="left">
                  <input name="replacing" type="text" id="replacing" size="48" value="<?php echo g('replacing'); ?>" />
		<img src="/static/images/info.gif"
		onmouseover="Tip('\
      <b>Replacing</b><br />\
      This should be the name of the contact that you are replacing for this group.')"
      onmouseout="UnTip()" />
                </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr id="replacement-options2">
              <td>&nbsp;</td>
              <td><div align="right"><strong>
                <label for="replace-reference">Reference</label>
              </strong></div></td>
              <td>&nbsp;</td>
              <td>
                <div align="left">
                  <input type="text" name="replace-reference" id="replace-reference" size="48" value="<?php echo g('replace-reference'); ?>" />
		<img src="/static/images/info.gif"
		onmouseover="Tip('\
      <b>Reference</b><br />\
      If you are replacing a group contact, you will have spoken<br />\
      to freenode staff already and been given a reference token to use in<br />\
      this field, if you have not -- please visit #freenode and speak to a<br />\
      staffer before filling in the rest of the form.<br /><br />\
      \
      This token will allow us to fast-track your form and ensure that the group<br />\
      details are changed quickly.')"
      onmouseout="UnTip()" />
                </div>
		</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="5"><div align="center">
                <input type="button" name="reqinfo-back" id="reqinfo-back" value="Back" disabled="disabled" />&nbsp;
                 <input type="button" name="reqinfo-next" id="reqinfo-next" value="Next" onclick="showgroup()" />
              </div></td>
            </tr>
          </table>
        </div>
        <div class="TabbedPanelsContent">
          <table width="100%" border="0" cellpadding="1" cellspacing="0">
            <tr>
              <td width="4%">&nbsp;</td>
              <td width="30%"><div align="right"><strong><label for="group-type">Group Type</label></strong></div></td>
              <td width="2%">&nbsp;</td>
              <td width="58%"><div align="left">
                <select name="group-type" id="group-type">
                  <option value="informal" selected="selected">Informal Group</option>
                  <option value="corporation">Corporation / Business entity</option>
                  <option value="education">Educational Institution</option>
                  <option value="government">Governmental Entity</option>
                  <option value="nfp">Not-for-profit / Charitable Organisation</option>
                  <option value="internal">Internal Group</option>
                </select>
		<img src="/static/images/info.gif"
		onmouseover="Tip('\
      <b>Informal Group</b><br />\
      The majority of registrations will be an informal group.<br />\
      Select this if your group is not associated with a legal entity in any way.<br /><br />\
      \
      <b>Internal Group</b><br />\
      Select this option if your group is not public, and part of a larger internal organisation<br />\
      like a university association.')"
      onmouseout="UnTip()" />
              </div></td>
              <td width="6%">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right"><strong><label for="we-are-a">We are a</label></strong></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <select name="we-are-a" id="we-are-a">
                  <option value="single">Single, discrete group</option>
                  <option value="consortium">Consortium or intergroup</option>
                </select>
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><div align="left"></div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right"><strong><label for="group-name">Group Name</label></strong></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <input name="group-name" type="text" id="group-name" size="48" maxlength="30" value="<?php echo g('group-name'); ?>" />
		<img src="/static/images/info.gif"
		onmouseover="Tip('\
      <b>Group Name</b><br />\
      The name of your group.\
      ')"
      onmouseout="UnTip()" />
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right"><strong><label for="group-url">Group URL</label></strong></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <input name="group-url" type="text" id="group-url" value="<?php echo g('group-url'); ?>" size="48" />
		<img src="/static/images/info.gif"
		onmouseover="Tip('\
      <b>Group URL</b><br />\
      The public website of your group. This will be used to help identify your claim to the group,<br />\
      and to make sure your group request is on topic for freenode.\
      ')"
      onmouseout="UnTip()" />
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right"><strong><label for="channel-namespace">Channel Namespace</label></strong></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <input name="channel-namespace" type="text" id="channel-namespace" value="<?php echo g('channel-namespace'); ?>" size="48" />
		<img src="/static/images/info.gif"
		onmouseover="Tip('\
      <b>Channel Namespace</b><br />\
      The channels which your group request to be reserved.<br />\
      This should be specified as a list of channel names or masks seperated by a comma.<br />\
      A channel mask is one which covers a group of channels, for example #freenode-* would cover<br />\
      all channels starting with #freenode-, such as #freenode-help, #freenode-dev, et cetera.<br /><br />\
      \
      Don\'t claim too broad a range of channels, or your application may be denied.\
      ')"
      onmouseout="UnTip()" />
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right"></div></td>
              <td>&nbsp;</td>
              <td><div align="left"></div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right"><strong><label for="registered-address-q">Does the group have a registered / postal address?</label></strong></div></td>
              <td>&nbsp;</td>
              <td><p align="left">
                <label>
                  <input type="radio" name="registered-address-q" value="y" id="registered-address-q_0" onchange="groupaddress(this.id)" />
                  Yes</label>
		<img src="/static/images/info.gif"
		onmouseover="Tip('\
      <b>Group Address</b><br />\
      This is the registered location of your group.<br />\
      If you are an informal group, you probably won\'t have a registered address.\
      ')"
      onmouseout="UnTip()" />
                <br />
                <label>
                  <input name="registered-address-q" type="radio" id="registered-address-q_1" onchange="groupaddress(this.id)" value="n" checked="checked" />
                  No</label>
                <br />
              </p></td>
              <td>&nbsp;</td>
            </tr>
            <tr id="nogroupaddress">
              <td>&nbsp;</td>
              <td><div align="right"></div></td>
              <td>&nbsp;</td>
              <td><div align="left"><em>Please note that the Requestor details will be used as a contact point if the Group does not have a registered / postal address.</em></div></td>
              <td>&nbsp;</td>
            </tr>
            <tr id="groupaddress1">
              <td>&nbsp;</td>
              <td><div align="right"><strong><label for="group-address1">Group Address 1</label></strong></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <input name="group-address1" type="text" id="group-address1" size="48" value="<?php echo g('group-address1'); ?>" />
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr id="groupaddress2">
              <td>&nbsp;</td>
              <td><div align="right"><strong><label for="group-address2">Group Address 2</label></strong></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <input name="group-address2" type="text" id="group-address2" size="48" value="<?php echo g('group-address2'); ?>" />
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr id="groupaddress3">
              <td>&nbsp;</td>
              <td><div align="right"><strong><label for="group-address3">Group Address 3</label></strong></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <input name="group-address3" type="text" id="group-address3" size="48" value="<?php echo g('group-address3'); ?>" />
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr id="groupaddress4">
              <td>&nbsp;</td>
              <td><div align="right"><strong><label for="group-city">City</label></strong></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <input name="group-city" type="text" id="group-city" size="48" value="<?php echo g('group-city'); ?>" />
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr id="groupaddress5">
              <td>&nbsp;</td>
              <td><div align="right"><strong><label for="group-state">State / Province</label></strong></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <input name="group-state" type="text" id="group-state" size="48" value="<?php echo g('group-state'); ?>" />
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr id="groupaddress6">
              <td>&nbsp;</td>
              <td><div align="right"><strong><label for="group-zip">Postal / ZIP Code</label></strong></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <input name="group-zip" type="text" id="group-zip" size="48" value="<?php echo g('group-zip'); ?>" />
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr id="groupaddress7">
              <td>&nbsp;</td>
              <td><div align="right"><strong><label for="group-country">Country</label></strong></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <input name="group-country" type="text" id="group-country" size="48" value="<?php echo g('group-country'); ?>" />
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right"></div></td>
              <td>&nbsp;</td>
              <td><div align="left"></div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right"><label for="project-name">Project Name (if different to Group Name)</label></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <input name="project-name" type="text" id="project-name" size="48" value="<?php echo g('project-name'); ?>" />
		<img src="/static/images/info.gif"
		onmouseover="Tip('\
      <b>Project Name</b><br />\
      If your group involves more than one project (for example, KDE),<br />\
      then you may specify which project you are registering here.\
      ')"
      onmouseout="UnTip()" />
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right"><label for="project-url">Project URL (if different to Group URL)</label></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <input name="project-url" type="text" id="project-url" value="<?php echo g('project-url'); ?>" size="48" />
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="5"><div align="center">
                <input type="button" name="groupinfo-back" id="groupinfo-back" value="Back" onclick="showinfo()" />&nbsp;
                <input type="button" name="groupinfo-next" id="groupinfo-next" value="Next" onclick="showreq()" />
              </div></td>
            </tr>
          </table>
        </div>
        <div class="TabbedPanelsContent">
          <table width="100%" border="0" cellpadding="1" cellspacing="0">
            <tr>
              <td width="4%">&nbsp;</td>
              <td width="30%"><div align="right"><strong><label for="requestor-name">Your Name</label></strong></div></td>
              <td width="2%">&nbsp;</td>
              <td width="58%"><div align="left">
                <input name="requestor-name" type="text" id="requestor-name" size="48" value="<?php echo g('requestor-name'); ?>" />
		<img src="/static/images/info.gif"
		onmouseover="Tip('\
      <b>Requestor Name</b><br />\
      Your first (and last) name.\
      ')"
      onmouseout="UnTip()" />
              </div></td>
              <td width="6%">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right"><strong><label for="requestor-nickname">Your NickServ Account Name</label></strong></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <input name="requestor-nickname" type="text" id="requestor-nickname" size="48" value="<?php echo g('requestor-nickname'); ?>" />
		<img src="/static/images/info.gif"
		onmouseover="Tip('\
      <b>Requestor Nickname</b><br />\
      Your registered account on freenode IRC.\
      ')"
      onmouseout="UnTip()" />
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right"><strong><label for="requestor-email">Your E-Mail Address</label></strong></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <input name="requestor-email" type="text" id="requestor-email" size="48" value="<?php echo g('requestor-email'); ?>" />
		<img src="/static/images/info.gif"
		onmouseover="Tip('\
      <b>Requestor E-Mail</b><br />\
      An E-Mail address where we may contact you for further information.\
      ')"
      onmouseout="UnTip()" />
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><div align="left"></div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right"><strong><label for="requestor-role">Your Role within Group / Project</label></strong></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <input name="requestor-role" type="text" id="requestor-role" size="48" value="<?php echo g('requestor-role'); ?>" />
		<img src="/static/images/info.gif"
		onmouseover="Tip('\
      <b>Requestor Role</b><br />\
      The role you play - this helps us identify who we are speaking with.\
      ')"
      onmouseout="UnTip()" />
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right"></div></td>
              <td>&nbsp;</td>
              <td><div align="left"></div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right"><strong><label for="requestor-address1">Your Address 1</label></strong></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <input name="requestor-address1" type="text" id="requestor-address1" size="48" value="<?php echo g('requestor-address1'); ?>" />
		<img src="/static/images/info.gif"
		onmouseover="Tip('\
      <b>Requestor Address</b><br />\
      This is where you live.\
      ')"
      onmouseout="UnTip()" />
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right"><strong><label for="requestor-address2">Your Address 2</label></strong></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <input name="requestor-address2" type="text" id="requestor-address2" size="48" value="<?php echo g('requestor-address2'); ?>" />
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right"><strong><label for="requestor-address3">Your Address 3</label></strong></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <input name="requestor-address3" type="text" id="requestor-address3" size="48" value="<?php echo g('requestor-address3'); ?>" />
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right"><strong><label for="requestor-city">City</label></strong></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <input name="requestor-city" type="text" id="requestor-city" size="48" value="<?php echo g('requestor-city'); ?>" />
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right"><strong><label for="requestor-state">State / Province</label></strong></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <input name="requestor-state" type="text" id="requestor-state" size="48" value="<?php echo g('requestor-state'); ?>" />
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right"><strong><label for="requestor-zip">Postal / ZIP Code</label></strong></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <input name="requestor-zip" type="text" id="requestor-zip" size="48" value="<?php echo g('requestor-zip'); ?>" />
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right"><strong><label for="requestor-country">Country</label></strong></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <input name="requestor-country" type="text" id="requestor-country" size="48" value="<?php echo g('requestor-country'); ?>" />
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right"></div></td>
              <td>&nbsp;</td>
              <td><div align="left"></div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right"><strong><label for="requestor-contact1">Contact Number</label></strong></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <input name="requestor-contact1" type="text" id="requestor-contact1" size="48" value="<?php echo g('requestor-contact1'); ?>" /> 
                <select name="request-contact1-type" id="request-contact1-type">
                  <option value="work" selected="selected">Work</option>
                  <option value="home">Home</option>
                  <option value="mobile">Mobile</option>
                </select>
		<img src="/static/images/info.gif"
		onmouseover="Tip('\
      <b>Contact Number</b><br />\
      A telephone number where we may get in contact with you for further information if required\
      ')"
      onmouseout="UnTip()" />
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right"><label for="requestor-contact-2">Alternative Contact Number</label></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <input name="requestor-contact2" type="text" id="requestor-contact2" size="48" value="<?php echo g('requestor-contact2'); ?>" />
                <select name="request-contact2-type" id="request-contact2-type">
                  <option value="work" selected="selected">Work</option>
                  <option value="home">Home</option>
                  <option value="mobile">Mobile</option>
                </select>
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right"></div></td>
              <td>&nbsp;</td>
              <td><div align="left"></div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right"><label for="requestor-pgp-key">Your Public GPG/PGP Key ID (recommended)</label></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <input name="requestor-pgp-key" type="text" id="requestor-pgp-key" size="48" value="<?php echo g('requestor-pgp-key'); ?>" />
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="right"><label for="requestor-pgp-fingerprint">Your GPG/PGP Key fingerprint (recommended)</label></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <textarea name="requestor-pgp-fingerprint" cols="45" rows="5" wrap="off" id="requestor-pgp-fingerprint"><?php echo g('requestor-pgp-fingerprint'); ?></textarea>
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="5"><div align="center">
                <input type="button" name="requinfo-back" id="requinfo-back" value="Back" onclick="showgroup()" />&nbsp;
                  <input type="button" name="requinfo-next" id="requinfo-next" value="Next" onclick="showconf()" />
              </div></td>
            </tr>
          </table>
        </div>
        <div class="TabbedPanelsContent"><table width="100%" border="0" cellspacing="0" cellpadding="1">
            <tr>
              <td width="5%">&nbsp;</td>
              <td width="30%"><div align="right"><strong><label for="link-include">Include Project on  Primary Groups listing?</label></strong></div></td>
              <td width="2%">&nbsp;</td>
              <td width="50%"><p align="left">
                <label>
                  <input name="link-include" type="radio" id="link-include_0" onchange="linkinfo(this.id)" value="y" checked="checked"/>
                  Yes</label>
		<img src="/static/images/info.gif"
		onmouseover="Tip('\
      <b>Primary Groups Listing</b><br />\
      As groups are an important part of freenode, you may request that we list your group\'s information<br />\
      publically on freenode.net. Answer yes if you would like to be listed -- this is optional!\
      ')"
      onmouseout="UnTip()" />
                <br />
                <label>
                  <input name="link-include" type="radio" id="link-include_1" onchange="linkinfo(this.id)" value="n"/>
                  No</label>
                <br />
              </p></td>
              <td width="13%">&nbsp;</td>
            </tr>
            <tr id="linkinfo1">
              <td>&nbsp;</td>
              <td><div align="right"><strong><label for="link-url">URL to be linked</label></strong></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <input name="link-url" type="text" id="link-url" value="http://" size="48" />
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr id="linkinfo2">
              <td>&nbsp;</td>
              <td><div align="right"><strong><label for="link-blurb">Small blurb about project</label></strong></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <textarea name="link-blurb" id="link-blurb" cols="45" rows="5"></textarea>
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr id="other">
              <td>&nbsp;</td>
              <td><div align="right"><strong><label for="other">Any other relevant information to help us process your application</label></strong></div></td>
              <td>&nbsp;</td>
              <td><div align="left">
                <textarea name="other" id="other" cols="45" rows="5"></textarea>
              </div></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td width="5%">&nbsp;</td>
              <td width="30%"><div align="right"><strong><label for="join-gab">Join the Groups Advisory Board?</label></strong></div></td>
              <td width="2%">&nbsp;</td>
              <td width="50%"><p align="left">
                <label>
                  <input name="join-gab" type="radio" id="join-gab_0" onchange="linkinfo(this.id)" value="y" checked="checked"/>
                  Yes</label>
		<img src="/static/images/info.gif"
		onmouseover="Tip('\
      <b>Groups Advisory Board</b><br />\
      The Groups Advisory Board (GAB) is open to all Group Contacts. GAB membership is optional<br />\
      and provides your project with a voice in helping steer the direction of freenode and the<br />\
      PDPC in current and future services provided to the FOSS communities.\
      ')"
      onmouseout="UnTip()" />
                <br />
                <label>
                  <input name="join-gab" type="radio" id="join-gab_1" onchange="linkinfo(this.id)" value="n"/>
                  No</label>
                <br />
              </p></td>
              <td width="13%">&nbsp;</td>
            </tr>
             <tr>
              <td>&nbsp;</td>
              <td><div align="right"><strong>Captcha</strong></div></td>
              <td>&nbsp;</td>
              <td>
              <?php
                require_once('recaptchalib.php');
                $publickey = "6LeMhLoSAAAAAF0oyRYSYwHOqILl6PkLLrq-lLDp";
                echo recaptcha_get_html($publickey);
              ?>
              </td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td colspan="3">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="5"><div align="center">
                <p><strong>freenode Group Registration</strong></p>
                  <p>Please take this opportunity to check that the information contained on this form is correct, as mistakes may lengthen the amount of time it takes for your group to be approved. When you have checked the information, please click Confirm and Submit to move to the next stage.</p>
              </div></td>
            </tr>
            <tr>
              <td colspan="5"><div align="center"><input type="button" name="conf-back" id="conf-back" value="Back" onclick="showreq()" />&nbsp;
<input type="submit" name="conf-submit" id="conf-submit" value="Confirm & Submit" />
                </div></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </form>
<script>
<!--
var fngmstabs = new Spry.Widget.TabbedPanels("fngmstabs");
//-->
</script>

<script type="text/javascript">
// Let's hide all our optional fields.
document.getElementById('alternate-options').style.display = 'none';
document.getElementById('replacement-options1').style.display = 'none';
document.getElementById('replacement-options2').style.display = 'none';

document.getElementById('groupaddress1').style.display = 'none';
document.getElementById('groupaddress2').style.display = 'none';
document.getElementById('groupaddress3').style.display = 'none';
document.getElementById('groupaddress4').style.display = 'none';
document.getElementById('groupaddress5').style.display = 'none';
document.getElementById('groupaddress6').style.display = 'none';
document.getElementById('groupaddress7').style.display = 'none';

//document.getElementById('linkinfo1').style.display = 'none';
//document.getElementById('linkinfo2').style.display = 'none';
</script>
</td></tr>
<tr><td class="content" valign="top" width="100%">


<!--#include file="include/pre-addendum.shtml" -->

<!--#include file="include/post-addendum.htm" -->
