<html>

<head>
	<title> DAY view </title>
	<link rel="stylesheet" href="view.css">
	<link rel="stylesheet" href="day.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
	<div id="main">
		<div class="img">

		<img src="cal1.png" alt="Calendar" class="logo">

		</div>

		&emsp; <b> Calendar </b>

		&emsp;&emsp; <span class="labl">Today</span>

		&emsp;&emsp;&emsp;&emsp;<a href="#" class="previous round">&#8249;</a>
		&emsp;<a href="#" class="next round">&#8250;</a>

		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<div class="dropdown">
			<button onclick="myFunction()" class="dropbtn">Change View</button>
			<div id="myDropdown" class="dropdown-content">
				<a href="day.php">Day</a>
				<a href="week.php">Week</a>
				<a href="month.php">Month</a>
			</div>
		</div>

	</div>
    <?php
    $recipientEmail = $_POST["guests"];
    $title = $_POST["title"];
    $date = $_POST["date"];
    $time = $_POST["time"];
require_once('PHPMailer/PHPMailerAutoload.php');
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML();
$mail->Username = 'jsivanjali@gmail.com';
$mail->Password = 'sophisticat';
$mail->SetFrom('jsivanjali@gmail.com','Sivanjali');
$mail->Subject = $_POST['title'];
$mail->Body = "This is to notify that you have a meeting on $date at $time regarding $title" ;

$mail->AddAddress($recipientEmail);

$result = $mail->Send();

if($result == 1){
    echo "OK Message";
}
else{
    echo "";
}
?>
	<div id="Eventmodal" class="modal">
		<div class="modal-content">
			<button id="EventButton" class="Eventbuttonclass btnclass is-active-btn" onclick="openeventmodal()"><span class="btn-text">Event</span></button>
			<button id="TaskButton" class="Taskbuttonclass btnclass" onclick="opentaskmodal()"><span class="btn-text">Task</span></button>
			<button id="ReminderButton" class="Reminderbuttonclass btnclass" onclick="openremmodal()"><span class="btn-text">Reminder</span></button>
			<form method="POST" action="">
			<br>
			<input type="text" placeholder="Add title" name="title">
			<br>
			<br>
			<input type="date" id="date" name="date">
			<br>
			<br>
			<label>Time	</label>
			<input type="time" id="time" name="time">
			<br>
			<br>
			<div id="addguestcontainer">
			<label>Add Guests</label><br>
			<input type="text" id="guests" name="guests"  placeholder="Add guest">
			<!--<a ><button id="addguests" onclick="addGuests()">Add</button></a>-->
			<a onclick="addGuests()">Add</a>
			</div>
			<div>
			<button class="submit"><span class="close">Save</span></button>
            </form>
		 </div>
		</div>
	</div>

		<div id="TaskModal" class="modal">
			<div class="modal-content">
				<button id="EventButton" class="Eventbuttonclass btnclass" onclick="openeventmodal()"><span class="btn-text">Event</span></button>
				<button id="TaskButton" class="Taskbuttonclass btnclass is-active-btn" onclick="opentaskmodal()"><span class="btn-text">Task</span></button>
				<button id="ReminderButton" class="Reminderbuttonclass btnclass" onclick="openremmodal()"><span class="btn-text">Reminder</span></button>
				<form>
				<br>
				<input type="text" placeholder="Add title" name="title">
				<br>
				<br>
				<input type="date" id="date" name="date">
				<br>
				<br>
				<label>Time	</label>
	  		<input type="time" id="time" name="time">
				<br>
				<br>
				<textarea id="description" name="description" placeholder="Desscription.." style="width: 250px; height: 120px;"></textarea>
			  </form>
				<div>
				<button class="savebtn"><span class="close">Save</span></button>
			</div>
		</div>
	</div>

	<div id="ReminderModal" class="modal">
		<div class="modal-content">
			<button id="EventButton" class="Eventbuttonclass btnclass" onclick="openeventmodal()"><span class="btn-text">Event</span></button>
			<button id="TaskButton" class="Taskbuttonclass btnclass" onclick="opentaskmodal()"><span class="btn-text">Task</span></button>
			<button id="ReminderButton" class="Reminderbuttonclass btnclass is-active-btn" onclick="openremmodal()"><span class="btn-text">Reminder</span></button>
			<form>
			<br>
			<input type="text" placeholder="Add title" name="title">
			<br>
			<br>
			<input type="date" id="date" name="date">
			<br>
			<br>
			<label>Time	</label>
			<input type="time" id="time" name="time">
			<br>
			</form>
			<div>
			<button class="savebtn"><span class="close">Save</span></button>
		</div>
	</div>
	</div>

	<table id="t" align="center">
			<tr>
			<td class="time" > 1 AM </td>
			<td class="time" style="width:900px"><button class="bd" onclick="openeventmodal()" style="width:100%;height:100%;"> </button></td>
			</tr>
			<tr><td class="time"> 2 AM </td>
			<td class="time" style="width:900px"><button class="bd" onclick="openeventmodal()" style="width:100%;height:100%;"> </button></td>
			</tr>
			<tr><td class="time"> 3 AM </td>
			<td class="time" style="width:900px"><button class="bd" onclick="openeventmodal()" style="width:100%;height:100%;"> </button></td>
			</tr>
			<tr><td class="time"> 4 AM </td>
			<td class="time" style="width:900px"><button class="bd" onclick="openeventmodal()" style="width:100%;height:100%;"> </button></td>
			</tr>
			<tr><td class="time"> 5 AM </td>
			<td class="time" style="width:900px"><button class="bd" onclick="openeventmodal()" style="width:100%;height:100%;"> </button></td>
			</tr>
			<tr><td class="time"> 6 AM </td>
			<td class="time" style="width:900px"><button class="bd" onclick="openeventmodal()" style="width:100%;height:100%;"> </button></td>
			</tr>
			<tr><td class="time"> 7 AM </td>
			<td class="time" style="width:900px"><button class="bd" onclick="openeventmodal()" style="width:100%;height:100%;"> </button></td>
			</tr>
			<tr><td class="time"> 8 AM </td>
			<td class="time" style="width:900px"><button class="bd" onclick="openeventmodal()" style="width:100%;height:100%;"> </button></td>
			</tr>
			<tr><td class="time"> 9 AM </td>
			<td class="time" style="width:900px"><button class="bd" onclick="openeventmodal()" style="width:100%;height:100%;"> </button></td>
			</tr>
			<tr><td class="time"> 10 AM </td>
			<td class="time" style="width:900px"><button class="bd" onclick="openeventmodal()" style="width:100%;height:100%;"> </button></td>
			</tr>
			<tr><td class="time"> 11 AM </td>
			<td class="time" style="width:900px"><button class="bd" onclick="openeventmodal()" style="width:100%;height:100%;"> </button></td>
			</tr>
			<tr><td class="time"> 12 AM </td>
			<td class="time" style="width:900px"><button class="bd" onclick="openeventmodal()" style="width:100%;height:100%;"> </button></td>
			</tr>
			<tr><td class="time"> 1 PM </td>
			<td class="time" style="width:900px"><button class="bd" onclick="openeventmodal()" style="width:100%;height:100%;"> </button></td>
			</tr>
			<tr><td class="time"> 2 PM </td>
			<td class="time" style="width:900px"><button class="bd" onclick="openeventmodal()" style="width:100%;height:100%;"> </button></td>
			</tr>
			<tr><td class="time"> 3 PM </td>
			<td class="time" style="width:900px"><button class="bd" onclick="openeventmodal()" style="width:100%;height:100%;"> </button></td>
			</tr>
			<tr><td class="time"> 4 PM </td>
			<td class="time" style="width:900px"><button class="bd" onclick="openeventmodal()" style="width:100%;height:100%;"> </button></td>
			</tr>
			<tr><td class="time"> 5 PM </td>
			<td class="time" style="width:900px"><button class="bd" onclick="openeventmodal()" style="width:100%;height:100%;"> </button></td>
			</tr>
			<tr><td class="time"> 6 PM </td>
			<td class="time" style="width:900px"><button class="bd" onclick="openeventmodal()" style="width:100%;height:100%;"> </button></td>
			</tr>
			<tr><td class="time"> 7 PM </td>
			<td class="time" style="width:900px"><button class="bd" onclick="openeventmodal()" style="width:100%;height:100%;"> </button></td>
			</tr>
			<tr><td class="time"> 8 PM </td>
			<td class="time" style="width:900px"><button class="bd"onclick="openeventmodal()"  style="width:100%;height:100%;"> </button></td>
			</tr>
			<tr><td class="time"> 9 PM </td>
			<td class="time" style="width:900px"><button class="bd" onclick="openeventmodal()" style="width:100%;height:100%;"> </button></td>
			</tr>
			<tr><td class="time"> 10 PM </td>
			<td class="time" style="width:900px"><button class="bd" onclick="openeventmodal()" style="width:100%;height:100%;"> </button></td>
			</tr>
			<tr><td class="time"> 11 PM </td>
			<td class="time" style="width:900px"><button class="bd" onclick="openeventmodal()" style="width:100%;height:100%;"> </button></td>
			</tr>
			<tr><td class="time"> 12 PM </td>
			<td class="time" style="width:900px"><button class="bd" onclick="openeventmodal()" style="width:100%;height:100%;"> </button></td>
			</tr>
		</table>

<script src="commonjs.js"></script>

</body>

</html>
