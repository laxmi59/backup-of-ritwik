<script type="text/javascript">
 var element= document.getElementById('onload1');
	var opacityValue = 0.5; //make it 50% opaque
		if (window.ActiveXObject) {
			element.style.filter = "alpha(opacity="
				 + opacityValue*100 + ")"; // IE
		} else {
			element.style.opacity = opacityValue; // Gecko/Opera
		}
	/*var oImg=document.createElement("img");
oImg.setAttribute('src', 'images/loading.gif');
oImg.setAttribute('alt', 'loading');
oImg.setAttribute('height', '15px');
oImg.setAttribute('width', '128px');*/
document.getElementById('load_img').style.display='block';
//element.appendChild(oImg);
document.getElementById('onload1').style.opacity =null;
					//document.getElementById('onload1').removeChild(oImg);
					document.getElementById('load_img').style.display='none';
</script>