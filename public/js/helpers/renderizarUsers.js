export function renderUsers() {
  const tbody = document.getElementById("usersTableBody");
  const emptyState = document.getElementById("emptyState");

  $.ajax({
    type: "POST",
    dataType: "json",
    data: {
      accion: "consultar",
    },
    success: function (usersList) {
      // Limpiamos la tabla antes de renderizar
      tbody.innerHTML = "";

      // Si no hay usuarios, mostramos el estado vacío
      if (!usersList || usersList.length === 0) {
        emptyState.style.display = "block";
        return;
      }

      // Ocultamos el estado vacío si hay registros
      emptyState.style.display = "none";

      // Recorremos cada usuario y construimos su fila
      usersList.forEach((user) => {
        const tr = document.createElement("tr");

        tr.innerHTML = `
            <td>${user.nombre}</td>
            <td>${user.correo}</td>
            <td>${user.seccion}</td>
            <td>${user.telefono}</td>
            <td style="text-align: right;">
                <div class="table-actions">
                    <!-- Botón Editar -->
                    <button class="icon-btn" onclick="openEditModal(${user.id})" title="Editar">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                        </svg>
                    </button>
                    <!-- Botón Eliminar -->
                    <button class="icon-btn danger" onclick="openDeleteModal(${user.id})" title="Eliminar">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                        </svg>
                    </button>
                </div>
            </td>
        `;

        tbody.appendChild(tr);
      });
    },
    error: function (error) {
      console.log(error);
    },
  });
}
