function changePerms(id) {
    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/permissions/grant", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function(){
      if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
        toastr.success(this.responseText);
      }
    };
    xhttp.send(`id_eleve=${id}`);
}

const selectElement = document.querySelectorAll('.select-groupe');

for(let i = 0; i < selectElement.length; i++){
  selectElement[i].addEventListener('change', (event) => {
    if (event.target.value !== "0"){
      window.location.replace(event.target.value);
    }  
  });
}

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-left",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "150",
  "hideDuration": "150",
  "timeOut": "3000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}


let notif_btn = document.getElementById("notification-button");
let notif_box = document.getElementById("notification-box");
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

let dismiss_notif = document.getElementById("dismiss-btn");
let notif_number = document.getElementById("notification-number");
let notif_content = document.getElementById("notification-content");

if(dismiss_notif){
  dismiss_notif.addEventListener('click', () => {
    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/ajax/dismissNotifications.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function(){
      if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
        notif_number.style.display = "none";
        notif_content.innerHTML = "<p>Aucune notification(s)</p>";
      }
    };
    xhttp.send();
  })
}

let mobile_menu_btn = document.getElementById("mobile-menu-button");
let mobile_menu = document.getElementById("mobile-menu");

mobile_menu_btn.addEventListener('click', () => {
    mobile_menu_btn.classList.toggle('open');
    mobile_menu.classList.toggle('opened');
})
