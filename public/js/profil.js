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

function changerPass(){
  const nouveauPass = document.getElementById("new-pass").value;
  const ancienPass = document.getElementById("ancien-pass").value;
  const confirmPass = document.getElementById("confirm-pass").value;
  let xhttp = new XMLHttpRequest();
  xhttp.open("POST", "/profil", true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function(){
    if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
      if(this.responseText.includes('error')){
        document.getElementById("output").innerHTML = this.responseText.split(':')[1];
        document.getElementById("output").style.display = "block";
      }else {
        toastr.success("Mot de passe modifié");
        document.getElementById('password-modal').classList.toggle('is-active');
      }
    }
  };
  xhttp.send(`ancien_pass=${ancienPass}&nouveau_pass=${nouveauPass}&confirm_pass=${confirmPass}`);
}

let passChange = document.getElementById('modalPass');
let modalPass = document.getElementById('password-modal');
let cancelButton = document.getElementById('password-close');

passChange.addEventListener('click', () => {
  modalPass.classList.toggle('is-active');
});

cancelButton.addEventListener('click', () => {
  modalPass.classList.toggle('is-active');
});

let modal_background = document.getElementsByClassName("modal-background");
let allModal = document.getElementsByClassName("modal")

for(let i = 0; i < modal_background.length; i++){
  modal_background[i].addEventListener('click', () => {
    allModal[i].classList.remove("is-active");
  })
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
let menuMobile = false;

mobile_menu_btn.addEventListener('click', () => {
    mobile_menu_btn.classList.toggle('open');
    mobile_menu.classList.toggle('opened');
    if(!menuMobile){
      document.documentElement.style.overflowY = "hidden";
      menuMobile  = true;
    }else {
      document.documentElement.style.overflowY = "auto";
      menuMobile  = false;
    }
})

let modalHist = document.getElementById("modalHist");
let modalHistBtn = document.getElementById("modalHistBtn");
let histBack = document.getElementById("HistBack");

if(modalHistBtn){
  modalHistBtn.addEventListener('click', () =>{
    modalHist.classList.add('is-active');
  });
}

let close_notif_modal = document.getElementById('close-notif-modal');

if(close_notif_modal){
  close_notif_modal.addEventListener('click', () => {
    modalHist.remove('is-active');
  })
}