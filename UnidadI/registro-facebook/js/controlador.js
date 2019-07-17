var registros=[];//Variable global

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
    if (document.getElementById('first-name').value==''){
        document.getElementById('first-name').classList.remove('input-success');
        document.getElementById('first-name').classList.add('input-error');
        return;//No agregará nada porque esta vacio
    }else{
        document.getElementById('first-name').classList.remove('input-error');
        document.getElementById('first-name').classList.add('input-success');
    }
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