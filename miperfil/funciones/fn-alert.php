<?php

class Fn_alert {

    function fnalert_registro($opc, $error) {
        if ($opc == 1) {
            $msg = '<div class="alert alert-success left-icon-big alert-dismissible fade show">
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                        </button>
                        <div class="media">
                            <div class="alert-left-icon-big">
                                <span><i class="icon icon-Check"></i></span>
                            </div>
                            <div class="media-body">
                                <p class="mb-0">Datos creados correctamente.</p>
                            </div>
                        </div>
                    </div>';
        }if ($opc == 2) {
            $msg = '<div class="col-xl-12" >
                    <div class="alert alert-danger left-icon-big alert-dismissible fade show">
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                        </button>
                        <div class="media">
                            <div class="alert-left-icon-big">
                                <span><i class="mdi mdi-alert"></i></span>
                            </div>
                            <div class="media-body">
                                <h5 class="mt-1 mb-2">Alerta!</h5>
                                <p class="mb-0">Hubó un problema al ingresar la casa.</p>
                            </div>
                        </div>
                    </div>
                </div>';
        }if ($opc == 3) {
            $msg = '<div class="col-xl-12" >
                    <div class="alert alert-danger left-icon-big alert-dismissible fade show">
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                        </button>
                        <div class="media">
                            <div class="alert-left-icon-big">
                                <span><i class="mdi mdi-alert"></i></span>
                            </div>
                            <div class="media-body">
                                <h5 class="mt-1 mb-2">Alerta!</h5>
                                <p class="mb-0">Hubó un problema al ingresar el conjunto.</p>
                            </div>
                        </div>
                    </div>
                </div>';
        }if ($opc == 4) {
            $msg = '<div class="col-xl-12" >
                <div class="alert alert-danger left-icon-big alert-dismissible fade show">
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                    </button>
                    <div class="media">
                        <div class="alert-left-icon-big">
                            <span><i class="mdi mdi-alert"></i></span>
                        </div>
                        <div class="media-body">
                            <h5 class="mt-1 mb-2">Alerta!</h5>
                            <p class="mb-0">La cédula ya existe.</p>
                        </div>
                    </div>
                </div>
            </div>';
        }if ($opc == 5) {
            $msg = '<div class="col-xl-12" >
            <div class="alert alert-danger left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="mdi mdi-alert"></i></span>
                    </div>
                    <div class="media-body">
                        <h5 class="mt-1 mb-2">Alerta!</h5>
                        <p class="mb-0">' . $error . '.</p>
                    </div>
                </div>
            </div>
        </div>';
        }if ($opc == 6) {
            $msg = '<div class="col-xl-12" >
                <div class="alert alert-danger left-icon-big alert-dismissible fade show">
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                    </button>
                    <div class="media">
                        <div class="alert-left-icon-big">
                            <span><i class="mdi mdi-alert"></i></span>
                        </div>
                        <div class="media-body">
                            <h5 class="mt-1 mb-2">Alerta!</h5>
                            <p class="mb-0">Hubó un problema al crear la cuenta, comunicate con nosotros.</p>
                        </div>
                    </div>
                </div>
            </div>';
        }if ($opc == 7) {
            $msg = '<div class="col-xl-12" >
                <div class="alert alert-danger left-icon-big alert-dismissible fade show">
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                    </button>
                    <div class="media">
                        <div class="alert-left-icon-big">
                            <span><i class="mdi mdi-alert"></i></span>
                        </div>
                        <div class="media-body">
                            <h5 class="mt-1 mb-2">Alerta!</h5>
                            <p class="mb-0">Ya existe un reguistro con el mismo nombre.</p>
                        </div>
                    </div>
                </div>
            </div>';
        }
        
        $msg .= '<div id="i_res" class="text-center">
                        <div id="i_loader" style="display: none">
                            <img src="images/Home-Icon.gif" width="100px" alt="alt"/>
                            <br><label>CREANDO...</label>
                        </div>
                    </div>';
        return $msg;
    }

    function fnalert_sesion($opc) {
        if ($opc == 1) {
            $msg = '<div class="alert alert-danger left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="mdi mdi-alert"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">Ingrese todos los campos requeridos.</p>
                    </div>
                </div>
            </div>';
        }if ($opc == 2) {
            $msg = '
            <div class="alert alert-danger left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="mdi mdi-alert"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">El usuario o password son incorrectos.</p>
                    </div>
                </div>
            </div>';
        }if ($opc == 3) {
            $msg = '<div class="alert alert-success left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="fa fa-check"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">Sesión cerrada correctamente.</p>
                    </div>
                </div>
            </div>';
        }
        return $msg;
    }

    function fnalert_contacto($opc) {
        if ($opc == 1) {
            $msg = '<div class="alert alert-success left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="fa fa-check"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">Datos enviados correctamente, pronto nos comunicaremos contigo.</p>
                    </div>
                </div>
            </div>';
        }if ($opc == 2) {
            $msg = '<div class="alert alert-danger left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="mdi mdi-alert"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">Ingrese un email válido.</p>
                    </div>
                </div>
            </div>';
        }if ($opc == 3) {
            $msg = '
            <div class="alert alert-danger left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="mdi mdi-alert"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">Ingrese todos los campos requeridos.</p>
                    </div>
                </div>
            </div>';
        }
        return $msg;
    }

    function fnalert_recuperar($opc) {
        if ($opc == 1) {
            $msg = '<div class="alert alert-success left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="fa fa-check"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">Enviamos un email con el link de recuperación de contraseña al email ingresado, por favor revisa tu bandeja de entrada.</p>
                    </div>
                </div>
            </div>';
        }if ($opc == 2) {
            $msg = '<div class="alert alert-danger left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="mdi mdi-alert"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">El email ingresado no se encuentra registrado.</p>
                    </div>
                </div>
            </div>';
        }if ($opc == 3) {
            $msg = '
            <div class="alert alert-danger left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="mdi mdi-alert"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">Ingrese un email válido.</p>
                    </div>
                </div>
            </div>';
        }if ($opc == 4) {
            $msg = '
            <div class="alert alert-danger left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="mdi mdi-alert"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">Informacion de verificación no válida, por favor comunícate con nosotros.</p>
                    </div>
                </div>
            </div>';
        }if ($opc == 5) {
            $msg = '
            <div class="alert alert-danger left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="mdi mdi-alert"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">Ingrese todos los campos necesarios.</p>
                    </div>
                </div>
            </div>';
        }if ($opc == 6) {
            $msg = '
            <div class="alert alert-danger left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="mdi mdi-alert"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">Las contraseñas no coinciden.</p>
                    </div>
                </div>
            </div>';
        }if ($opc == 7) {
            $msg = '
            <div class="alert alert-danger left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="mdi mdi-alert"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">Ocurrió un error al  momento de actualizar tus datos, por favor comunícate con nosotros.</p>
                    </div>
                </div>
            </div>';
        }if ($opc == 8) {
            $msg = '
            <div class="alert alert-success left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="fa fa-check"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">Contraseña actualizada correctamente, ya puedes iniciar sessión con tus nuevas credenciales.</p>
                    </div>
                </div>
            </div>';
        }
        return $msg;
    }
    
    function fnalert_required($opc) {
        if ($opc == 1) {
            $msg = '<div class="alert alert-danger left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="mdi mdi-alert"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">Ingrese todos los campos requeridos.</p>
                    </div>
                </div>
            </div>';
        }
        return $msg;
    }
    function fnalert_repetido($opc) {
        if ($opc == 1) {
            $msg = '<div class="alert alert-danger left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="mdi mdi-alert"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">El munero de factura ya existe.</p>
                    </div>
                </div>
            </div>';
        }
        if ($opc == 2) {
            $msg = '<div class="alert alert-danger left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="mdi mdi-alert"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">El Concepto ya existe.</p>
                    </div>
                </div>
            </div>';
        }if ($opc == 3) {
            $msg = '<div class="alert alert-danger left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="mdi mdi-alert"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">El departamento ya existe.</p>
                    </div>
                </div>
            </div>';
        }
        return $msg;
    }  
    
    function fnalert_save($opc) {
        if ($opc == 1) {
            $msg = '
            <div class="alert alert-success left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="fa fa-check"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">El registro ha sido guardado correctamente.</p>
                    </div>
                </div>
            </div>';
        }
        if ($opc == 2) {
            $msg = '<div class="alert alert-danger left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="mdi mdi-alert"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">Ocurrio un error al guardar el registro.</p>
                    </div>
                </div>
            </div>';
        }if ($opc == 3) {
            $msg = '
            <div class="alert alert-success left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="fa fa-check"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">El registro ha sido actualizado correctamente.</p>
                    </div>
                </div>
            </div>';
        }if ($opc == 4) {
            $msg = '<div class="alert alert-danger left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="mdi mdi-alert"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">Ocurrio un error al actualizar el registro.</p>
                    </div>
                </div>
            </div>';
        }if ($opc == 6) {
            $msg = '<div class="alert alert-danger left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="mdi mdi-alert"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">Ocurrio un error al guardar el usuario.</p>
                    </div>
                </div>
            </div>';
        }if ($opc == 7) {
            $msg = '<div class="alert alert-danger left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="mdi mdi-alert"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">Ocurrio un error al asignar el departamento.</p>
                    </div>
                </div>
            </div>';
        }
        if ($opc == 8) {
            $msg = '<div class="alert alert-danger left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="mdi mdi-alert"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">Ya existe un usuario propietario en este departamento.</p>
                    </div>
                </div>
            </div>';
        }
        return $msg;
    }
    
    function fnalert_delete($opc) {
        if ($opc == 1) {
            $msg = '
            <div class="alert alert-success left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="fa fa-check"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">El registro ha sido borrado correctamente.</p>
                    </div>
                </div>
            </div>';
        }
        if ($opc == 2) {
            $msg = '<div class="alert alert-danger left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="mdi mdi-alert"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">Ocurrio un error al eliminar el registro.</p>
                    </div>
                </div>
            </div>';
        }if ($opc == 3) {
            $msg = '<div class="alert alert-danger left-icon-big alert-dismissible fade show">
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                <div class="media">
                    <div class="alert-left-icon-big">
                        <span><i class="mdi mdi-alert"></i></span>
                    </div>
                    <div class="media-body">
                        <p class="mb-0">Ocurrio un error al eliminar, existen usuarios asociados a este departamento.</p>
                    </div>
                </div>
            </div>';
        }
        return $msg;
    }
}
