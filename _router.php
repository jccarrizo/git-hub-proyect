<?php
if(isset($_GET["data"])){$t=strip_tags($_GET["data"]);}else{$t='inicio';}
switch($t) {
	/**** INICIO ****/
	case ("inicio"):include('modules/metroinforma/metroinforma.php');?><script>activame('inicio');</script><?php break;
	
  /**** NOTIFICACION ****/
  case ("notificar"):include('./notificar.php'); break;   

  /**** LISTINES ****/ 
	case ("listines"):include('modules/listines/listinesv4.php');?><script>activame('listines');</script><?php break;	
	case ("listines-r"):include('modules/listines/listinesv4r.php');?><script>activame('listines');</script><?php break;	
	case ("listines-arc"):include('modules/listines/listinesv4arc.php');?><script>activame('listines');</script><?php break;	
 	case ("listines-cal"):include('modules/listines/calculo.php');?><script>activame('listines');</script><?php break;	

  /**** AME ****/ 
	case ("ame"):include('modules/ame/intro.php');?><script>activame('ame');</script><?php break;	
  case ("amee"):include('modules/ame/extro.php');?><script>activame('ame');</script><?php break;	
 
  /**** AME ADMIN****/
	case ("ameadmin"):include('modules/ameadmin/ameadmin.php');?><script>activame('ameadmin');</script><?php break;	
	
	/**** AHORRO ****/
	case ("cahorro"):include('modules/ahorro/intro.php');?><script>activame('cahorro');</script><?php break;	
  case ("cahorroe"):include('modules/ahorro/extro.php');?><script>activame('cahorro');</script><?php break;	
  case ("gestionca"):include('modules/ahorro/gestion.php');?><script>activame('cahorro');</script><?php break;	
  
  case ("cahorro-constancia"):include('modules/ahorro/constancia.php');?><script>activame('cahorro');</script><?php break;	

	/**** AHORRO ADMIN****/
	case ("cahorroadmin"):include('modules/ahorroadmin/ahorroadmin.php');?><script>activame('cahorroadmin');</script><?php break;	
	
	/**** PLAN VACACIONAL FRONT****/
	case ("plan-vacacional"):include('modules/planvacacionalfront/intro.php');?><script>activame('plan-vacacional');</script><?php break;	
        
  /**** PLAN VACACIONAL ADMIN****/
	case ("plan-vacacional-admin"):include('modules/planvacacionaladmin/planvreport.php');?><script>activame('plan-vacacional-admin');</script><?php break;	
        
  /**** COMUNICACIONES ****/
	case ("comunicaciones"):include('modules/comunicaciones/generador.php');?><script>activame('comunicaciones');</script><?php break;	
    case ("comunicacionesv2"):include('modules/comunicacionesv2/intro.php');?><script>activame('comunicacionesv2');</script><?php break;	
	 case ("comunica"):include('modules/comunicaciones/prueb.php');?><script>activame('comunicaciones');</script><?php break;	
	 case ("comunicacion"):include('modules/comunicaciones/prueba.php');?><script>activame('comunicaciones');</script><?php break;	
	 case ("codigo"):include('modules/comunicaciones/gene_int.php');?><script>activame('comunicaciones');</script><?php break;	
	 case ("cuerpo"):include('modules/comunicaciones/cuerpo_1.php');?><script>activame('comunicaciones');</script><?php break;
	
	/**** DIRECTORIO ****/
	case ("directorio"):include('modules/directorio/directoriot.php');?><script>activame('directorio');</script><?php break;	
	
	/**** DOCUMENTOS ****/
	case ("documentos"):include('modules/documentos/paneldocumentos.php');?><script>activame('documentos');</script><?php break;	
	
	/**** CLASIFICADOS ****/
case ("clasificados"):include('modules/clasificados/clasificados.php');?><script>activame('clasificados');</script><?php break;	
case ("suvir"):include('modules/clasificados/publicar.php');?><script>activame('clasificados');</script><?php break;	
case ("list"):include('modules/clasificados/lista_productos.php');?><script>activame('clasificados');</script><?php break;	
case ("aviso"):include('modules/clasificados/producto.php');?><script>activame('clasificados');</script><?php break;	
case ("public"):include('modules/clasificados/publicados.php');?><script>activame('clasificados');</script><?php break;
case ("14"):include('modules/clasificados/daniel.php');?><script>activame('clasificados');</script><?php break;
case ("bus"):include('modules/clasificados/busqueda.php');?><script>activame('clasificados');</script><?php break;
case ("cat"):include('modules/clasificados/cat.php');?><script>activame('clasificados');</script><?php break;
case ("mis"):include('modules/clasificados/mis.php');?><script>activame('clasificados');</script><?php break;
case ("reporte"):include('modules/daniel/reporte.php');?><script>activame('daniel');</script><?php break;
case ("autorizar"):include('modules/daniel/autorizar.php');?><script>activame('daniel');</script><?php break;
case ("ver"):include('modules/daniel/verproducto.php');?><script>activame('daniel');</script><?php break;
case ("abrir"):include('modules/daniel/abrir.php');?><script>activame('daniel');</script><?php break;
 


case ("clasificadosadmin"):include('modules/clasificadosadmin/clasificadosadmin.php');?><script>activame('clasificados');</script><?php break;	

      
	/**** PERMISOS ****/  

  case ("permisos"):include('modules/permisos/mpermisos-recomendaciones.php');?><script>activame('permisos');</script><?php break;	
	case ("permisos-solicitar"):include('modules/permisos/mpermisos-solicitar.php');?><script>activame('permisos');</script><?php break;	
  case ("permisos-gestionar"):include('modules/permisos/mpermisos-gestionar.php');?><script>activame('permisos');</script><?php break;	
  case ("permisos-reportes"):include('modules/permisos/mpermisos-reportes.php');?><script>activame('permisos');</script><?php break;	
  case ("permisos-configuraciones"):include('modules/permisos/mpermisos-configuraciones.php');?><script>activame('permisos');</script><?php break;	
  case ("permisos-verificaciones"):include('modules/permisos/mpermisos-verificaciones.php');?><script>activame('permisos');</script><?php break;	
  
	/**** DESDE EL ANDEN-2013 ****/
	case ("dea2013"):include('modules/desdeelanden/ediciones_dea2013.php');?><script>activame('dea');</script><?php break;
	
	/**** DESDE EL ANDEN-2013-1 ****/
	case ("dea01"):include('modules/desdeelanden/ediciones_dea_1.php');?><script>activame('dea');</script><?php break;	
	
	/**** DESDE EL ANDEN-2013-2 ****/
	case ("dea02"):include('modules/desdeelanden/ediciones_dea_2.php');?><script>activame('dea');</script><?php break;	
	
	/**** DESDE EL ANDEN-2013-3 ****/
	case ("dea03"):include('modules/desdeelanden/ediciones_dea_3.php');?><script>activame('dea');</script><?php break;	
	
	/**** DESDE EL ANDEN-2013-4 ****/
	case ("dea04"):include('modules/desdeelanden/ediciones_dea_4.php');?><script>activame('dea');</script><?php break;	
	
	/**** DESDE EL ANDEN-2014-5 ****/
	case ("dea05"):include('modules/desdeelanden/ediciones_dea_5.php');?><script>activame('dea');</script><?php break;	

	/**** DESDE EL ANDEN-2014-6 ****/
	case ("dea06"):include('modules/desdeelanden/ediciones_dea_6.php');?><script>activame('dea');</script><?php break;	

	/**** DESDE EL ANDEN-2014-7 ****/
	case ("dea07"):include('modules/desdeelanden/ediciones_dea_7.php');?><script>activame('dea');</script><?php break;	

	/**** DESDE EL ANDEN-2014-8 ****/
	case ("dea08"):include('modules/desdeelanden/ediciones_dea_8.php');?><script>activame('dea');</script><?php break;	

	/**** DESDE EL ANDEN-2014-9 (Edicion Especial) ****/
	case ("dea09"):include('modules/desdeelanden/ediciones_dea_9.php');?><script>activame('dea');</script><?php break;	

  /**** DESDE EL ANDEN-2014-10 ****/
	case ("dea10"):include('modules/desdeelanden/ediciones_dea_10.php');?><script>activame('dea');</script><?php break;	
  

  /**** DESDE EL ANDEN-2014-11 ****/
	case ("dea11"):include('modules/desdeelanden/ediciones_dea_11.php');?><script>activame('dea');</script><?php break;	

/**** DESDE EL ANDEN-2014 ****/
	case ("dea2014"):include('modules/desdeelanden/ediciones_dea2014.php');?><script>activame('dea');</script><?php break;		

  /**** DESDE EL ANDEN-2014-11 ****/
	case ("dea15"):include('modules/desdeelanden/edicion_esp.php');?><script>activame('dea');</script><?php break;	
	case ("dea2015"):include('modules/desdeelanden/ediciones_dea2015.php');?><script>activame('dea');</script><?php break;
	
    
	/**** ADMINISTRAR METRO INFORMA ****/
	case ("admin-mi"):include('modules/metroinforma/ver_mi.php');?><script>activame('metroinforma');</script><?php break;	
	
	case ("agregar-mi"): include('modules/metroinforma/nueva_mi.php');?><script>activame('metroinforma');</script><?php break;	
	case ("editar-mi"):  include('modules/metroinforma/editar_mi.php');?><script>activame('metroinforma');</script><?php break;	
	case ("eliminar-mi"):include('modules/metroinforma/eliminar_mi.php');?><script>activame('metroinforma');</script><?php break;	
	
	/**** GENERADOR MD5 ****/		
	case ("genmd5"):include('modules/generadormd5/generadormd5.php');?><script>activame('generadormd5');</script><?php break;
	
	/**** DATOS DEL EMPLEADO Y DE FAMILIARES ****/		
	case ("actualizar"):include('modules/actualizacion/actualizacion.php');break;
	case ("actualizarcf"):include('modules/actualizacion/actualizacioncf.php');break;
	
	/****  PERFIL DEL USUARIO ****/		
	case ("perfil"):include('modules/perfil/perfil.php');break;
	
	/****  CIERRE DE SESION ****/		
	case ("bye"):include('modules/bye/bye.php');break;

	/****  REINTEGROS ****/		
	case ("reintegros"):include('modules/reintegros/reintegrosapp.php');?><script>activame('reintegros');</script><?php break;
	
	/****  RESERVA ****/		
	case ("recursos"):include('modules/recursos/recursosapp.php');?><script>activame('reserva');</script><?php break;
	
  /****  RECEPCION DE CARTAS ****/		
	case ("recep"):include('modules/recepcion/recepcion.php');?><script>activame('recep');</script><?php break;
	
	/****  PERFILES DE USUARIOS ****/		
	
	case ("perfiles"):include('modules/auth/perfiles.php');?><script>activame('auth');</script><?php break;
	
	case ("agregar-pe"): include('modules/auth/nueva_pe.php');?><script>activame('auth');</script><?php break;	
	case ("editar-pe"):  include('modules/auth/editar_pe.php');?><script>activame('auth');</script><?php break;	
	case ("eliminar-pe"):include('modules/auth/eliminar_pe.php');?><script>activame('auth');</script><?php break;	
  
  case ("auth-reload"):include('modules/auth/reload.php');?><script>activame('auth');</script><?php break;	

	/****  USUARIOS ****/		

	case ("usuarios"):include('modules/auth/usuarios.php');?><script>activame('auth');</script><?php break;
	
	case ("agregar-us"): include('modules/auth/nuevo_us.php');?><script>activame('auth');</script><?php break;	
	case ("editar-us"):  include('modules/auth/editar_us.php');?><script>activame('auth');</script><?php break;	
	case ("eliminar-us"):include('modules/auth/eliminar_us.php');?><script>activame('auth');</script><?php break;	
		
	/**** ADMINISTRADOR DE BASE DE DATOS ****/		

	case ("admindb"):include('modules/admindb/admindb.php');?><script>activame('admindb');</script><?php break;

  /**** ADMINISTRADOR DE BASE DE DATOS ****/		

	case ("admindb"):include('modules/admindb/admindb.php');?><script>activame('admindb');</script><?php break;

  /**** ADMINISTRADOR DE BASE DE DATOS ****/		

	case ("servfami"):include('modules/serviciosfamiliares/serviciofamiliar.php'); break;
  
/**** ADMINISTRADOS DE NOTIFICACIONES Y MENSAJERIA ****/		

	case ("notiadmin"):include('modules/notificacionesadmin/notiadmin.php');?><script>activame('notificacionesadmin');</script><?php break;
  case ("notihistorial"):include('notihistorial.php'); break;
  
/**** ADMINISTRADOS DE NOTIFICACIONES Y MENSAJERIA ****/		

	case ("wmlauncher"):include('modules/webmail/launcher.php');?><script>activame('webmail');</script><?php break;

/**** ADMINISTRADOR DE CV ****/		

	case ("cvadmin"):include('modules/cvadmin/cvadmin.php');?><script>activame('cvadmin');</script><?php break;
	case ("det-asp"):include('modules/cvadmin/reporte_asp.php');?><script>activame('cvadmin');</script><?php break;
	case ("carga-cv-rh"):include('modules/cvadmin/carga_cv_rh.php');?><script>activame('cvadmin');</script><?php break;
	case ("proc-cv-rh"):include('modules/cvadmin/proc_cv_rh.php');?><script>activame('cvadmin');</script><?php break;
	case ("sav-cv-rh"):include('modules/cvadmin/guardar_cv_rh.php');?><script>activame('cvadmin');</script><?php break;

/**** CEDULACION ****/		         
        
	case ("cedulacion"):include('modules/cedulacion/cedulacion.php');?><script>activame('cedulacion');</script><?php break;

/**** CONSTANCIAS ****/		

case ("constancias"):include('modules/constancias/constancias.php');?><script>activame('constancia');</script><?php break;	
case ("constancias-recomendaciones"):include('modules/constancias/recomendaciones.php');?><script>activame('constancia');</script><?php break;
case ("constanciasadmin"):include('modules/constanciasadmin/constanciasadmin.php');?><script>activame('constancia');</script><?php break;

/**** Visitas ****/      
	case ("ver"):include('modules/visitas/reg_visitantes.php');?><script>activame('visitas');</script><?php break;	
    case ("reg_visitas"):include('modules/visitas/control_visitas.php');?><script>activame('visitas');</script><?php break;	
	 case ("v_programadas"):include('modules/visitasp/reg_visitantes.php');?><script>activame('visitasp');</script><?php break;	
	 case ("terminar"):include('modules/visitas/terminar_visita.php');?><script>activame('visitas');</script><?php break;	
	 case ("ver_visit"):include('modules/visitas/ver_visitante.php');?><script>activame('visitas');</script><?php break;	
	 case ("betar"):include('modules/visitas/betar_visitante.php');?><script>activame('visitas');</script><?php break;	
	 case ("guardo"):include('modules/visitas/guardar_datos_visita.php');?><script>activame('visitas');</script><?php break;	
        case ("guarda"):include('modules/visitas/guardar_nueva_visita.php');?><script>activame('visitas');</script><?php break;	
        case ("lista"):include('modules/visitas/list_visitantes.php');?><script>activame('visitas');</script><?php break;	
        case ("nv"):include('modules/visitas/nueva_visita.php');?><script>activame('visitas');</script><?php break;	
        case ("datos_esp"):include('modules/visitas/visitante_e.php');?><script>activame('visitas');</script><?php break;	
        case ("datos"):include('modules/visitas/guardar_ve.php');?><script>activame('visitas');</script><?php break;	
    case ("moti"):include('modules/visitas/motivo.php');?><script>activame('visitas');</script><?php break;	
    
    /****visitasadmin ****/      
	case ("repor"):include('modules/visitasadmin/visitas_admin.php');?><script>activame('visitasadmin');</script><?php break;	
      case ("historico"):include('modules/visitasadmin/hist_visitas.php');?><script>activame('visitasadmin');</script><?php break;	
        case ("report"):include('modules/visitasadmin/reportes_v.php');?><script>activame('visitasadmin');</script><?php break;	
        
            /****Prestaciones ****/      
	case ("prestaciones"):include('modules/prestaciones/informacion.php');?><script>activame('prestaciones');</script><?php break;	
    case ("prestacion"):include('modules/prestaciones/pdf.php');?><script>activame('prestaciones');</script><?php break;	
    case ("solicitud"):include('modules/prestaciones/prestaciones.php');?><script>activame('prestaciones');</script><?php break;	
    
    
    
}  
?> 
      