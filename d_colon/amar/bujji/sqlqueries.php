<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="refresh" content="2" />  <!-- usage of refresh page in 2 seconds-->

<title>Untitled Document</title>
</head>
<body>
</body>
</html>

Only Time:
---------

SELECT *
FROM logger_activities
WHERE TIME( `logged_in` )
BETWEEN CURRENT_TIME
AND SEC_TO_TIME( (
TIME_TO_SEC( CURRENT_TIME( ) ) -3600 )
)
LIMIT 0 , 30


With Date and Time
-------------------
SELECT *
FROM logger_activities
WHERE logged_in
BETWEEN timestampadd( SQL_TSI_HOUR, -1,
CURRENT_TIMESTAMP )
AND CURRENT_TIMESTAMP
LIMIT 0 , 30









