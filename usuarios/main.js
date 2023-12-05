const formulario = document.querySelector('#formulario')



const procesatodo = (event) =>{
    event.preventDefault();

const datos = new FormData(event.target);
//console.log(datos)

const datosCompletos = Object.fromEntries(datos.entries
());

console.log(JSON.stringify(datosCompletos))
 
}





formulario.addEventListener('submit', procesatodo)