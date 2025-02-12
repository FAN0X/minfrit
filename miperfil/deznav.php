<div class="deznav-scroll">
    <ul class="metismenu" id="menu">
        <?php
        $arregloitems = $m->fn_rmenu_xrol($idroll_open,1);
        $padre_id = $m->fn_rPDOpadre_xid($opc);
        foreach ($arregloitems as $unMenu){
            $act = '';
            if ($padre_id == $unMenu['id_menu']) {
                $act = 'mm-active';
            }
            $arreglosubitems = $m->fn_rsubmen_x($unMenu['id_menu'], $idroll_open);
        ?>
        
        <li <?php echo $act ?>><a class="has-arrow ai-icon " title="<?php echo utf8_encode($unMenu['nombre_menu']) ?>" href="javascript:void()" aria-expanded="false">
                <i class="<?php echo $unMenu['icon_menu'] ?>"></i>
                <span class="nav-text" style="padding-left:10px"><?php echo utf8_encode($unMenu['nombre_menu']) ?></span>
            </a>
            <ul aria-expanded="false">
                <?php 
                foreach ($arreglosubitems as $unsubMenu){ 
                    
                ?>
                <li><a href="index.php?opc=<?php echo $unsubMenu['url_menu']?>"><?php echo utf8_encode($unsubMenu['nombre_menu']) ?></a></li>
                <?php 
                }       
                ?>
            </ul>
        </li>
        <?php
        }
        ?>
    </ul> 
    
</div>