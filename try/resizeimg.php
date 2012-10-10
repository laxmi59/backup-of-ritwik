<?php
   include('SimpleImage.php');
   $image = new SimpleImage();
   $image->load('1290183731_docswide.jpg');
   $image->resize(277,277);
   $image->save('main/mainimg.jpg');
   $image1 = new SimpleImage();
   $image1->load('1290183731_docswide.jpg');
   $image1->resize(150,150);
   $image1->save('main/thumb/thumb.jpg');
?>



