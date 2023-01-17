function toggleRegistration() {
    hideCvSUCourses()


    var reqRegGuide = document.getElementById("reg-btn")
    var regContent = document.getElementById("guides")
    var endFileRequestBtn = document.getElementById("end-cta-btn")
    regContent.style.display = "block";
    endFileRequestBtn.style.display = "block";
    reqRegGuide.style.color = "#29711D";

}

function closeRegistration() {
    var reqRegGuide = document.getElementById("reg-btn")
    var regContent = document.getElementById("guides")
    var endFileRequestBtn = document.getElementById("end-cta-btn")

    regContent.style.display = "none";
    endFileRequestBtn.style.display = "none";
    reqRegGuide.style.color = "#1D1D1D";

}

function showCvSUCourses() {
    closeRegistration()

    var btn = document.getElementById("courses-btn")
    var content = document.getElementById("reg_courses")
    btn.style.color = "#29711D";
    content.style.display = "block"
}

function hideCvSUCourses() {

    var btn = document.getElementById("courses-btn")
    var content = document.getElementById("reg_courses")

    content.style.display = "none"
    btn.style.color = "#1D1D1D";

}

function toggleGuardian() {
    // Get the checkbox
    var checkBox = document.getElementById("myCheck");
    var checkBox2 = document.getElementById("myCheck2");
    // Get the output text
    var text1 = document.getElementById("guardianfield1");
    var text2 = document.getElementById("guardianfield2");
    var text3 = document.getElementById("guardianfield3");

    // If the checkbox is checked, display the output text
    if (checkBox.checked == true || checkBox2.checked == true) {
        text1.style.display = "none";
        text2.style.display = "none";
        text3.style.display = "none";
    } else {
        text1.style.display = "block";
        text2.style.display = "block";
        text3.style.display = "block";

    }

    if (checkBox.checked == true && checkBox2.checked == true) {
        alert("Only 1 guardian can apply. ");
        checkBox.checked = false;
        checkBox2.checked = false

        text1.style.display = "block";
        text2.style.display = "block";
        text3.style.display = "block";
    }
}


function onlyNumberKey(evt) {

    // Only ASCII character in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && ASCIICode != 43 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}



// Select the radio buttons
const radioButtons = document.querySelectorAll('input[name="gender"]');

// Loop through the radio buttons
for (const button of radioButtons) {
    // Add an event listener for the change event
    button.addEventListener('change', function () {
        // Deselect all buttons except the selected button
        for (const otherButton of radioButtons) {
            if (otherButton !== this) {
                otherButton.checked = false;
            }
        }
    });
}


function hideLoginTab() {
    var logintab = document.getElementById('login-tab')
    var regtab = document.getElementById('reg-tab')

    if (window.getComputedStyle(regtab).display == "none") {
        // logintab.style.display = "none"
        regtab.style.display = "flex"


    } else if (window.getComputedStyle(logintab).display == "none") {
        logintab.style.display = "flex"
        regtab.style.display = "none"
        window.getComputedStyle(regtab).display == "none"
    }

}   