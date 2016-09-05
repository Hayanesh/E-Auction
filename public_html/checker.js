/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function checkcookies(){
    var username = getCookie("username");
    var password = getCookie("password");
    if(username!="")
    {
        document.getElementById("UN").value=username;
        document.getElementById("PWord").value=password;
    }
    else
    {
        alert("no previous cookies");
    }
}