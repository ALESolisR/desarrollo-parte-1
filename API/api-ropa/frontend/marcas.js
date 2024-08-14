$(document).ready(function(){
    obtenerMarcas();
})


let marcas = {};

let listamarcas = document.getElementById('listamarcas');

// Función para obtener todos los usuarios
function obtenerMarcas() {
    
    $.ajax({
        url: "http://localhost/api-ropa/public/index.php/marcas",
        type: "GET",
        //dataType: json,
        success: function(usuarios) {
            // Hacer algo con los usuarios obtenidos
            //console.log("Marcas obtenidos: ", usuarios);
            marcas = usuarios;
            console.log(marcas);
            
            listamarcas.innerHTML = marcas;
        
            
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error al obtener Marcas:', textStatus, errorThrown);
        }
    });
}

// Función para obtener un usuario por su ID
function obtenerMarcaPorId(id) {
    $.ajax({
        url: '/api/usuarios/' + id,
        type: 'GET',
        dataType: 'json',
        success: function(usuario) {
            // Hacer algo con el usuario obtenido
            console.log('Usuario obtenido:', usuario);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error al obtener usuario:', textStatus, errorThrown);
        }
    });
}

// Función para crear un nuevo usuario
function crearMarca(usuarioData) {
    $.ajax({
        url: '/api/usuarios',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(usuarioData),
        success: function(response) {
            console.log('Usuario creado:', response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error al crear usuario:', textStatus, errorThrown);
        }
    });
}

// Función para actualizar un usuario existente por su ID
function actualizarMarca(id, usuarioData) {
    $.ajax({
        url: '/api/usuarios/' + id,
        type: 'PUT',
        contentType: 'application/json',
        data: JSON.stringify(usuarioData),
        success: function(response) {
            console.log('Usuario actualizado:', response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error al actualizar usuario:', textStatus, errorThrown);
        }
    });
}

// Función para eliminar un usuario por su ID
function eliminarMarca(id) {
    $.ajax({
        url: '/api/usuarios/' + id,
        type: 'DELETE',
        success: function(response) {
            console.log('Usuario eliminado:', response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error al eliminar usuario:', textStatus, errorThrown);
        }
    });
}
