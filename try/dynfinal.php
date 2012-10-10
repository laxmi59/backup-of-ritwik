<script type="text/javascript" src="juery.js" ></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#parent1").css("display","none");
    $('#tt').val(Number(1));
    $("#add_box").click(function(){
	    var num		= $('#tt').val();   
		if (Number(num) < Number(3)){
			//console.log('running addPerson')
			var strToAdd = '<div>group :<input type="text" name="group" id="group"></div>';
			//console.log(strToAdd);
			$("#parent1").append(strToAdd);
			//$("#cot").value=2;
			$("#tt").val(Number(num)+ Number(1));
			num='';
			$("#parent1").slideDown("fast"); //Slide Down Effect   
		}else{
			alert("You cant Get More than 3");
		}
		
    });            
});
</script>



<div>name :<input type="text" name="test" id="test"></div>
<div>class :<input type="text" name="class" id="class"></div>
<div>group :<input type="text" name="group" id="group"></div>
<div id="parent1"><input type="hidden" name="tt" id="tt" value="" ></div>
<div><input type="button" id="add_box" style="border:none; background:none; color:#4888AD; font-family:Verdana, Arial, Helvetica, sans-serif; cursor:pointer" class="add-btn" value="Add another Portal" /><a href="#" class="aboveage1" id="main_click">Add</a> </div>