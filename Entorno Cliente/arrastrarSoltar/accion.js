let capa1=document.getElementById("capa1");
let capa2=document.getElementById("capa2");


let in1=document.getElementById("In1");
let in2=document.getElementById("In2");


let pantallaModal = document.getElementById("mc");


let boton1 =document.getElementById("c1");
let boton2 =document.getElementById("c2");
let boton3 =document.getElementById("c3");

capa1.addEventListener("drag",(ev)=>{
    capa1.style.opacity=.5;
});
capa1.addEventListener("dragend",(ev)=>{
    capa1.style.opacity=1;
});
capa2.addEventListener("dragenter",(ev)=>{
    capa2.style.backgroundColor="red";
});
capa2.addEventListener("dragleave",(ev)=>{
    capa2.style.backgroundColor="transparent";
});
capa2.addEventListener("dragover",(ev)=>{
    ev.preventDefault();
});
capa2.addEventListener("drop",(ev)=>{
    document.body.removeChild(capa1);
    capa2.textContent="¡Lo has logrado!";
    capa2.style.backgroundColor="yellow";
});



capa2.addEventListener("contextmenu", (ev)=>{
    ev.preventDefault();

    pantallaModal.style.left = ev.pageX + "px";
    pantallaModal.style.top = ev.pageY + "px";

    pantallaModal.style.display = "block";
});
pantallaModal.addEventListener("contextmenu", (ev)=>{
    ev.preventDefault();
});
boton1.addEventListener("click", (ev)=>{
    capa2.style.backgroundColor = "green";
});
boton2.addEventListener("click", (ev)=>{
    capa2.style.backgroundColor = "red";
});
boton3.addEventListener("click", (ev)=>{
    capa2.style.backgroundColor = "blue";
});