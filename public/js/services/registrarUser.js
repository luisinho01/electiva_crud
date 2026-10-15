export function registrarUsuario() {
  let nombre = $("#regName").val();
  let correo = $("#regEmail").val();
  let seccion = $("#regSection").val();
  let telefono = $("#regPhone").val();

  $.ajax({
    type: "POST",
    dataType: "",
    data: {
      accion: "registrar",
      nombre: nombre,
      correo: correo,
      seccion: seccion,
      telefono: telefono,
    },
    success: function (res) {
      console.log(res);
    },
    error: function (error) {
      console.log(error);
    },
  });
}
