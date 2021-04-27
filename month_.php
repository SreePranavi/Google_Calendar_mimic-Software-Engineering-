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

		&emsp;&emsp; <span class="labl">April</span>

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

		$title = $_POST["title"] ?? '';
		$date = $_POST["date"] ?? '';
		$time = $_POST["time"] ?? '';

		$conn = new mysqli("localhost","root","","Gcalendar",3306);
		if($conn->connect_error)
		{
		  die('Conection Failed: ' .$conn->connect_error);
		}
		else{
		    $sql = "INSERT INTO events(ename,edate,etime) values('$title','$date','$time')";
		    if($conn->query($sql) == TRUE)
		    {
		      echo ".";
		      // header('location: month.php');
		      //echo "<script>window.location.href='month.php';</script>";
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
				<button id="EventButton" class="Eventbuttonclass btnclass is-active-btn" onclick="openeventmodal(0)"><span class="btn-text">Event</span></button>
				<button id="TaskButton" class="Taskbuttonclass btnclass" onclick="opentaskmodal(0)"><span class="btn-text">Task</span></button>
				<button id="ReminderButton" class="Reminderbuttonclass btnclass" onclick="openremmodal(0)"><span class="btn-text">Reminder</span></button>
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
					<button id="EventButton" class="Eventbuttonclass btnclass" onclick="openeventmodal(0)"><span class="btn-text">Event</span></button>
					<button id="TaskButton" class="Taskbuttonclass btnclass is-active-btn" onclick="opentaskmodal(0)"><span class="btn-text">Task</span></button>
					<button id="ReminderButton" class="Reminderbuttonclass btnclass" onclick="openremmodal(0)"><span class="btn-text">Reminder</span></button>
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
				<button id="EventButton" class="Eventbuttonclass btnclass" onclick="openeventmodal(0)"><span class="btn-text">Event</span></button>
				<button id="TaskButton" class="Taskbuttonclass btnclass" onclick="opentaskmodal(0)"><span class="btn-text">Task</span></button>
				<button id="ReminderButton" class="Reminderbuttonclass btnclass is-active-btn" onclick="openremmodal(0)"><span class="btn-text">Reminder</span></button>
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
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b1">1</button>
					<div class="DATEDIV">
					<?php
					$conn = new mysqli("localhost","root","","Gcalendar",3306);
					$sql = "SELECT* FROM events";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc())
					{
						if($row['edate']=="2021-04-01"){
						?>
						<div>
							<div style="font-size:10px;padding:10px;background-color: #87b2f8;margin-right:0px;">
							<?php echo $row['ename']; str_repeat('&nbsp;', 5); echo $row['edate']; str_repeat('&nbsp;', 5); echo $row['etime']; ?></div>
						</div>
					<?php
				}
				else{}}}
					$conn->close();
					?>
					</div>
				</td>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b2">2</button>
				
					<div class="DATEDIV">
					<?php
					$conn = new mysqli("localhost","root","","Gcalendar",3306);
					$sql = "SELECT* FROM events";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc())
					{
						if($row['edate']=="2021-04-01"){
						?>
						<div>
							<div style="font-size:10px;padding:10px;background-color: #87b2f8;margin-right:0px;">
							<?php echo $row['ename']; str_repeat('&nbsp;', 5); echo $row['edate']; str_repeat('&nbsp;', 5); echo $row['etime']; ?></div>
						</div>
					<?php
				}
				else{}}}
					$conn->close();
					?>
					</div>
					
				</td>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b3">3</button>
				
					<div class="DATEDIV">
					<?php
					$conn = new mysqli("localhost","root","","Gcalendar",3306);
					$sql = "SELECT* FROM events";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc())
					{
						if($row['edate']=="2021-04-03"){
						?>
						<div>
							<div style="font-size:10px;padding:10px;background-color: #87b2f8;margin-right:0px;">
							<?php echo $row['ename']; str_repeat('&nbsp;', 5); echo $row['edate']; str_repeat('&nbsp;', 5); echo $row['etime']; ?></div>
						</div>
					<?php
				}
				else{}}}
					$conn->close();
					?>
					</div>
					</td>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b4">4</button
					<div class="DATEDIV">
					<?php
					$conn = new mysqli("localhost","root","","Gcalendar",3306);
					$sql = "SELECT* FROM events";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc())
					{
						if($row['edate']=="2021-04-04"){
						?>
						<div>
							<div style="font-size:10px;padding:10px;background-color: #87b2f8;margin-right:0px;">
							<?php echo $row['ename']; str_repeat('&nbsp;', 5); echo $row['edate']; str_repeat('&nbsp;', 5); echo $row['etime']; ?></div>
						</div>
					<?php
				}
				else{}}}
					$conn->close();
					?>
					</div>
					</td>
			</tr>
			<tr>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b5">5</button><button class="event_bar" style="display:none;"></button><button  class="task_bar" style="display:none;"></button><button  class="rem_bar" style="display:none;"></button></td>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b6">6</button><button class="event_bar" style="display:none;"></button><button  class="task_bar" style="display:none;"></button><button  class="rem_bar" style="display:none;"></button></td>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b7">7</button><button class="event_bar" style="display:none;"></button><button  class="task_bar" style="display:none;"></button><button  class="rem_bar" style="display:none;"></button></td>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b8">8</button><button class="event_bar" style="display:none;"></button><button  class="task_bar" style="display:none;"></button><button  class="rem_bar" style="display:none;"></button></td>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b9">9</button><button class="event_bar" style="display:none;"></button><button  class="task_bar" style="display:none;"></button><button  class="rem_bar" style="display:none;"></button></td>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b10">10</button><button class="event_bar" style="display:none;"></button><button  class="task_bar" style="display:none;"></button><button  class="rem_bar" style="display:none;"></button></td>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b11">11</button><button class="event_bar" style="display:none;"></button><button  class="task_bar" style="display:none;"></button><button  class="rem_bar" style="display:none;"></button></td>
			</tr>
			<tr>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b12">12</button><button class="event_bar" style="display:none;"></button><button  class="task_bar" style="display:none;"></button><button  class="rem_bar" style="display:none;"></button></td>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b13">13</button><button class="event_bar" style="display:none;"></button><button  class="task_bar" style="display:none;"></button><button  class="rem_bar" style="display:none;"></button></td>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b14">14</button><button class="event_bar" style="display:none;"></button><button  class="task_bar" style="display:none;"></button><button  class="rem_bar" style="display:none;"></button></td>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b15">15</button><button class="event_bar" style="display:none;"></button><button  class="task_bar" style="display:none;"></button><button  class="rem_bar" style="display:none;"></button></td>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b16">16</button><button class="event_bar" style="display:none;"></button><button  class="task_bar" style="display:none;"></button><button  class="rem_bar" style="display:none;"></button></td>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b17">17</button><button class="event_bar" style="display:none;"></button><button  class="task_bar" style="display:none;"></button><button  class="rem_bar" style="display:none;"></button></td>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b18">18</button><button class="event_bar" style="display:none;"></button><button  class="task_bar" style="display:none;"></button><button  class="rem_bar" style="display:none;"></button></td>
			</tr>
			<tr>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b19">19</button><button class="event_bar" style="display:none;"></button><button  class="task_bar" style="display:none;"></button><button  class="rem_bar" style="display:none;"></button></td>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b20">20</button><button class="event_bar" style="display:none;"></button><button  class="task_bar" style="display:none;"></button><button  class="rem_bar" style="display:none;"></button></td>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b21">21</button><button class="event_bar" style="display:none;"></button><button  class="task_bar" style="display:none;"></button><button  class="rem_bar" style="display:none;"></button></td>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b22">22</button><button class="event_bar" style="display:none;"></button><button  class="task_bar" style="display:none;"></button><button  class="rem_bar" style="display:none;"></button></td>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b23">23</button><button class="event_bar" style="display:none;"></button><button  class="task_bar" style="display:none;"></button><button  class="rem_bar" style="display:none;"></button></td>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b24">24</button><button class="event_bar" style="display:none;"></button><button  class="task_bar" style="display:none;"></button><button  class="rem_bar" style="display:none;"></button></td>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b25">25</button><button class="event_bar" style="display:none;"></button><button  class="task_bar" style="display:none;"></button><button  class="rem_bar" style="display:none;"></button></td>
			</tr>
			<tr>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b26">26</button><button class="event_bar" style="display:none;"></button><button  class="task_bar" style="display:none;"></button><button  class="rem_bar" style="display:none;"></button></td>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b27">27</button><button class="event_bar" style="display:none;"></button><button  class="task_bar" style="display:none;"></button><button  class="rem_bar" style="display:none;"></button></td>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b28">28</button><button class="event_bar" style="display:none;"></button><button  class="task_bar" style="display:none;"></button><button  class="rem_bar" style="display:none;"></button></td>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b29">29</button><button class="event_bar" style="display:none;"></button><button  class="task_bar" style="display:none;"></button><button  class="rem_bar" style="display:none;"></button></td>
				<td class="d"><button onclick="openeventmodal(0)" style="width:100%;" id="b30">30</button><button class="event_bar" style="display:none;"></button><button  class="task_bar" style="display:none;"></button><button  class="rem_bar" style="display:none;"></button></td>
				<td class="d"> </div>
				<td class="d"> </div>
			</tr>
	</div>

</div>

<script src="commonjs.js"></script>

</body>

</html>
