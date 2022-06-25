//Aggiungi Commento

function Aggiungi(event){
    event.preventDefault();
    const input = document.querySelector('#input');
    if(input.value!=""){
       fetch(URL_BLOG+"/commento/"+encodeURIComponent(input.value)).then(onResponseComment).then(onJson);
       fetch(URL_BLOG+"/commento_mongoDB/"+encodeURIComponent(input.value)).then(onResponseMDB).then(onJsonMDB);
    }
}

function onResponseMDB(response){
    return response.json();
}

function onJsonMDB(json){
    if(json.controllo==true){
        console.log("MDB success insert");
    }else{
        console.log("MDB error");
    }
}

//Like e Unlike

function onJsonLike(json){
    if(json.controllo==true){
        console.log("Likes ok");
    }else{
        console.log("Likes no");
    }
}

function liked(event){
    const box = document.querySelector(".scroll-box");
    box.innerHTML='';
    event.currentTarget.classList.remove('unlike');
    event.currentTarget.classList.add('like');
    event.currentTarget.removeEventListener('click',liked);
    event.currentTarget.addEventListener('click',unliked);

    const post_id = event.currentTarget.id;
    fetch(URL_BLOG+"/upload_like/"+encodeURIComponent(post_id)).then(onResponseComment).then(onJsonLike);

    fetchCommenti();
}

function unliked(event){
    const box = document.querySelector(".scroll-box");
    box.innerHTML='';

    event.currentTarget.classList.remove('like');
    event.currentTarget.classList.add('unlike');
    event.currentTarget.removeEventListener('click',unliked);
    event.currentTarget.addEventListener('click',liked);
    
    const post_id = event.currentTarget.id;
    fetch(URL_BLOG+"/upload_like/"+encodeURIComponent(post_id)).then(onResponseComment).then(onJsonLike);
    
    fetchCommenti();
}

//Caricamento Commenti

function onJsonComment(json){
    for(let i in json){
        const user = document.createElement("p");
        user.classList.add("user-comment");
        const text = document.createElement("p");
        text.classList.add("par-comment");
        const div_comment = document.createElement("div");
        div_comment.classList.add("comment_margin");
    //Creazione icona like   
        const like = document.createElement("div");
        const div_like = document.createElement("div");
        div_like.setAttribute("id","like_container");
        const like_text = document.createElement("p");
        const like_n_like = document.createElement("p");
        like_n_like.setAttribute("id","cont_like");
        like_text.innerText = "❤"
        like_text.classList.add('unlike');
        like_n_like.innerText = json[i].n_like;
        div_like.appendChild(like_text);
        div_like.appendChild(like_n_like);
        like.appendChild(div_like);
        like_text.setAttribute("id",json[i].post_id);
        like.classList.add('like-box');
    //Inserimento dati all'interno degli elementi creati    
        user.innerText = json[i].username;
        text.innerText = json[i].commento;
    //Append elementi all'interno del box singolo commento
        div_comment.appendChild(user);
        div_comment.appendChild(text);
        div_comment.appendChild(like);
    //Ricerca box commenti ed append del box singolo commento
        const box = document.querySelector('.scroll-box');
        box.appendChild(div_comment);
        if(json[i].controllo === 1){
            like_text.addEventListener('click',unliked);
            like_text.classList.add('like');
        }else
            like_text.addEventListener('click',liked);
    }
}



function onJson(json){
   if(json.controllo===true){
        console.log("Inserimento avvenuto");
        const user = document.createElement("p");
        user.classList.add("user-comment");
        const text = document.createElement("p");
        text.classList.add("par-comment");
        const like = document.createElement("div");
        const like_text = document.createElement("p");
        const div_like = document.createElement("div");
        div_like.setAttribute("id","like_container");
        const like_n_like = document.createElement("p");
        like_n_like.setAttribute("id","cont_like");
        like_text.setAttribute("id",json.post_id.post_id);
        user.innerText = json.username;
        like_text.innerText = "❤"
        like_text.classList.add('unlike');
        like_n_like.innerText = 0;
        div_like.appendChild(like_text);
        div_like.appendChild(like_n_like);
        like.appendChild(div_like);
        like.classList.add('like-box');
        text.innerText = json.commento;
        const div_comment = document.createElement("div");
        div_comment.classList.add("comment_margin");
        div_comment.appendChild(user);
        div_comment.appendChild(text);
        div_comment.appendChild(like);
        const box = document.querySelector('.scroll-box');
        box.appendChild(div_comment);
        input.value="";
        like_text.addEventListener('click',liked);
    }else{
        console.log("Inserimento fallito");
    }
}

function onResponseComment(response){
    return response.json();
}

function fetchCommenti(){
    fetch(URL_BLOG_LOAD).then(onResponseComment).then(onJsonComment);
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

const menu = document.querySelector("#menu");
menu.addEventListener('click',menuTendina);


//General
const send = document.querySelector('#send-comment');
send.addEventListener('click',Aggiungi);
const like = document.querySelector('.unlike');
fetchCommenti();