<?php require_once('Connections/Secure_Login.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "secure.php";
  $MM_redirectLoginFailed = "login.php?message=Wrong username password combination";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_Secure_Login, $Secure_Login);
  
  $LoginRS__query=sprintf("SELECT login_UserName, login_PassWord FROM login WHERE login_UserName=%s AND login_PassWord=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $Secure_Login) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/main.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Fonseca Martial Arts</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>
<script type="text/javascript">
<!--
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
//-->
</script>
<style type="text/css">
<!--
.style2 {
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<!-- InstanceEndEditable -->
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
                    <td valign="top" class="header">Member Login</td>
                    <td><img src="images/img_spacer.gif" width="10" height="35" /></td>
                  </tr>
                  <tr>
                    <td><form action="<?php echo $loginFormAction; ?>" method="POST" name="form1" id="form1">
                      <table width="100%" border="0" cellpadding="1" cellspacing="0" bgcolor="#666666">
                        <tr>
                          <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="loginbox">
                            <tr>
                              <td width="295" height="20" bgcolor="#CC0000" class="subnavs"><div align="center" class="style2">Log In</div></td>
                            </tr>
                            <?php if ($_GET['message']) {?>
                            <tr>
                              <td width="295" height="20" align="center" bgcolor="#f1f1f1" class="BodyRedBold style1"><?php echo $_GET['message']; ?></td>
                            </tr>
                            <?php }?>
                            <tr>
                              <td align="center" bgcolor="#f1f1f1"><table border="0" cellspacing="0" cellpadding="0">
                                  <tr class="loginbox">
                                    <td class="LoginBoxSmallWhite">User Name:<br />
                                        <input name="username" type="text" id="username" /></td>
                                  </tr>
                                  <tr class="loginbox">
                                    <td class="LoginBoxSmallWhite">Password:<br />
                                        <input name="password" type="password" id="password" /></td>
                                  </tr>
                                  <tr class="loginbox">
                                    <td class="LoginBoxSmallWhite"><input name="Submit" type="submit" onclick="MM_validateForm('username','','R','password','','R');return document.MM_returnValue" value="Submit" />
                                      <br />
                                      <br /></td>
                                  </tr>
                              </table></td>
                            </tr>
                          </table></td>
                        </tr>
                      </table>
                      </form>
                    <p>&nbsp;</p>
                      </td>
                    <td width="160" valign="top">&nbsp;</td>
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
