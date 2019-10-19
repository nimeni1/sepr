<?php
session_start();
include('prevent_direct_access.php');
include('captcha_validation.php');
include('db_connection.php');
?>
<html>
<head>
    <title>forum_write</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>

<body topmargin=0 leftmargin=0 text=#464646>
<?php include("header.php");?>
<div id="container" style="height: 100%; width: 100%; padding-left: 15%;padding-right: 15%;" align="center"><br>
    <form action=forum_insert.php method=post>
        <table width=580 border=0 cellpadding=2 cellspacing=1 bgcolor=#777777>
            <tr>
                <td height=20 align=center bgcolor=#999999>
                    <b>Posting</b>
                </td>
            </tr>
            <tr>
                <td bgcolor=white>&nbsp;
                    <table>
                        <tr>
                            <td width=60 align=left >Subject</td>
                            <td align=left >
                                <INPUT type=text name="title" size=60 maxlength=35>
                            </td>
                        </tr>
                        <tr>
                            <td width=60 align=left >Content</td>
                            <td align=left >
                                <TEXTAREA name="content" cols=65 rows=15></TEXTAREA>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10" align=center>
                                <img id="captcha" src="/sepr/securimage/securimage_show.php" alt="CAPTCHA Image" />
                                <input type="text" name="captcha_code" size="10" maxlength="6" />
                                <a href="#" onclick="document.getElementById('captcha').src = '/sepr/securimage/securimage_show.php?' + Math.random();
                                  return false">[ Different Image ]</a>
                                &nbsp;&nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td colspan=10 align=center>
                                <INPUT type=submit class="btn" value="Post" style="background: #5F9EA0; color:white;">
                                <INPUT type=button class="btn" value="Go back" style="background: #5F9EA0;color:white;"
                                  onclick="history.back(-1)">
                            </td>
                        </tr>
                    </TABLE>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
</html>
