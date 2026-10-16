export const EXPREG = {
  nombre: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/,
  correo: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
  seccion: /^[A-Za-z]+\d+$/,
  telefono: /^\+?[\d\s-]{7,15}$/,
};
