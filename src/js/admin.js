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
    $.post("phpApi/createAccount.php",
        { username: username, pass: password, email: email, accountStatus: accountStatus}).done(function(data) {
        alert ("Account Created");
        alert (accountStatus);
    });
}

/*
    read account using AJAX reading the PHP that connects with MySQL-Database
 */
//Read Account Table
function readAccount() {
        $.get("phpApi/accountAPI.php", function (data) {
            $("#readAccount").empty();
            var accountArray = JSON.parse(data);
            console.log(accountArray);

            for (i = 0; i < accountArray.length; i++) {
                var row = "" +
                    "<tr>" +
                    "<td>" + accountArray[i].data.id + "</td>" +
                    "<td>" + accountArray[i].data.username + "</td>" +
                    "<td>" + accountArray[i].data.pass + "</td>" +
                    "<td>" + accountArray[i].data.email + "</td>" +
                    "<td>" + accountArray[i].data.balance + "</td>" +
                    "<td>" + accountArray[i].data.location + "</td>" +
                    "<td>" + accountArray[i].data.lt_online + "</td>" +
                    "<td>" + accountArray[i].data.account_status + "</td>" +
                    "</tr>"
                $("#readAccount").append(row);
            }
        });

//Update Account Table
        $.get("phpApi/accountAPI.php", function (data) {
            $("#updateAccount").empty();
            var accountArray = JSON.parse(data);
            console.log(accountArray);

            for (i = 0; i < accountArray.length; i++) {
                var row = "" +
                    "<tr>" +
                    "<td>" + accountArray[i].data.id + "</td>" +
                    "<td>" + accountArray[i].data.username + "</td>" +
                    "<td>" + accountArray[i].data.pass + "</td>" +
                    "<td>" + accountArray[i].data.email + "</td>" +
                    "<td>" + accountArray[i].data.account_status + "</td>" +
                    "<td>" + accountArray[i].data.isDeleted + "</td>" +
                    '<td><button class="btn btn-info" onclick="updateAccount(' + accountArray[i].data.id + ')">Update</button></td>' +
                    "</tr>"
                $("#updateAccount").append(row);
            }
        });

//Deleted Account Table
        $.get("phpApi/accountAPI_deleted.php", function (data) {
            $("#deleteAccount").empty();
            var accountArray = JSON.parse(data);
            console.log(accountArray);

            for (i = 0; i < accountArray.length; i++) {
                var row = "" +
                    "<tr>" +
                    "<td>" + accountArray[i].data.id + "</td>" +
                    "<td>" + accountArray[i].data.username + "</td>" +
                    "<td>" + accountArray[i].data.pass + "</td>" +
                    "<td>" + accountArray[i].data.email + "</td>" +
                    '<td><button class="btn btn-danger" onclick="undeleteAccount(' + accountArray[i].data.id + ')">Undelete</button></td>' +
                    "</tr>"
                $("#deleteAccount").append(row);
            }
        });
}

/*
    Update Account using AJAX reading the PHP that connects with MySQL-database
 */
function updateAccount() {

}

function undeleteAccount() {

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