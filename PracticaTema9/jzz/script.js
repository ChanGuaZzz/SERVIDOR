function registrar(){
    const login = document.getElementById("ladoazul");
    const text = document.getElementsByClassName("textooo")[0];
    const inputs= document.getElementsByClassName("inputs");

    for(var i=0;i<inputs.length;i++){

        inputs[i].value="";

    }

    if(luz){
        text.textContent="Sign in";
        login.style.left="15%"; 
        luz=false
    }else{
        
        text.textContent="Register";
        login.style.left="50%";
        luz=true;
    }

}

function sacarId(elemento){
    const campoid= document.getElementsByClassName("idmod")[0];
    const campon= document.getElementsByClassName("nmod")[0];
    const campoa= document.getElementsByClassName("amod")[0];
    const campog= document.getElementsByClassName("gmod")[0];

    campoid.value=elemento.children[0].textContent;
    campon.value=elemento.children[1].textContent;
    campoa.value=elemento.children[2].textContent;
    campog.value=elemento.children[3].textContent;
    
}

function inputIguales() {
    var campo1 = document.getElementById("clave1");
    var campo2 = document.getElementById("clave2");
    var mensaje = document.getElementById("mensaje");
    var submit = document.getElementById("enviar");
    


    if (campo2.value !== campo1.value) {
        mensaje.style.display = "block";
        submit.type="button"


    } else {
        mensaje.style.display = "none";
    submit.type="submit"

    }




}