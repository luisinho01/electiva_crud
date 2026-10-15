<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios - Panel de Administración</title>
    <link rel="stylesheet" href="./public/css/users.css"/>
</head>
<body>

    <!-- Header -->
    <header>
        <div class="header-title">
            <div class="header-icon">
                <!-- Inline SVG Shield/Users icon -->
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
            </div>
            <span>Panel de Administración</span>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <div class="action-bar">
            <div class="page-heading">
                <h2>Gestión de Usuarios</h2>
                <p>Administra los registros del sistema de forma local.</p>
            </div>
            <button class="btn btn-primary" onclick="openRegisterModal()">
                <!-- Inline Plus Icon -->
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                Nuevo Usuario
            </button>
        </div>

        <!-- Toast Notification -->
        <div id="toast"></div>

        <!-- Table Card -->
        <div class="table-card">
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Sección</th>
                            <th>Teléfono</th>
                            <th style="text-align: right;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="usersTableBody">
                        <!-- Populated by JavaScript -->
                
                    </tbody>
                </table>
            </div>
            <!-- Empty State -->
            <div id="emptyState" class="empty-state">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
                <p>No hay usuarios registrados actualmente.</p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        &copy; 2026 Panel de Administración de usuarios.
    </footer>

    <!-- ================= MODALS ================= -->

    <!-- 1. Register Modal -->
    <div id="registerModal" class="modal-overlay">
        <div class="modal-container">
            <div class="modal-header">
                <h3>Registrar Nuevo Usuario</h3>
                <button class="icon-btn" onclick="closeRegisterModal()">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form id="registerForm" onsubmit="handleRegister(event)">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" id="regName" class="form-control" placeholder="Ej. Ana Pérez" required>
                    </div>
                    <div class="form-group">
                        <label>Correo</label>
                        <input type="email" id="regEmail" class="form-control" placeholder="ejemplo@correo.com" required>
                    </div>
                    <div class="form-group">
                        <label>Sección</label>
                        <input type="text" id="regSection" class="form-control" placeholder="Ej. Sección A" required>
                    </div>
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="tel" id="regPhone" class="form-control" placeholder="Ej. +58 412-1234567" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeRegisterModal()">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="registrar">Guardar Usuario</button>
                </div>
            </form>
        </div>
    </div>

    <!-- 2. Edit Modal -->
    <div id="editModal" class="modal-overlay">
        <div class="modal-container">
            <div class="modal-header">
                <h3>Editar Usuario</h3>
                <button class="icon-btn" onclick="closeEditModal()">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <form id="editForm" onsubmit="handleEdit(event)">
                <input type="hidden" id="editId">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" id="editName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Correo</label>
                        <input type="email" id="editEmail" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Sección</label>
                        <input type="text" id="editSection" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="tel" id="editPhone" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeEditModal()">Cancelar</button>
                    <button type="submit" class="btn btn-primary" id="editar">Actualizar Cambios</button>
                </div>
            </form>
        </div>
    </div>

    <!-- 3. Delete Confirmation Modal -->
    <div id="deleteModal" class="modal-overlay">
        <div class="modal-container" style="max-width: 380px;">
            <input type="hidden" id="deleteId">
            <div class="modal-body delete-content">
                <div class="delete-icon-wrap">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                </div>
                <h3>¿Estás seguro?</h3>
                <p>Esta acción eliminará el usuario permanentemente del sistema.</p>
            </div>
            <div class="modal-footer" style="justify-content: center;">
                <button type="button" class="btn btn-secondary" style="flex: 1;" onclick="closeDeleteModal()">Cancelar</button>
                <button id="eliminar" type="button" class="btn btn-danger" style="flex: 1;" onclick="confirmDelete()">Sí, eliminar</button>
            </div>
        </div>
    </div>

    <script src="./public/js/lib/jquery.js"></script>
  <script src="./public/js/users.js"></script>
  <script src="./public/js/main.js" type="module"></script>
</body>
</html>