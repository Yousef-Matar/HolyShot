var slideIndex = 0;


function logout() {
    $.get('logout.php');
    return false;
}



function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }

    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 3000);
}

function tabs(evt, tabID) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace("active", "");
    }
    document.getElementById(tabID).style.display = "block";
    evt.currentTarget.className += "active";
}

function formtoggle(formid) {
    var formparent = document.getElementById(formid);
    var form = formparent.querySelector("form");
    if (formparent.style.display === "none" || formparent.style.display === "") {
        formparent.style.display = "block";
    } else {
        form.reset();
        formparent.style.display = "none";
    }
}

function formtoggleAddReport() {
    var formparent = document.getElementById('AddReportForm');
    var form = formparent.querySelector("form");
    if (formparent.style.display === "none" || formparent.style.display === "") {
        formparent.style.display = "block";
    } else {
        form.reset();
        formparent.style.display = "none";
    }
}
/*
function getMedicalFileUrlParams() {
    var variables = [],
        hash;
    var hashes = window.location.href
        .slice(window.location.href.indexOf("?") + 1)
        .split("&");
    for (var currentIndex = 0; currentIndex < hashes.length; currentIndex++) {
        hash = hashes[currentIndex].split("=");
        variables.push(hash[0]);
        variables[hash[0]] = hash[1];
    }
    var patientID = variables["patientID"];
    var patientname = variables["patientname"];
    document.getElementById("PatientMedicalID").innerText = document
        .getElementById("PatientMedicalID")
        .innerText.concat(" ")
        .concat(patientID);
    document.getElementById("PatientName").innerText = document
        .getElementById("PatientName")
        .innerText.concat(" ")
        .concat(patientname);
}*/

/*function SendMedicalFileUrlParams(patientID, patientName, index) {
    var value1 = document.getElementsByName(patientID)[index].innerText;
    var value2 = document.getElementsByName(patientName)[index].innerText;
    var queryString = "?patientID=" + value1 + "&patientname=" + value2;
    window.open("./MedicalFile.html" + queryString);
}
*/

/*
function getScheduleUrlParams() {
    var variables = [],
        hash;
    var hashes = window.location.href
        .slice(window.location.href.indexOf("?") + 1)
        .split("&");
    for (var currentIndex = 0; currentIndex < hashes.length; currentIndex++) {
        hash = hashes[currentIndex].split("=");
        variables.push(hash[0]);
        variables[hash[0]] = hash[1];
    }
    var doctorID = variables["doctorID"];
    document.getElementById("DoctorMedicalID").innerText = document
        .getElementById("DoctorMedicalID")
        .innerText.concat(" ")
        .concat(doctorID);
}

function SendScheduleUrlParams(drID) {
    var value1 = drID;
    var queryString = "?doctorID=" + value1;
    window.open("./ViewSchedule.html" + queryString);
}
*/
function refresh() {
    setInterval('location.reload()', 1000);

}
/*
$(document).ready(function() {
            var doctorRowIdx = 1;
            var receptionistRowIdx = 1;
            var reportRowIdx = 2;


            //Admin Adding Doctor
            $("#AddDoctorForm").on("submit", function(e) {
        //Validating the form before adding the row in the table
        if (validateForm("AddDoctorForm") != false) {
            $("#ManageDoctorTable").append(`<tr id="R${++doctorRowIdx}">
			<td>${document.getElementById("doctorname").value}</td>
      <td>${document.getElementById("doctorusername").value}</td>
      <td>${document.getElementById("doctorshift").value}</td>
      <td>${document.getElementById("doctorphone").value}</td>
      <td>${document.getElementById("doctorspecilization").value}</td>
      <td>
        <button class="s-red-btn"  id="FireDoctorBtn">Fire <i class="fa fa-minus"></i></button>
      </td>
			</tr>`);
        }
        //to prevent form reloading the page on submission
        e.preventDefault();
    });
    $("#ManageDoctorTable").on("click", "#FireDoctorBtn", function() {
        var child = $(this).closest("tr").nextAll();
        $(this).closest("tr").remove();
        doctorRowIdx--;
    });
    
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //Doctor Adding Report
              $("#AddReportForm").on("submit", function(e) {
        //Validating the form before adding the row in the table
        if (validateForm("AddReportForm") != false) {
            $("#MedicalReportTable").append(`<tr id="R${++reportRowIdx}">
			<td>${document.getElementById("reportID").value}</td>
			<td>${document.getElementById("appointmentdate").value}</td>
      <td>${document.getElementById("appointmenttime").value}</td>
      <td>${document.getElementById("doctorname").value}</td>
      <td>${document.getElementById("diagnosis").value}</td>
      <td>${document.getElementById("prescription").value}</td>
			</tr>`);
        }
        //to prevent form reloading the page on submission
        e.preventDefault();
    });
    
            //////////////////////////////////////////////////////////////////////////////////////////////////////
            //Admin Adding Receptionist
             $("#AddReceptionistForm").on("submit", function(e) {
        //Validating the form before adding the row in the table
        if (validateForm("AddReceptionistForm") != false) {
            $("#ManageReceptionistTable").append(`<tr id="R${++receptionistRowIdx}">
		
			<td>${document.getElementById("receptionistname").value}</td>
      <td>${document.getElementById("receptionistusername").value}</td>
      <td>${document.getElementById("receptionistshift").value}</td>
      <td>
        <button class="s-red-btn"  id="FireReceptionistBtn">Fire <i class="fa fa-minus"></i></button>
      </td>
			</tr>`);
        }
        //to prevent form reloading the page on submission
        e.preventDefault();
    });
    $("#ManageReceptionistTable").on(
        "click",
        "#FireReceptionistBtn",
        function() {
            var child = $(this).closest("tr").nextAll();
            $(this).closest("tr").remove();
            receptionistRowIdx--;
        }
    );
});*/
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Validations
//^ start of a string
//$ end of a string
//i indicates case insensitive
function validateForm(formid) {
    //ID REGEX
    //Remove
    const patientIDregex = /^P[0-9]+$/i;
    const doctorIDregex = /^DR[0-9]+$/i;
    const receptionistIDregex = /^R[0-9]+$/i;
    //
    const reportIDregex = /^report-[0-9]+$/i;
    //FULL NAME / STRICT LETTERS / STRICT NUMBERS
    const fullnameregex = /^[a-zA-Z]+\s[a-zA-Z]+$/;
    const onlylettersregex = /^[a-zA-Z]+$/;
    const onlynumbersregex = /^[0-9]+$/;
    //Email allowing all types of Characters/Numbers
    const emailregex =
        /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    //CONTAIN REGEX
    const containlettersregex = /[a-zA-Z]+/;
    const containnumbersregex = /[0-9]+/;
    var formparent = document.getElementById(formid);
    var form = formparent.querySelector("form");
    //Boolean for validation
    var validationstatus = true;
    //Book Appointment Validation
    if (formid == "appForm") {
        var inputvalue = form["patName"].value;
        var inputfield = form["patName"];
        if (
            onlylettersregex.test(inputvalue) == false &&
            fullnameregex.test(inputvalue) == false
        ) {
            validationstatus = false;
            alert(
                "Full name must contain only letters and may contain a whitespace."
            );
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (validationstatus) {
            inputfield.style.border = "none";
        } else {
            inputfield.style.border = "solid";
            inputfield.style.borderWidth = "4px";
            inputfield.style.borderColor = "red";
        }
    }
    //Update Profile Validation
    if (formid == "tab0") {
        inputvalue = form["fname"].value;
        inputfield = form["fname"];
        if (
            onlylettersregex.test(inputvalue) == false &&
            fullnameregex.test(inputvalue) == false
        ) {
            validationstatus = false;
            alert(
                "Full name must contain only letters and may contain a whitespace."
            );
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (validationstatus) {
            inputfield.style.border = "none";
        } else {
            inputfield.style.border = "solid";
            inputfield.style.borderWidth = "4px";
            inputfield.style.borderColor = "red";
        }
        inputvalue = form["email"].value;
        inputfield = form["email"];
        if (emailregex.test(inputvalue) == false) {
            validationstatus = false;
            alert("Email must contain '@' and '.' and atleast two characters");
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (validationstatus) {
            inputfield.style.border = "none";
        } else {
            inputfield.style.border = "solid";
            inputfield.style.borderWidth = "4px";
            inputfield.style.borderColor = "red";
        }
        var inputvalue = form["newpsw"].value;
        var inputfield = form["newpsw"];
        if (inputvalue.length < 8) {
            validationstatus = false;
            alert("New password length not enough, minimum 8.");
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (
            containlettersregex.test(inputvalue) == false ||
            containnumbersregex.test(inputvalue) == false
        ) {
            validationstatus = false;
            alert("New password must contain both letters and numbers.");
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (validationstatus) {
            inputfield.style.border = "none";
        } else {
            inputfield.style.border = "solid";
            inputfield.style.borderWidth = "4px";
            inputfield.style.borderColor = "red";
        }
    }
    //Login Form Validation
    if (formid == "LoginForm") {
        inputvalue = form["username"].value;
        inputfield = form["username"];
        if (inputvalue.length < 6) {
            validationstatus = false;
            alert("Username length not enough, minimum 6.");
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (
            containlettersregex.test(inputvalue) == false ||
            containnumbersregex.test(inputvalue) == false
        ) {
            validationstatus = false;
            alert("Username must contain both letters and numbers.");
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (validationstatus) {
            inputfield.style.border = "none";
        } else {
            inputfield.style.border = "solid";
            inputfield.style.borderWidth = "4px";
            inputfield.style.borderColor = "red";
        }
        var inputvalue = form["password"].value;
        var inputfield = form["password"];
        if (inputvalue.length < 8) {
            validationstatus = false;
            alert("Password length not enough, minimum 8.");
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (
            containlettersregex.test(inputvalue) == false ||
            containnumbersregex.test(inputvalue) == false
        ) {
            validationstatus = false;
            alert("Password must contain both letters and numbers.");
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (validationstatus) {
            inputfield.style.border = "none";
        } else {
            inputfield.style.border = "solid";
            inputfield.style.borderWidth = "4px";
            inputfield.style.borderColor = "red";
        }
    }
    //Registeration Form Validation
    if (formid == "RegisterForm") {
        var inputvalue = form["fname"].value;
        var inputfield = form["fname"];
        if (onlylettersregex.test(inputvalue) == false &&
            fullnameregex.test(inputvalue) == false) {
            validationstatus = false;
            alert("Full name must contain only letters and may contain one white space.");
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (validationstatus) {
            inputfield.style.border = "none";
        } else {
            inputfield.style.border = "solid";
            inputfield.style.borderWidth = "4px";
            inputfield.style.borderColor = "red";
        }

        inputvalue = form["username"].value;
        inputfield = form["username"];
        if (inputvalue.length < 6) {
            validationstatus = false;
            alert("Username length not enough, minimum 6.");
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (
            containlettersregex.test(inputvalue) == false ||
            containnumbersregex.test(inputvalue) == false
        ) {
            validationstatus = false;
            alert("Username must contain both letters and numbers.");
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (validationstatus) {
            inputfield.style.border = "none";
        } else {
            inputfield.style.border = "solid";
            inputfield.style.borderWidth = "4px";
            inputfield.style.borderColor = "red";
        }
        inputvalue = form["email"].value;
        inputfield = form["email"];
        if (emailregex.test(inputvalue) == false) {
            validationstatus = false;
            alert("Email must contain '@' and '.' and atleast two characters");
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (validationstatus) {
            inputfield.style.border = "none";
        } else {
            inputfield.style.border = "solid";
            inputfield.style.borderWidth = "4px";
            inputfield.style.borderColor = "red";
        }
        var inputvalue = form["password"].value;
        var inputfield = form["password"];
        if (inputvalue.length < 8) {
            validationstatus = false;
            alert("Password length not enough, minimum 8.");
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (
            containlettersregex.test(inputvalue) == false ||
            containnumbersregex.test(inputvalue) == false
        ) {
            validationstatus = false;
            alert("Password must contain both letters and numbers.");
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (validationstatus) {
            inputfield.style.border = "none";
        } else {
            inputfield.style.border = "solid";
            inputfield.style.borderWidth = "4px";
            inputfield.style.borderColor = "red";
        }
        var inputvalue = form["password"].value;
        var confirminputvalue = form["password-confirm"].value;
        var inputfield = form["password-confirm"];
        if (inputvalue != confirminputvalue) {
            validationstatus = false;
            alert("Passwords not matching");
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (validationstatus) {
            inputfield.style.border = "none";
        } else {
            inputfield.style.border = "solid";
            inputfield.style.borderWidth = "4px";
            inputfield.style.borderColor = "red";
        }
    }
    //Receptionist View Patient Medical File Validation
    /* if (formid == "ViewMedicalFileForm") {
         var inputvalue = form["patientID"].value;
         var inputfield = form["patientID"];
         if (inputvalue.length < 2) {
             validationstatus = false;
             alert("Patient ID must be at least 2 characters.");
             if (validationstatus) {
                 inputfield.style.border = "none";
             } else {
                 inputfield.style.border = "solid";
                 inputfield.style.borderWidth = "4px";
                 inputfield.style.borderColor = "red";
             }
             return false;
         }
         if (patientIDregex.test(inputvalue) == false) {
             validationstatus = false;
             alert(
                 "Patient ID must contain 'P' as the first character and the rest numbers."
             );
             if (validationstatus) {
                 inputfield.style.border = "none";
             } else {
                 inputfield.style.border = "solid";
                 inputfield.style.borderWidth = "4px";
                 inputfield.style.borderColor = "red";
             }
             return false;
         }
         if (validationstatus) {
             inputfield.style.border = "none";
         } else {
             inputfield.style.border = "solid";
             inputfield.style.borderWidth = "4px";
             inputfield.style.borderColor = "red";
         }
         inputvalue = form["patientname"].value;
         inputfield = form["patientname"];
         if (
             onlylettersregex.test(inputvalue) == false &&
             fullnameregex.test(inputvalue) == false
         ) {
             validationstatus = false;
             alert(
                 "Patient name must contain letters and may contain one white space."
             );
             if (validationstatus) {
                 inputfield.style.border = "none";
             } else {
                 inputfield.style.border = "solid";
                 inputfield.style.borderWidth = "4px";
                 inputfield.style.borderColor = "red";
             }
             return false;
         }
         if (validationstatus) {
             inputfield.style.border = "none";
         } else {
             inputfield.style.border = "solid";
             inputfield.style.borderWidth = "4px";
             inputfield.style.borderColor = "red";
         }
     }
     //Receptionist View Doctor Schedule Validation
     if (formid == "ViewDoctorSchedule") {
         var inputvalue = form["doctorID"].value;
         var inputfield = form["doctorID"];
         if (doctorIDregex.test(inputvalue) == false) {
             validationstatus = false;
             alert(
                 "Doctor ID must contain 'DR' as the first characters and the rest numbers."
             );
             if (validationstatus) {
                 inputfield.style.border = "none";
             } else {
                 inputfield.style.border = "solid";
                 inputfield.style.borderWidth = "4px";
                 inputfield.style.borderColor = "red";
             }
             return false;
         }
         if (validationstatus) {
             inputfield.style.border = "none";
         } else {
             inputfield.style.border = "solid";
             inputfield.style.borderWidth = "4px";
             inputfield.style.borderColor = "red";
         }
     }*/
    //Change Password Validation
    if (
        formid == "ReceptionistPasswordForm" ||
        formid == "AdminPasswordForm" ||
        formid == "DoctorPasswordForm"
    ) {
        var inputvalue = form["newpsw"].value;
        var inputfield = form["newpsw"];
        if (inputvalue.length < 8) {
            validationstatus = false;
            alert("New password length not enough, minimum 8.");
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (
            containlettersregex.test(inputvalue) == false ||
            containnumbersregex.test(inputvalue) == false
        ) {
            validationstatus = false;
            alert("New password must contain both letters and numbers.");
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (validationstatus) {
            inputfield.style.border = "none";
        } else {
            inputfield.style.border = "solid";
            inputfield.style.borderWidth = "4px";
            inputfield.style.borderColor = "red";
        }
    }
    //Doctor Adding a Report Validation
    if (formid == "AddReportForm") {
        var inputvalue = form["reportID"].value;
        var inputfield = form["reportID"];
        if (reportIDregex.test(inputvalue) == false) {
            validationstatus = false;
            alert("Report ID must contain 'report-' and the rest numbers.");
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (validationstatus) {
            inputfield.style.border = "none";
        } else {
            inputfield.style.border = "solid";
            inputfield.style.borderWidth = "4px";
            inputfield.style.borderColor = "red";
        }
        inputvalue = form["puname"].value;
        inputfield = form["puname"];
        if (inputvalue.length < 6) {
            validationstatus = false;
            alert("Patient username length not enough, minimum 6.");
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (
            containlettersregex.test(inputvalue) == false ||
            containnumbersregex.test(inputvalue) == false
        ) {
            validationstatus = false;
            alert("Patient username must contain both letters and numbers.");
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (validationstatus) {
            inputfield.style.border = "none";
        } else {
            inputfield.style.border = "solid";
            inputfield.style.borderWidth = "4px";
            inputfield.style.borderColor = "red";
        }
        inputvalue = form["diagnosis"].value;
        inputfield = form["diagnosis"];
        if (onlylettersregex.test(inputvalue) == false) {
            validationstatus = false;
            alert("Diagnosis must contain letters only.");
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (validationstatus) {
            inputfield.style.border = "none";
        } else {
            inputfield.style.border = "solid";
            inputfield.style.borderWidth = "4px";
            inputfield.style.borderColor = "red";
        }
        inputvalue = form["prescription"].value;
        inputfield = form["prescription"];
        if (onlylettersregex.test(inputvalue) == false) {
            validationstatus = false;
            alert("Prescription must contain letters only.");
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (validationstatus) {
            inputfield.style.border = "none";
        } else {
            inputfield.style.border = "solid";
            inputfield.style.borderWidth = "4px";
            inputfield.style.borderColor = "red";
        }
    }
    //Admin Adding Doctor Validation

    inputvalue = form["doctorname"].value;
    inputfield = form["doctorname"];
    if (
        onlylettersregex.test(inputvalue) == false &&
        fullnameregex.test(inputvalue) == false
    ) {
        validationstatus = false;
        alert(
            "Doctor name must contain letters and may contain one white space."
        );
        if (validationstatus) {
            inputfield.style.border = "none";
        } else {
            inputfield.style.border = "solid";
            inputfield.style.borderWidth = "4px";
            inputfield.style.borderColor = "red";
        }
        return false;
    }
    if (validationstatus) {
        inputfield.style.border = "none";
    } else {
        inputfield.style.border = "solid";
        inputfield.style.borderWidth = "4px";
        inputfield.style.borderColor = "red";
    }
    inputvalue = form["doctorusername"].value;
    inputfield = form["doctorusername"];
    if (inputvalue.length < 6) {
        validationstatus = false;
        alert("Doctor username length not enough, minimum 6.");
        if (validationstatus) {
            inputfield.style.border = "none";
        } else {
            inputfield.style.border = "solid";
            inputfield.style.borderWidth = "4px";
            inputfield.style.borderColor = "red";
        }
        return false;
    }
    if (
        containlettersregex.test(inputvalue) == false ||
        containnumbersregex.test(inputvalue) == false
    ) {
        validationstatus = false;
        alert("Doctor username must contain both letters and numbers.");
        if (validationstatus) {
            inputfield.style.border = "none";
        } else {
            inputfield.style.border = "solid";
            inputfield.style.borderWidth = "4px";
            inputfield.style.borderColor = "red";
        }
        return false;
    }
    if (validationstatus) {
        inputfield.style.border = "none";
    } else {
        inputfield.style.border = "solid";
        inputfield.style.borderWidth = "4px";
        inputfield.style.borderColor = "red";
    }
    inputvalue = form["doctorphone"].value;
    inputfield = form["doctorphone"];
    if (onlynumbersregex.test(inputvalue) == false) {
        validationstatus = false;
        alert("Doctor phone must contain numbers only.");
        if (validationstatus) {
            inputfield.style.border = "none";
        } else {
            inputfield.style.border = "solid";
            inputfield.style.borderWidth = "4px";
            inputfield.style.borderColor = "red";
        }
        return false;
    }
    if (validationstatus) {
        inputfield.style.border = "none";
    } else {
        inputfield.style.border = "solid";
        inputfield.style.borderWidth = "4px";
        inputfield.style.borderColor = "red";
    }

    //Admin Adding Receptionist Validation
    if (formid == "AddReceptionistForm") {
        var inputvalue = form["receptionistID"].value;
        var inputfield = form["receptionistID"];
        if (receptionistIDregex.test(inputvalue) == false) {
            validationstatus = false;
            alert(
                "Receptionist ID must contain 'R' as the first character and the rest numbers."
            );
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (validationstatus) {
            inputfield.style.border = "none";
        } else {
            inputfield.style.border = "solid";
            inputfield.style.borderWidth = "4px";
            inputfield.style.borderColor = "red";
        }
        inputvalue = form["receptionistname"].value;
        inputfield = form["receptionistname"];
        if (
            onlylettersregex.test(inputvalue) == false &&
            fullnameregex.test(inputvalue) == false
        ) {
            validationstatus = false;
            alert(
                "Receptionist name must contain letters and may contain one white space."
            );
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (validationstatus) {
            inputfield.style.border = "none";
        } else {
            inputfield.style.border = "solid";
            inputfield.style.borderWidth = "4px";
            inputfield.style.borderColor = "red";
        }
        inputvalue = form["receptionistusername"].value;
        inputfield = form["receptionistusername"];
        if (inputvalue.length < 6) {
            validationstatus = false;
            alert("Receptionist username length not enough, minimum 6.");
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (
            containlettersregex.test(inputvalue) == false ||
            containnumbersregex.test(inputvalue) == false
        ) {
            validationstatus = false;
            alert("Receptionist username must contain both letters and numbers.");
            if (validationstatus) {
                inputfield.style.border = "none";
            } else {
                inputfield.style.border = "solid";
                inputfield.style.borderWidth = "4px";
                inputfield.style.borderColor = "red";
            }
            return false;
        }
        if (validationstatus) {
            inputfield.style.border = "none";
        } else {
            inputfield.style.border = "solid";
            inputfield.style.borderWidth = "4px";
            inputfield.style.borderColor = "red";
        }
    }
}