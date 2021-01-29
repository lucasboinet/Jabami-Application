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

function setRenduModalEventListener(){
  let expanded = false;
  const selectGroupeRendu = document.getElementById("rendu-groupe-select");

  selectGroupeRendu.addEventListener('click', () => {
    let checkboxes = document.getElementById("checkboxes");
    if (!expanded) {
      checkboxes.style.display = "block";
      expanded = true;
    } else {
      checkboxes.style.display = "none";
      expanded = false;
    }
  })

  let allSelected = false;
  const selectAllGroupe = document.getElementsByClassName('groupeCheck');

  if(selectAllGroupe[0]){
    selectAllGroupe[0].addEventListener('change', () => {
      allSelected = !allSelected;
      for(let i = 1; i < selectAllGroupe.length; i++){
        selectAllGroupe[i].checked = allSelected;
      }
    })
  }
}

function annuler_rendu(btn, id) {
  let done = false;
  let xhttp = new XMLHttpRequest();
  xhttp.open("POST", "/dashboard/rendu/end", true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function(){
    if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
      toastr.success("Vous avez annulé le travail terminé");
      btn.innerText = "Terminer";
    }
  };
  xhttp.send(`id_rendu=${id}&done=${done}`);
}

let finir_rendu_modal = document.getElementById("finir_rendu_modal");
let rendu_modal_id = document.getElementById("rendu_modal_id");
let finir_rendu_btn;

function openTerminerModal(event, btn, id){
  event.stopPropagation();
  finir_rendu_btn = btn;
  rendu_modal_id.value = id;
  finir_rendu_modal.classList.add('is-active');
}

document.getElementById("confirm_finir").addEventListener('click', () => {
  finir_rendu(rendu_modal_id.value);
})

document.getElementById("close_finir_rendu").addEventListener('click', () => {
  rendu_modal_id.value = "0";
  finir_rendu_modal.classList.remove('is-active');
})

function finir_rendu(id) {
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
          finir_rendu_btn.setAttribute('onclick', 'annuler_rendu(this,'+id+')');
          finir_rendu_modal.classList.remove('is-active');
          document.getElementById("finir_form").reset();
        }
      }
    };
    xhttp.send(`id_rendu=${id}&done=${done}&tps=${tps}`);
}

const selectElement = document.querySelectorAll('.select-groupe');

for(let i = 0; i < selectElement.length; i++){
  selectElement[i].addEventListener('change', (event) => {
    if (event.target.value !== "0") {
      window.location.replace(event.target.value);
    }
  });
}

const modalRendu = document.getElementById("add-rendu-modal");
const closeRenduBtn = document.querySelectorAll(".close-rendu-modal");
let addForm = document.getElementById('addForm');

for(let i = 0; i < closeRenduBtn.length; i++){
  closeRenduBtn[i].addEventListener('click', () => {
    modalRendu.classList.remove('is-active');
    addForm.reset();
  });
}

let openRenduBtn = document.getElementsByClassName("open-rendu-modal");

if(openRenduBtn){
  for(let i = 0; i < openRenduBtn.length; i++){
    openRenduBtn[i].addEventListener('click', (e) => {
      let mobile_menu_btn = document.getElementById("mobile-menu-button");
      let mobile_menu = document.getElementById("mobile-menu");
      document.documentElement.style.overflowY = "auto";
      mobile_menu_btn.classList.toggle('open');
      mobile_menu.classList.toggle('opened');
      modalRendu.classList.add('is-active');
    });
  }
}

let selectModuleGroupeOutput = document.getElementById("select_module_groupe_output");

function getGroupFromModule(select){
  if(select.value === "0"){
    selectModuleGroupeOutput.innerHTML = "";
  }else {
    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/ajax/getAllGroupeFromModule.php", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function(){
      if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
          selectModuleGroupeOutput.innerHTML = this.responseText;
          setRenduModalEventListener();
      }
    };
    xhttp.send(`module=${select.value}`);
  }
}

let addBtn = document.getElementById("add_rendu");

addBtn.addEventListener('click', () => {
  const mo = document.getElementById("select_module_rendu").value;
  const selectAllGroupe = document.getElementsByClassName('groupeCheck');

  let groupe = [];
  if(selectAllGroupe){
    for(let i = 1; i < selectAllGroupe.length; i++){
      if(selectAllGroupe[i].checked){
        groupe.push(selectAllGroupe[i].value);
      }
    }
  }

  let currentGroup = window.location.pathname.split('/')[3];

    const date = document.getElementById("select_date_rendu").value;
    const tps = document.getElementById("select_temps_rendu").value;
    const desc = document.getElementById("desc_add_rendu").value;
    const isProf = document.getElementById("prof_add_rendu").value;
    const d1 = document.getElementById("d1_add_rendu").value;
    const d2 = document.getElementById("d2_add_rendu").value;

    let tmpf = d1.split('-');
    let firstDay = new Date(tmpf[2] + "-" + tmpf[1] + "-" + tmpf[0]);
    let tmpl = d2.split('-');
    let lastDay = new Date(tmpl[2] + "-" + tmpl[1] + "-" + tmpl[0])
    let renduDate = new Date(date);

    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/dashboard/rendu/create", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function(){
      if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
        if(!this.responseText.includes('-')){
          document.getElementById("output").innerHTML = this.responseText;
          document.getElementById("output").style.display = "block";
        }else {
          toastr.success("Travail ajouté avec success !");
          addForm.reset();
          modalRendu.classList.remove('is-active');

          if(firstDay.getTime() <= renduDate.getTime() && lastDay.getTime() >= renduDate.getTime() && groupe.includes(currentGroup)){
            let params = this.responseText.split('-');
            let colNumber = new Date(date).getDay() - 1;
            let rendusCol = document.getElementsByClassName('rendu-col');
            let noRendu = rendusCol[colNumber].getElementsByClassName('no-rendu')[0];

            if(noRendu){
              rendusCol[colNumber].innerHTML = "";
            }

            let renduItem = document.createElement("div");
            renduItem.className = "rendu-item is-flex is-flex-direction-row";
            rendusCol[colNumber].append(renduItem);
            let renduColor = document.createElement("div");
            renduColor.className = "rendu-color";
            renduColor.style.backgroundColor = params[1];
            renduItem.append(renduColor);
            let renduContent = document.createElement("div");
            renduContent.className = "rendu-content";
            renduItem.append(renduContent);
            let renduModule = document.createElement("h5");
            renduModule.innerText = mo;
            renduModule.className = "title is-5 mb-1";
            renduContent.append(renduModule);
            let renduGroup = document.createElement("p");
            renduGroup.innerText = currentGroup;
            renduGroup.className = "m-0";
            renduContent.append(renduGroup);
            let renduAction = document.createElement("a");
            if(isProf == 'false'){
              renduAction.innerText = "Terminer";
              renduAction.href = "javascript:void(0)";
              renduAction.setAttribute('onclick', 'openTerminerModal(event, this, '+params[0]+')');
            }else {
              renduAction.innerText = "Plus de détails";
              renduAction.href = "/dashboard/rendu/"+currentGroup+"/"+params[0];
            }
            renduContent.append(renduAction);
          }
        }
      }
    };
    xhttp.send(`mo=${mo}&gr=${groupe.join(',')}&d=${date}&t=${tps}&de=${desc}`); 
})

let notif_btn = document.getElementById("notification-button");
let notif_box = document.getElementById("notification-box");
let deployed = false;

if(notif_btn){
  notif_btn.addEventListener('click', () => {
    if(deployed){
      notif_box.style.bottom = "-200%";
      deployed = false;
    }else{
      notif_box.style.bottom = "70px";
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

let modal_close = document.querySelectorAll(".modal-close");
let modal_background = document.querySelectorAll(".modal-background");
let all_modal = document.querySelectorAll(".modal");

for(let i = 0; i < modal_close.length; i++){
  modal_close[i].addEventListener('click', () => {
    all_modal[i].classList.remove("is-active");
  })
}

for(let i = 0; i < modal_background.length; i++){
  modal_background[i].addEventListener('click', () => {
    all_modal[i].classList.remove("is-active");
  })
}

function seeMore(id){
  let xhttp = new XMLHttpRequest();
  xhttp.open("POST", "/ajax/getRenduInfoModal.php", true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function(){
    if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
        document.getElementById("modal-rendu-info-content").innerHTML = this.responseText;
        document.getElementById("open-rendu-info-modal").classList.add("is-active");
    }
  };
  xhttp.send(`id_rendu=${id}`);
}

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

function supprimerRendu(id){
  let xhttp = new XMLHttpRequest();
  xhttp.open("POST", "/dashboard/rendu/delete", true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function(){
    if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
        toastr.success("Le rendu a bien été supprimé");

    }
  };
  xhttp.send(`id_rendu=${id}`);
}
