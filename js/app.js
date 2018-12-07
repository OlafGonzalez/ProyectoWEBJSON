
function mensajes(tipo, msj) {
    var alerta = document.createElement("div");
    alerta.classList.add("alert");
    alerta.classList.add("alert-dismissable");

    // de acuerdo al tipo de alerta que eligan
    // se asigna la clase
    switch (tipo) {
        case "danger":
            alerta.classList.add("alert-danger")
            break;
        case "success":
            alerta.classList.add("alert-success")
            break;
        case "info":
            alerta.classList.add("alert-info")
            break;
        case "warning":
            alerta.classList.add("alert-warning")
            break;
    }

    //Creamos el boton de cerrar de la alerta
    var cerrar = document.createElement("a");
    cerrar.classList.add("close")
    cerrar.setAttribute("href", "#");
    cerrar.setAttribute("data-dismiss", "alert");
    cerrar.setAttribute("aria-label", "close");
    cerrar.textContent = "x";
    //Agrupamos todos los elementos
    alerta.textContent = msj;
    alerta.append(cerrar);
    // Agregamos la alerta al HTML
    var posicion = document.getElementById("mensajes");
    posicion.append(alerta);

}

function agregarUsuario() {

    var nombre = document.getElementById("input_nombre");
    var apellido1 = document.getElementById("input_apellido1");
    var apellido2 = document.getElementById("input_apellido2");
    var fechaNacimiento = document.getElementById("input_fechaNacimiento");
    var sexo = "femenino";
    var radio = document.getElementById("rmas");
    if (radio.checked) {
        sexo = "masculino";
    }
    //creamos un link de peticion para un tipo GET
    var peticionGET = encodeURI("usuarioAgregar.php?" +
        "&nombre=" + nombre.value +
        "&apellido1=" + apellido1.value +
        "&apellido2=" + apellido2.value +
        "&fechaNacimiento=" + fechaNacimiento.value +
        "&sexo=" + sexo);

    var httpAjax = new XMLHttpRequest();
    httpAjax.onreadystatechange = function () {
        //verificar si a terminado de hacer la
        //petición y si recivio una respuesta exitosa
        if (this.readyState == 4 && this.status == 200) {
            console.log("Finalizó la transacción");
            console.log(this.responseText);
            mensajes("success", "Se agrego nuevo usuario con AJAX");
        }
    };
    console.log(peticionGET);
    httpAjax.open("GET", peticionGET, true);
    httpAjax.send();
}
//get
function cargarUsuariosJson() {
    $.get("ServerRequest/usersJson.php", function (data) {
        var jsonResponse = JSON.parse(data);
        var Usuarios = jsonResponse;
        var htmlencode = '';
        for (let i = 0; i < Usuarios.length; i++) {
            htmlencode = htmlencode +
                "\n<tr>\n<td>" + Usuarios[i].id +
                "</td>\n<td>" + Usuarios[i].nombre +
                "</td>\n<td>" + Usuarios[i].apellido1 +
                "</td>\n<td>" + Usuarios[i].apellido2 +
                "</td>\n<td>" + Usuarios[i].fechaNacimiento +
                "</td>\n<td>" + Usuarios[i].sexo + "</td>\n<td>" +
                "<button onclick='borrarById(this)' class='btn btn-danger' value='" +
                Usuarios[i].id + "'>Borrar</button></td>\n<td>" +
                "<button class='btn btn-warning' data-toggle='modal' onclick='modificarById(this)' data-target='#myModal' value='" + Usuarios[i].id +
                "'>Modificar</button>" + "</td>\n<td>";
        }
        console.log(htmlencode)
        $("#datosTabla").html(htmlencode)
    }).fail(function (error) {
        alert("error" + error);
    });


}
//post
function registrarUsuario(params) {
    var formData = JSON.parse(JSON.stringify($("#addFrm").serializeArray()));
    var jsonfinal = '{'
    for (let i = 0; i < formData.length; i++) {
        jsonfinal = jsonfinal + '"' + formData[i].name + '"' + ":" + '"' + formData[i].value + '"' + ",";
    }
    jsonfinal = jsonfinal.substr(0, jsonfinal.length - 1);
    jsonfinal = jsonfinal + "}";
    var usuario = JSON.parse(JSON.stringify(jsonfinal));
    console.log(usuario)
    var request = $.ajax({
        type: "POST",
        url: "ServerRequest/regUsuario.php",
        data: { data: usuario },
        success: function (params) {
            mensajes("success", params);
            cargarUsuariosJson();
        }
    });
    request.fail(function (jqXHR, textStatus) {
        alert("Request failed: " + textStatus);
    });
}
//delete
function borrarById(btn) {
    $.ajax({
        method: "DELETE",
        url: "ServerRequest/delete.php",
        data: { id: btn.value }
    })
        .done(function (msg) {
            mensajes("info", "Eliminado correctamente")
            cargarUsuariosJson();
        }).fail(function () {
            alert("error" + msg);
        });
}
function modificarById(btn) {
    $("#iduser").val(btn.value);

}

//put
function modificarUsuario() {
    var datos = JSON.parse(JSON.stringify($("#formActualizar").serializeArray()));
    var jsonfinal = '{'
    for (let i = 0; i < datos.length; i++) {
        jsonfinal = jsonfinal + '"' + datos[i].name + '"' + ":" + '"' + datos[i].value + '"' + ",";
    }
    jsonfinal = jsonfinal.substr(0, jsonfinal.length - 1);
    jsonfinal = jsonfinal + "}";
    var usuario = JSON.parse(JSON.stringify(jsonfinal));
    console.log(usuario)
    var request = $.ajax({
        type: "PUT",
        url: "ServerRequest/modUsuario.php",
        data: { data: usuario },
        success: function (params) {
            mensajes("success", params);
            cargarUsuariosJson();
        }
    });
    request.fail(function (jqXHR, textStatus) {
        alert("Request failed: " + textStatus);
    });
}