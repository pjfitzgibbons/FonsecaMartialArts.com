<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_Secure_Login = "localhost";
$database_Secure_Login = "fonsecamartialarts_user";
$username_Secure_Login = "fonseca";
$password_Secure_Login = "Martialarts1";
$Secure_Login = mysql_pconnect($hostname_Secure_Login, $username_Secure_Login, $password_Secure_Login) or trigger_error(mysql_error(),E_USER_ERROR); 
?>