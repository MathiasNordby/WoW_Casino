<?php
/**
 * Created by IntelliJ IDEA.
 * User: Nordby
 * Date: 17-05-2017
 * Time: 01:13
 */

include_once 'dbConnection.php';

//SECURELY START A PHP SESSION
function secure_session_start() {
    //Session_Name Custom Made
    $session_name = 'secure_session_id';
    //Sets the session_name to custom Session name + need to do this to set cookie_parameters without it's bugging.
    session_name($session_name);

    //Boolean true, needs for cookie_parameter later. USED when set cookie_params
    $secure = true;
    //This stops JavaScript for being able to access the session ID. USED when set cookie_params
    $http_only = true;

    //Forces session to only use cookies
    if(ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }

    //Gets current Cookie_Paramters
    $cookie_params = session_get_cookie_params();
    session_set_cookie_params($cookie_params["lifetime"], $cookie_params["path"], $cookie_params["domain"], true, true);

    //Starting PHP Session
    session_start();

    //Regenerate the session and delete the old one
    session_regenerate_id(true);
}

//LOGIN FUNCTION
function login() {

}
