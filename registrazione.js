//REGISTRAZIONE
document.addEventListener('DOMContentLoaded', function(){
    const form = document.getElementById('RegForm'); 

var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;

document.getElementById('RegBtn').addEventListener('click', function(event) {
    var nome = document.getElementById('nome').value;
    var cognome = document.getElementById('cognome').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var conferma_password = document.getElementById('conferma_password').value;
    var telefono = document.getElementById('telefono').value;

    if (!nome || !cognome || !email || !password || !conferma_password || !telefono) {
        alert('Tutti i campi sono obbligatori');
        event.preventDefault();
    } else if (password !== conferma_password) {
        alert('Le password sono diverse');
        event.preventDefault();
    } else if(!validateTelefono(telefono)) {
        alert("Il numero di telefono deve avere 10 numeri");
        event.preventDefault();
      }

function validateTelefono(telefono) {
  var nTel = /^\d{10}$/;
  return nTel.test(telefono);
}

document.getElementById('password').onchange = function() {
    if (!passwordPattern.test(this.value)) {
        alert("La password deve essere di minimo 6 caratteri e deve contenere almeno una lettera maiuscola, una minuscola e un carattere speciale");
        this.focus();
        return false;
    }
    return true;
        };
    });
});


//LOGIN NEL FILE hw1.js

// MOSTRA PASSWORD E NASCONDI PASSWORD

document.addEventListener("DOMContentLoaded", function() {
    let eyeicon = document.getElementById("pass_nascosta");
    let password = document.getElementById("password");

    eyeicon.onclick = function(){
        if(password.type == 'password'){
            password.type = "text";
            eyeicon.src = "IMG/mostra_password.png";
        }else{
            password.type = "password";
            eyeicon.src = "IMG/nascondi_password.png";
        }
    }

    let eyeicon2 = document.getElementById("pass_nascosta2");
    let conferma_password = document.getElementById("conferma_password");

    eyeicon2.onclick = function(){
        if(conferma_password.type == 'password'){
            conferma_password.type = "text";
            eyeicon2.src = "IMG/mostra_password.png";
        }else{
            conferma_password.type = "password";
            eyeicon2.src = "IMG/nascondi_password.png";
        }
    }
});



