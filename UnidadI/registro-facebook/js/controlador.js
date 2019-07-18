var registros=[];//Variable global
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
    
    for (let i=0;i<campos.length;i++)
        if (!campos[i].valido) return;

    
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
    registros.push(persona);

    document.getElementById('tabla-registros').innerHTML+=
        `<tr>
            <td>${persona.firstName}</td>
            <td>${persona.lastName}</td>
            <td>${persona.email}</td>
            <td>${persona.gender}</td>
            <td>${persona.password}</td>
            <td>${persona.birthday.day}/${persona.birthday.month}/${persona.birthday.year}</td>
        </tr>`;
    /*console.log(document.querySelector('input[type="radio"][name="gender"]:checked').value);*/
    console.log(registros);
}

function validarCampoVacio(id){
    if (document.getElementById(id).value==''){
        document.getElementById(id).classList.remove('is-valid');
        document.getElementById(id).classList.add('is-invalid');
        return false;//Esta mal
    }else{
        document.getElementById(id).classList.remove('is-invalid');
        document.getElementById(id).classList.add('is-valid');
        return true;//Esta bien
    }
}