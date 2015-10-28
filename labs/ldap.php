<?php

// variables de autenticacion y LDAP
    $ldap['user']              = 'read-only-admin';
    $ldap['pass']              = 'password';
    $ldap['host']              = 'ldap.forumsys.com'; // nombre del host o servidor
    $ldap['port']              = 389; // puerto del LDAP en el servidor
    $ldap['dn']                = 'cn=read-only-admin,dc=example,dc=com'; // modificar respecto a los valores del LDAP
    $ldap['base']              = ' ';
 
     
    // conexion a ldap
     $ldap['conn'] = ldap_connect( $ldap['host'], $ldap['port'] );
     ldap_set_option($ldap['conn'], LDAP_OPT_PROTOCOL_VERSION, 3);
 
    // match de usuario y password
     $ldap['bind'] = ldap_bind( $ldap['conn'], $ldap['dn'], $ldap['pass'] );
     
     
    if ($ldap['bind']){
         
         
    echo "BINDDDDD";
             
        }
    else{
           echo "NEGATIVO";
    } 
    
   ?>