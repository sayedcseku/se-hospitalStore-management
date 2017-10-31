alert('hey');
function validateForm() {
    var x = document.forms["loginform"]["Email"].value;
	var y = document.forms["loginform"]["Password"].value;
    if (x == "") {
        alert("Please input email");
        return false;
    }
	else if (y == "") {
        alert("Please input password");
        return false;
    }

    
