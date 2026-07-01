function togglePassword(){

    const password=document.getElementById("password");

    if(password.type==="password"){

        password.type="text";

    }else{

        password.type="password";

    }

}

function checkStrength(){

    const password=document.getElementById("password").value;

    const strength=document.getElementById("strength");

    if(password.length==0){

        strength.innerHTML="";

    }

    else if(password.length<6){

        strength.style.color="red";

        strength.innerHTML="Weak Password";

    }

    else if(password.length<10){

        strength.style.color="orange";

        strength.innerHTML="Medium Password";

    }

    else{

        strength.style.color="green";

        strength.innerHTML="Strong Password";

    }

}