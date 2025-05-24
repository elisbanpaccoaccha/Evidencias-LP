// Función para mostrar las diferentes secciones
function showSection(sectionId) {
    // Lista de todas las secciones
    const sections = [
        'personas', 
        'historiaclinica', 
        'triaje', 
        'citas', 
        'micuenta', 
        'editarcuenta', 
        'contraseña', 
        'ayuda'
    ];
    
    // Ocultar todas las secciones
    sections.forEach(section => {
        const element = document.getElementById(section);
        if (element) {
            element.classList.add('hidden');
            element.classList.remove('section-active');
        }
    });
    
    // Mostrar la sección seleccionada
    const selectedSection = document.getElementById(sectionId);
    if (selectedSection) {
        selectedSection.classList.remove('hidden');
        selectedSection.classList.add('section-active');
    }
    
    console.log('Sección mostrada:', sectionId);
}

// Función para mostrar notificaciones
function showNotification(message, type = 'info') {
    // Crear elemento de notificación
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg z-50 ${
        type === 'error' ? 'bg-red-500 text-white' : 
        type === 'success' ? 'bg-green-500 text-white' : 
        'bg-blue-500 text-white'
    }`;
    notification.textContent = message;
    
    // Agregar al DOM
    document.body.appendChild(notification);
    
    // Remover después de 3 segundos
    setTimeout(() => {
        if (notification.parentNode) {
            notification.parentNode.removeChild(notification);
        }
    }, 3000);
}

// Función para actualizar la información de ubicación seleccionada
function updateSelectedLocation() {
    const departamentoSelect = document.getElementById('departamento');
    const provinciaSelect = document.getElementById('provincia');
    const distritoSelect = document.getElementById('distrito');
    
    const depSeleccionado = document.getElementById('depSeleccionado');
    const provSeleccionada = document.getElementById('provSeleccionada');
    const distSeleccionado = document.getElementById('distSeleccionado');
    
    if (depSeleccionado && departamentoSelect) {
        depSeleccionado.textContent = departamentoSelect.options[departamentoSelect.selectedIndex]?.text || '-';
    }
    
    if (provSeleccionada && provinciaSelect) {
        provSeleccionada.textContent = provinciaSelect.options[provinciaSelect.selectedIndex]?.text || '-';
    }
    
    if (distSeleccionado && distritoSelect) {
        distSeleccionado.textContent = distritoSelect.options[distritoSelect.selectedIndex]?.text || '-';
    }
}

// Función para habilitar/deshabilitar selects
function toggleSelectState(selectId, enable) {
    const select = document.getElementById(selectId);
    if (select) {
        select.disabled = !enable;
        if (!enable) {
            select.value = '';
        }
    }
}

// Función para cargar opciones en un select
function loadOptions(selectId, options, defaultText) {
    const select = document.getElementById(selectId);
    if (!select) return;
    
    // Limpiar opciones existentes
    select.innerHTML = `<option value="">${defaultText}</option>`;
    
    // Agregar nuevas opciones
    options.forEach(option => {
        const optionElement = document.createElement('option');
        optionElement.value = option.id_Departamento || option.id_Provincia || option.id_Distrito;
        optionElement.textContent = option.NombreDepartamento || option.NombreProvincia || option.NombreDistrito;
        select.appendChild(optionElement);
    });
}

// Cuando el documento esté listo
$(document).ready(function() {
    console.log('Documento listo, inicializando...');
    
    // Cargar departamentos al iniciar
    $.ajax({
        url: 'classes.php',
        method: 'GET',
        data: { action: 'getDepartamentos' },
        dataType: 'json',
        success: function(response) {
            console.log('Departamentos cargados:', response);
            
            if (Array.isArray(response)) {
                loadOptions('departamento', response, 'Seleccione un departamento');
                showNotification('Departamentos cargados correctamente', 'success');
            } else {
                console.error('Respuesta inválida:', response);
                showNotification('Error: Respuesta inválida del servidor', 'error');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error cargando departamentos:', {
                status: xhr.status,
                statusText: xhr.statusText,
                responseText: xhr.responseText,
                error: error
            });
            showNotification('Error cargando departamentos: ' + error, 'error');
        }
    });

    // Evento cuando se selecciona un departamento
    $('#departamento').on('change', function() {
        const id_Departamento = $(this).val();
        console.log('Departamento seleccionado:', id_Departamento);
        
        // Limpiar y deshabilitar provincia y distrito
        loadOptions('provincia', [], 'Seleccione una provincia');
        loadOptions('distrito', [], 'Seleccione un distrito');
        toggleSelectState('provincia', false);
        toggleSelectState('distrito', false);
        
        updateSelectedLocation();
        
        if (id_Departamento) {
            // Habilitar provincia y cargar sus opciones
            toggleSelectState('provincia', true);
            
            $.ajax({
                url: 'classes.php',
                method: 'POST',
                data: { 
                    action: 'getProvincias', 
                    id_Departamento: id_Departamento 
                },
                dataType: 'json',
                success: function(response) {
                    console.log('Provincias cargadas:', response);
                    
                    if (Array.isArray(response)) {
                        loadOptions('provincia', response, 'Seleccione una provincia');
                        showNotification('Provincias cargadas correctamente', 'success');
                    } else {
                        console.error('Respuesta inválida:', response);
                        showNotification('Error: Respuesta inválida del servidor', 'error');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error cargando provincias:', {
                        status: xhr.status,
                        statusText: xhr.statusText,
                        responseText: xhr.responseText,
                        error: error
                    });
                    showNotification('Error cargando provincias: ' + error, 'error');
                    toggleSelectState('provincia', false);
                }
            });
        }
    });

    // Evento cuando se selecciona una provincia
    $('#provincia').on('change', function() {
        const id_Provincia = $(this).val();
        console.log('Provincia seleccionada:', id_Provincia);
        
        // Limpiar y deshabilitar distrito
        loadOptions('distrito', [], 'Seleccione un distrito');
        toggleSelectState('distrito', false);
        
        updateSelectedLocation();
        
        if (id_Provincia) {
            // Habilitar distrito y cargar sus opciones
            toggleSelectState('distrito', true);
            
            $.ajax({
                url: 'classes.php',
                method: 'POST',
                data: { 
                    action: 'getDistritos', 
                    id_Provincia: id_Provincia 
                },
                dataType: 'json',
                success: function(response) {
                    console.log('Distritos cargados:', response);
                    
                    if (Array.isArray(response)) {
                        loadOptions('distrito', response, 'Seleccione un distrito');
                        showNotification('Distritos cargados correctamente', 'success');
                    } else {
                        console.error('Respuesta inválida:', response);
                        showNotification('Error: Respuesta inválida del servidor', 'error');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error cargando distritos:', {
                        status: xhr.status,
                        statusText: xhr.statusText,
                        responseText: xhr.responseText,
                        error: error
                    });
                    showNotification('Error cargando distritos: ' + error, 'error');
                    toggleSelectState('distrito', false);
                }
            });
        }
    });

    // Evento cuando se selecciona un distrito
    $('#distrito').on('change', function() {
        console.log('Distrito seleccionado:', $(this).val());
        updateSelectedLocation();
        
        if ($(this).val()) {
            showNotification('Ubicación completamente seleccionada', 'success');
        }
    });

    // Inicializar la información de ubicación
    updateSelectedLocation();
});