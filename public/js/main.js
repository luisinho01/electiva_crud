import { renderUsers } from "./helpers/renderizarUsers.js";
import { editarUsuario } from "./services/editarUser.js";
import { eliminarUsuario } from "./services/eliminarUser.js";
import { registrarUsuario } from "./services/registrarUser.js";

$(document).ready(function () {
  $("#registrar").click(function (e) {
    registrarUsuario();

    renderUsers();
    closeRegisterModal();
    showToast("Usuario registrado con éxito", "success");
  });

  renderUsers();
});

//closeRegisterModal(); // Cierra el modal y limpia el formulario
//closeEditModal(); // Cierra el modal y limpia el formulario

//showToast("Usuario registrado con éxito", "success");
// showToast("Usuario actualizado correctamente", "success");
// showToast("Usuario eliminado correctamente", "error");
