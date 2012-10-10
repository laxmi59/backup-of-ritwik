<script type="text/javascript">
    var myObj = {
        name: 'Frank',
        age: 24,
        engaged: true,
        favorite_tv_shows: ['Lost', 'Dirty Jobs', 'Deadliest Catch', 'Man vs Wild'],
        family_members: [
            {name: "Frank", age: 57, relation: "father"},
            {name: "Tina", age: 26, relation: "sister"}
        ]
    }
     
    var property = "age"
     
    //alert(myObj[property]); // "24"
</script>
<?php
$arr = array ("mango", "banana", "orange");
for($i=0; $i<sizeof($arr);$i++){
	$finalarr[$i]=$arr[$i];
}
//print_r($arr);
$data= '{"sample":'.json_encode($finalarr).'}';
echo $data.sample[1];
?>