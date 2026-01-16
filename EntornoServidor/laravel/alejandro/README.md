# Lección 10 – Editar y eliminar publicaciones (CRUD)

En esta lección se completa el **CRUD** de la aplicación añadiendo la posibilidad de **editar y eliminar publicaciones** ya existentes.

Hasta ahora la aplicación permitía:
- Crear publicaciones
- Mostrar un feed con ellas

En esta parte se añaden:
- Edición de publicaciones
- Eliminación de publicaciones

---

## Objetivo de la lección

Implementar las operaciones **Update** y **Delete** siguiendo:
- Arquitectura MVC
- Rutas RESTful
- Buenas prácticas de Laravel

---

## 1️⃣ Añadir botones en la vista de cada publicación

Cada publicación del feed se muestra mediante una **vista o componente individual**.

En esa vista es donde deben añadirse:

- Un botón para **editar**
- Un botón para **eliminar**

### Qué hace cada botón

- **Editar**  
  Lleva a una nueva página donde se puede modificar la publicación.

- **Eliminar**  
  Envía una petición para borrar esa publicación concreta de la base de datos.

### Conceptos importantes

- Los botones trabajan sobre **una sola publicación**
- Para identificarla se usa su **ID**
- El botón de eliminar debe pedir confirmación al usuario

---

## 2️⃣ Definir las rutas necesarias

Para poder editar y eliminar, se añaden nuevas rutas a la aplicación.

Estas rutas siguen el patrón **RESTful** y trabajan con un único recurso.

Se necesitan rutas para:

- Mostrar el formulario de edición
- Actualizar la publicación
- Eliminar la publicación

### Conceptos clave

- Se usa un parámetro en la ruta para identificar la publicación
- Laravel utiliza **Route Model Binding** para convertir ese parámetro en un modelo automáticamente
- No es necesario buscar manualmente en la base de datos

---

## 3️⃣ Crear la vista de edición

Se crea una nueva vista destinada únicamente a **editar una publicación**.

### Qué contiene esta vista

- Un formulario con los datos actuales de la publicación
- Un botón para cancelar y volver al feed
- Un botón para guardar los cambios

### Detalles importantes

- El formulario no crea una nueva publicación, **actualiza una existente**
- Los campos aparecen rellenados con la información actual
- Se utiliza el método HTTP correcto para actualizar

---

## 4️⃣ Métodos del controlador

En el controlador del recurso se añaden tres métodos nuevos.

### Método de edición

- Recibe una publicación concreta
- Devuelve la vista de edición
- Pasa la publicación a la vista

### Método de actualización

- Valida los datos enviados
- Actualiza la publicación en la base de datos
- Redirige al feed principal

### Método de eliminación

- Elimina la publicación
- Redirige al feed principal

---

## 5️⃣ Indicador de publicación editada

De forma opcional se puede mostrar visualmente si una publicación ha sido editada.

### Cómo funciona

- Laravel guarda automáticamente la fecha de creación y actualización
- Si la fecha de actualización es posterior a la de creación, se muestra un aviso
- No requiere cambios en la base de datos

---

## Resultado final

Tras completar esta lección, la aplicación permite:

- Crear publicaciones
- Verlas en un feed
- Editarlas individualmente
- Eliminarlas con confirmación

Se completa así el **CRUD completo** del recurso.

---
