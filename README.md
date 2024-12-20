# TP-3

# 1 Obtener destinos:
Endpoint: GET /destinos

Descripción:
Obtiene una lista de todos los destinos registrados en la base de datos.

Uso:
- Este endpoint no requiere parámetros.
- Para obtener un listado completo de los destinos disponibles.

# 2 Obtener un destino específico:

Endpoint: GET /destinos/:id

Descripción:
Obtiene los detalles de un destino específico basado en su ID.

Uso:

- Se debe proporcionar un ID válido como parte de la URL.
- Parámetros: :id (requerido): El identificador único del destino.

# 3  Eliminar un destino especifico:
Endpoint: DELETE /destinos/:id

Descripción:
Elimina un destino específico de la base de datos.

Uso:

- Se debe proporcionar un ID válido como parte de la URL.
- Este endpoint se usa para borrar permanentemente un destino.
- Parámetros: :id (requerido): El identificador único del destino que se desea eliminar.

# 4 Crear un nuevo destino:

Endpoint: POST /destinos

Descripción:
Crea un nuevo destino en la base de datos. Se debe enviar la información necesaria en el cuerpo de la solicitud.

Uso:

- Se debe proporcionar un objeto JSON con los detalles del destino.
- Ejemplo de solicitud: POST /destinos

# 5 Actualizar un destino:
Endpoint: PUT /destinos/:id

Descripción:
Actualiza los detalles de un destino existente.

Uso:
- Se debe proporcionar un ID válido como parte de la URL.
- Los datos actualizados deben enviarse en el cuerpo de la solicitud como un objeto JSON.
- Ejemplo de solicitud: PUT /destinos/1