<html>
  <head>
  <title>Image Rotate
  </head>
  
  <body>
  <img src="" name="Rotating" id="Rotating1" width=100 height=100>
  <h2 id="heading"></h2>

  <script language="JavaScript">
  function RotateImages(Start)
  {
      var a = new Array("images/main_central_image.jpg","images/image_preview.png","images/FireShot.jpg");
      var c = new Array("heading1","heading2","heading3")
      var b = document.getElementById('Rotating1');
      var d = document.getElementById('heading');
      if(Start>=a.length)
          Start=0;
      b.src = a[Start];
      d.innerHTML = c[Start];
      window.setTimeout("RotateImages(" + (Start+1) + ")",3000);
  }
  RotateImages(0);
  
  </script>
  
  </body>
  </html>