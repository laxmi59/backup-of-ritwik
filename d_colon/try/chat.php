<?
$person = str_replace ("\n"," ", $person);
$person = str_replace ("<", " ", $person); //take out HTML tags
$person = str_replace (">", " ", $person); 
$person = stripslashes ($person);
?>
<form action="chat.php" method="post">
Nickname: <input type="text" name="person" size="40" maxlength="80" value="<? echo $person; ?>"><br>
Your message: <textarea name="message" rows="3" cols="40"></textarea>
<input type="submit" value="Send/refresh">
</form>
<?

$chat_file_ok = "msg.txt";
$chat_length = 10;

$max_single_msg_length = 100000;
$max_file_size = $chat_length * $max_single_msg_length;

$file_size= filesize($chat_file);

                        
if ($file_size > $max_file_size) {

// reads file and stores each line $lines' array elements
$lines = file($chat_file_ok);
//get number of lines

$a = count($lines);

$u = $a - $chat_lenght;
for($i = $a; $i >= $u ;$i–){
                $msg_old =  $lines[$i] . $msg_old;
        }
$deleted = unlink($chat_file_ok);
$fp = fopen($chat_file_ok, "a+");
$fw = fwrite($fp, $msg_old);
fclose($fp);
}

// every message has to be placed into one single line in the msg.txt file.  You can render \n (new lines) with "<br>" html tag

$msg = str_replace ("\n"," ", $message);

//      if the user writes something the new message is appended to the msg.txt file
                
// strip avoid buggy html code and slashes
$msg = str_replace ("\n"," ", $message);
$msg = str_replace ("<", " ", $msg);
$msg = str_replace (">", " ", $msg);
$msg = stripslashes ($msg);

if ($msg != ""){

$fp = fopen($chat_file_ok, "a+");
$fw = fwrite($fp, "\n<b>$person :</b> $msg<br>");
fclose($fp);
}

$lines = file($chat_file_ok);
$a = count($lines);

$u = $a - $chat_lenght;

/*      reads the array in reverse order and outputs to chat  */
for($i = $a; $i >= $u ;$i–){
                echo $lines[$i] . "<hr>";
        }

?>

