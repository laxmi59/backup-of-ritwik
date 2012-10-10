<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("input[name*='grpLocation']").click(function() {
		var defaultValue = $("label[for*='" + this.id + "']").html();
		var defaultm = "You have chosen : ";
    $('#Message').html('').html(defaultm + defaultValue + ' | Value is : ' + $(this).val());
 	});
	$("input[name*='Location2']").click(function() {        
 		GetCheckedValues();
 	});
});
function GetCheckedValues() {
	$('#listM').html('');
	$("input[name*='Location2']").each(function() {
		if (this.checked == true) {
			var defaultValue = $("label[for*='" + this.id + "']").html();
		    $('#listM').append('<li>'+ defaultValue + ' | Value is : ' + $(this).val() + '</li>');
        }
    });
}
</script>
<div id="Message"></div>
 <ul id="listM"></ul>
 <input id="grpLocation_0" type="radio" name="grpLocation" value="Edinburgh" />
 <label for="grpLocation_0">Edinburgh Item</label>
<input id="grpLocation_1" type="radio" name="grpLocation" value="Glasgow" />
 <label for="grpLocation_1">Glasgow Item</label>
 <input id="grpLocation_2" type="radio" name="grpLocation" value="Aberdeen" />
<label for="grpLocation_2">Aberdeen Item</label>
 <input id="grpLocation_3" type="radio" name="grpLocation" value="Scotland" />
 <label for="grpLocation_3">Scotland Item</label>
  <hr />
 <input id="Radio1" type="checkbox" name="Location2" value="Edinburgh" />
 <label for="Radio1">Edinburgh Item</label>
 <input id="Radio2" type="checkbox" name="Location2" value="Glasgow" />
  <label for="Radio2">Glasgow Item</label>
 <input id="Radio3" type="checkbox" name="Location2" value="Aberdeen" />
  <label for="Radio3">Aberdeen Item</label>
 <input id="Radio4" type="checkbox" name="Location2" value="Scotland" />
  <label for="Radio4">Scotland Item</label>

