"use strict";
// display list data on mylist page
function displayToDoList(arr) {
    let out = "";
    let i;
  for (i = 0; i < arr.length; i++) {
    out += "<tr><td>" + arr[i].task + "</td><td>" + arr[i].description + "</td><td><button>done</button></td></tr>";
  }
	// add the list to the table in the html
  document.getElementById("list").innerHTML = out;
}
displayToDoList(myList);
