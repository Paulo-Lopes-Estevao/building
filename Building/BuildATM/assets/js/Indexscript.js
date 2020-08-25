/**
 *  
 * 
 * @Check function - mostra o formulario de cadastro
 * Show the registration form
 * 
 * @Checa function - aciona a criação de um elementoHTML
 * Trigger the creation of a form  
 * 
 */

//#region acessa o elemento #id
    //acess the element #id
    var newus = document.getElementById("creat")
    var accessus = document.getElementById("access")
//#endregion

//#region Cria novo elementoHTML botão
    //create new elementHTML button
    var button = document.createElement('button')
//#endregion

//#region adiciona um evento no botão
    //adds an event on the
    button.addEventListener('click',Check)
//#endregion


function Check(){
    newus.style.display = "block"
    accessus.style.display = "none"
}


function Checa(){
    button.textContent = "-"
    accessus.appendChild(button)
}

// Para habilitar a criação de conta terá de tirar do comentário o script a baixo
// To enable account creation you will need to take the comment to the bass script
window.onload = Checa;