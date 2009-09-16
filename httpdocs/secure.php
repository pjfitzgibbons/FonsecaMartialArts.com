<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "login.php?message=Wrong username password combination";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/main.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Fonseca Martial Arts</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #CCCCCC;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #000000;
}
-->
</style>
<link href="fonseca.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>

<body onload="MM_preloadImages('images/btn_clubs_over.jpg','images/btn_resources_over.jpg','images/btn_products_over.jpg','images/btn_about_over.jpg','images/btn_gallery_over.jpg','images/btn_home_over2.jpg','images/btn_home_over.jpg','images/btn_contact_over.jpg')">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="background_left" background="images/bg_left.jpg">&nbsp;</td>
    <td width="653" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="1" cellspacing="0" bgcolor="#999999">
      <tr>
        <td><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
          <tr>
            <td><a href="index.html"><img src="images/logo.gif" width="188" height="81" border="0" /></a></td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="images/img_spacer.gif" width="73" height="37" /><a href="wilmette.html"><img src="images/btn_clubs.jpg" name="clubs" width="67" height="37" border="0" id="clubs" onmouseover="MM_swapImage('clubs','','images/btn_clubs_over.jpg',1)" onmouseout="MM_swapImgRestore()" /></a><a href="forms.html"><img src="images/btn_resources.jpg" name="resources" width="91" height="37" border="0" id="resources" onmouseover="MM_swapImage('resources','','images/btn_resources_over.jpg',1)" onmouseout="MM_swapImgRestore()" /></a><a href="shop/index.php"><img src="images/btn_products.jpg" name="products" width="80" height="37" border="0" id="products" onmouseover="MM_swapImage('products','','images/btn_products_over.jpg',1)" onmouseout="MM_swapImgRestore()" /></a><a href="about.html"><img src="images/btn_about.jpg" name="about" width="82" height="37" border="0" id="about" onmouseover="MM_swapImage('about','','images/btn_about_over.jpg',1)" onmouseout="MM_swapImgRestore()" /></a><a href="photos_v2.html"><img src="images/btn_gallery.jpg" name="gallery" width="67" height="37" border="0" id="gallery" onmouseover="MM_swapImage('gallery','','images/btn_gallery_over.jpg','home','','images/btn_home_over2.jpg',1)" onmouseout="MM_swapImgRestore()" /></a><a href="index.html"><img src="images/btn_home.jpg" name="home" width="70" height="37" border="0" id="home" onmouseover="MM_swapImage('home','','images/btn_home_over.jpg',1)" onmouseout="MM_swapImgRestore()" /></a><a href="contact.html"><img src="images/btn_contact.jpg" name="contact" width="96" height="37" border="0" id="contact" onmouseover="MM_swapImage('contact','','images/btn_contact_over.jpg',1)" onmouseout="MM_swapImgRestore()" /></a></td>
                </tr>
            </table></td>
          </tr>
        </table>
          <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
            <tr>
              <td width="49"><img src="images/img_spacer.gif" width="49" height="10" /></td>
              <td><!-- InstanceBeginEditable name="EditRegion3" -->
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="74" valign="top"><p><br />
                  <img src="images/img_spacer.gif" width="74" height="10" /><br />
              </p></td>
              <td width="28" valign="top"><img src="images/line.gif" width="28" height="291" /></td>
              <td valign="top"><br />
                <table width="476" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td valign="top" class="header">2009 Curriculum<br />
                      <br /></td>
                    <td valign="top"><div align="right"><a href="<?php echo $logoutAction ?>" class="bodylink">Logout</a></div></td>
                  </tr>
                  <tr>
                    <td colspan="2"><p><img src="images/arrow_right.gif" width="16" height="16" border="0" align="absmiddle" /><a href="#white" class="bodylink">White Belt Testing For Yellow Belt</a> <br />
                          <img src="images/arrow_right.gif" width="16" height="16" border="0" align="absmiddle" /><a href="#yellow" class="bodylink">Yellow Belt Testing For Orange Belt</a><br />
                          <img src="images/arrow_right.gif" width="16" height="16" border="0" align="absmiddle" /><a href="#orange" class="bodylink">Orange Belt Testing For Green Belt</a> <br />
                          <img src="images/arrow_right.gif" width="16" height="16" border="0" align="absmiddle" /><a href="#green" class="bodylink">Green Belt Testing For Blue Belt</a> <br />
                          <img src="images/arrow_right.gif" width="16" height="16" border="0" align="absmiddle" /><a href="#blue" class="bodylink">Blue Belt Testing For Low Purple Belt</a> <br />
                          <img src="images/arrow_right.gif" width="16" height="16" border="0" align="absmiddle" /><a href="#lowpurple" class="bodylink">Low Purple Belt Testing For High Purple Belt </a></p>
                      <p><strong>Little Dragons Requirements</strong></p>
                      <p><img src="images/arrow_right.gif" width="16" height="16" border="0" align="absmiddle" /><a href="pdfs/dragons/Little Dragons Personal Goals.pdf" class="bodylink">Little Dragons Curriculum</a><br />
                        <img src="images/arrow_right.gif" width="16" height="16" border="0" align="absmiddle" /><a href="pdfs/dragons/Little Dragon Stars.pdf" class="bodylink">Little Dragons Stars</a> <br />
                        <img src="images/arrow_right.gif" width="16" height="16" border="0" align="absmiddle" /><a href="pdfs/dragons/White - Clean Your Room.pdf" class="bodylink">White Belt</a><br />
                        <img src="images/arrow_right.gif" width="16" height="16" border="0" align="absmiddle" /><a href="pdfs/dragons/Yellow - Brush Your Teeth.pdf" class="bodylink">Yellow Belt</a><a href="#orange" class="bodylink"></a> <br />
                        <img src="images/arrow_right.gif" width="16" height="16" border="0" align="absmiddle" /><a href="pdfs/dragons/Orange - Put Your Trash in Trash Can.pdf" class="bodylink">Orange Belt</a><a href="#green" class="bodylink"></a> <br />
                        <img src="images/arrow_right.gif" width="16" height="16" border="0" align="absmiddle" /><a href="pdfs/dragons/Green - Make Your Bed.pdf" class="bodylink">Green Belt</a><a href="#blue" class="bodylink"></a> <br />
                        <img src="images/arrow_right.gif" width="16" height="16" border="0" align="absmiddle" /><a href="pdfs/dragons/Blue - Each 1 Vegetable Per Day.pdf" class="bodylink">Blue Belt</a><a href="#lowpurple" class="bodylink"></a><br />
                        <img src="images/arrow_right.gif" width="16" height="16" border="0" align="absmiddle" /><a href="pdfs/dragons/Purple - Take a Bath or Shower.pdf" class="bodylink">Purple Belt</a><a href="#lowpurple" class="bodylink"></a><br />
                        <img src="images/arrow_right.gif" width="16" height="16" border="0" align="absmiddle" /><a href="pdfs/dragons/Brown Stripe-Do It The First Time.pdf" class="bodylink">Brown Belt</a><a href="#lowpurple" class="bodylink"></a><br />
                        <img src="images/arrow_right.gif" width="16" height="16" border="0" align="absmiddle" /><a href="pdfs/dragons/Black - 25 Acts of Kindness.pdf" class="bodylink">Black Belt</a><span class="BodyBlackBold"><br />
                        </span><br />
</p>
                      <p><a href="http://www.fonsecamartialarts.com/documents/competitionBooklet.pdf" class="bodylink">FMA Competition Booklet-Click here to download pdf</a></p>
<p><a href="pdfs/secure_page_pdfs/Curriculum 2009.pdf" target="_blank" class="bodylink">Complete Curriculum&mdash;Click here to download pdf </a></p>
<p><a href="pdfs/secure_page_pdfs/promotion_form.pdf" target="_blank" class="bodylink">Application For Promotion&mdash;Click here to download pdf</a> </p>
<p><a href="pdfs/secure_page_pdfs/student manual.pdf" target="_blank" class="bodylink">Student Manual&mdash;Click here to download pdf </a></p>
<p><a href="pdfs/secure_page_pdfs/membership fees.pdf" target="_blank" class="bodylink">Membership Fees&mdash;Click here to dowload pdf</a></p>
<p><a href="pdfs/secure_page_pdfs/chicago pricing.pdf" target="_blank" class="bodylink">Chicago Fees&mdash;Click here to dowload pdf</a></p>
<p><a href="pdfs/secure_page_pdfs/equipment-order form.pdf" target="_blank" class="bodylink">Equipment Order Form&mdash;Click here to dowload pdf</a></p>
<p><a href="pdfs/secure_page_pdfs/dojo procedures.pdf" target="_blank" class="bodylink">Dojo Procedures&mdash;Click here to dowload pdf</a><br />
  <br />
</p>
<hr color="#CC0000" height="1"/>
<p align="left"><span class="header"><br />
    <a name="white" id="white"></a>White Belt Testing For Yellow Belt <a href="#top"><img src="images/page_up.gif" width="16" height="16" border="0" title="back to the top" /></a><br />
</span><a href="pdfs/secure_page_pdfs/Curriculum_White_Belt.pdf" target="_blank" class="bodylink">Click here to download pdf of curriculum for yellow belt </a> </p>
<p class="BodyBlackBold">Red Stripe: Kata (Forms) </p>
<ul>
  <li class="BodyBlack">Taikyoku Shodan </li>
</ul>
<p class="BodyBlackBold">Yellow Stripe: Kihon (Basics) </p>
<ul>
  <li class="BodyBlack">Ready Stance </li>
  <li class="BodyBlack">Bowing Stance </li>
  <li class="BodyBlack">Horse Stance </li>
  <li class="BodyBlack">Front Stance (Only Footwork moving in and out) </li>
  <li class="BodyBlack">Rising Block (Stationary in Horse stance) </li>
  <li class="BodyBlack">Downward Block (Stationary in Horse stance) </li>
  <li class="BodyBlack">Punching (Stationary in Horse stance) </li>
</ul>
<p class="BodyBlack"><strong>Blue Stripe: Kumite (Sparring) </strong></p>
<ul>
  <li class="BodyBlack">Fighting stance </li>
  <li class="BodyBlack">Jab </li>
  <li class="BodyBlack">Reverse </li>
  <li class="BodyBlack">Jab / Reverse Punch (1 Shift)</li>
</ul>
<p class="BodyBlack"><strong>Black Stripe: Kihon 2 (Basics) </strong></p>
<ul>
  <li class="BodyBlack">Front Punch (Forward &amp; Backwards in Front Stance) </li>
  <li class="BodyBlack">Rising blocks (Forward &amp; Backwards in Front Stance) </li>
  <li class="BodyBlack">Downward blocks (Forward &amp; Backwards in Front Stance)</li>
  <li class="BodyBlack">Reverse Punch (Stationary in Front Stance)</li>
  <li class="BodyBlack">Front Kick (Stationary in Front Stance)</li>
  <li class="BodyBlack">Round Kick (Stationary in Front Stance)</li>
  <li class="BodyBlack">Front Kick (Forward &amp; Backward in Front Stance)</li>
  <li class="BodyBlack">Front Kick / Front Punch (Forward in Front Stance)<br />
      <br />
    *Time Requirement: Minimum of 8 Weeks of Training or (16 Classes) </li>
</ul>
<br />
<hr color="#CC0000" height="1"/>
<span class="header"><a name="yellow" id="yellow"></a><br />
Yellow Belt Testing For Orange Belt <a href="#top"><img src="images/page_up.gif" width="16" height="16" border="0" title="back to the top" /></a><br />
</span><a href="pdfs/secure_page_pdfs/Curriculum_Yellow_Belt.pdf" target="_blank" class="bodylink">Click here to download pdf of
		      curriculum
		      for
		      yellow belt </a>
<p class="BodyBlack"><strong>Red Stripe: Kata (Forms) </strong></p>
<ul>
  <li class="BodyBlack">Heian Shodan </li>
</ul>
<p class="BodyBlack"><strong>Yellow Stripe: Kihon (Basics) </strong></p>
<ul>
  <li class="BodyBlack">Triple punches (Forward &amp; Backwards in Front Stance)</li>
  <li class="BodyBlack">Inward blocks (Forward &amp; Backwards in Front Stance)</li>
  <li class="BodyBlack">Outward blocks (Forward &amp; Backwards in Front Stance)</li>
  <li class="BodyBlack">Knife Hand Block (Forward &amp; Backward in Back Stance)</li>
  <li class="BodyBlack">Side Thrust Kick (Stationary in Ready Stance)</li>
  <li class="BodyBlack">Side Thrust Kick (Forward &amp; Backwards in Horse Stance)</li>
  <li><span class="BodyBlack">Round Kick (Forward &amp; Backwards in Front Stance)</span><br />
  </li>
</ul>
<p class="BodyBlack"><strong>Blue Stripe: Kumite (Sparring) </strong></p>
<ul>
  <li class="BodyBlack">Reverse Punch (Block and Counter)</li>
  <li class="BodyBlack">Reverse Punch / Round Kick (Front Leg)</li>
  <li class="BodyBlack">Reverse Punch / Round Kick (Back Leg)</li>
</ul>
<p class="BodyBlack"><strong>Black Stripe: Personal Goals (Kids/Youth) </strong></p>
<ul>
  <li class="BodyBlack">Courtesy - 50 acts of Kindness </li>
</ul>
<p class="BodyBlack"><strong>Black Stripe: Self Defense (Adults) </strong></p>
<ul>
  <li class="BodyBlack">Escape from wrist grabs <br />
      <br />
    *Time Requirement: Minimum of 8 Weeks of Training (or 16 Classes) from Last Exam </li>
</ul>
<br />
<hr color="#CC0000" height="1"/>
<span class="header"><a name="orange" id="orange"></a><br />
Orange Belt Testing For Green Belt <a href="#top"><img src="images/page_up.gif" width="16" height="16" border="0" title="back to the top" /></a><br />
</span><a href="pdfs/secure_page_pdfs/Curriculum_Orange_Belt.pdf" target="_blank" class="bodylink">Click here to download pdf of
		      curriculum
		      for
		      orange belt </a>
<p class="BodyBlack"><strong>Red Stripe: Kata (Forms) </strong></p>
<ul>
  <li class="BodyBlack">Heian Nidan </li>
</ul>
<p class="BodyBlack"><strong>Yellow Stripe: Kihon (Basics) </strong></p>
<ul>
  <li class="BodyBlack">Blocking/punching combinations (Stationary in Horse Stance)</li>
  <li class="BodyBlack">Back Fist (Stationary in Horse Stance)</li>
  <li class="BodyBlack">Palm Heel Strike (Stationary in Horse Stance)</li>
  <li class="BodyBlack">Side Snap Kick (Stationary in Ready Stance)</li>
  <li class="BodyBlack">Round Kick (Back Leg) / Reverse Punch in FS (Forward &amp; Backwards)</li>
  <li class="BodyBlack">Front Kick and Round Kick (Rear Legs) / Reverse Punch in FS (F &amp; Back)</li>
  <li class="BodyBlack">Reverse punches (Forward &amp; Backwards in Front Stance)</li>
</ul>
<p class="BodyBlack"><strong>Blue Stripe: Kumite (Sparring) </strong></p>
<ul>
  <li class="BodyBlack">Reverse Punch (Interception)</li>
  <li class="BodyBlack">Reverse Punch / Jab (1 Shift)</li>
  <li class="BodyBlack">Reverse Punch / Side Thrust Kick (Front Leg)</li>
  <li><span class="BodyBlack">Reverse Punch / Side Thrust Kick (Back Leg)</span><br />
  </li>
</ul>
<p class="BodyBlack"><strong>Black Stripe: Personal Goals (Kids/Youth) </strong></p>
<ul>
  <li class="BodyBlack">Teamwork - 50 acts of Home Help </li>
</ul>
<p class="BodyBlack"><strong>Black Stripe: Self Defense (Adults) </strong></p>
<ul>
  <li class="BodyBlack">Defense against hook punches <br />
      <br />
    *Time Requirement: Minimum of 8 Weeks of Training (or 16 Classes) from Last Exam</li>
</ul>
<hr color="#CC0000" height="1"/>
<p align="left"><br />
  <span class="header"><a name="green" id="orange2"></a>Green Belt Testing For Blue Belt <a href="#top"><img src="images/page_up.gif" width="16" height="16" border="0" title="back to the top" /></a><br />
  </span><a href="pdfs/secure_page_pdfs/Curriculum_Green_Belt.pdf" target="_blank" class="bodylink">Click here to download pdf of
    curriculum
    for green belt </a></p>
<p class="BodyBlack"><strong>Red Stripe: Kata (Forms) </strong></p>
<ul>
  <li class="BodyBlack">Heian Sandan </li>
</ul>
<p class="BodyBlack"><strong>Yellow Stripe: Kihon (Basics) </strong></p>
<ul>
  <li class="BodyBlack">Inward blocks / reverse punch (Forward &amp; Backwards in Front Stance)</li>
  <li class="BodyBlack">Outward blocks / reverse punch (Forward &amp; Backwards in Front Stance)</li>
  <li class="BodyBlack">Rising blocks / reverse punch (Forward &amp; Backwards in Front Stance)</li>
  <li class="BodyBlack">Knife hand blocks in BS/spear-hand thrusts in FS (Forward &amp; Backwards)</li>
  <li class="BodyBlack">Front kick/round kick with the same leg (Forwards in Front Stance)</li>
  <li class="BodyBlack">Sanbon Kumite (Three step sparring -- 3 head /3 stomach)</li>
</ul>
<p class="BodyBlack"><strong>Blue Stripe: Kumite (Sparring) </strong></p>
<ul class="BodyBlack">
  <li>Jab / Reverse Punch (2 Shifts)</li>
  <li>Reverse Punch / Jab (2 Shifts)</li>
  <li>Reverse Punch / Reverse Punch (Stepping Thru)</li>
  <li>Jiyu Kumite (Basic Free Sparring)</li>
  </ul>
<p class="BodyBlack"><strong>Black Stripe: Personal Goals (Kids/Youth) </strong></p>
<ul>
  <li class="BodyBlack">Perseverance - Hand in journal of 1000 reps of 1 technique </li>
</ul>
<p class="BodyBlack"><strong>Black Stripe: Self Defense (Adults) </strong></p>
<ul>
  <li class="BodyBlack">Defense against front or rear choke <br />
      <br />
    *Time Requirement: Minimum of 12 Weeks of Training (or 24 Classes) from Last Exam </li>
</ul>
<hr color="#CC0000" height="1"/>
<p align="left"><br />
  <span class="header"><a name="blue" id="orange4"></a>Blue Belt Testing For Low Purple Belt <a href="#top"><img src="images/page_up.gif" width="16" height="16" border="0" title="back to the top" /></a><br />
</span><a href="pdfs/secure_page_pdfs/Curriculum_Blue_ Belt.pdf" target="_blank" class="bodylink">Click here to download pdf of
		      curriculum
		      for
		      blue belt</a></p>
<p class="BodyBlack"><strong>Red Stripe: Kata (Forms) </strong></p>
<ul>
  <li class="BodyBlack">Heian Yondan, Heian Godan </li>
</ul>
<p class="BodyBlack"><strong>Yellow Stripe: Kihon (Basics) </strong></p>
<ul>
  <li class="BodyBlack">Knee strike (Stationary in Ready Stance)</li>
  <li class="BodyBlack">Back kick (Stationary in Ready stance)</li>
  <li class="BodyBlack">Elbow strike (Stationary in Front stance)</li>
  <li class="BodyBlack">Knife Hand Block in Cat Stance (Ready Stance to Cat Stance)</li>
  <li class="BodyBlack">Knife Hand Block in Cat Stance (Forward &amp; Backwards)</li>
  <li class="BodyBlack">Sanbon Kumite (Three step sparring -- 3 head /3 stomach)</li>
  <li class="BodyBlack">Ippon Kumite (One step sparring -- 2 head /2 stomach)</li>
</ul>
<p class="BodyBlack"><strong>Blue Stripe: Kumite (Sparring) </strong></p>
<ul>
  <li class="BodyBlack">Hook Kick (Front and Back Leg)</li>
  <li class="BodyBlack">Free Sparring (Jiyu Kumite)</li>
  <li class="BodyBlack">Attendance at a Dojo Tournament or Seminar Required</li>
</ul>
<p class="BodyBlack"><strong>Black Stripe: Personal Goals (Kids/Youth) </strong></p>
<ul>
  <li class="BodyBlack">Nutrition - Hand in Journal of “One week without junk food” </li>
</ul>
<p class="BodyBlack"><strong>Black Stripe: Self Defense (Adults) </strong></p>
<ul>
  <li class="BodyBlack">Defense Against Front Tackle or Bear Hug<br />
      <br />
    *Time Requirement: Minimum of 12 Weeks of Training (or 24 Classes) from Last Exam</li>
</ul>
<hr color="#CC0000" height="1"/>
<p align="left"><br />
  <span class="header"><a name="lowpurple" id="orange3"></a>Low Purple Belt Testing For High Purple Belt</span> <a href="#top"><img src="images/page_up.gif" width="16" height="16" border="0" title="back to the top" /></a><br />
  <a href="pdfs/secure_page_pdfs/Curriculum_Low_Purple_Belt.pdf" target="_blank" class="bodylink">Click here to download pdf of
		      curriculum
		      for
		      low purple belt </a></p>
<p class="BodyBlack"><strong>Red Stripe: Kata (Forms) </strong></p>
<ul>
  <li class="BodyBlack">Heian Godan, Tekki Shodan </li>
</ul>
<p class="BodyBlack"><strong>Yellow Stripe: Kihon (Basics) </strong></p>
<ul>
  <li class="BodyBlack">Ridge hand strike (Stationary in Front stance)</li>
  <li class="BodyBlack">Knife Hand Block in Cat Stance/spear-hand thrust in FS (Fwd &amp; Back)</li>
  <li class="BodyBlack">Ippon Kumite (One step sparring -- 2 head /2 stomach)</li>
</ul>
<p class="BodyBlack"><strong>Blue Stripe: Kumite (Sparring) </strong></p>
<ul>
  <li class="BodyBlack">Front Leg Sweeps</li>
  <li class="BodyBlack">Spinning Back Kick</li>
  <li class="BodyBlack">Free Sparring (Jiyu Kumite)</li>
  <li class="BodyBlack">WKF Kumite</li>
  <li class="BodyBlack">Attendance at a Dojo Tournament or Seminar Required</li>
</ul>
<p class="BodyBlack"><strong>Black Stripe: Personal Goals (Kids/Youth) </strong></p>
<ul>
  <li class="BodyBlack">Mentoring - Hand in Journal of Mentoring a Student for 10 Lessons </li>
</ul>
<p class="BodyBlack"><strong>Black Stripe: Self Defense (Adults) </strong></p>
<ul>
  <li class="BodyBlack">Defense Against Headlock <br />
      <br />
    *Time Requirement: Minimum of 12 Weeks of Training (or 24 Classes) from Last Exam <br />
    <br />
    <br />
  </li>
</ul>
</td>
                    </tr>
              </table></td>
            </tr>
          </table>
        <!-- InstanceEndEditable --></td>
              <td width="28">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3"><table bgcolor="cc9933" width="100%" border="0" cellspacing="0" cellpadding="6">
                  <tr>
                    <td class="footer"><div align="center">823 Chicago Ave. Evanston, IL 60202 • 1211 Washington Ave. Wilmette, IL 60091 • <br />
                      112 West Grand Ave. Chicago, IL 60610 • Phone: 847-866-0200<br />
                      ©2008 Designed by <a class="footer" href="http://www.imageperspective.com" target="_blank">Image Perspective</a></div></td>
                  </tr>
              </table></td>
            </tr>
          </table></td>
      </tr>
    </table>
      </td>
    <td class="background" background="images/bg_right.jpg">&nbsp;</td>
  </tr>
</table>
</body>
<!--#include virtual="google_analytics.html" -->
<!-- InstanceEnd --></html>
