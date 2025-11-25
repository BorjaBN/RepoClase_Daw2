# EJERCICIO 1

Partiendo de la práctica de docker CLI se ha modificado el vagrantfile con los parámetros especificados en el enunciado de la tarea.

Se ha cambiado con exito los parámetros pedidos, de tal manera que podemos acceder a phmyadmin con la ip que tenemos asignada a la maquina, como se muestra en la siguiente imagen:

![Captura de haber entrado con nombre de Juan](/img/img1.jpg)

Para poder levantar todo y acceder como he hecho yo, lo único que se debe de hacer es abrir la carpeta ejercicio1 con la consola, una vez estemos en este punto, lo unico que debemos de hacer es **vagrant up**, se nos ejecutará todo y nos levantará los contenedores. 

Para poder comprobar que todo esta listo, haremos uso de **docker ps** donde nos mostrará el estado de los 3 contenedores.

A continuación haremos uso del comando **ip -a** para poder observar la ip desde la que accederemos en el navegador; en mi caso se trata de la "*192.168.60.82*", a esto le añadiremos el puerto desde el que queremos accceder, que es "*3000*", por lo que nos debe de quedar algo tal que así "*http://192.168.60.82:3000*", que colocaremos en el buscador. Como usuario tendremos de nombre juan y de contraseña despliegue.

 Listo, ya hemos accedido a la pagina de phpmyadmin. 

 Para salir de la maquina de vagrant haremos uso de **exit** y un **vagrant hallt**, así apagaremos la máquina y los contenedores quedarán guardados, el vagrantfile está diseñado para que cada vez que hagamos **vagrant up** se revisen si existen contenedores ya creados, en caso de que si, serán eliminado y creados de nuevo para que no haya interferencias.