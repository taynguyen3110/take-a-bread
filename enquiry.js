"use strict";

function saveData(firstname, lastname, email, address, phone, service, description, amount) {
    if (typeof (Storage) !== "undefined") {
        localStorage.setItem("firstname", firstname);
        localStorage.setItem("lastname", lastname);
        localStorage.setItem("email", email);
        localStorage.setItem("address", address);
        localStorage.setItem("phone", phone);
        localStorage.setItem("service", service);
        localStorage.setItem("description", description);
        localStorage.setItem("amount", amount);
    }
}

function loadData() {
    if (typeof (Storage) !== "undefined") {
        document.getElementById("firstname").value = localStorage.getItem("firstname");
        document.getElementById("lastname").value = localStorage.getItem("lastname");
        document.getElementById("email").value = localStorage.getItem("email");
        document.getElementById("address").value = localStorage.getItem("address");
        document.getElementById("phone").value = localStorage.getItem("phone");
        document.getElementById("service").value = localStorage.getItem("service");
        document.getElementById("description").value = localStorage.getItem("description");
        document.getElementById("amount").value = localStorage.getItem("amount");
        document.getElementById("amount").style.color = "black";
    }
}

function processInput() {
    var firstname = document.getElementById("firstname").value.trim();
    var lastname = document.getElementById("lastname").value.trim();
    var email = document.getElementById("email").value.trim();
    var address = document.getElementById("address").value.trim();
    var suburb = document.getElementById("suburb").value.trim();
    var phone = document.getElementById("phone").value.trim();
    var state = document.getElementById("state").value;
    var postcode = document.getElementById("postcode").value.trim();
    var description = document.getElementById("description").value;
    var amount = document.getElementById("amount").value;
    // Chosen services displayed
    var serviceName = document.getElementById("service").options[document.getElementById("service").selectedIndex].label;
    var fullService = serviceName;
    for (let i = 1; i < 6; i++) {
        const extra = document.getElementById(`extra0${i}`);
        if (extra.checked)
            fullService = fullService + ", " + document.querySelector(`label[for="${extra.id}"]`).innerText;
    }
    // Address concatinate
    var fullAddress = "";
    fullAddress += address + ", " + suburb + ", " + state + " " + postcode;
    saveData(firstname, lastname, email, fullAddress, phone, fullService, description, amount);
    return true;
}

function goToHomepage() {
    window.location.href = "index.php";
}

function gotoPage(page) {
    window.location.href = page;
}

function activeMenu() {
    const menus = ["index", "product", "enquire", "about", "enhancement", "manage"];
    var menu = document.getElementsByClassName("menu");
    for (var i = 0; i < menus.length; i++) {
        if (document.getElementById(menus[i]) != null) {
            menu[i].className = menu[i].className.replace("menu", "focused");
        }
    }
}

function registerBtn() {
    document.getElementById("manage-login").style.display = "none";
    document.getElementById("manage-register").style.display = "block";
    document.getElementById("loginid").value = "";
    document.getElementById("loginpwd").value = "";
}

function backBtn() {
    document.getElementById("manage-login").style.display = "block";
    document.getElementById("manage-register").style.display = "none";
    document.getElementById("registerid").value = "";
    document.getElementById("registerpwd").value = "";
    document.getElementById("confirmpwd").value = "";
}

function showUpdate() {
    var updateBtn = document.getElementById("update-btn");
    var orderNumber = parseInt(document.getElementById("orderNumber").innerHTML);
    for (var i = 1; i <= orderNumber; i++) {
        var updateOption = document.getElementById(`updateOption${i}`);
        updateOption.addEventListener("change", () => {
            updateBtn.style.display = "block";
            console.log("the function, it worked!");
        });
    }
}

function init() {
    activeMenu();
    if (document.getElementById("enquire") != null && document.getElementById("extra01") != null) {
        calculateAmount();
        updateAmount();
        document.getElementById("enqform").onsubmit = processInput;
    }
    else if (document.getElementById("payment") != null) {
        loadData();
        payCountdown();
        document.getElementById("paymentform").onsubmit = true;
    }
    else if (document.getElementById("enhancement") != null) {
        document.getElementById("defaultOpen").click();
    }
    else if (document.getElementById("manage") != null) {
        showUpdate();
        console.log("the loading, it worked!");
    }
}

window.onload = init;
