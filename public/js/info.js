function caricaInformazioni(){
    fetch("/info/load").then(onResponse).then(onJson);
}

function onResponse(response){
    return response.json();
}

function onJson(json){
    const scroll = document.querySelector(".scroll-box");
    const p=document.querySelector('#n_comment');
    let n_comm=0;

    for(let i in json){
        n_comm++;

        const div = document.createElement('div');
        div.setAttribute('id','info_scroll');

        const comment = document.createElement('p');
        comment.innerText=json[i].comment;

        const date = document.createElement('p');
        date.setAttribute('id','date');
        date.innerText=json[i].created_at;

        div.appendChild(date);
        div.appendChild(comment);

        scroll.appendChild(div);
    }
    p.innerText=n_comm;
}

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


caricaInformazioni();
const menu= document.querySelector("#menu");
menu.addEventListener('click',menuTendina);