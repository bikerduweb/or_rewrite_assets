Description:

A Wordpress plugin to use a specific url for assets (images, scripts) other than the blog url


Install:

* unpack in wordpress plugins directory
* activate the plugin
* in Options / Rewrite Assets, define the dynamic html rewrite rules

Remarks:

* It's best to define original url with http://, and the plugin will also rewrite local url (without http)
* Be carefull about ending slashes (use the same rul on original and rewrite url) 

Example:

original url: http://veilleperso.com/wp-content/uploads
rewrite url: http://images.veilleperso.com
