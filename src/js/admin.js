/**
 * Created by Nordby on 01-05-2017.
 */


/*
    Execute these functions through a function when HTML.document is fully loaded.
 */
/*
document.ready(function() {

});
*/
/*
    Create account using AJAX passing it to Database
 */
function createAccount() {
    var username = $('#username').val();
    var password = $('#password').val();
    var email = $('#email').val();
    var accountStatus = $('#accountStatus').val();
    $.ajax({
        type: "POST",
        url: "phpApi/CRUDAPI.php?p=create",
        data: "username="+username+"&pass="+password+"&email="+email+"&accountStatus="+accountStatus,
        success: function(respons) {
            alert('Data is succesfully inserted into Database');
        }
    });
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