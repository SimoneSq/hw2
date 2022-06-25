function onJson(json){
    const section = document.querySelector('section');
    console.log(json);
    for(let i in json){
        const div = document.createElement("div");
        div.setAttribute("id","section-item");
        const h1 = document.createElement("h1");
        h1.innerText=json[i].title;
        const img = document.createElement("img");
        img.src=json[i].img;
        const a = document.createElement("a");
        const p = document.createElement("p");
        p.innerText=json[i].p;
        a.appendChild(p);
        div.appendChild(h1);
        div.appendChild(img);
        div.appendChild(a);
        section.appendChild(div);
    }
    //Creo il blocco per spotify
    const div_spoty = document.createElement("div");
    const div_input = document.createElement("div");
    const img = document.createElement("img");
    div_spoty.setAttribute("id","section-item");
    div_spoty.classList.add("div_spoty_conf");
    const h1_spoty = document.createElement("h1");
    h1_spoty.innerText="Ascolta qualcosa mentre navighi!";
    
    const input = document.createElement("input");
    input.setAttribute("id","search_input");
    input.setAttribute("placeholder","Immetti nome traccia")
    const button = document.createElement("button");
    button.innerText= "Cerca";
    button.setAttribute("id","search_spotify");
    button.addEventListener('click',ricercaTraccia);
    div_input.appendChild(input);
    div_input.appendChild(button);
    div_input.classList.add("div_input")
    div_spoty.appendChild(h1_spoty);
    div_spoty.appendChild(img);
    div_spoty.appendChild(div_input);
    section.appendChild(div_spoty);
}

function onResponse(response){
    console.log(response);
    return response.json();
}

//Spotify
function onJsonSpoty(json){
    console.log("json");
    console.log(json);
    const div = document.querySelector(".div_spoty_conf");
    const img = div.querySelector("img");
    img.src= json.tracks.items[0].album.images[1].url;
    const iframe = document.createElement('iframe');
    iframe.frameBorder = 0;
    iframe.src = "https://open.spotify.com/embed/track/"+json.tracks.items[0].id+"?utm_source=generator";
    iframe.setAttribute('style','border-radius:12px')
    iframe.setAttribute('width', '50%');
    iframe.setAttribute('height', '80px');
    iframe.allow = "encrypted-media";
    const footer = document.getElementById('media');
    footer.innerHTML = '';
    footer.appendChild(iframe);
}

function onResponseSpoty(response){
    return response.json();
}

function ricercaTraccia(event){
    console.log("Ricerca ok");
    const text = document.querySelector("#search_input");
    if(text.value!=""){
        console.log(text.value);
        fetch(URL_HOME+"/spotify/"+encodeURIComponent(text.value)).then(onResponseSpoty).then(onJsonSpoty);
    }
    text.value="";
}

//Parte mobile
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

fetch(URL_HOME_LOAD).then(onResponse).then(onJson);
const menu= document.querySelector("#menu");
menu.addEventListener('click',menuTendina);
