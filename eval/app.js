$(function(){



var contenido = $(".divider")

    var listagrupo01= [];
    var listagrupo02= [];
    var SinDuplicados = [];
    var SinDuplicados2 = [];
    var datos=[]
    var cont=0
    var URL = 'data-1.json'
    $.ajax({
        url : URL,
        type: 'POST',
        async: true,
        success: function(respuesta){

            var data = respuesta
            if(data.message && data.message == "Not Found"){
                alert("No se consigui traer los archivos")
            }else{

            for(var i=0;i<100;i++){
                    listagrupo02[i]=data[i].Ciudad
                    listagrupo01[i]=data[i].Tipo
            }
            $.each(listagrupo02, function(i, el){
            if($.inArray(el, SinDuplicados ) === -1) SinDuplicados .push(el);
            });

            $.each(listagrupo01, function(i, el){
            if($.inArray(el, SinDuplicados2 ) === -1) SinDuplicados2 .push(el);
            });

            for(var o=SinDuplicados2.length-1;o>=0;o--){
                $('#selectTipo').append('<option value="'+SinDuplicados2[o]+'">'+SinDuplicados2[o]+'</option>')

            }

            for(var y=SinDuplicados.length-1;y>=0;y--){
                $('#selectCiudad').append('<option value="'+SinDuplicados[y]+'">'+SinDuplicados[y]+'</option>')

            }
             $('select').material_select();


            }
        }
    })
    $('#mostrarTodos').on("click", function(){
      $(".nueva").remove()
        $.ajax({
        url : URL,
        type: 'POST',
        async: true,
        success: function(respuesta){

            var data = respuesta
            if(data.message && data.message == "Not Found"){
                alert("No se consigui traer los archivos")


            }else{

                for(var i=0;i<100;i++){

                    $('.colContenido').append(
                        '<div id="hola"class="nueva white-text col s12 m12"><img src="./img/home.jpg" alt="" class="total col s5 m5 responsive-img "><p class="col s7 m7"><b>Direccion:</b>'+ data[i].Direccion +'<br><b>Ciudad:</b>'+data[i].Ciudad+'<br><b>Telefono:</b>'+data[i].Telefono +'<br><b>Codigo Postal:</b>'+data[i].Codigo_Postal +'<br><b>Tipo:</b>'+data[i].Tipo +'<br><b>Precio:</b>'+data[i].Precio +'</p></div>')

            }

            }
        }
    })

    })

  $('#formulario').submit(function (event) {
    $(".nueva").remove()
    var nombre = $('form').find("select[name='ciudad']").val()
    var tipo = $('form').find("select[name='tipo']").val()
    var from = rangos.data('from')
    var to = rangos.data('to')
    event.preventDefault();
    $.ajax({
      url: './buscador.php',
      type: 'POST',
      data:{
        nombre:nombre,
        tipo:tipo,
        from:from,
        to:to
      }
    }).done(function(data) {

      $('.colContenido').append(data);
    })


  })

    })
