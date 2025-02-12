<?php
require './fn/fn-2.php';
$a = new Fn_2();
$tupla = $a->fn2_rusuario_x($idusu_open);
$zonap = $a->fn2_zonaec('EC');
$fechaactual = date('Y-m-d');
?>
<script src="./jsopc/jsopc-2.js"></script>
<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile card card-body px-3 pt-3 pb-0">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo"></div>
                        </div>
                        <div class="profile-info">
                            <div class="profile-photo">
                                <img src="./images/profile/perfil.png" class="img-fluid rounded-circle" alt="">
                            </div>
                            <div class="profile-details">
                                <div class="profile-name px-3 pt-2">
                                    <h4 class="text-primary mb-0"><?php echo utf8_encode($tupla[0]['nombre_usuario'] . ' ' . $tupla[0]['apellido_usuario']) ?></h4>
                                    <p><?php echo utf8_encode($tupla[0]['email_usuario']) ?></p>
                                </div>
                                <div class="profile-email px-2 pt-2">
                                    <h4 class="text-muted mb-0"><?php echo utf8_encode($tupla[0]['tlf1_usuario']) ?></h4>
                                    <p>Teléfono</p>
                                </div>
                                <div class="dropdown ml-auto">
                                    <a href="#" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
                                    <ul class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-169px, 30px, 0px);">
                                        <li onclick="md2_d1(1,<?php echo utf8_encode($idusu_open) ?>)" class="dropdown-item" data-toggle="modal" data-target="#modalcontent_md"><i class="fa fa-refresh text-primary mr-2"></i> Cambiar Imágen</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pt-3">
                            <form id="frm_editarusuario" method="POST">
                                <input name="dato_0" type="hidden" value="2">
                                <input name="dato_1" type="hidden" value="<?php echo $idusu_open ?>">
                                <div class="settings-form">
                                    <h4 class="text-primary">Datos Personales</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Nombres</label>
                                            <input name="nombre" type="text" placeholder="Nombres" class="form-control" value="<?php echo utf8_encode($tupla[0]['nombre_usuario']) ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Apellidos</label>
                                            <input name="apellido" type="text" placeholder="Apellidos" class="form-control" value="<?php echo utf8_encode($tupla[0]['apellido_usuario']) ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>RUC/C.I.</label>
                                            <input name="ruc" type="text" placeholder="" class="form-control" value="<?php echo utf8_encode($tupla[0]['ruc_usuario']) ?>">
                                        </div>
                                        <?php
                                        $checkm = '';
                                        $checkf = '';
                                        if ($tupla[0]['sexo_usuario'] == "MASCULINO") {
                                            $checkm = 'selected=""';
                                        } else {
                                            $checkf = 'selected=""';
                                        }
                                        ?>
                                        <div class="form-group col-md-6">
                                            <label>Teléfono</label>
                                            <input name="telefono" type="text" placeholder="Teléfono" class="form-control" value="<?php echo utf8_encode($tupla[0]['tlf1_usuario']) ?>">
                                        </div>
                                    </div>
                                    

                                    <h4 class="text-primary">Datos Domicilio</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Calle Principal</label>
                                            <input name="calle1" type="text" placeholder="" class="form-control" value="<?php echo utf8_encode($tupla[0]['calle1_usuario']) ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Calle Secundaria</label>
                                            <input name="calle2" type="text" placeholder="" class="form-control" value="<?php echo utf8_encode($tupla[0]['calle2_usuario']) ?>">
                                        </div>
                                    </div>
                                    
                                    
                                    <div id="div_editar"></div>
                                    <button onclick="cn2_f2()" style="width: 100%;" class="btn btn-warning text-white" type="button"> <span class="fa fa-save text-white"></span> Guardar Cambios</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Md modal  -->
        <div class="modal fade" id="modalcontent_md">
            <div class="modal-dialog" role="document">
                <div class="modal-content" id="content_md">
                </div>
            </div>
        </div>
        <!-- Small modal -->
        <div class="modal fade bd-example-modal-sm" id="modalcontent_sm" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content" id="content_sm">
                </div>
            </div>
        </div>
        <!-- lg modal -->
        <div class="modal fade bd-example-modal-lg" id="modalcontent_lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="content_lg">
                </div>
            </div>
        </div>
    </div>
</div>