var localStorage = window.localStorage;
llenarTabla();

//Leer toda la información del localStorage
function llenarTabla(){
    document.getElementById('tabla-registros').innerHTML = ""; //Limpiar la tabla
    for (let i=0;i<localStorage.length;i++){
        console.log(localStorage.key(i));
        let persona = JSON.parse(localStorage.getItem(localStorage.key(i))); //Convertir de cadena a JSON
        anexarRegistroTabla(persona, localStorage.key(i));
    }
}

//var registros=[];//Variable global//Este es el arreglo de JSONs, ya no se ocupa porque se guarda la informacion en LocalStorage
var campos =[
    {campo:'first-name',valido:false},
    {campo:'last-name',valido:false},
    {campo:'email',valido:false},
    {campo:'password',valido:false},
    {campo:'year',valido:false},
    {campo:'day',valido:false},
    {campo:'month',valido:false}
];


let meses = ['Enero', 'Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto'];
for(let i=0; i<meses.length; i++)
    document.getElementById('month').innerHTML += `<option value="${i}">${meses[i]}</option>`;

for(let i=1; i<=31; i++)
    document.getElementById('day').innerHTML += `<option value="${i}">${i}</option>`;

let anioActual = new Date().getFullYear();
for(let i=anioActual; i>=anioActual - 100; i--)
    document.getElementById('year').innerHTML += `<option value="${i}">${i}</option>`;



function registrarUsuario(){
    let genderInput = document.querySelector('input[type="radio"][name="gender"]:checked');

    for (let i=0;i<campos.length;i++)
        campos[i].valido = validarCampoVacio(campos[i].campo);
    
    if (document.getElementById('email')!=''){
        
        let resultadoEmail = validarEmail(document.getElementById('email').value);
        console.log('Validará el correo electronico: ' + resultadoEmail);
        campos[2].valido = resultadoEmail;
        marcarInput('email',resultadoEmail);
        if (!resultadoEmail)
            document.getElementById('email-invalid-feedback').innerHTML = "Correo Inválido";
            
        console.log(campos);
    }

    
    for (let i=0;i<campos.length;i++)
        if (!campos[i].valido) return;

    
    //Todo esta bien, todo saldra bien... OK?
    // (condicion)?verdadero:falso; //if corto
    let persona = {
        firstName: document.getElementById('first-name').value,
        lastName: document.getElementById('last-name').value,
        gender:(genderInput==null)?'':genderInput.value,
        email: document.getElementById('email').value,
        password: document.getElementById('password').value,
        birthday:{
            month: document.getElementById('month').value,
            day: document.getElementById('day').value,
            year: document.getElementById('year').value
        }
    }
    //registros.push(persona);//Este es el arreglo de JSONs, ya no se ocupa porque se guarda la informacion en LocalStorage
    //setItem(llave,valor);
    let key = localStorage.key(localStorage.length-1)==null?0:parseInt(localStorage.key(localStorage.length-1))+1;

    console.log("Llave a guardar: "+ key);
    localStorage.setItem( key,JSON.stringify(persona));
    anexarRegistroTabla(persona);
    /*console.log(document.querySelector('input[type="radio"][name="gender"]:checked').value);*/
    //console.log(registros);
}

function validarCampoVacio(id){
    let resultado = (document.getElementById(id).value=='')?false:true;
    marcarInput(id, resultado);
    return resultado;
}


function validarEmail(email){
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}


function validarEmailEnLinea(email){
    console.log(email);
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let resultado =  re.test(email);
    marcarInput('email',resultado);
    document.getElementById('email-invalid-feedback').innerHTML = "Correo Inválido";
    return resultado;
}


function marcarInput(id,valido){
    if (valido){
        document.getElementById(id).classList.remove('is-invalid');
        document.getElementById(id).classList.add('is-valid');
    } else{
        document.getElementById(id).classList.remove('is-valid');
        document.getElementById(id).classList.add('is-invalid');        
    }
}

function anexarRegistroTabla(persona, id){
    document.getElementById('tabla-registros').innerHTML+=
        `<tr>
            <td>${persona.firstName}</td>
            <td>${persona.lastName}</td>
            <td>${persona.email}</td>
            <td>${persona.gender}</td>
            <td>${persona.password}</td>
            <td>${persona.birthday.day}/${persona.birthday.month}/${persona.birthday.year}</td>
            <td><button type="button" onclick="eliminar(${id})"><i class="fas fa-trash-alt"></i></button></td>
        </tr>`;
}


function eliminar(id){
    console.log("Eliminar registro con id: " + id);
    localStorage.removeItem(id);
    llenarTabla();
}