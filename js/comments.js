"use strict"
const idApi = document.querySelector("#idApi").value;
const url = "api/album";
comments();

let api = new Vue({
    el: "#apiComentarios",
    data: {
        titulo: "este es el titulo",
        comments: [],
    },


    methods: {
        commentDelete:async function (id_comment){
            let id_album = document.querySelector("#idApi").value;
            let rol = document.querySelector('.id_admin').value;
            
              console.log( "entre"+ id_comment, id_album);
              if(rol !=1){
                console.log("No sos Administrador");
              }else{

              try {
                let res = await fetch(`${url}/${id_album}/comment/${id_comment}`,{
                method: "DELETE",
            });
                console.log(res);
             if( res.status == 200){

                 comments();
               console.log("Borrardo");
             }
            
          } catch (error) {
            console.log(error);
          }
        }

          }
        
          }
});
async function getComentariosAlbum(id_album) {
  try {
      let response = await fetch(`api/comment/${id_album}`);
      let comentarios = await response.json();
      if (response.ok){
          api.comments=comentarios;
      }else{   
          console.log("El animal no tiene comentarios");
          api.comments={};
      }
  } catch (e) {
      console.log(e);
  }
}

async function comments(){
    try {
        let res = await fetch(`api/album/${idApi}/comment`);
        console.log(res);
        if(res.status == 200){
            
          let json = await res.json();
          
          api.comments = json;
          console.log(json);
        }
    } catch (e) {
        console.log(e);
    }
}

function dataForm(){
    let comment = document.querySelector(".comment");
    let album = document.querySelector(".id_album");
    let user = document.querySelector(".userID");
    let rating = document.querySelector(".rating");
    return { comment: comment.value,
       album: album.value,
       user: user.value,
       rating: rating.value
       
       
    }
    
}

    let btn = document.querySelector("#btn-insertComment");
    if(btn){
    btn.addEventListener("click",insertComment);
}

async function insertComment(e){
    e.preventDefault();
    let comment = dataForm();
    console.log(comment);

   
    try {
    let res = await fetch(`api/album/${idApi}/comment`, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(comment),
          });
          
          if (res.status == 201) {
              comments();
              console.log(comment);

          }
    } catch (e) {
        console.log(e);
        console.log(e);
    }
}