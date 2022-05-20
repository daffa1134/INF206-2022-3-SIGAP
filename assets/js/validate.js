function validateForm() {
    var z,
        x,
        y,
        valid = true;
    email = document.tambahdoc.email;
    x = document.getElementById("part1");
    z = document.getElementById('nextstep');
    y = x.getElementsByTagName("input");
    n = document.getElementById("tambahdoc");

    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
            // add an "is-invalid" class to the field:
            y[i].className = "form-control borderTen is-invalid";
            // and set the current valid status to false:
            valid = false;
        } else if (y[i].value != "" && y[i].className == "form-control borderTen is-invalid") {
            // if it's not empty, remove the "is-invalid" class
            // and set the current valid status to true
            y[i].className = "form-control borderTen";
        }
    }

    if (validateemail()) {
        if (valid) {
            z.dataset.bsSlide = "next";
            z.click();
        }
    } else {
        email.className = "form-control borderTen is-invalid";
    }
}

function validating() {
    var x,
        y,
        z,
        valid = true;

    x = document.getElementById("part2");
    z = document.getElementById("siap");
    y = x.getElementsByTagName("input");

    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
            // add an "is-invalid" class to the field:
            y[i].className = "form-control borderTen is-invalid";
            // and set the current valid status to false:
            valid = false;
        } else if (y[i].value != "" && y[i].className == "form-control borderTen is-invalid") {
            // if it's not empty, remove the "is-invalid" class
            // and set the current valid status to true
            y[i].className = "form-control borderTen";
        }
    }

    if (valid) {
        z.setAttribute("type", "submit");
    }
}

function validateemail() {
    var x = document.tambahdoc.email.value;
    var y = document.getElementById("emailchecker");
    var atposition = x.indexOf("@");
    var dotposition = x.lastIndexOf(".");
    if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= x.length) {
        y.hidden = false;
        return false;
    } else {
        y.hidden = true;
    }
    return true;
}
