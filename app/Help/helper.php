<?php

   function tienePermiso($permiso){   
        
        $permisos = explode("|", Auth::user()->perfil->permisos);                
        //print_r($permiso);
        if(in_array($permiso, $permisos))
            return true;
        else
            return false;
    }

