// Validacija
function validirajKontaktFormu(){
  var prosao = true;

  var subject = document.getElementById("subject").value;
  var email = document.getElementById("email").value;
  var text1 = document.getElementById("text1").value;

  var emailRegex = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;

  // Validacija subjecta
  if(subject == "" || subject == null){
    document.getElementById("subject-greska").innerHTML = "Please fill in the subject.";
    prosao = false;
  }else document.getElementById("subject-greska").innerHTML = "";

  // Validacija e-maila
  if(email == "" || email == null){
    document.getElementById("email-greska").innerHTML = "Please fill in the e-mail.";
    prosao = false;
  }else if(!emailRegex.test(email)){
    document.getElementById("email-greska").innerHTML = "Please fill in the e-mail.";
    prosao = false;
  }else document.getElementById("email-greska").innerHTML = "";

  // Validacija poruke
  if(text1 == ""){
    document.getElementById("text1-greska").innerHTML = "Please fill message.";
    prosao = false;
  } else document.getElementById("text1-greska").innerHTML = "";

  if(!prosao) event.preventDefault();
}

function validirajCreate(){
  var prosao = true;

  var title = document.getElementById("title").value;
  var story = document.getElementById("story").value;

  if(title == "" || title == null){
    document.getElementById("title-greska").innerHTML = "Please fill in the title.";
    prosao = false;
  }else document.getElementById("title-greska").innerHTML = "";

  if(story == "" || story == null){
    document.getElementById("story-greska").innerHTML = "Please fill in the story.";
    prosao = false;
  }else document.getElementById("story-greska").innerHTML = "";

  if(!prosao) event.preventDefault();
}


function pretraga(){
  var value = document.getElementById('input-pretraga').value;

  var HTTPXML = new XMLHttpRequest();
  HTTPXML.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById('results').innerHTML = this.responseText;
    }
  };

  HTTPXML.open("POST", "ajax-search.php", true);
  HTTPXML.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  HTTPXML.send("pojam="+value);
}

// Ajax
function ucitaj_stranicu(stranica) {
    var HTTPXML = new XMLHttpRequest();
    HTTPXML.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("ajax-sadrzaj").innerHTML = this.responseText;
        }
    };
    HTTPXML.open("GET", stranica, true);
    HTTPXML.send();
}

window.onload = function(e) {
    ucitaj_stranicu('ajax/index.html');
}

// Galerija
function prikaz_slike(id){
  var slika = document.getElementById(id).src;
  document.getElementById('nevidljivi-slika').src = slika;
  document.getElementById('nevidljivi').style.display = 'block';
}

document.onkeydown = function(evt) {
    if (evt.keyCode == 27) {
        document.getElementById('nevidljivi').style.display = 'none';
    }
};
