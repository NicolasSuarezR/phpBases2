function validaUsuario()
{
    const nombre=document.getElementById("idName");
    const email=document.getElementById("idEmail");
    const pass=document.getElementById("idPass");
    const passConfirm=document.getElementById("idPassConfirm");
    const form=document.getElementById("idForm");
    const mensaje=document.getElementById("idWarnings");

    form, addEventListener("submit", e=>{
        e.preventDefault()
        let warnings = ""
        let verifica=false
        let passGood=true
        let regexEmail= /^\w+([\.-]?\w+)*(\.\w{2,4})+$/
        if(nombre.value==""){
            warnings += `Debe colocar un nombre <br>`
            verifica="true"
        }
        console.log(regexEmail.test(email.value))
        if (!regexEmail.test(email.value)){
            warnings += `Email invalido <br>`
            verifica="true"
        }
        if (pass.value.length<8){
            warnings += `La contraseña debe tener almenos 8 caracteres <br>`
            verifica="true"
            passGood="false"
        }
        if(passGood)
        {
            if (pass.value!=passConfirm.value)
            {
                warnings += `Las contraseñas no coinciden <br>`
                verifica="true"
            }
        }
        if(verifica)
        {
            mensaje.innerHTML=warnings
        }
        else
        {
            warnings += `Se creó tu usuario <br>`
            mensaje.innerHTML=warnings

        }
    })
}

