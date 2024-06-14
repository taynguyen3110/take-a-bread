"use strict";

function payCountdown() {
    var seconds = 181;
    var intervalId = setInterval(function () {
        seconds--;
        document.getElementById("expand-btn").addEventListener("click", () => { clearInterval(intervalId); })
        if (seconds <= 0) {
            clearInterval(intervalId);
            document.getElementById("counter").innerHTML = "Time's up!";
            window.location.href = "enquire.html";
        } else {
            document.getElementById("counter").innerHTML = "You have " + seconds + " seconds to finish your payment";
        }
    }, 1000);
}

function updateAmount() {
    if (document.getElementById("extra01") != null) {
        document.getElementById("service").addEventListener("change", calculateAmount);
        document.getElementById("extra01").addEventListener("change", calculateAmount);
        document.getElementById("extra02").addEventListener("change", calculateAmount);
        document.getElementById("extra03").addEventListener("change", calculateAmount);
        document.getElementById("extra04").addEventListener("change", calculateAmount);
        document.getElementById("extra05").addEventListener("change", calculateAmount);
    }
}

function calculateAmount() {
    if (document.getElementById("extra01") != null) {
        var amount = 0;
        var service = document.getElementById("service").value;
        // calculate service
        if (service == "service01")
            amount = 1000;
        else if (service == "service02")
            amount = 1500;
        else if (service == "service03")
            amount = 2000;
        else if (service == "service04")
            amount = 1200;
        else if (service == "service05")
            amount = 3000;
        // calculate extra
        if (document.getElementById("extra01").checked)
            amount += 450;
        if (document.getElementById("extra02").checked)
            amount += 250;
        if (document.getElementById("extra03").checked)
            amount += 350;
        if (document.getElementById("extra04").checked)
            amount += 750;
        if (document.getElementById("extra05").checked)
            amount += 550;
        document.getElementById("amount").value = "$" + amount;
    }
}