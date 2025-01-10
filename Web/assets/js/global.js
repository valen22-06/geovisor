$(document).ready(function(){
    $('#form').submit(function (event) {
        event.preventDefault();
        let mensajes = [];
        $('#error').html('');

        let esValido = true;

        const tipo_docu = $('#tipo_docu').val().trim();
        if (tipo_docu === '') {
            mensajes.push('Debe seleccionar un tipo de documento.');
            esValido = false;
        }

        const nombre = $('#name').val().trim();
        if (nombre === '') {
            mensajes.push('El campo nombre es obligatorio.');
            esValido = false;
        }

        const apellido = $('#apellido').val().trim();
        if (apellido === '') {
            mensajes.push('El campo apellido es obligatorio.');
            esValido = false;
        }

        const apellido1 = $('#segundoApellido').val().trim();
        if (apellido1 === '') {
            mensajes.push('El campo segundo apellido es obligatorio.');
            esValido = false;
        }

        const correo = $('#email').val().trim();
        if (correo === '') {
            mensajes.push('El campo correo es obligatorio.');
            esValido = false;
        }

        const clave = $('#Rtpwd').val().trim();
        if (clave === '') {
            mensajes.push('El campo confirmar password es obligatorio.');
            esValido = false;
        }


        const telefono = $('#telefono').val().trim();
        if (telefono === '') {
            mensajes.push('El campo teléfono es obligatorio.');
            esValido = false;
        }

        const direccion = $('#direccion_residencia').val().trim();
        if (direccion === '') {
            mensajes.push('El campo dirección es obligatorio.');
            esValido = false;
        }

        const fecha_nac = $('#date').val().trim();
        if (fecha_nac === '') {
            mensajes.push('El campo fecha de nacimiento es obligatorio.');
            esValido = false;
        }

        if (esValido==true) {
            Swal.fire({
                title: '¡Éxito!',
                text: 'El formulario se ha enviado correctamente.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                this.reset();
            });
            $('#error').fadeOut(500);
            this.submit(); 
        } else {
            $('#error').html(mensajes.map(msg => `${msg}<br>`).join(''));
            $('#error').removeClass('d-none');
        }
    });
    
        $(document).on('keyup','#buscarAccidente',function(){
            let buscar = $(this).val();
            let url =$(this).attr('data-url');
            $.ajax({
                url:url,
                type:'POST',
                data:{'buscarAccidente':buscar},
                success:function(data){
                    $('tbody').html(data);
                }
            });
    
      
        });

        $(document).on('keyup','#buscarUsuarios',function(){
            let buscar = $(this).val();
            let url =$(this).attr('data-url');
            $.ajax({
                url:url,
                type:'POST',
                data:{'buscarUsuarios':buscar},
                success:function(data){
                    $('tbody').html(data);
                }
            });
    
      
        });
        $(document).on("click","#cambiar_estado",function(){
            let id =$(this).attr('data-id');
            let url =$(this).attr('data-url');
            let user =$(this).attr('data-user');
    
            $.ajax({
                url:url,
                data:{id,user},
                type:"POST",
                success: function(data){
                    $("tbody").html(data);
                }
            });
        });
    
       
        $(document).on("click","#copyList",function(){
            let listUser=$("#listUser").html();
          
    
            $("#responsables").append(
                "<div class='col-md-4 form group'>"+
                "<label>Responsable</label>"+
                "<div class='row'>"+
                "<div class='col-md-10'>"+listUser+"</div>"+
                "<div class='col-md-2'>"+
                "<button class='btn btn-danger' type='button' id='removeList'>x</>"+
                "</div>"+
                "</div>"+
                "</div>"
            )
    
        });
    
    
        $(document).on("click","#removeList",function(){
            $(this).parent().parent().parent().remove();
    });

    $(document).ready(function() {
        
        $('#consultar').click(function(event) {
          
          event.preventDefault();

          
          window.location.href = "../View/Usuarios/consult.php";
        });
        

      });
      
      $(document).ready(function () {
        
        $('#btn-reg').click(function (event) {
            
            event.preventDefault();
    
            
            window.location.href = "login.php";
        });
    });
    
    $(document).on('change', "#tipo_solicitud", function () { 
        let tipoSolicitud = $(this).val();
        let url = $(this).attr('data-url');
        console.log('se hizo');
        if (tipoSolicitud) {
            $.ajax({
                url: url,
                type: 'POST',
                data: { tipoSolicitud: tipoSolicitud },
                success: function (data) {
                    $('#form_sol').html(data);
                },
                error: function () {
                    $('#form_sol').html('<div class="alert alert-danger">Error al cargar el formulario.</div>');
                }
            });
        } else {
            $('#form_sol').empty(); 
        }
        });

        $(document).on('change', "#tipo_solicitudConsult", function () { 
            let tipoSolicitud = $(this).val();
            let url = $(this).attr('data-url');
            
            if (tipoSolicitud) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: { tipoSolicitud: tipoSolicitud },
                    success: function (data) {
                        $('#form_soli').html(data);
                    },
                    error: function () {
                        $('#form_soli').html('<div class="alert alert-danger">Error al cargar la informacion.</div>');
                    }
                });
            } else {
                $('#form_soli').empty();
                alert('no trae nada'); 
            }
            });

            $(document).on("click", "#copyList", function(){

                $cont=0;
                
                let listUser = $("#listUser").html();
        
                
        
                if ($contResp==0) {
                    alert('hola')
        
                }
        
                    $("#imagenes").append(
                        "<div class='col-md-4 form-group'>"+
                        "<label>Imagenes</label>"+
                            "<div class='row'>"+
                                "<div class='col-md-10'>"+listUser+"</div>"+
                                "<div class='col-md-2'>"+
                                    "<button class='btn btn-danger' type='button' id='removeList'>x</button>"+
                                "</div>"+
                            "</div>"+
                        "</div>"
                    )   
        
            });
        
            $(document).on("click","#removeList",function(){
                $(this).parent().parent().parent().remove();
            });
    
    });