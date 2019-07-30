/*

Patron de desarrollo MVC: 
Modelo: Logica de negocio, Datos(BD), Backend
Vista: CSS + HTML
Controlador: Gestiona las acciones del usuario, Javascript

*/
var localStorage = window.localStorage;
var categorias=[
    {nombreCategoria:"Recientes",descripcion:"Recientes"},
    {nombreCategoria:"Internacionales",descripcion:"Internacionales"},
    {nombreCategoria:"Tecnología",descripcion:"Tecnología"},
    {nombreCategoria:"Deportes",descripcion:"Deportes"}
];


/*
var noticias=[
    {
        caratula:'img/1.jpg',
        titulo:'Cuidado con el Ayuwoki',
        fechaPublicacion:'12/12/2012',
        likes:'3k',
        comentarios:'5k',
        redactor:'Juan',
        resumenNoticia:'Lorem ipsum dolor',
        detalleNoticia:'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis saepe ratione rem nulla nisi non maiores animi soluta architecto commodi veritatis esse tempora odit nemo libero quasi excepturi sunt voluptates quod, doloribus dolore voluptas fugit totam omnis. Facere ullam cumque expedita provident, debitis inventore ut animi quam, numquam unde architecto?',
        categoria:"Deportes",
        principal:true,
        ultimaHora:false
    },
    {
        caratula:'img/2.jpg',
        titulo:'Nueva marca de cremora TH',
        fechaPublicacion:'12/12/2012',
        likes:'3k',
        comentarios:'5k',
        redactor:'Juan',
        resumenNoticia:'Lorem ipsum dolor',
        detalleNoticia:'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis saepe ratione rem nulla nisi non maiores animi soluta architecto commodi veritatis esse tempora odit nemo libero quasi excepturi sunt voluptates quod, doloribus dolore voluptas fugit totam omnis. Facere ullam cumque expedita provident, debitis inventore ut animi quam, numquam unde architecto?',
        categoria:"Deportes",
        principal:true,
        ultimaHora:true
    },
    {
        caratula:'img/3.jpg',
        titulo:'Trump esta estresado',
        fechaPublicacion:'12/12/2012',
        likes:'3k',
        comentarios:'5k',
        redactor:'Juan',
        resumenNoticia:'Lorem ipsum dolor',
        detalleNoticia:'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis saepe ratione rem nulla nisi non maiores animi soluta architecto commodi veritatis esse tempora odit nemo libero quasi excepturi sunt voluptates quod, doloribus dolore voluptas fugit totam omnis. Facere ullam cumque expedita provident, debitis inventore ut animi quam, numquam unde architecto?',
        categoria:"Deportes",
        principal:true,
        ultimaHora:true
    },
    {
        caratula:'img/4.jpg',
        titulo:'Estudiantes a la espectativa de la nota de POO',
        fechaPublicacion:'12/12/2012',
        likes:'3k',
        comentarios:'5k',
        redactor:'Juan',
        resumenNoticia:'Lorem ipsum dolor',
        detalleNoticia:'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facilis saepe ratione rem nulla nisi non maiores animi soluta architecto commodi veritatis esse tempora odit nemo libero quasi excepturi sunt voluptates quod, doloribus dolore voluptas fugit totam omnis. Facere ullam cumque expedita provident, debitis inventore ut animi quam, numquam unde architecto?',
        categoria:"Deportes",
        principal:true,
        ultimaHora:true
    }
];
//Esto solo lo ejecuto una vez para llenar el localStorage con informacion de prueba
localStorage.clear();
for(let i=0;i<noticias.length;i++){
    localStorage.setItem(localStorage.length, JSON.stringify(noticias[i]));
}
*/

(()=>{
    for(let i=0;i<categorias.length;i++){
        $('#noticias').append(`<div class="col-12 titulo-categoria"><h1>${categorias[i].nombreCategoria}</h1></div>`);
        $('#noticias').append(`<div id="${categorias[i].nombreCategoria}" class="row"></div>`);
        $('#categoria').append(`<option value="${categorias[i].nombreCategoria}">${categorias[i].nombreCategoria}</option>`);
    }

    /*
    //Utilizando arreglo de JSONs
    for(let i=0;i<noticias.length;i++){
        $('#'+noticias[i].categoria).append(
            `<div class="col-md-4 col-sm-12">
                <div class="encabezado" style="background-image:url(${noticias[i].caratula})">
                    ${noticias[i].ultimaHora?'<span class="leyenda">Ultima hora</span>':''}
                </div>
                <div class="descripcion">
                    <h4>${noticias[i].titulo}</h4>
                    <p>${noticias[i].detalleNoticia}</p>
                    <button class="btn btn-link">Ver más</button>|<button class="btn btn-link">Eliminar</button>
                </div>
            </div>`
        );
    }*/
    //Utilizando localStorage
    for(let i=0;i<localStorage.length;i++){
        let noticia = JSON.parse(localStorage.getItem(localStorage.key(i)));
        $('#'+noticia.categoria).append(
            `<div class="col-md-4 col-sm-12">
                <div class="encabezado" style="background-image:url(${noticia.caratula})">
                    ${noticia.ultimaHora?'<span class="leyenda">Ultima hora</span>':''}
                </div>
                <div class="descripcion">
                    <h4>${noticia.titulo}</h4>
                    <p>${noticia.detalleNoticia}</p>
                    <button class="btn btn-link">Ver más</button>|<button class="btn btn-link">Eliminar</button>
                </div>
            </div>`
        );
    }

})();



$("#btn-guardar").click(function(){
   let noticia = {
        caratula: $('#caratula').val(),
        titulo: $('#titulo').val(),
        fechaPublicacion: $('#fecha-publicacion').val(),
        likes: $('#likes').val(),
        comentarios: $('#comentarios').val(),
        redactor: $('#redactor').val(),
        resumenNoticia: $('#resumen-noticia').val(),
        detalleNoticia: $('#detalle-noticia').val(),
        categoria: $('#categoria').val(),
        principal: $('#principal').is(':checked'),
        ultimaHora: $('#ultima-hora').is(':checked')
    };
    console.log(noticia);
    localStorage.setItem(parseInt(localStorage.key(localStorage.length-1))+1, JSON.stringify(noticia));
});