<script type="text/javascript">
function getScreen( url, size ) {
if(url === null){
return "";
}
size = (size === null) ? "big" : size;
var vid;
var results;
results = url.match("[\\?&]v=([^&#]*)");
vid = ( results === null ) ? url : results[1];
if(size == "small"){
return "http://img.youtube.com/vi/"+vid+"/2.jpg"; }
else {
return "http://img.youtube.com/vi/"+vid+"/0.jpg"; }
}
</script>
<?php  $url = "http://www.youtube.com/watch?v=hQVTIJBZook";
echo $url;
 ?>
<script type="text/javascript">
var imgUrlbig = getScreen("< ?php echo $url ?>");
var imgUrlsmall = getScreen("< ?php echo $url ?>", 'small');
document.write('<img src="' + imgUrlbig + '" />');
document.write('<img src="' + imgUrlsmall + '" />');
</script>