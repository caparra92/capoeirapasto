$(document).ready(function(){

  $('.carousel').carousel();

  if($('#cabecera').css('display','none')){
    $('cuerpo').append('<p>Usted no tiene pagos pendientes</p>');
  }
  var clase = '';
  /* var color = $('#color').val();
  $('#color').on('change',function(){
    if($('#color').val()=="red"){
      document.childNodes[0].childNodes[0].childNodes[28].setAttribute("href","/adminlte/css/skins/skin-red.min.css");
      $('body').removeClass("skin-green");
      $('body').addClass("skin-red");
    }
  }); */

  $('#filter').on('click',function(e){
  

    e.preventDefault();
    

    $.ajax({
      type:'POST',
      url:'/admin/pagos/user/filter',
      dataType: 'json',
      data:$('#formModal').serialize(),
      success: function (resp) {
        console.log(resp);
        $('#pagos tbody').empty();
        for(var i=0;i<resp.length;i++){
          
          if(resp[i].estado == "pagado"){
            clase="pagado";
            $('#pagos tbody').append('<tr><td data-label="Id">'+
                                    resp[i].id+'</td>'+'<td data-label="Estado"><p class="'+clase+
                                    '">'+resp[i].estado+'</p></td>'+
                                    '<td data-label="Fecha">'+resp[i].fecha+
                                    '</td>'+'<td data-label="Usuario">'+resp[i].nombre+
                                    '</td>'+'<td data-label="Pago">'+resp[i].detalle+
                                    '</td>'+'<td data-label="Valor">'+resp[i].valor+
                                    '</td><td data-label="Acciones" class="final"><a href="/admin/pagos/user/edit/'+
                                    resp[i].id+'"><button class="btn btn-warning"><i class="fa fa-pencil"></i><span></span></button></a>&nbsp<a href="/admin/pagos/user/delete/'+
                                    resp[i].id+'"><button class="btn btn-danger"><i class="fa fa-trash"></i><span></span></button></a></tr>');
          }
          else {
            clase="pendiente";
            $('#pagos tbody').append('<tr><td data-label="Id">'+
                                    resp[i].id+'</td>'+'<td data-label="Estado"><p class="'+clase+
                                    '">'+resp[i].estado+'</p></td>'+
                                    '<td data-label="Fecha">'+resp[i].fecha+
                                    '</td>'+'<td data-label="Usuario">'+resp[i].nombre+
                                    '</td>'+'<td data-label="Pago">'+resp[i].detalle+
                                    '</td>'+'<td data-label="Valor">'+resp[i].valor+
                                    '</td><td data-label="Acciones" class="final"><a href="/admin/pagos/user/edit/'+
                                    resp[i].id+'"><button class="btn btn-warning"><i class="fa fa-pencil"></i><span></span></button></a>&nbsp<a href="/admin/pagos/user/delete/'+
                                    resp[i].id+'"><button class="btn btn-danger"><i class="fa fa-trash"></i><span></span></button></a>'+
                                    '&nbsp<a href="/admin/pagos/user/estado/'+resp[i].id+'">'+
                                    '<button class="btn btn-success"><i class="fa fa-dollar"></i>'+
                                    '<span></span></button></a></tr>');
          }                          
        }
      },
      error: function(resp, textStatus, error){
        console.log(textStatus);
        console.log(resp);
      }
    });
  });

  //console.log(nodo2);
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tabla tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });
  //alert('holi');
  var post_id = $('#post_id').val();
  
  $('.formCom').on('submit',function(e){

    e.preventDefault();
    var form_id = $(this).attr('id');
    var user=$('#user').val();
    

    $.ajax({
      type:'POST',
      url:'/post/coment',
      dataType: 'json',
      data:$(this).serialize(),
      success: function (resp) {
        console.log(resp);
       $('#padre'+form_id).append('<div class="col-md-12" style="padding-top: 10px;">'+
                              '<a href="#"><i class="fa fa-user-circle"></i> <span></span></a>'+
                              '</button><small>'+user+' dice:</small>'+
                              '<p>'+resp.descripcion+'</p>'+
                              '</div>'); 
        $('#descripcion'+form_id).val("");
        $('#descripcion'+form_id).focus();
      },
      error: function(resp, textStatus, error){
        console.log(textStatus);
        console.log(error);
      }
    });
  });

  
});
