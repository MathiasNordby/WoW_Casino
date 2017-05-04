/**
 * Created by Nordby on 01-05-2017.
 */


/*
    Execute these functions through a function when HTML.document is fully loaded.
 */

$(document).ready(function() {
    readAccount();
});

/*
    Create account using AJAX passing it to Database
 */
function createAccount() {
    var username = $('#username').val();
    var password = $('#password').val();
    var email = $('#email').val();
    var accountStatus = $('#accountStatus').val();
    $.post("http://localhost/WoW_Casino/src/phpApi/createAccount.php",
        { username: username, pass: password, email: email, accountStatus: accountStatus}).done(function(data) {
        alert ("Account Created");
        alert (accountStatus);
    });
}

/*
    read account using AJAX reading the PHP that connects with MySQL-Database
 */
function readAccount() {
    $.get("http://localhost/WoW_Casino/src/phpApi/accountAPI.php", function(data) {
        $("#readAccount").empty();
        var accountArray = JSON.parse(data);
        console.log(accountArray);

        for (i = 0; i < accountArray.length; i++) {
            var row = "" +
                "<tr>" +
                "<td>"+ accountArray[i].data.id +"</td>" +
                "<td>"+ accountArray[i].data.username +"</td>" +
                "<td>"+ accountArray[i].data.pass +"</td>" +
                "<td>"+ accountArray[i].data.email +"</td>" +
                "<td>"+ accountArray[i].data.balance +"</td>" +
                "<td>"+ accountArray[i].data.location +"</td>" +
                "<td>"+ accountArray[i].data.lt_online +"</td>" +
                "<td>"+ accountArray[i].data.account_status+"</td>" +
                "</tr>"
            $("#readAccount").append(row);
        }
    });
}

/*
    Update Account using AJAX reading the PHP that connects with MySQL-database
 */
function updateAccount() {

}


/*
    Display each section of C-R-U-D
 */
function showCreateAccount() {
    document.getElementById('adminCreateAccount').style.display = "block";
    document.getElementById('adminReadAccount').style.display = "none";
    document.getElementById('adminUpdateAccount').style.display = "none";
    document.getElementById('adminDeleteAccount').style.display = "none";
}

function showReadAccount() {
    document.getElementById('adminCreateAccount').style.display = "none";
    document.getElementById('adminReadAccount').style.display = "block";
    document.getElementById('adminUpdateAccount').style.display = "none";
    document.getElementById('adminDeleteAccount').style.display = "none";
}

function showUpdateAccount() {
    document.getElementById('adminCreateAccount').style.display = "none";
    document.getElementById('adminReadAccount').style.display = "none";
    document.getElementById('adminUpdateAccount').style.display = "block";
    document.getElementById('adminDeleteAccount').style.display = "none";
}

function showDeleteAccount() {
    document.getElementById('adminCreateAccount').style.display = "none";
    document.getElementById('adminReadAccount').style.display = "none";
    document.getElementById('adminUpdateAccount').style.display = "none";
    document.getElementById('adminDeleteAccount').style.display = "block";
}