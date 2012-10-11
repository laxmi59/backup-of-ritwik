

When you update and/or upgrade wordpress version,
please follow the following instructions:

1. Go to the "wp-admin" directory

2. Open "edit-form-advanced.php" file

3. Find out the following line:
<form name="post" action="post.php" method="post" id="post">

and make it as following add the " enctype="multipart/form-data"" part:
<form name="post" action="post.php" method="post" id="post" enctype="multipart/form-data">

4. Save the file

5. Upload it in the "wp-admin" directory

That's it!