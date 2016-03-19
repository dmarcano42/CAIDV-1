<?php
include('../clases/clase_docente.php');
$lobjDocente = NEW clsDocente();
$id=(isset($_GET['id']))?$_GET['id']:"";
$lobjDocente->set_Docente($id);
$Datos_Docente = $lobjDocente->consultar_docente_bitacora();
$OnKey='';
if($Datos_Docente)
{
    $operacion='editar_docente';
    $titulo   ='Consultar docente';
    $OnKey='readOnly';
}
else
{
    $operacion='registrar_articulobn';
    $titulo   ='Registrar Bienes Nacionales';
}

?>

<div style="float: left" class="col-lg-8 span8 pull-left">
    <h3><?php print($titulo); ?></h3>
    <div class="alert alert-info">
        <ul>
            <li>En este formulario podrá registrar el docente que dictará el curso.</li>
            <li>Sí necesitas ayuda para usar este formulario haz clic en el botón <button class="btn btn-warning" type="button" onclick="javascript:introJs().start();"><i class="fa fa-question-circle"></i> Ayuda</button>.</li>
        </ul>
    </div>
    <form class="formulario" action="../controlador/control_docente.php" method="POST" id="f_recepcion" name="f_recepcion">
        <input type="hidden" value="<?php print($operacion);?>" name="operacion" />
        <div class="row-fluid">
            <div class="col-lg-4 span4">
                <label>Nro. de Documento <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Tipo de Artículo del Bien Nacional."><i class="fa fa-question" ></i></span></label>
               <input type="text" class="span12" maxlength="9"  name="iddocente" id="cam_iddocente"  <?php print($OnKey); ?> value="<?php print($Datos_Docente['iddocente']);?>" required/>
            </div>
            <div class="col-lg-4 span4">
                <label>Fecha de llegada <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Modelo del Bien Nacional."><i class="fa fa-question" ></i></span></label>
                <input type="text" class="span12" maxlength="9"  name="iddocente" id="cam_iddocente"  <?php print($OnKey); ?> value="<?php print($Datos_Docente['iddocente']);?>" required/>
            </div>
            <div class="col-lg-4 span4">
                <label>Proveedor <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Modelo del Bien Nacional."><i class="fa fa-question" ></i></span></label>
                <select name="nacionalidaddoc" id="cam_nacionalidaddoc">
                    <option value="" <?php if($Datos_Docente['nacionalidaddoc']=="V"){print('SELECTED');}?>>Seleccione</option>
                    <option value="V" <?php if($Datos_Docente['nacionalidaddoc']=="V"){print('SELECTED');}?>>Disponible</option>
                    <option value="V" <?php if($Datos_Docente['nacionalidaddoc']=="V"){print('SELECTED');}?>>Asignado</option>
                    <option value="E" <?php if($Datos_Docente['nacionalidaddoc']=="E"){print('SELECTED');}?>>En Reparación</option>
                    <option value="E" <?php if($Datos_Docente['nacionalidaddoc']=="E"){print('SELECTED');}?>>Desincorporado</option>
                </select>
            </div>
        </div>
        <div class="row-fluid">
            <div class="col-lg-4 span4">
                <label>Responsable <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Modelo del Bien Nacional."><i class="fa fa-question" ></i></span></label>
                <select name="nacionalidaddoc" id="cam_nacionalidaddoc">
                    <option value="" <?php if($Datos_Docente['nacionalidaddoc']=="V"){print('SELECTED');}?>>Seleccione</option>
                    <option value="V" <?php if($Datos_Docente['nacionalidaddoc']=="V"){print('SELECTED');}?>>Disponible</option>
                    <option value="V" <?php if($Datos_Docente['nacionalidaddoc']=="V"){print('SELECTED');}?>>Asignado</option>
                    <option value="E" <?php if($Datos_Docente['nacionalidaddoc']=="E"){print('SELECTED');}?>>En Reparación</option>
                    <option value="E" <?php if($Datos_Docente['nacionalidaddoc']=="E"){print('SELECTED');}?>>Desincorporado</option>
                </select>
            </div>
            <div class="col-lg-4 span4">
                <label>Motivo <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Condición del Bien Nacional."><i class="fa fa-question" ></i></span></label>
                <select name="nacionalidaddoc" id="cam_nacionalidaddoc">
                    <option value="" <?php if($Datos_Docente['nacionalidaddoc']=="V"){print('SELECTED');}?>>Seleccione</option>
                    <option value="V" <?php if($Datos_Docente['nacionalidaddoc']=="V"){print('SELECTED');}?>>Disponible</option>
                    <option value="V" <?php if($Datos_Docente['nacionalidaddoc']=="V"){print('SELECTED');}?>>Asignado</option>
                    <option value="E" <?php if($Datos_Docente['nacionalidaddoc']=="E"){print('SELECTED');}?>>En Reparación</option>
                    <option value="E" <?php if($Datos_Docente['nacionalidaddoc']=="E"){print('SELECTED');}?>>Desincorporado</option>
                </select>
            </div>
            <div class="col-lg-4 span4">
                <label>Observación <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Código del Bien Nacional."><i class="fa fa-question" ></i></span></label>
                <textarea class="span12" maxlength="9"  name="iddocente" id="cam_iddocente"></textarea>
            </div>
        </div>
    <table>   
    <tr>
        <td colspan="3" class="recepcion2-tour">
            <div class="caption">
                <?php if(!isset($_SESSION["GlobalDetalle"])){?>
                <span id="iconos-recep-bien-mas" title="clic para mostrar la vista de bien" onclick="MostrarBien()" class="icon-plus"></span>
                <span id="iconos-recep-bien-men" title="clic para no mostrar la vista del bien" onclick="CerrarBien()" class="icon-minus"></span>
                <?php } ?>Recepción: Datos del Bien Nacional 
                <span title="Clic para ver ayuda guiada"class="icon-magic-wand element-recepcion2 ayuda-local-frm ayudaguiada2-tour "></span> </div>
        </td>
    </tr>
    <tr id="datos-entrada-bien4">
        <td id="r-paddig" class="codigotipobien-tour" >
            <label>Código del Bien:<span class="asterisco">*</span> </label>
            <input type="text" class="CampoMov" onBlur="this.toUpperCase(),validarCodigoAjax()" readonly="readonly" id="cod_bien_R" name="cod_bien_R" placeholder="Ingrese Código del Bien">
        </td>
        <td id="r-paddig" class="tipobien-tour">
            <label>Tipo Bien:<span class="asterisco">*</span> </label>
            
        </td>
        <td id="r-paddig" class="ubicacion-tour">
            <label>Ubicación: <span class="asterisco">*</span> </label>
           
        </td>
    </tr>
    <tr id="datos-entrada-bien5">
        <td id="r-paddig" class="serial-tour" >
            <label>Serial:</label>
            <input type="text" class="CampoMov" onBlur="this.toUpperCase()" readonly="readonly" id="serial_bien_recep" name="serial_bien_recep" placeholder="Ingrese Serial del Bien">
        </td>
        <td id="r-paddig" class="marca-tour" >
            <label>Marca: </label>
           
        </td>
        <td id="r-paddig" class="modelo-tour" >
            <label>Modelo:</label>
            <input type="text" class="CampoMov" onBlur="this.toUpperCase()" readonly="readonly" id="modelo_bien_recep" name="modelo_bien_recep" placeholder="Ingrese Modelo del Bien Nacional">
        </td>
    </tr>
    <tr id="datos-entrada-bien6">
        <td id="r-paddig" class="precio-tour">
            <label>Precio:<span class="asterisco">*</span> (Bs)</label>
            <input type="text" class="CampoMov" onBlur="this.toUpperCase()" readonly="readonly" id="precio_bien_recep" name="precio_bien_recep" placeholder="Ingrese precio en bolivares">
        </td>
        <td id="r-paddig" class="descripcion-tour" >
            <label>Descripción: </label>
            <textarea id="textareaBienDes" onBlur="this.toUpperCase()" class="CampoMov" readonly="readonly" name="des_bien_recep" placeholder="Ingrese descripción del bien nacional, este campo es opcional"></textarea>
        </td>
        <td id="r-paddig" class="observacion-tour" >
            <label>Observación: </label>
            <textarea id="textareaBienObser" onBlur="this.toUpperCase()" class="CampoMov Class_obser_bien" readonly="readonly" name="obser_bien" placeholder="Ingrese Observación, este campo es opcional ">Buen Estado</textarea>
    
            <button type="button" class="CampoMov bottonagregar-tour" value="modPass" disabled="disabled" id="r-agregar" name="addService" onclick="validacionBienParaAgragar()" ><span id="icon-plus" class="icon-plus"></span> Agregar</button>
        </td>
    </tr>
    </table>

        <div class="row-fluid">
            <table border="1">
                <tr><td colspan="3" class="recepciondetalle-tour">
                    <div class="caption">Recepción: Detalle del Bien Nacional</div>
                    <div id="cabecera-detalle" class="todoslosdetalles-tour"> 
                        <span id="n1">N°</span>
                        <span id="n2">Código</span>
                        <span id="n3">Tipo Bien</span>
                        <span id="n4">Descripción</span>
                        <span id="n5">Serial</span>
                        <span id="n6">Marca</span>
                        <span id="n7">Modelo</span>
                        <span id="n8">Precio</span>
                        <span id="n9"><?php if(isset($_SESSION["GlobalDetalle"])) echo "Observación"; else echo "Ubicación"; ?></span>
                        <span id="n10"><?php if(isset($_SESSION["GlobalDetalle"])) echo "Condición"; else echo "Observación"; ?></span>
                        <span id="n"></span>
                    </div>
                </td></tr>
            </table>
        </div>
       
       
        <div class="botonera">
            <input type="hidden" id="validarCaberaLlena" name="validarCaberaLlena"> 
            <input type="submit" class="btn btn-success" name="btn_enviar" id="btn_enviar" value="Aceptar" onclick="return validar();">
            <input type="button" class="btn btn-danger" name="btn_regresar" id="btn_regresar" value="Regresar" onclick="window.location.href='?vista=inv_bienesnacionales/ver_inventario'">
        </div>
    </form>
</div>

<script type="text/javascript">
    $('#dp3').datepicker();

    function validar()
    {

        var fecha_nacimiento = $("#cam_fechanacimientodoc").val();
        var cedula = $("#cam_iddocente").val();
        var telefono = $("#cam_telefonodoc").val();
        var fechaActual = new Date()
        var diaActual = fechaActual.getDate();
        var mmActual = fechaActual.getMonth() + 1;
        var yyyyActual = fechaActual.getFullYear();
        FechaNac = fecha_nacimiento.split("-");
        var diaCumple = FechaNac[0];
        var mmCumple = FechaNac[1];
        var yyyyCumple = FechaNac[2];
        //retiramos el primer cero de la izquierda
        if (mmCumple.substr(0,1) == 0) {
        mmCumple= mmCumple.substring(1, 2);
        }
        //retiramos el primer cero de la izquierda
        if (diaCumple.substr(0, 1) == 0) {
        diaCumple = diaCumple.substring(1, 2);
        }
        var edad = yyyyActual - yyyyCumple;

        //validamos si el mes de cumpleaños es menor al actual
        //o si el mes de cumpleaños es igual al actual
        //y el dia actual es menor al del nacimiento
        //De ser asi, se resta un año
        if ((mmActual < mmCumple) || (mmActual == mmCumple && diaActual < diaCumple)) {
        edad--;
        }

         if(cedula.length<7)
        {
            alert('Cédula invalida, debe ingresar una cédula valida.');
            $("#cam_iddocente").focus();
            return false;
        }
        else if(telefono.length<11)
        {
            alert('Telefono invalido, debe ingresar un telefono valido de 11 caracteres.');
            $("#cam_telefonodoc").focus();
            return false;
        }
        else if((edad>=18) && (edad<=90))
        {
            return true;
        }
        else
        {
            alert('El docente es menor de edad o tiene una fecha de nacimiento incorrecta, debe indicar una fecha de nacimiento valida.');
            $("#cam_fechanacimientodoc").focus();
            return false;
        }
    }


</script>


<script>

var loF=document.f_recepcion;



    $( document ).ready(function() {
    fpInicio();

    });

    function fpInicio()
    {
        fpCancelar();

    }
    function fpCancelar()
    {
        loF.validarCaberaLlena.value = "bloqueada";
        CerrarBien();
    }
    
    function MostrarBien(){

        if(loF.validarCaberaLlena.value == "desbloqueada"){

                var submenu4 = document.getElementById('datos-entrada-bien4');
                var submenu5 = document.getElementById('datos-entrada-bien5');
                var submenu6 = document.getElementById('datos-entrada-bien6');
                //submenu.style.visibility = "visible";
                submenu4.style.visibility = "visible";
                submenu5.style.visibility = "visible";
                submenu6.style.visibility = "visible";

                submenu4.style.position = "relative";
                submenu5.style.position = "relative";
                submenu6.style.position = "relative";

                document.getElementById('iconos-recep-bien-men').style.display = "inline-block";
                document.getElementById('iconos-recep-bien-mas').style.display = "none";
           
        }

    }
    
    function CerrarBien(){
        var submenu4 = document.getElementById('datos-entrada-bien4');
        var submenu5 = document.getElementById('datos-entrada-bien5');
        var submenu6 = document.getElementById('datos-entrada-bien6');

        submenu4.style.visibility = "hidden";
        submenu5.style.visibility = "hidden";
        submenu6.style.visibility = "hidden";

        submenu4.style.position = "absolute";
        submenu5.style.position = "absolute";
        submenu6.style.position = "absolute";

        document.getElementById('iconos-recep-bien-men').style.display = "none";
        document.getElementById('iconos-recep-bien-mas').style.display = "inline-block";
        document.getElementById('validarCaberaLlena').value = "desbloqueada";
    }




</script>
