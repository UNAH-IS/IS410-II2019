(()=>{
    $("#loading-tabla").show();
    $.ajax({
        url:'../../facebook/backend/ajax/usuarios/',
        dataType:'json',
        success:(res)=>{
            llenarTabla(res);
            $("#loading-tabla").hide();
        },
        error:(error)=>{
            console.log(error);
            $("#loading-tabla").hide();
        }
    });
})();





//Leer toda la información del localStorage
function llenarTabla(usuarios){
    console.log(usuarios);
    $('#tabla-registros').empty(); //Limpiar la tabla
    for (let llave in usuarios) {
        $('#tabla-registros').append( 
            `<tr id="${llave}">
                <td>${usuarios[llave].firstName}</td>
                <td>${usuarios[llave].lastName}</td>
                <td>${usuarios[llave].email}</td>
                <td>${usuarios[llave].password}</td>
                <td>${usuarios[llave].birthdate.month}/${usuarios[llave].birthdate.day}/${usuarios[llave].birthdate.year}</td>
                <td>${usuarios[llave].gender}</td>
                <td>
                    <button class="btn btn-danger btn-sm" onclick="eliminar('${llave}')" type="button"><i class="fas fa-trash-alt"></i></button>
                    <button class="btn btn-primary btn-sm" onclick="editar('${llave}')" type="button"><i class="fas fa-edit"></i></button>
                </td>
            </tr>`);
    }
}

//var registros=[];//Variable global//Este es el arreglo de JSONs, ya no se ocupa porque se guarda la informacion en LocalStorage
var campos =[
    {campo:'firstName',valido:false},
    {campo:'lastName',valido:false},
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
        firstName: document.getElementById('firstName').value,
        lastName: document.getElementById('lastName').value,
        gender:(genderInput==null)?'':genderInput.value,
        email: document.getElementById('email').value,
        password: document.getElementById('password').value,
        birthday:{
            month: document.getElementById('month').value,
            day: document.getElementById('day').value,
            year: document.getElementById('year').value
        }
    }
    
    //Peticion AJAX para enviar la información al servidor
    let parametros = $('#formulario').serialize();
    console.log('Información a enviar al servidor: ' + parametros);
    
    $.ajax({
        url:'../../facebook/backend/ajax/usuarios/',
        method:'POST',
        data:parametros,//La informacion que se envia al servidor, URLEncoded
        dataType:'json',
        success:function(res){
            console.log(res);
            anexarRegistroTabla(persona,res.key);
        },
        error:function(error){
            console.error(error);
        }
    });
    
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

function anexarRegistroTabla(persona, llave){
    document.getElementById('tabla-registros').innerHTML+=
        `<tr id="${llave}">
            <td>${persona.firstName}</td>
            <td>${persona.lastName}</td>
            <td>${persona.email}</td>
            <td>${persona.gender}</td>
            <td>${persona.password}</td>
            <td>${persona.birthday.day}/${persona.birthday.month}/${persona.birthday.year}</td>
            <td>
                <button class="btn btn-danger btn-sm" onclick="eliminar('${llave}')" type="button"><i class="fas fa-trash-alt"></i></button>
                <button class="btn btn-primary btn-sm" onclick="editar('${llave}')" type="button"><i class="fas fa-edit"></i></button>
            </td>
        </tr>`;
}


function eliminar(id){
    $.ajax({
        url:"../../facebook/backend/ajax/usuarios/?id="+id,
        method:"DELETE",
        dataType:"json",
        success:(res)=>{
            console.log(res);
            $("#"+id).remove();
        },
        error:(error)=>{
            console.error(error);
        }
    });
}

function editar(id){
    $.ajax({
        url:"../../facebook/backend/ajax/usuarios/?id="+id,
        method:"GET",
        dataType:"json",
        success:(res)=>{
            console.log(res);

            $('#firstName').val(res.firstName);
            $('#lastName').val(res.lastName);
            $('#email').val(res.email);
            $('#password').val(res.password);
            $('#year').val(res.birthdate.year);
            $('#day').val(res.birthdate.day);
            $('#month').val(res.birthdate.month);

            $("#btn-registrar").hide();
            $("#btn-actualizar").show();
        },
        error:(error)=>{
            console.error(error);
        }
    });
}