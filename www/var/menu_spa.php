<?php
/* Archivo definicion menu de la aplicacion
 * Libreria Menu Kendo UI
 * Generado automaticamente 
 * NO MODIFICAR A MANO!
 */
	
	$buff = '<ul id="menu">';
        if($this->haveRight($primary_db,'menu.archivo.inicio')) { 
        	$buff.="<li>Inicio";
        	$buff.='<ul>';
        	$buff.="<li><a href=\"/index.php\">Inicio</a>";
        	$buff.='</li>';
        	$buff.="<li><a href=\"".$this->encodeURL('/modules/security/mydata.php?OP=M')."\">Mis datos</a>";
        	$buff.='</li>';
        	$buff.="<li><a href=\"".$this->encodeURL('/modules/security/logout.php?OP=V')."\">Salir</a>";
        	$buff.='</li>';
        	$buff.='</ul>';
        }
        if($this->haveRight($primary_db,'configuracion.menu')) { 
        	$buff.="<li>Configuracion";
        	$buff.='<ul>';
            if($this->haveRight($primary_db,'configuracion.items')) { 
            	$buff.="<li>Items de Monitoreo";
            	$buff.='<ul>';
                if($this->haveRight($primary_db,'configuracion.items')) { 
                	$buff.="<li><a href=\"".$this->encodeURL('/lmodules/configuracion/items.php?OP=L')."\">Listado de Items de Monitoreo</a>";
                	$buff.='</li>';
                }
                if($this->haveRight($primary_db,'configuracion.items.nuevo')) { 
                	$buff.="<li><a href=\"".$this->encodeURL('/lmodules/configuracion/items_maint.php?OP=N')."\">Nuevo Item de Monitoreo</a>";
                	$buff.='</li>';
                }
            	$buff.='</ul>';
            	$buff.='</li>';
            }
            if($this->haveRight($primary_db,'configuracion.cli_calls')) { 
            	$buff.="<li>Tipos de Llamados";
            	$buff.='<ul>';
                if($this->haveRight($primary_db,'configuracion.cli_calls')) { 
                	$buff.="<li><a href=\"".$this->encodeURL('/lmodules/configuracion/cli_calls.php?OP=L')."\">Listado de Tipos de Llamados</a>";
                	$buff.='</li>';
                }
                if($this->haveRight($primary_db,'configuracion.cli_calls.nuevo')) { 
                	$buff.="<li><a href=\"".$this->encodeURL('/lmodules/configuracion/cli_calls_maint.php?OP=N')."\">Nuevo Tipo de Llamado</a>";
                	$buff.='</li>';
                }
            	$buff.='</ul>';
            	$buff.='</li>';
            }
            if($this->haveRight($primary_db,'configuracion.crit_status')) { 
            	$buff.="<li>Estados de Operadores";
            	$buff.='<ul>';
                if($this->haveRight($primary_db,'configuracion.crit_status')) { 
                	$buff.="<li><a href=\"".$this->encodeURL('/lmodules/configuracion/crit_status.php?OP=L')."\">Listado de Estados de Operadores</a>";
                	$buff.='</li>';
                }
                if($this->haveRight($primary_db,'configuracion.crit_status.nuevo')) { 
                	$buff.="<li><a href=\"".$this->encodeURL('/lmodules/configuracion/crit_status_maint.php?OP=N')."\">Nuevo Estado de Operadores</a>";
                	$buff.='</li>';
                }
            	$buff.='</ul>';
            	$buff.='</li>';
            }
            if($this->haveRight($primary_db,'configuracion.crit_status')) { 
            	$buff.="<li>Operadores";
            	$buff.='<ul>';
                if($this->haveRight($primary_db,'configuracion.crit_status')) { 
                	$buff.="<li><a href=\"".$this->encodeURL('/lmodules/configuracion/oper_status.php?OP=L')."\">Listado de Operadores</a>";
                	$buff.='</li>';
                }
                if($this->haveRight($primary_db,'configuracion.crit_status.nuevo')) { 
                	$buff.="<li><a href=\"".$this->encodeURL('/lmodules/configuracion/oper_status_maint.php?OP=N')."\">Nuevo Operador a Monitorear</a>";
                	$buff.='</li>';
                }
            	$buff.='</ul>';
            	$buff.='</li>';
            }
            if($this->haveRight($primary_db,'configuracion.criterios')) { 
            	$buff.="<li>Criterios";
            	$buff.='<ul>';
                if($this->haveRight($primary_db,'configuracion.criterios')) { 
                	$buff.="<li><a href=\"".$this->encodeURL('/lmodules/configuracion/criterios.php?OP=L')."\">Listado de criterios</a>";
                	$buff.='</li>';
                }
                if($this->haveRight($primary_db,'configuracion.criterios.nuevo')) { 
                	$buff.="<li><a href=\"".$this->encodeURL('/lmodules/configuracion/criterios_maint.php?OP=N')."\">Nuevo criterios </a>";
                	$buff.='</li>';
                }
            	$buff.='</ul>';
            	$buff.='</li>';
            }
        	$buff.='</ul>';
        }
        if($this->haveRight($primary_db,'circuitos.menu')) { 
        	$buff.="<li>circuitos";
        	$buff.='<ul>';
            if($this->haveRight($primary_db,'circuitos.circuitos')) { 
            	$buff.="<li><a href=\"".$this->encodeURL('/lmodules/circuitos/circuitos.php?OP=L')."\">Listado de Circuitos de Monitoreo</a>";
            	$buff.='</li>';
            }
            if($this->haveRight($primary_db,'circuitos.circuitos.nuevo')) { 
            	$buff.="<li><a href=\"".$this->encodeURL('/lmodules/circuitos/circuitos_maint.php?OP=N')."\">Nuevo Circuito de Monitoreo</a>";
            	$buff.='</li>';
            }
            if($this->haveRight($primary_db,'circuitos.cir_groups')) { 
            	$buff.="<li>Asignacion de Grupos";
            	$buff.='<ul>';
                if($this->haveRight($primary_db,'circuitos.cir_groups')) { 
                	$buff.="<li><a href=\"".$this->encodeURL('/lmodules/circuitos/cir_groups.php?OP=L')."\">Listado de Grupos de Asignados</a>";
                	$buff.='</li>';
                }
                if($this->haveRight($primary_db,'circuitos.cir_groups.nuevo')) { 
                	$buff.="<li><a href=\"".$this->encodeURL('/lmodules/circuitos/cir_groups_n_maint.php?OP=N')."\">Nueva Asignacion de Grupos</a>";
                	$buff.='</li>';
                }
            	$buff.='</ul>';
            	$buff.='</li>';
            }
        	$buff.='</ul>';
        }
        if($this->haveRight($primary_db,'monitoreos.menu')) { 
        	$buff.="<li>monitoreos";
        	$buff.='<ul>';
            if($this->haveRight($primary_db,'monitoreos.iniciar_circuito')) { 
            	$buff.="<li><a href=\"".$this->encodeURL('/lmodules/monitoreos/mon_iniciar_circuito_maint.php?OP=N')."\">Iniciar Circuito de Monitoreo</a>";
            	$buff.='</li>';
            }
            if($this->haveRight($primary_db,'monitoreos.supervisar')) { 
            	$buff.="<li><a href=\"".$this->encodeURL('/lmodules/monitoreos/monitoreos_superv.php?OP=L')."\">Monitorear</a>";
            	$buff.='</li>';
            }
        	$buff.='</ul>';
        }
        if($this->haveRight($primary_db,'reportes.menu')) { 
        	$buff.="<li>reportes";
        	$buff.='<ul>';
            if($this->haveRight($primary_db,'circuitos.cir_oper')) { 
            	$buff.="<li><a href=\"".$this->encodeURL('/lmodules/reportes/des_circuito.php?OP=L')."\">Estado Circuitos</a>";
            	$buff.='</li>';
            }
            if($this->haveRight($primary_db,'monitoreos.menu')) { 
            	$buff.="<li><a href=\"".$this->encodeURL('/lmodules/monitoreos/monitoreos.php?OP=L')."\">Listado de Monitoreos</a>";
            	$buff.='</li>';
            }
            if($this->haveRight($primary_db,'monitoreos.operador')) { 
            	$buff.="<li><a href=\"".$this->encodeURL('/lmodules/monitoreos/monitoreos_operador.php?OP=L')."\">Mis Monitoreos Operador</a>";
            	$buff.='</li>';
            }
            if($this->haveRight($primary_db,'circuitos.cir_oper')) { 
            	$buff.="<li>Desempeño";
            	$buff.='<ul>';
            	$buff.="<li><a href=\"".$this->encodeURL('/lmodules/reportes/des_circuito_superv.php?OP=L')."\">Desempeño por Supervisor</a>";
            	$buff.='</li>';
            	$buff.="<li><a href=\"".$this->encodeURL('/lmodules/circuitos/cir_oper.php?OP=L')."\">Desempeño por Operadores</a>";
            	$buff.='</li>';
            	$buff.='</ul>';
            	$buff.='</li>';
            }
        	$buff.='</ul>';
        }
        if($this->haveRight($primary_db,'capacitacion.menu')) { 
        	$buff.="<li>capacitacion";
        	$buff.='<ul>';
            if($this->haveRight($primary_db,'capacitacion.supervisor')) { 
            	$buff.="<li><a href=\"".$this->encodeURL('/lmodules/capacitacion/capacitacion_superv.php?OP=L')."\">Capacitaciones</a>";
            	$buff.='</li>';
            }
            if($this->haveRight($primary_db,'capacitacion.supervisor.pend')) { 
            	$buff.="<li><a href=\"".$this->encodeURL('/lmodules/capacitacion/capacitacion_superv_pend.php?OP=L')."\">Capacitaciones Pendientes</a>";
            	$buff.='</li>';
            }
            if($this->haveRight($primary_db,'capacitacion.supervisor.pend')) { 
            	$buff.="<li><a href=\"".$this->encodeURL('/lmodules/capacitacion/capacitacion_n_maint.php?OP=N')."\">Nueva Capacitación</a>";
            	$buff.='</li>';
            }
            if($this->haveRight($primary_db,'capacitacion.operador')) { 
            	$buff.="<li><a href=\"".$this->encodeURL('/lmodules/capacitacion/capacitacion_oper.php?OP=L')."\">Mis Capacitaciones</a>";
            	$buff.='</li>';
            }
            if($this->haveRight($primary_db,'capacitacion.operador.pendOK')) { 
            	$buff.="<li><a href=\"".$this->encodeURL('/lmodules/capacitacion/capacitacion_oper_pend.php?OP=L')."\">Mis Capacitaciones Pendientes</a>";
            	$buff.='</li>';
            }
        	$buff.='</ul>';
        }
        if($this->haveRight($primary_db,'menu.archivo.administracion')) { 
        	$buff.="<li>Administración";
        	$buff.='<ul>';
            if($this->haveRight($primary_db,'menu.archivo.administracion.home')) { 
            	$buff.="<li>Home page";
            	$buff.='<ul>';
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/home/contextos.php?OP=X')."\">Listar contextos</a>";
            	$buff.='</li>';
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/home/contexto_maint.php?OP=N')."\">Nuevo contexto</a>";
            	$buff.='</li>';
            	$buff.='</ul>';
            	$buff.='</li>';
            }
            if($this->haveRight($primary_db,'menu.usuarios')) { 
            	$buff.="<li>Usuarios";
            	$buff.='<ul>';
                if($this->haveRight($primary_db,'menu.usuarios.usuarios')) { 
                	$buff.="<li><a href=\"".$this->encodeURL('/modules/security/users.php?OP=X')."\">Listar usuarios</a>";
                	$buff.='</li>';
                }
                if($this->haveRight($primary_db,'menu.usuarios.usuarios')) { 
                	$buff.="<li><a href=\"".$this->encodeURL('/modules/security/users_maint.php?OP=N')."\">Nuevo usuario</a>";
                	$buff.='</li>';
                }
                if($this->haveRight($primary_db,'menu.usuarios.grupousuarios')) { 
                	$buff.="<li><a href=\"".$this->encodeURL('/modules/security/usergroup.php?OP=X')."\">Listar grupos de roles</a>";
                	$buff.='</li>';
                }
                if($this->haveRight($primary_db,'menu.usuarios.grupousuarios')) { 
                	$buff.="<li><a href=\"".$this->encodeURL('/modules/security/usergroup_maint.php?OP=N')."\">Nuevo rol</a>";
                	$buff.='</li>';
                }
                if($this->haveRight($primary_db,'menu.usuarios.derechos')) { 
                	$buff.="<li><a href=\"".$this->encodeURL('/modules/security/rights.php?OP=X')."\">Listar permisos</a>";
                	$buff.='</li>';
                }
                if($this->haveRight($primary_db,'menu.usuarios.derechos')) { 
                	$buff.="<li><a href=\"".$this->encodeURL('/modules/security/rights_maint.php?OP=N')."\">Nuevo permiso</a>";
                	$buff.='</li>';
                }
                if($this->haveRight($primary_db,'menu.usuarios.grupoderechos')) { 
                	$buff.="<li><a href=\"".$this->encodeURL('/modules/security/rightgroup.php?OP=X')."\">Listar grupos de permisos</a>";
                	$buff.='</li>';
                }
                if($this->haveRight($primary_db,'menu.usuarios.grupoderechos')) { 
                	$buff.="<li><a href=\"".$this->encodeURL('/modules/security/rightgroup_maint.php?OP=N')."\">Nuevo grupo de permisos</a>";
                	$buff.='</li>';
                }
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/security/resetpass.php?OP=X')."\">Pedidos de recupero de clave</a>";
            	$buff.='</li>';
            	$buff.='</ul>';
            	$buff.='</li>';
            }
            if($this->haveRight($primary_db,'menu.archivo.parametros')) { 
            	$buff.="<li>Parámetros";
            	$buff.='<ul>';
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/security/parameters.php?OP=X')."\">Listar parámetros</a>";
            	$buff.='</li>';
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/security/parameters_maint.php?OP=N')."\">Nuevo parámetro</a>";
            	$buff.='</li>';
            	$buff.='</ul>';
            	$buff.='</li>';
            }
            if($this->haveRight($primary_db,'menu.archivo.configuracion')) { 
            	$buff.="<li>Listas de valores";
            	$buff.='<ul>';
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/setup/val_list.php?OP=X')."\">listar listas de valores</a>";
            	$buff.='</li>';
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/setup/val_list_maint.php?OP=N')."\">Nueva lista</a>";
            	$buff.='</li>';
            	$buff.='</ul>';
            	$buff.='</li>';
            }
            if($this->haveRight($primary_db,'menu.archivo.configuracion')) { 
            	$buff.="<li>Configuración";
            	$buff.='<ul>';
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/setup/make_modules.php?OP=M')."\">Instalacion de modulos</a>";
            	$buff.='</li>';
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/setup/make_menu.php?OP=M')."\">Regeneracion del menu</a>";
            	$buff.='</li>';
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/setup/update_plataforma.php?OP=M')."\">Actualizacion de plataforma</a>";
            	$buff.='</li>';
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/setup/update_sitio.php?OP=M')."\">Actualizacion del sitio</a>";
            	$buff.='</li>';
            	$buff.='</ul>';
            	$buff.='</li>';
            }
            if($this->haveRight($primary_db,'menu.trans')) { 
            	$buff.="<li>Transacciones";
            	$buff.='<ul>';
                if($this->haveRight($primary_db,'menu.trans.bugtrack')) { 
                	$buff.="<li>BugTrack";
                	$buff.='<ul>';
                    if($this->haveRight($primary_db,'menu.trans.bugtrack')) { 
                    	$buff.="<li><a href=\"".$this->encodeURL('/modules/transactions/bugtrack.php?OP=')."\">Listar Bugs</a>";
                    	$buff.='</li>';
                    }
                    if($this->haveRight($primary_db,'menu.trans.bugtrack.new')) { 
                    	$buff.="<li><a href=\"".$this->encodeURL('/modules/transactions/bugtrack_maint.php?OP=N')."\">Nueva incidencencia</a>";
                    	$buff.='</li>';
                    }
                	$buff.='</ul>';
                	$buff.='</li>';
                }
                if($this->haveRight($primary_db,'menu.trans.faq')) { 
                	$buff.="<li>FAQ";
                	$buff.='<ul>';
                    if($this->haveRight($primary_db,'menu.trans.faq')) { 
                    	$buff.="<li><a href=\"".$this->encodeURL('/modules/transactions/faq.php?OP=')."\">FAQ</a>";
                    	$buff.='</li>';
                    }
                    if($this->haveRight($primary_db,'menu.trans.faq.new')) { 
                    	$buff.="<li><a href=\"".$this->encodeURL('/modules/transactions/faq_maint.php?OP=N')."\">Nueva pregunta FAQ</a>";
                    	$buff.='</li>';
                    }
                	$buff.='</ul>';
                	$buff.='</li>';
                }
                if($this->haveRight($primary_db,'menu.trans.projects')) { 
                	$buff.="<li>Proyectos";
                	$buff.='<ul>';
                    if($this->haveRight($primary_db,'menu.trans.projects')) { 
                    	$buff.="<li><a href=\"".$this->encodeURL('/modules/transactions/proyectos.php?OP=')."\">Listar proyectos</a>";
                    	$buff.='</li>';
                    }
                    if($this->haveRight($primary_db,'menu.trans.projects.new')) { 
                    	$buff.="<li><a href=\"".$this->encodeURL('/modules/transactions/proyectos_maint.php?OP=N')."\">Nuevo proyecto</a>";
                    	$buff.='</li>';
                    }
                	$buff.='</ul>';
                	$buff.='</li>';
                }
                if($this->haveRight($primary_db,'menu.trans.reportes')) { 
                	$buff.="<li><a href=\"".$this->encodeURL('/modules/transactions/reports.php?OP=')."\">Reportes usuarios</a>";
                	$buff.='</li>';
                }
                if($this->haveRight($primary_db,'menu.trans.faq_topic')) { 
                	$buff.="<li>Temas FAQ";
                	$buff.='<ul>';
                    if($this->haveRight($primary_db,'menu.trans.faq_topic')) { 
                    	$buff.="<li><a href=\"".$this->encodeURL('/modules/transactions/faq_topic.php?OP=')."\">Listar Temas FAQ</a>";
                    	$buff.='</li>';
                    }
                    if($this->haveRight($primary_db,'menu.trans.faq_topic.new')) { 
                    	$buff.="<li><a href=\"".$this->encodeURL('/modules/transactions/faq_topic_maint.php?OP=N')."\">Nuevo tema FAQ</a>";
                    	$buff.='</li>';
                    }
                	$buff.='</ul>';
                	$buff.='</li>';
                }
                if($this->haveRight($primary_db,'menu.trans.eventos')) { 
                	$buff.="<li><a href=\"".$this->encodeURL('/modules/transactions/mensajes.php?OP=')."\">ver avisos</a>";
                	$buff.='</li>';
                }
                if($this->haveRight($primary_db,'menu.trans.eventos')) { 
                	$buff.="<li><a href=\"".$this->encodeURL('/modules/transactions/events.php?OP=')."\">ver eventos</a>";
                	$buff.='</li>';
                }
                if($this->haveRight($primary_db,'menu.trans.consulta')) { 
                	$buff.="<li><a href=\"".$this->encodeURL('/modules/transactions/trans.php?OP=')."\">ver transacciones</a>";
                	$buff.='</li>';
                }
            	$buff.='</ul>';
            	$buff.='</li>';
            }
            if($this->haveRight($primary_db,'menu.docs.admin')) { 
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/docmgr2/docs.php?OP=')."\">Administrar documentos</a>";
            	$buff.='</li>';
            }
            if($this->haveRight($primary_db,'menu.archivo.configuracion.georef')) { 
            	$buff.="<li>GeoReferencias";
            	$buff.='<ul>';
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/georef/layers.php?OP=')."\">Listar capas</a>";
            	$buff.='</li>';
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/georef/zones.php?OP=')."\">Listar zonas</a>";
            	$buff.='</li>';
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/georef/layers_maint.php?OP=N')."\">Nueva capa</a>";
            	$buff.='</li>';
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/georef/layers_maint_kml.php?OP=N')."\">Nueva capa desde KML</a>";
            	$buff.='</li>';
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/georef/zone_maint.php?OP=N')."\">Nueva zona</a>";
            	$buff.='</li>';
            	$buff.='</ul>';
            	$buff.='</li>';
            }
            if($this->haveRight($primary_db,'menu.archivo.messaging')) { 
            	$buff.="<li>Mensajeria";
            	$buff.='<ul>';
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/messaging/entrantes.php?OP=')."\">Mensajes entrantes</a>";
            	$buff.='</li>';
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/messaging/messages.php?OP=')."\">Mensajes salientes</a>";
            	$buff.='</li>';
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/messaging/server_maint_n.php?OP=N')."\">Nuevo Servidor</a>";
            	$buff.='</li>';
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/messaging/servers.php?OP=N')."\">Servidores</a>";
            	$buff.='</li>';
            	$buff.='</ul>';
            	$buff.='</li>';
            }
            if($this->haveRight($primary_db,'menu.archivo.rss')) { 
            	$buff.="<li>RSS";
            	$buff.='<ul>';
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/rss/articles.php?OP=')."\">Articulos</a>";
            	$buff.='</li>';
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/rss/links.php?OP=')."\">Fuentes</a>";
            	$buff.='</li>';
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/rss/links_maint.php?OP=N')."\">Nueva fuente</a>";
            	$buff.='</li>';
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/rss/articles_maint.php?OP=N')."\">Nuevo articulo</a>";
            	$buff.='</li>';
            	$buff.='</ul>';
            	$buff.='</li>';
            }
            if($this->haveRight($primary_db,'menu.archivo.administracion.eventbus')) { 
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/eventbus/events.php?OP=X')."\">Ver actividad en EventBus</a>";
            	$buff.='</li>';
            }
            if($this->haveRight($primary_db,'menu.archivo.administracion.eventos')) { 
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/events/events.php?OP=X')."\">Ver eventos</a>";
            	$buff.='</li>';
            }
            if($this->haveRight($primary_db,'menu.archivo.administracion.eventos')) { 
            	$buff.="<li><a href=\"".$this->encodeURL('/modules/events/handlers.php?OP=X')."\">Ver manejadores de eventos</a>";
            	$buff.='</li>';
            }
        	$buff.='</ul>';
        }
	$buff.="</li></ul>";

?>
