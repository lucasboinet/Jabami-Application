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

window.onload = function(){
  loadFilterData(0);
  if(document.getElementById("modify-modal")){
    getGroupFromModule(document.getElementById("select_module_rendu"));
  }
}

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

let open_modal = document.getElementById("open-modify-modal");
let modify_modal = document.getElementById("modify-modal");
let modify_modal_background = document.getElementsByClassName("modal-background")[0];
let close_modal = document.getElementById("close-modal");

if(close_modal){
  close_modal.addEventListener('click', () => {
    modify_modal.classList.remove('is-active');
  })
}

if(modify_modal_background){
  modify_modal_background.addEventListener('click', () => {
    modify_modal.classList.remove('is-active');
  })
}

if(open_modal){
  open_modal.addEventListener('click', (e) => {
    e.preventDefault();
    modify_modal.classList.add('is-active');
  })
}

let mobile_menu_btn = document.getElementById("mobile-menu-button");
let mobile_menu = document.getElementById("mobile-menu");

mobile_menu_btn.addEventListener('click', () => {
    mobile_menu_btn.classList.toggle('open');
    mobile_menu.classList.toggle('opened');
})

function supprimerRendu(id){
  let xhttp = new XMLHttpRequest();
  xhttp.open("POST", "/dashboard/rendu/delete", true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function(){
    if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
        window.location.href = "/dashboard/1/"+this.responseText;
        toastr.success("Le rendu a bien été supprimé");
    }
  };
  xhttp.send(`id_rendu=${id}`);
}

function loadFilterData(val){
  var id = window.location.pathname.split('/')[4];
  var groupe = window.location.pathname.split('/')[3];
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "/ajax/getEleveFilter.php", true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhttp.onreadystatechange = function(){
    if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
        document.getElementById("filter_output").innerHTML = this.responseText;
    }
  };
  xhttp.send(`filter_value=${val}&id=${id}&groupe=${groupe}`);
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
}  

let selectModuleGroupeOutput = document.getElementById("select_module_groupe_output");

function getGroupFromModule(select){
  let groupeOfRendu = document.getElementById("groupe-of-rendu").value;
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
    xhttp.send(`module=${select.value}&groupe=${groupeOfRendu}`);
  }
}

let filter = document.getElementById("select_filter");

filter.addEventListener('change', (event) => {
  loadFilterData(event.target.value);
})

let modify_rendu_btn = document.getElementById("modify-rendu-btn");

if(modify_rendu_btn){
  modify_rendu_btn.addEventListener('click', () => {
  const rendu_id = document.getElementById("rendu-id").value;
  const module = document.getElementById("select_module_rendu").value;

  let groupe = [];
  const selectAllGroupe = document.getElementsByClassName('groupeCheck');

  if(selectAllGroupe){
    for(let i = 1; i < selectAllGroupe.length; i++){
      if(selectAllGroupe[i].checked){
        groupe.push(selectAllGroupe[i].value);
      }
    }
  }

  const date = document.getElementById("select_date_rendu").value;
  const tps = document.getElementById("select_temps_rendu").value;
  let isnum = /^([1-9]\d*(\.|\,)\d*|0?(\.|\,)\d*[1-9]\d*|[1-9]\d*)$/gm.test(tps);
  const desc = document.getElementById("desc_add_rendu").value;
  if(isnum && Number(tps) > 0){
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "/dashboard/rendu/modify", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function(){
      if(this.readyState === XMLHttpRequest.DONE && this.status === 200){
          if(this.responseText.includes('error')){
            console.log(this.responseText);
            document.getElementById("output").innerHTML = this.responseText.split(':')[1];
            document.getElementById("output").style.display = "block";
          }else {
            toastr.success("Modifications bien prises en compte !");
            document.getElementById("modifyForm").reset();
            document.getElementById("modify-modal").classList.remove('is-active');
            document.getElementById("modification-output").innerHTML = this.responseText;
        }
      }
    };
    xhttp.send(`rendu_id=${rendu_id}&module=${module}&groupe=${groupe}&date=${date}&tps=${tps}&desc=${desc}`);
  }  
});
}
