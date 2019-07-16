
let meses = ['Enero', 'Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto'];
for(let i=0; i<meses.length; i++)
    document.getElementById('month').innerHTML += `<option value="${i}">${meses[i]}</option>`;

function registrarUsuario(){
    let persona = {
        firstName: document.getElementById('first-name').value,
        lastName: document.getElementById('last-name').value,
        email: document.getElementById('email').value,
        password: document.getElementById('password').value,
        month: document.getElementById('month').value,
        day: document.getElementById('day').value,
        year: document.getElementById('year').value
    }
    console.log(persona);
}