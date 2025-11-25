# TAREA 1 - EJERCICIO 2
## Investigación de todos los procesos con referencias a los puertos 67 y 68 y cómo interactúan en entorno linux (virtualizado o no).

### Procesos

En entorno Linux, los procesos que utilizan estos puertos y su interacción, según por puerto, son:

**1. Puerto 67 / Servidor DHCP**

- **Proceso**: El proceso principal es el *servidor DHCP* (P.e.: dhcpd o implementaciones como isc-dhcp-server, dnsmasq o kea-dhcp)

- **Función**: El *servidor DHCP* escucha las solicitudes de configuracion de red de los clientes. Recibe los mensajes DHCP Discover y DHCP Request de los clientes en este puerto.

**2. Puerto 68 / Cliente DHCP**

- **Proceso**: El proceso principal es el *cliente DHCP* (por ejemplo, dhclient, dhcpcd, o integrado en servicios como NetworkManager o systemd-networkd)

- **Función**: El *cliente DHCP* utiliza este puerto para enviar sus solicitudes iniciales (DHCP Discover, DHCP Request) y recibir las respuestas del servidor (DHCP Offer, DHCP ACK).

### Interaciones entre el Cliente y el Servidor

En la interacción entre cliente y servidor, el cliente usa el puerto 68 para enviar una solicitud (como una petición de una dirección IP) y el servidor usa el puerto 67 para escuchar y responder a esas solicitudes.

Algunos ejemplos de interacción de *Cliente a Servidor* podrían ser:
- El cliente busca un servidor DHCP displnible.
- El cliente solicita formalmente usar la IP ofrecida.

Algunos ejemplos de interaccion de *Servidor a Cliente* podrían ser:
- El servidor ofrce una configuración IP al cliente.
- El servidor confirma la asignación, y el cliente configura su interfaz de red.



### Bibliografía

1- Espinosa, O. (2025, 13 de julio). Qué son los puertos TCP y UDP y para qué sirven cada uno de ellos. RedesZone. https://www.redeszone.net/tutoriales/configuracion-puertos/puertos-tcp-udp/


2- Achirou. (s. f.). Guía rápida de puertos y protocolos. Recuperado de https://achirou.com/guia-rapida-de-puertos-y-protocolos/

3- Uceltec. (s. f.). 8.3.5 Lab ‒ uso de un escáner de puertos para detectar puertos abiertos. Ucel – Uceltec. Recuperado de https://uceltec.ucel.edu.ar/mod/page/view.php?id=824
