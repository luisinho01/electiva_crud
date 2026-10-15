/**
 * Control de Modales y UI para el Panel de Administración de Usuarios
 */

// 1. Modal de Registro (Nuevo Usuario)
function openRegisterModal() {
  const modal = document.getElementById("registerModal");
  if (modal) {
    modal.classList.add("active");
  }
}

function closeRegisterModal() {
  const modal = document.getElementById("registerModal");
  if (modal) {
    modal.classList.remove("active");
  }
  const form = document.getElementById("registerForm");
  if (form) form.reset();
}

// 2. Modal de Edición
function openEditModal(id = null) {
  const modal = document.getElementById("editModal");
  if (modal) {
    modal.classList.add("active");
    if (id) {
      document.getElementById("editId").value = id;
    }
  }
}

function closeEditModal() {
  const modal = document.getElementById("editModal");
  if (modal) {
    modal.classList.remove("active");
  }
  const form = document.getElementById("editForm");
  if (form) form.reset();
}

// 3. Modal de Eliminación
function openDeleteModal(id = null) {
  const modal = document.getElementById("deleteModal");
  if (modal) {
    modal.classList.add("active");
    if (id) {
      document.getElementById("deleteId").value = id;
    }
  }
}

function closeDeleteModal() {
  const modal = document.getElementById("deleteModal");
  if (modal) {
    modal.classList.remove("active");
  }
}

// 4. Función de Toast adaptada a tu CSS (.toast-success / .toast-error)
function showToast(message, type = "success") {
  const toast = document.getElementById("toast");
  if (!toast) return;

  toast.textContent = message;
  // Usamos tus clases de CSS: toast-success o toast-error
  toast.className = type === "success" ? "toast-success" : "toast-error";
  toast.style.display = "block";

  // Ocultar automáticamente el toast después de 3 segundos
  setTimeout(() => {
    toast.style.display = "none";
    toast.className = "";
  }, 3000);
}

// 5. Placeholders listos para cuando conectes tu fetch / AJAX de forma manual
function handleRegister(event) {
  event.preventDefault();
  console.log("Formulario de registro listo para enviar de forma manual.");
  // showToast("Usuario registrado con éxito", "success");
  // closeRegisterModal();
}

function handleEdit(event) {
  event.preventDefault();
  console.log("Formulario de edición listo para enviar de forma manual.");
  // showToast("Usuario actualizado correctamente", "success");
  // closeEditModal();
}

function confirmDelete() {
  const id = document.getElementById("deleteId").value;
  console.log("Eliminando usuario con ID:", id);
  // closeDeleteModal();
  // showToast("Usuario eliminado correctamente", "error");
}
