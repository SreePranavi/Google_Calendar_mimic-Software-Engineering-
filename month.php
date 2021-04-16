<html>

<head>
	<title> MONTH view </title>
	<link rel="stylesheet" href="view.css">
	<link rel="stylesheet" href="month.css">

<body>
	<div id="main">
		<div class="img">

		<img src="cal1.png" alt="Calendar" class="logo">

		</div>

		&emsp; <b> Calendar </b>

		&emsp;&emsp; <span class="labl">This Month</span>

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
        <?php
   $recipientEmail = explode(',',$_POST["guests"]);
   $title = $_POST["title"] ?? "";
   $date = $_POST["date"] ?? "";
   $time = $_POST["time"] ?? "";
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
$mail->Subject = $_POST["title"] ?? "";
$mail->Body = "This is to notify that you have a meeting on $date at $time regarding $title" ;

while (list ($key, $val) = each ($recipientEmail)) {
   $mail->AddAddress($val);
   }
   
   if(!$mail->send()) 
   {
	echo "Mailer Error: " . $mail->ErrorInfo;
   } 
   else 
   {
	echo "Message has been sent successfully";
   }
$conn = new mysqli("localhost","root","","Gcalendar");
		if($conn->connect_error)
		{
		  die('Conection Failed: ' .$conn->connect_error);
		}
		else{
		    $sql = "INSERT INTO events(eid,ename,edate,etime) values(2,'$title','$date','$time')";
		    if($conn->query($sql) == TRUE)
		    {
		      //echo "Inserted";
		      //header('location: month.html');
		      echo "<script>window.location.href='month.php';</script>";
		    }
		    else {
		      //echo "failed";
		      //echo "Error: " . $sql . "<br>" . $conn->error;
		    }
		    $conn->close();
		}
?>
	</div>
	<div id="Eventmodal" class="modal">
			<div class="modal-content">
				<button id="EventButton" class="Eventbuttonclass btnclass is-active-btn" onclick="openeventmodal()"><span class="btn-text">Event</span></button>
				<button id="TaskButton" class="Taskbuttonclass btnclass" onclick="opentaskmodal()"><span class="btn-text">Task</span></button>
				<button id="ReminderButton" class="Reminderbuttonclass btnclass" onclick="openremmodal()"><span class="btn-text">Reminder</span></button>
				<form id="event_form" action="#" method="post">
				<br>
				<label class="labelcls">Title:	 </label>
				<input type="text" placeholder="Add title" name="title" maxlength="15">
				<br>
				<br>
				<label class="labelcls">Date: </label>
				<input type="date" id="date" name="date">
				<br>
				<br>
				<label class="labelcls">Time: </label>
				<input type="time" id="time" name="time">
				<br>
				<br>
				<div id="addguestcontainer">
				<label style="font-family:'Open sans'">Add Guests: </label><br>
				<input type="text" id="guests" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}+" name="guests"  multiple="yes">
				</div>
				</form>
				<div>
				<button class="savebtn" type="submit" form="event_form"><span class="close">Save</span></button>
			 </div>
			</div>
		</div>

			<div id="TaskModal" class="modal">
				<div class="modal-content">
					<button id="EventButton" class="Eventbuttonclass btnclass" onclick="openeventmodal()"><span class="btn-text">Event</span></button>
					<button id="TaskButton" class="Taskbuttonclass btnclass is-active-btn" onclick="opentaskmodal()"><span class="btn-text">Task</span></button>
					<button id="ReminderButton" class="Reminderbuttonclass btnclass" onclick="openremmodal()"><span class="btn-text">Reminder</span></button>
					<form id="task_form" action="" method="post">
					<br>
					<label class="labelcls">Title:	 </label>
					<input type="text" placeholder="Add title" name="title" maxlength="15">
					<br>
					<br>
					<label class="labelcls">Date: </label>
					<input type="date" id="date" name="date">
					<br>
					<br>
					<label class="labelcls">Time: </label>
		  		<input type="time" id="time" name="time">
					<br>
					<br>
					<textarea id="description" name="description" placeholder="Desscription.." style="width: 250px; height: 120px;"></textarea>
				  </form>
					<div>
					<button class="savebtn" type="submit" form="task_form"><span class="close">Save</span></button>
				</div>
			</div>
		</div>

		<div id="ReminderModal" class="modal">
			<div class="modal-content">
				<button id="EventButton" class="Eventbuttonclass btnclass" onclick="openeventmodal()"><span class="btn-text">Event</span></button>
				<button id="TaskButton" class="Taskbuttonclass btnclass" onclick="opentaskmodal()"><span class="btn-text">Task</span></button>
				<button id="ReminderButton" class="Reminderbuttonclass btnclass is-active-btn" onclick="openremmodal()"><span class="btn-text">Reminder</span></button>
				<form id="rem_form" action="" method="post">
				<br>
				<label class="labelcls">Title:  </label>
				<input type="text" placeholder="Add title" name="title" maxlength="15">
				<br>
				<br>
				<label class="labelcls">Date: </label>
				<input type="date" id="date" name="date">
				<br>
				<br>
				<label class="labelcls">Time:	</label>
				<input type="time" id="time" name="time">
				<br>
				</form>
				<div>
				<button class="savebtn" type="submit" form="rem_form"><span class="close">Save</span></button>
			</div>
		</div>
		</div>

<br>
	<div id="mt">
		<table style="widht:100%">
			<tr>
				<th class="day">Monday</th>
				<th class="day">Tuesday</th>
				<th class="day">Wednesday</th>
				<th class="day">Thursday</th>
				<th class="day">Friday</th>
				<th class="day">Saturday</th>
				<th class="day">Sunday</th>
			</tr>
			<tr>
				<td class="d"> </td>
				<td class="d"> </td>
				<td class="d"> </td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">1</button></td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">2</button></td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">3</button></td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">4</button></td>
			</tr>
			<tr>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">5</button></td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">6</button></td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">7</button></td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">8</button></td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">9</button></td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">10</button></td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">11</button></td>
			</tr>
			<tr>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">12</button></td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">13</button></td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">14</button></td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">15</button></td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">16</button></td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">17</button></td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">18</button></td>
			</tr>
			<tr>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">19</button></td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">20</button></td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">21</button></td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">22</button></td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">23</button></td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">24</button></td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">25</button></td>
			</tr>
			<tr>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">26</button></td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">27</button></td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">28</button></td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">29</button></td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">30</button></td>
				<td class="d"><button onclick="openeventmodal()" style="width:100%">31</button></td>
				<td class="d"> </td>
			</tr>
	</div>

</div>

<script src="commonjs.js"></script>

</body>

</html>
