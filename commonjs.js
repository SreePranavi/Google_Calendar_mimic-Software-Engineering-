function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
  var dropdowns = document.getElementsByClassName("dropdown-content");
  var i;
  for (i = 0; i < dropdowns.length; i++) {
    var openDropdown = dropdowns[i];
    if (openDropdown.classList.contains('show')) {
    openDropdown.classList.remove('show');
    }
  }
  }
}
// Get the modals
var modal = document.getElementsByClassName("modal");
var eventmodal = document.getElementById("Eventmodal");
var taskmodal = document.getElementById("TaskModal");
var remmodal = document.getElementById("ReminderModal");

// Get the buttons that opens the modals
var btn = document.getElementById("DateButton");
var eventbtn = document.getElementsByClassName("Eventbuttonclass");
var taskbtn = document.getElementsByClassName("Taskbuttonclass");
var rembtn = document.getElementsByClassName("Reminderbuttonclass");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close");

// When the user clicks on the button, open the modal
/*btn.onclick = function() {
eventmodal.style.display = "block";
}*/
function openeventmodal(){
eventmodal.style.display = "block";
taskmodal.style.display = "none";
remmodal.style.display = "none";
}
function opentaskmodal(){
eventmodal.style.display = "none";
taskmodal.style.display = "block";
remmodal.style.display = "none";
}
function openremmodal(){
eventmodal.style.display = "none";
taskmodal.style.display = "none";
remmodal.style.display = "block";
}
// When the user clicks on save, close the modal
span[0].onclick = function() {
eventmodal.style.display = "none";
}
span[1].onclick = function() {
taskmodal.style.display = "none";
}
span[2].onclick = function() {
remmodal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == eventmodal)
{eventmodal.style.display = "none";}
if (event.target == taskmodal)
{taskmodal.style.display = "none";}
if (event.target == remmodal)
{remmodal.style.display = "none";}
}

function addGuests(){
  var container = document.getElementById("addguestcontainer");
  var input = document.createElement("input");
  input.type = "text";
  guests.placeholder="someone@gmail.com";
  document.getElementById("addguestcontainer").appendChild(input);
  document.getElementById("addguestcontainer").appendChild(document.createElement("br"));
}
