// Clave para localStorage
const STORAGE_KEY = 'diario-estudio-sesiones';

// Estado de la app
let sesiones = [];

// Elementos del DOM
const form = document.getElementById('session-form');
const dateInput = document.getElementById('date');
const topicInput = document.getElementById('topic');
const minutesInput = document.getElementById('minutes');
const streakDisplay = document.getElementById('streak-display');
const sessionsList = document.getElementById('sessions-list');
const emptyMessage = document.getElementById('empty-message');

// Inicialización al cargar
document.addEventListener('DOMContentLoaded', () => {
    cargarSesiones();
    establecerFechaHoy();
    render();
});

// Cargar sesiones desde localStorage
function cargarSesiones() {
    const datos = localStorage.getItem(STORAGE_KEY);
    if (datos) {
        try {
            sesiones = JSON.parse(datos);
            // Ordenar: más reciente primero
            sesiones.sort((a, b) => new Date(b.fecha) - new Date(a.fecha));
        } catch (e) {
            console.error('Error al parsear localStorage:', e);
            sesiones = [];
        }
    }
}

// Guardar sesiones en localStorage
function guardarSesiones() {
    localStorage.setItem(STORAGE_KEY, JSON.stringify(sesiones));
}

// Establecer la fecha de hoy por defecto en el input
function establecerFechaHoy() {
    const hoy = new Date();
    const anio = hoy.getFullYear();
    const mes = String(hoy.getMonth() + 1).padStart(2, '0');
    const dia = String(hoy.getDate()).padStart(2, '0');
    dateInput.value = `${anio}-${mes}-${dia}`;
}

// Formatear fecha para mostrar (DD/MM/YYYY)
function formatearFecha(fechaISO) {
    const [anio, mes, dia] = fechaISO.split('-');
    return `${dia}/${mes}/${anio}`;
}

// Calcular la racha actual
function calcularRacha() {
    if (sesiones.length === 0) return 0;

    // Obtener conjunto de fechas únicas que tienen al menos una sesión
    const fechasConSesion = new Set(sesiones.map(s => s.fecha));

    // Fecha de hoy en formato YYYY-MM-DD (local)
    const hoy = new Date();
    const hoyISO = `${hoy.getFullYear()}-${String(hoy.getMonth() + 1).padStart(2, '0')}-${String(hoy.getDate()).padStart(2, '0')}`;

    // Fecha de ayer
    const ayer = new Date(hoy);
    ayer.setDate(ayer.getDate() - 1);
    const ayerISO = `${ayer.getFullYear()}-${String(ayer.getMonth() + 1).padStart(2, '0')}-${String(ayer.getDate()).padStart(2, '0')}`;

    // La racha cuenta días consecutivos que terminan HOY o AYER (si hoy no hay sesión)
    // Empezamos comprobando desde hoy
    let fechaComprobacion = hoyISO;
    let racha = 0;

    // Si hoy no tiene sesión, la racha "vive" hasta que termine el día
    // Así que empezamos a contar desde ayer si hoy no hay sesión
    if (!fechasConSesion.has(hoyISO)) {
        fechaComprobacion = ayerISO;
    }

    // Contar días consecutivos hacia atrás
    while (fechasConSesion.has(fechaComprobacion)) {
        racha++;
        // Restar un día
        const [anio, mes, dia] = fechaComprobacion.split('-').map(Number);
        const fecha = new Date(anio, mes - 1, dia);
        fecha.setDate(fecha.getDate() - 1);
        fechaComprobacion = `${fecha.getFullYear()}-${String(fecha.getMonth() + 1).padStart(2, '0')}-${String(fecha.getDate()).padStart(2, '0')}`;
    }

    return racha;
}

// Renderizar toda la UI
function render() {
    // Raacha
    streakDisplay.textContent = calcularRacha();

    // Lista de sesiones
    sessionsList.innerHTML = '';

    if (sesiones.length === 0) {
        emptyMessage.hidden = false;
    } else {
        emptyMessage.hidden = true;
        sesiones.forEach(sesion => {
            const li = document.createElement('li');
            li.className = 'session-item';
            li.innerHTML = `
                <div class="session-info">
                    <span class="session-topic">${escaparHTML(sesion.tema)}</span>
                    <div class="session-meta">
                        <span class="session-date">${formatearFecha(sesion.fecha)}</span>
                        <span class="session-minutes">${sesion.minutos} min</span>
                    </div>
                </div>
            `;
            sessionsList.appendChild(li);
        });
    }
}

// Escapar HTML para evitar XSS
function escaparHTML(texto) {
    const div = document.createElement('div');
    div.textContent = texto;
    return div.innerHTML;
}

// Manejar envío del formulario
form.addEventListener('submit', (e) => {
    e.preventDefault();

    const fecha = dateInput.value;
    const tema = topicInput.value.trim();
    const minutos = parseInt(minutesInput.value, 10);

    // Validación básica (el required del HTML ya cubre lo básico)
    if (!fecha || !tema || !minutos || minutos <= 0) {
        return;
    }

    // Añadir sesión
    const nuevaSesion = {
        fecha,
        tema,
        minutos,
        id: Date.now() // ID simple para posibles futuras funcionalidades
    };

    sesiones.unshift(nuevaSesion); // Al principio para que esté ordenado
    guardarSesiones();
    render();

    // Resetear formulario (mantener la fecha de hoy por defecto)
    topicInput.value = '';
    minutesInput.value = '';
    topicInput.focus();
    establecerFechaHoy();
});