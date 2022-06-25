/* Ricerca Video */
function ricercaVideo(event){
    event.preventDefault();
    const container=document.querySelector('#video-container');
    container.innerHTML='';
    const input = document.querySelector('#input');
    if(input.value!=""){
       fetch(URL_CINEMA+"/youtube/"+encodeURIComponent(input.value)).then(onResponseYoutube).then(onJsonYoutube);
    }
}

function onResponseYoutube(response){
    return response.json();
}

function onJsonYoutube(json){
    const container=document.querySelector('#video-container');
    const sep=document.querySelector('#sep');
    sep.classList.remove('hidden');
    for(let i in json.items){
        const div = document.createElement('div');
        div.setAttribute('id','box-video');
        const id = document.createElement('span');
        id.setAttribute('id','id-video');
        id.classList.add('hidden');
        id.textContent=json.items[i].id.videoId
        const img = document.createElement('img');
        img.setAttribute('id','id-img');
        img.src=json.items[i].snippet.thumbnails.medium.url;
        div.appendChild(img);
        div.append(id);
        div.addEventListener('click',playVideo);
        container.appendChild(div);
    }
}

/* Visualizzazione Video */

function playVideo(event){
    const id_video = event.currentTarget.querySelector('#id-video');
    const id_img = event.currentTarget.querySelector('#id-img');
    const player = document.querySelector('iframe');
    player.src="https://www.youtube.com/embed/"+id_video.textContent;
    //Presa info
    const id = document.querySelector('#id_info');
    id.textContent=id_video.textContent;
    const img = document.querySelector('#img_info');
    img.textContent=id_img.src;
//Controllo
    fetch(URL_CINEMA+"/Controllo/"+encodeURIComponent(id_video.textContent)).then(onResponse).then(onJsonControllo);
}

function onJsonControllo(json){
    const span = document.querySelector('#pref');
    if(json.controllo==true){
        span.textContent="Rimuovi dai preferiti";
        span.classList.remove('hidden');
        span.removeEventListener('click',aggiungiPreferiti);
        span.addEventListener('click',rimuoviPreferiti);
    }else{
        span.textContent="Aggiungi ai preferiti";
        span.classList.remove('hidden');
        span.removeEventListener('click',rimuoviPreferiti);
        span.addEventListener('click',aggiungiPreferiti);
    }
}

/* Rimuovi Preferiti */

function rimuoviPreferiti(event){
    const id = document.querySelector('#id_info');
    fetch(URL_CINEMA+"/Rimuovi/"+encodeURIComponent(id.textContent)).then(onResponse).then(onJsonRimuovi);
}

function onJsonRimuovi(json){
    if(json.controllo==true){
        const span = document.querySelector('#pref');
        span.textContent="Aggiungi ai preferiti";
        span.removeEventListener('click',rimuoviPreferiti);
        span.addEventListener('click',aggiungiPreferiti);

        
        const pref = document.querySelector('#video-preferiti');
        pref.innerHTML='';
        caricaPreferiti();
        nascondiPreferiti();
    }else{
        console.log("Rimosso no");
    }
}

/* Aggiungi Preferiti */

function aggiungiPreferiti(event){
    const token = document.querySelector('meta[name="csrf-token"]');
    const id = document.querySelector('#id_info');
    const img = document.querySelector('#img_info');
    var formData = new FormData();
    formData.append("videoId", id.textContent); 
    formData.append("img", img.textContent);
    fetch(URL_CINEMA+"/Aggiungi", {
        method: "post",
        headers: {"X-CSRF-Token": token.content},
        body: formData
      }).then(onResponse).then(onJson);
}

function onResponse(response){
    return response.json();
}

function onJson(json){
    if(json.controllo==true){
        const span = document.querySelector('#pref');
        span.textContent="Rimuovi dai preferiti";
        span.removeEventListener('click',aggiungiPreferiti);
        span.addEventListener('click',rimuoviPreferiti);

        const id = document.querySelector('#id_info');
        const img = document.querySelector('#img_info');
        const div_pref = document.querySelector('#video-preferiti');

        const div = document.createElement('div');
        div.setAttribute('id','box-video');
        const id_video = document.createElement('span');
        id_video.setAttribute('id','id-video');
        id_video.classList.add('hidden');
        id_video.textContent=id.textContent;
        const img_video = document.createElement('img');
        img_video.src=img.textContent;
        img_video.setAttribute('id','id-img');
        div.appendChild(img_video);
        div.append(id_video);
        div.addEventListener('click',playVideo);

        div_pref.appendChild(div)
    }else{
        console.log("Aggiunto no");
    }
}

/* Menu Mobile */

function menuTendina(event){
    const modale = document.querySelector('#view');
    modale.classList.add('modal');
    modale.classList.remove('hidden');
    const menu= document.querySelector("#menu");
    menu.removeEventListener('click',menuTendina)
    menu.addEventListener('click',chiudiMenu);
}


function chiudiMenu(event){
    const modale = document.querySelector('#view');
    modale.classList.remove('modal');
    modale.classList.add('hidden');
    const menu= document.querySelector("#menu");
    menu.removeEventListener('click',chiudiMenu);
    menu.addEventListener('click',menuTendina)
}

/* Informazioni Video */

function createHiddenInfo(){
    const div = document.querySelector('#sep');
    const id = document.createElement('span');
    id.setAttribute('id','id_info');
    id.classList.add('hidden');
    const img = document.createElement('span');
    img.setAttribute('id','img_info');
    img.classList.add('hidden');
    div.appendChild(id);
    div.appendChild(img);
}

/* Consigliati */

function nascondiConsigliati(){
    const consigliati = document.querySelector('#show-cons');
    const div_cons = document.querySelector('#video-suggeriti');
    div_cons.classList.remove('hidden');
    div_cons.classList.add('box-show');
    consigliati.textContent='Hidden';
    consigliati.addEventListener('click',mostraConsigliati);
    consigliati.removeEventListener('click',nascondiConsigliati);

}

function mostraConsigliati(){
    const consigliati = document.querySelector('#show-cons');
    consigliati.textContent='Show';
    const div_cons = document.querySelector('#video-suggeriti');
    div_cons.classList.add('hidden');
    div_cons.classList.remove('box-show');
    consigliati.addEventListener('click',nascondiConsigliati);
    consigliati.removeEventListener('click',mostraConsigliati);

}

/* Preferiti */

function nascondiPreferiti(){
    const preferiti = document.querySelector('#show-pref');
    const div_pref = document.querySelector('#video-preferiti');
    div_pref.classList.remove('hidden');
    div_pref.classList.add('box-show');
    preferiti.textContent='Hidden';
    preferiti.addEventListener('click',mostraPreferiti);
    preferiti.removeEventListener('click',nascondiPreferiti);

}

function mostraPreferiti(){
    const preferiti = document.querySelector('#show-pref');
    preferiti.textContent='Show';
    const div_pref = document.querySelector('#video-preferiti');
    div_pref.classList.add('hidden');
    div_pref.classList.remove('box-show');
    preferiti.addEventListener('click',nascondiPreferiti);
    preferiti.removeEventListener('click',mostraPreferiti);

}

/* Carica Preferiti */

function caricaPreferiti(){
    fetch(URL_CINEMA+'/Carica').then(onResponse).then(onJsonPreferiti);
}

function onJsonPreferiti(json){
    if(json.controllo == null){
        const container=document.querySelector('#video-preferiti');
    for(let i in json){
        const div = document.createElement('div');
        div.setAttribute('id','box-video');
        const id = document.createElement('span');
        id.setAttribute('id','id-video');
        id.classList.add('hidden');
        id.textContent=json[i].videoId
        const img = document.createElement('img');
        img.setAttribute('id','id-img');
        img.src=json[i].image;
        div.appendChild(img);
        div.append(id);
        div.addEventListener('click',playVideo);
        container.appendChild(div);
    }
    }
}

/* Carica Consigliati */

function caricaConsigliati(){
    const id_admin='***Admin***';
    fetch(URL_CINEMA+'/CaricaConsigliati/'+encodeURIComponent(id_admin)).then(onResponse).then(onJsonConsigliati);
}

function onJsonConsigliati(json){
    if(json.controllo == null){
        const container=document.querySelector('#video-suggeriti');
        for(let i in json){
            const div = document.createElement('div');
            div.setAttribute('id','box-video');
            const id = document.createElement('span');
            id.setAttribute('id','id-video');
            id.classList.add('hidden');
            id.textContent=json[i].videoId
            const img = document.createElement('img');
            img.setAttribute('id','id-img');
            img.src=json[i].image;
            div.appendChild(img);
            div.append(id);
            div.addEventListener('click',playVideo);
            container.appendChild(div);
        }
    }else{
        console.log('errore cosigliati');
    }
}
/* --------------------------------------------------------- */

createHiddenInfo();
mostraConsigliati();
mostraPreferiti();
caricaPreferiti();
caricaConsigliati();

const menu = document.querySelector("#menu");
menu.addEventListener('click',menuTendina);
const send = document.querySelector('#send-request');
send.addEventListener('click',ricercaVideo);
