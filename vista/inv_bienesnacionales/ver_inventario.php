<?php
$consultar= $registrar= $eliminar=false;
for($i=0;$i<count($laModulos);$i++) 
    {
         
        $laServicios=$lobjRol->consultar_servicios_menu($laModulos[$i][0]); 
        for ($j=0; $j <count($laServicios) ; $j++) //Se recorre un ciclo para poder extraer los datos de cada uno de los servicios que tiene asignado el modulo para poder constuir el menú
        {
            if($laServicios[$j][2]=='persona/consultar_docente')
            {
                $consultar=true;
            }
            if($laServicios[$j][2]=='persona/registrar_docente')
            {
                $registrar=true;
            }
            if($laServicios[$j][2]=='persona/eliminar_docente')
            {
                $eliminar=true;
            }
        }
    }
?>
<script>
 function buscar(id)
 {
    window.location.href="?vista=persona/consultar_docente&id="+id;
 }
  function eliminar(id)
  {
      document.getElementById("cam_iddocente").value=id;
  }

  function descativar()
  {
     if(confirm("¿Esta seguro que desea desactivar el docente seleccionado?"))
    {
      document.form_docente.submit();
    }
  }
  function restaurar(id)
  {
     if(confirm("¿Esta seguro que desea restaurar el docente seleccionado?"))
    {
      document.getElementById("cam_iddocente").value=id;
      document.getElementById("cam_operacion").value='restaurar_docente';
      document.form_docente.submit();
    }
  }
</script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        oTable = $('#filtro').dataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers",
            "iDisplayLength": 5                    
        });
    } );
</script>  
<div style="float: left" class="col-lg-10 span10 pull-left">
    <h3>Bienes Nacionales</h3>
    <div class="alert alert-info">
        <ul>
            En este módulo podrá registrar, consultar, editar, desactivar y activar los Arcticulos.
        </ul>
    </div>
    <form action="../controlador/control_docente.php" method="POST" name="form_docente">
        <input type="hidden" value="eliminar_docente" name="operacion" id="cam_operacion"/>
        <input type="hidden"  name="iddocente" id="cam_iddocente"/>
        <?php
        if($registrar)
        {
            echo ('
              <a class="btn btn-primary" id="btn_registrar" href="?vista=inv_bienesnacionales/recepcion_articulobn"><i class="icon-calendar icon-white"></i> Períodos</a>
              <a class="btn btn-success" id="btn_registrar" href="?vista=inv_bienesnacionales/asignacion_articulobn"><i class="icon-lock icon-white"></i> Asignación de BN</a>
              <a class="btn btn-success" id="btn_registrar" href="?vista=inv_bienesnacionales/recepcion_articulobn"><i class="icon-plus icon-white"></i> Recepción de BN</a>
              <a class="btn btn-warning" id="btn_registrar" href="?vista=inv_bienesnacionales/recepcion_articulobn"><i class="icon-arrow-left icon-white"></i> Devolución de BN</a>
              <a class="btn btn-danger" id="btn_registrar" href="?vista=inv_bienesnacionales/recepcion_articulobn"><i class="icon-minus icon-white"></i> Desincorporación de BN</a>
              ');
        }
        ?>
        <table class="table table-striped table-hover table-bordered bootstrap-datatable datatable dataTable" id="filtro">
            <thead>
                <th>Código BN</th><th>Nombre del Artículo</th><th>Modelo</th><th>Fecha de Ingreso</th><th>Departamento</th><th>Fecha de Asignación</th><th>Condición</th><?php if($consultar || $eliminar)
                        { echo '<th>Acción</th>';}?>
            </thead>
            <tbody>
            <?php
                    require_once('../clases/clase_docente.php');
                 //   $lobjDocente=new clsDocente;
                //    $laDocentes=$lobjDocente->consultar_docentes_inactivos();
                    $laDocentes[0]=array(
                      0 => '88715441',
                      1 => 'Portería',
                      2 => '4561',
                      3 => '12 de Julio del 2015',
                      4 => 'Deporte',
                      5 => '16 de Agosto del 2015',
                      6 => 'Asignado',
                      11 => true,



                       );
                    for($i=0;$i<count($laDocentes);$i++)
                    {
                        if($laDocentes[$i][11])
                        {
                            $laDocentes[$i][11]='Activo';
                        }
                        elseif(!$laDocentes[$i][11]) 
                        {
                            $laDocentes[$i][11]='Inactivo';
                        }
                        echo '<tr>';
                        echo '<td>'.$laDocentes[$i][0].'</td>';
                        echo '<td>'.$laDocentes[$i][1].'</td>';
                        echo '<td>'.$laDocentes[$i][2].'</td>';
                        echo '<td>'.$laDocentes[$i][3].'</td>';
                        echo '<td>'.$laDocentes[$i][4].'</td>';
                        echo '<td>'.$laDocentes[$i][5].'</td>';
                        echo '<td>'.$laDocentes[$i][6].'</td>';
                        if($consultar || $eliminar)
                        {
                            echo '<td>';
                            if($consultar && $laDocentes[$i][11]=='Activo')
                            {
                                echo '<a class="btn btn-info" href="#" title="Consultar" onclick="buscar('.$laDocentes[$i][0].')"><i class="icon-search icon-white"></i></a> ';
                            }
                            if($eliminar)
                            {
                                if($laDocentes[$i][11]=='Activo')
                                {
                                    echo '<a class="btn btn-danger" href="#" title="Desactivar" data-toggle="modal" data-target="#myModal" onclick="" ><i class="icon-remove icon-white"></i></a> ';
                                /*
                                          eliminar('.$laDocentes[$i][0].')
                                */
                                }
                                elseif($laDocentes[$i][11]=='Inactivo')
                                {
                                    echo '<a class="btn btn-warning" title="Restaurar" href="#" onclick="" ><i class="icon-refresh icon-white"></i></a>';
                                /*
                                          restaurar('.$laDocentes[$i][0].')
                                */
                                }
                            }
                            echo "</td>";
                        }
                       
                        echo '</tr>';
                    }
                ?>
                </tbody>
        </table>
         <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Descactivar docente</h4>
              </div>
              <div class="modal-body">
                   <div class="row">
                        <div class="col-lg-3 span3">
                            <label>Razón <span class="label label-warning" data-trigger="hover" data-container="body" data-toggle="popover" data-placement="right" data-content="Razón por la cual desea desactivar al docente."><i class="fa fa-question" ></i></span></label>
                            <input type="text" class="span3"  name="razondesactiva" id="cam_razondesactiva" value=""/>
                        </div>
                   </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" onclick="descativar()">Desactivar</button>
              </div>
            </div>
          </div>
      </div>
    </form>
    
</div>
<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
      })
</script>