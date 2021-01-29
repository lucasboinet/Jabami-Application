const selectElement = document.querySelectorAll('.select-groupe');

for(let i = 0; i < selectElement.length; i++){
  selectElement[i].addEventListener('change', (event) => {
    if (event.target.value !== "0"){
      var url = window.location.pathname.split('/');
      window.location.href = window.location.origin + "/" + url[1] + "/" + url[2] + "/" + event.target.value;
    }
   });
}

const selectEleve = document.getElementById("select-eleve");

selectEleve.addEventListener('change', (event) => {
  var url = window.location.pathname.split('/');
  if(event.target.value !== "0"){
    if(url.length == 5){
      window.location.href = window.location.origin + "/" + url[1] + "/" + url[2] + "/" + url[3] + "/" + event.target.value;
    }else {
      window.location.href = window.location+"/"+event.target.value;
    }
  }
})

let notif_btn = document.getElementById("notification-button");
let notif_box = document.getElementById("notification-box");
let notif_number = document.getElementById("notification-number");
let deployed = false;

if(notif_btn){
  notif_btn.addEventListener('click', () => {
    if(deployed){
      notif_box.style.bottom = "-200%";
      deployed = false;
    }else{
      notif_box.style.bottom = "0";
      deployed = true;
    }
  })
}

let profil_btn = document.getElementById("open-profil-menu");
let profil_box = document.getElementById("profil");
let opened = false;

profil_btn.addEventListener('click', () => {
  if(opened){
    profil_box.style.display = "none";
    opened = false;
  }else{
    profil_box.style.display = "block";
    opened = true;
  }
})

let mobile_menu_btn = document.getElementById("mobile-menu-button");
let mobile_menu = document.getElementById("mobile-menu");

mobile_menu_btn.addEventListener('click', () => {
    mobile_menu_btn.classList.toggle('open');
    mobile_menu.classList.toggle('opened');
})
