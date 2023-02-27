<div class="content-wrapper" style="min-height: 717px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Administrar Usuarios</h1>
                </div>
            </div>

        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-info card-outline">
                        <div class="card-header"></div>
                        <button type="button" class="btn btn-success crear-perfil" data-toggle="modal" data-target="#modal-crear-usuarios">
                            Crear nuevo usuario
                        </button><br>

                    </div><br>
                    <div class="card-body">
                        <table class="table table-bordered table-striped dt-responsive tablaperfil" width="100%">
                            <thead>
                                <tr>
                                    <th style="width:10px">#</th>
                                    <th>Nombre</th>
                                    <th>usuario</th>
                                    <th>rol</th>
                                    <th>foto</th>
                                    <th>acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($usuarios as $key => $value) {
                                        
                                    
                                ?>
                                <tr>
                                    <td><?php echo ($key+1) ?></td>
                                    <td><?php echo $value["nombre"] ?></td>
                                    <td><?php echo $value["usuario"] ?></td>
                                    <td><?php echo $value["rol_id"] ?></td>
                                    <td><?php echo $value["foto"] ?></td>
                                    
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btn-sm">
                                                <i class="fas fa-pencil-alt text-white"></i>
                                            </button>

                                            <button class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>

                                        </div>
                                    </td>
                                    
                                </tr>
                                <?php
                                    }
                                ?>

                                <?php
                                    
                                ?>
                            </tbody>

                        </table>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>

        </div>
    </section>
</div>




<!--==================
MODAL CREAR USUARIOS
================== -->
<div class="modal modal-default fade" id="modal-crear-usuarios">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dimissible">Agregar Nuevo Usuario</h4>
            </div>
            <form method="post" enctype="multipart/form-data">

            <div class="form-group has-feedback" bis_skin_checked="1">
                <input type="text" class="form-control" name="nom_perfil" placeholder="nombre">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback" bis_skin_checked="1">
                <input type="text" class="form-control" name="nom_user" placeholder="usuario">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback" bis_skin_checked="1">
                <input type="password" class="form-control" name="pass_user" placeholder="password">
                <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback" bis_skin_checked="1">
                <div class="btn btn-default btn-file" bis_skin_checked="1">
                    <i class="fas fa-papaerclip"></i>Adjuntar Imagen de perfil
                    <input type="file" name="subirImgPerfil">
                </div>
                <img class="previsualizarImgPerfil img-fluid py-2" width="200" height="200">
                <p class="help-block small"> Dimensiones: 480px * 382px | Peso Max. 2MB | Formato JPG o PNG</p>
            </div>


            <div class="form-group has-feedback">

                <label>rol</label>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dimiss="modal">Cerrar</button>
                <button type="submit" class=" btn btn-primary">Guardar</button>
            </div>

            <?php 
            /* $guardarPerfil = new ctrPerfiles();
            $guardarPerfil->ctrGuardarPerfil();*/
            ?>
            </form>
        </div>
    </div>
</div>