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

let modal_background = document.getElementsByClassName("modal-background");
let allModal = document.getElementsByClassName("modal")

for(let i = 0; i < modal_background.length; i++){
  modal_background[i].addEventListener('click', () => {
    allModal[i].classList.toggle("is-active");
  })
}

function annulerRendu(btn, id) {
  let done = false;
  let xhttp = new XMLHttpRequest();
  xhttp.open("POST", "/dashboard/rendu/end", true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function(){
    if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
        toastr.success("Vous avez annulé le travail terminé");
        btn.innerText = "Terminer";
        btn.classList.remove("is-danger");
        btn.classList.add("is-success");
        btn.setAttribute('onclick', 'openTerminerModal(this,'+id+')');
        var rowElement = btn.parentNode.parentNode.getElementsByTagName("td");
        rowElement[1].innerText = '/';
        rowElement[2].innerText = '/';
    }
  };
  xhttp.send(`id_rendu=${id}&done=${done}`);
}

let finir_rendu_modal = document.getElementById("finir_rendu_modal");
let rendu_modal_id = document.getElementById("rendu_modal_id");
let finir_rendu_btn;

document.getElementById("confirm_finir").addEventListener('click', () => {
  finirRendu(rendu_modal_id.value);
})

function openTerminerModal(btn, id){
  rendu_modal_id.value = id;
  finir_rendu_modal.classList.toggle('is-active');
  finir_rendu_btn = btn;
}

document.getElementById("close_finir_rendu").addEventListener('click', () => {
  finir_rendu_modal.classList.toggle('is-active');
})

function finirRendu(id) {
  let done = true;
  let tps = document.getElementById("finir_temps_rendu").value;
  let xhttp = new XMLHttpRequest();
  xhttp.open("POST", "/dashboard/rendu/end", true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function(){
    if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
      if(this.responseText.includes('error')){
          document.getElementById("finir_output").innerHTML = this.responseText.split(':')[1];
          document.getElementById("finir_output").style.display = "block";
      }else{
          toastr.success("Travail bien indiqué comme terminé");
          finir_rendu_btn.innerText = "Annuler";
          finir_rendu_btn.classList.remove("is-success");
          finir_rendu_btn.classList.add("is-danger");
          finir_rendu_btn.setAttribute('onclick', 'annulerRendu(this,'+id+')');
          finir_rendu_modal.classList.remove('is-active');
          var todayDate = new Date();
          var rowElement = finir_rendu_btn.parentNode.parentNode.getElementsByTagName("td");
          var months  = ['01','02','03','04','05','06','07','08','09','10','11','12'];
          var todayDateNumber = (todayDate.getDate() > 9) ? todayDate.getDate() : '0'+todayDate.getDate();
          rowElement[1].innerText = todayDateNumber +'-'+months[todayDate.getMonth()]+'-'+todayDate.getFullYear();
          rowElement[2].innerText = tps + 'h';
          document.getElementById("finir_form").reset();
      }  
    }
  };
  xhttp.send(`id_rendu=${id}&done=${done}&tps=${tps}`);
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

function supprimerRendu(btn, id){
  let xhttp = new XMLHttpRequest();
  xhttp.open("POST", "/dashboard/rendu/delete", true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function(){
    if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
        toastr.success("Le rendu a bien été supprimé");
        btn.parentNode.parentNode.remove();
    }
  };
  xhttp.send(`id_rendu=${id}`);
}
