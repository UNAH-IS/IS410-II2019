//El siguiente código es el encargado de generar la informaación de prueba. Se recomienda no modificarlo.

var categorias = [];
(()=>{
  //Este arreglo es para generar textos de prueba
  let textosDePrueba=[
      "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore, modi!",
      "Quos numquam neque animi ex facilis nesciunt enim id molestiae.",
      "Quaerat quod qui molestiae sequi, sint aliquam omnis quos voluptas?",
      "Non impedit illum eligendi voluptas. Delectus nisi neque aspernatur asperiores.",
      "Ducimus, repellendus voluptate quo veritatis tempora recusandae dolorem optio illum."
  ]
  
  //Genera dinamicamente los JSON de prueba para esta evaluacion,
  //Primer ciclo para las categorias y segundo ciclo para las apps de cada categoria

  
  let contador = 1;
  for (let i=0;i<5;i++){//Generar 5 categorias
      let categoria = {
          nombreCategoria:"Categoria "+i,
          descripcion:textosDePrueba[Math.floor(Math.random() * (5 - 1))],
          aplicaciones:[]
      };
      for (let j=0;j<10;j++){//Generar 10 apps por categoria
          let aplicacion = {
              codigo:contador,
              nombre:"App "+contador,
              descripcion:textosDePrueba[Math.floor(Math.random() * (5 - 1))],
              icono:`img/app-icons/${contador}.webp`,
              instalada:contador%3==0?true:false,
              app:"app/demo.apk",
              calificacion:Math.floor(Math.random() * (5 - 1)) + 1,
              descargas:1000,
              desarrollador:`Desarrollador ${(i+1)*(j+1)}`,
              imagenes:["img/app-screenshots/1.webp","img/app-screenshots/2.webp","img/app-screenshots/3.webp"],
              comentarios:[
                  {comentario:textosDePrueba[Math.floor(Math.random() * (5 - 1))],calificacion:Math.floor(Math.random() * (5 - 1)) + 1,fecha:"12/12/2012",usuario:"Juan"},
                  {comentario:textosDePrueba[Math.floor(Math.random() * (5 - 1))],calificacion:Math.floor(Math.random() * (5 - 1)) + 1,fecha:"12/12/2012",usuario:"Pedro"},
                  {comentario:textosDePrueba[Math.floor(Math.random() * (5 - 1))],calificacion:Math.floor(Math.random() * (5 - 1)) + 1,fecha:"12/12/2012",usuario:"Maria"},
              ]
          };
          contador++;
          categoria.aplicaciones.push(aplicacion);
      }
      categorias.push(categoria);
  }
  
  console.log(categorias);
})();


var localStorage = window.localStorage;
localStorage.clear();
for (let i = 0; i < categorias.length; i++) {
    localStorage.setItem(i,JSON.stringify(categorias[i]));    
}

for (let i = 0; i < localStorage.length; i++) {
    let categoria = JSON.parse(localStorage.getItem(localStorage.key(i)));
    $("#categoria").append(`<option value="${localStorage.key(i)}">${categoria.nombreCategoria}</option>`);
    //imprimirAplicaciones(categorias[i]);
}


function imprimirAplicaciones(categoria){
    for (let j = 0; j < categoria.aplicaciones.length; j++) {
        let estrellas = '';
        for (let k = 0; k < categoria.aplicaciones[j].calificacion; k++) {
            estrellas+='<i class="fas fa-star"></i>';
        }
        for (let k = 0; k < 5-categoria.aplicaciones[j].calificacion; k++) {
            estrellas+='<i class="far fa-star"></i>';
        }

        $("#aplicaciones").append(
            `<div class="col-lg-2 col-md-3 col-6">
                <div class="card shadow" onclick="detalleAplicacion()">
                    <div class="card-body">
                        <img src="${categoria.aplicaciones[j].icono}" class="img-fluid">
                        <div class="texto-aplicacion">${categoria.aplicaciones[j].nombre}</div>
                        <div class="texto-desarrollador">${categoria.aplicaciones[j].desarrollador}</div>
                        <div class="estrellas">
                            ${estrellas}
                        </div>
                    </div>
                </div>
            </div>`);
    }
}

function seleccionarCategoria(){
    $("#aplicaciones").html("");
    console.log('Categoria seleccionada: ' + $("#categoria").val());
    imprimirAplicaciones(JSON.parse(localStorage.getItem($("#categoria").val())));
}

function detalleAplicacion(){
    $('#modal-detalle').modal('show');
}