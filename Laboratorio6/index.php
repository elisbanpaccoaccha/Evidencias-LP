<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historia Clínica | Est. Salud</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .section-active {
            display: block !important;
        }
    </style>
</head>
<body class="bg-gray-100 p-6">
    <!-- Barra de Navegación -->
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Est. de Salud</span>
            </a>
            <div class="flex items-center space-x-6 rtl:space-x-reverse">
                <p class="block font-sans text-sm antialiased font-medium leading-normal text-inherit">
                    N° H.C. <span class="font-bold">001234</span>
                </p>
                <p class="block font-sans text-sm antialiased font-medium leading-normal text-inherit">
                    Usuario: <span class="font-bold">Dr. García</span>
                </p>
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="focus:outline-none">
                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold">
                            <i class="fas fa-user"></i>
                        </div>
                    </button>
                    <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                        <div class="py-1">
                            <a onclick="showSection('micuenta')" href="#" class="flex items-center block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">
                                <i class="fas fa-user mr-2"></i> Mi cuenta
                            </a>
                            <a onclick="showSection('editarcuenta')" href="#" class="flex items-center block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">
                                <i class="fas fa-edit mr-2"></i> Editar cuenta
                            </a>
                            <a onclick="showSection('contraseña')" href="#" class="flex items-center block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">
                                <i class="fas fa-key mr-2"></i> Cambiar contraseña
                            </a>
                            <a onclick="showSection('ayuda')" href="#" class="flex items-center block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">
                                <i class="fas fa-question-circle mr-2"></i> Ayuda
                            </a>
                            <div class="border-t border-gray-100 dark:border-gray-600"></div>
                            <a href="index.php" class="flex items-center block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600">
                                <i class="fas fa-sign-out-alt mr-2"></i> Salir
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <nav class="bg-gray-50 dark:bg-gray-700">
        <div class="max-w-screen-xl px-4 py-3 mx-auto">
            <div class="flex items-center">
                <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                    <li>
                        <a onclick="showSection('personas')" href="#" class="text-gray-900 dark:text-white hover:underline cursor-pointer">Personas</a>
                    </li>
                    <li>
                        <a onclick="showSection('historiaclinica')" href="#" class="text-gray-900 dark:text-white hover:underline cursor-pointer">Historias Clínicas</a>
                    </li>
                    <li>
                        <a onclick="showSection('triaje')" href="#" class="text-gray-900 dark:text-white hover:underline cursor-pointer">Triajes</a>
                    </li>
                    <li>
                        <a onclick="showSection('citas')" href="#" class="text-gray-900 dark:text-white hover:underline cursor-pointer">Citas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Secciones -->
    <div id="personas" class="mt-6 hidden">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4 text-blue-600">
                <i class="fas fa-users mr-2"></i>Gestión de Personas
            </h2>
            <p class="text-gray-700">Aquí se muestra el módulo de gestión de personas del establecimiento de salud.</p>
            <div class="mt-4 p-4 bg-blue-50 rounded-lg">
                <p class="text-blue-800">Funcionalidades disponibles:</p>
                <ul class="list-disc list-inside mt-2 text-blue-700">
                    <li>Registro de pacientes</li>
                    <li>Búsqueda de personas</li>
                    <li>Actualización de datos</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="historiaclinica" class="mt-6 hidden">
        <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-green-600">
                <i class="fas fa-file-medical mr-2"></i>Historia Clínica - Selecciona tu Ubicación
            </h2>
            <form id="ubicacionForm" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="departamento" class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-map-marked-alt mr-2"></i>Departamento
                        </label>
                        <select id="departamento" name="departamento" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500">
                            <option value="">Seleccione un departamento</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="provincia" class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-map-marker-alt mr-2"></i>Provincia
                        </label>
                        <select id="provincia" name="provincia" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500" disabled>
                            <option value="">Seleccione una provincia</option>
                        </select>
                    </div>
                    
                    <div>
                        <label for="distrito" class="block text-gray-700 font-semibold mb-2">
                            <i class="fas fa-map-pin mr-2"></i>Distrito
                        </label>
                        <select id="distrito" name="distrito" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 focus:border-green-500" disabled>
                            <option value="">Seleccione un distrito</option>
                        </select>
                    </div>
                </div>
                
                <div class="mt-6 p-4 bg-green-50 rounded-lg">
                    <h3 class="font-bold text-green-800 mb-2">Ubicación Seleccionada:</h3>
                    <div id="ubicacionSeleccionada" class="text-green-700">
                        <p><span class="font-semibold">Departamento:</span> <span id="depSeleccionado">-</span></p>
                        <p><span class="font-semibold">Provincia:</span> <span id="provSeleccionada">-</span></p>
                        <p><span class="font-semibold">Distrito:</span> <span id="distSeleccionado">-</span></p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="triaje" class="mt-6 hidden">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4 text-red-600">
                <i class="fas fa-thermometer-half mr-2"></i>Triaje
            </h2>
            <p class="text-gray-700">Aquí se muestra el módulo de triaje para clasificar la urgencia de los pacientes.</p>
            <div class="mt-4 p-4 bg-red-50 rounded-lg">
                <p class="text-red-800">Funcionalidades disponibles:</p>
                <ul class="list-disc list-inside mt-2 text-red-700">
                    <li>Evaluación de signos vitales</li>
                    <li>Clasificación por prioridad</li>
                    <li>Registro de síntomas</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="citas" class="mt-6 hidden">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4 text-purple-600">
                <i class="fas fa-calendar-alt mr-2"></i>Citas Médicas
            </h2>
            <p class="text-gray-700">Aquí puedes gestionar las citas médicas del establecimiento.</p>
            <div class="mt-4 p-4 bg-purple-50 rounded-lg">
                <p class="text-purple-800">Funcionalidades disponibles:</p>
                <ul class="list-disc list-inside mt-2 text-purple-700">
                    <li>Programar nuevas citas</li>
                    <li>Consultar agenda médica</li>
                    <li>Modificar y cancelar citas</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="micuenta" class="mt-6 hidden">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4 text-indigo-600">
                <i class="fas fa-user-circle mr-2"></i>Mi Cuenta
            </h2>
            <p class="text-gray-700">Aquí puedes ver la información de tu cuenta de usuario.</p>
            <div class="mt-4 p-4 bg-indigo-50 rounded-lg">
                <p class="text-indigo-800"><strong>Usuario:</strong> Dr. García</p>
                <p class="text-indigo-800"><strong>Rol:</strong> Médico General</p>
                <p class="text-indigo-800"><strong>Especialidad:</strong> Medicina General</p>
                <p class="text-indigo-800"><strong>Email:</strong> dr.garcia@salud.gob.pe</p>
            </div>
        </div>
    </div>

    <div id="editarcuenta" class="mt-6 hidden">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4 text-yellow-600">
                <i class="fas fa-user-edit mr-2"></i>Editar mi Cuenta
            </h2>
            <p class="text-gray-700">Aquí puedes editar la información de tu cuenta.</p>
            <div class="mt-4 p-4 bg-yellow-50 rounded-lg">
                <p class="text-yellow-800">Funcionalidades disponibles:</p>
                <ul class="list-disc list-inside mt-2 text-yellow-700">
                    <li>Actualizar datos personales</li>
                    <li>Cambiar información de contacto</li>
                    <li>Modificar preferencias</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="contraseña" class="mt-6 hidden">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4 text-orange-600">
                <i class="fas fa-lock mr-2"></i>Cambiar Contraseña
            </h2>
            <p class="text-gray-700">Aquí puedes cambiar tu contraseña de acceso.</p>
            <div class="mt-4 p-4 bg-orange-50 rounded-lg">
                <p class="text-orange-800">Para tu seguridad:</p>
                <ul class="list-disc list-inside mt-2 text-orange-700">
                    <li>Usa una contraseña segura</li>
                    <li>Incluye mayúsculas, minúsculas y números</li>
                    <li>No compartas tu contraseña</li>
                </ul>
            </div>
        </div>
    </div>

    <div id="ayuda" class="mt-6 hidden">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4 text-teal-600">
                <i class="fas fa-question-circle mr-2"></i>Ayuda
            </h2>
            <p class="text-gray-700">Centro de ayuda y soporte técnico.</p>
            <div class="mt-4 p-4 bg-teal-50 rounded-lg">
                <p class="text-teal-800">Recursos disponibles:</p>
                <ul class="list-disc list-inside mt-2 text-teal-700">
                    <li>Manual de usuario</li>
                    <li>Preguntas frecuentes</li>
                    <li>Contacto con soporte técnico</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="historiaclinica.js"></script>
    
    <script>
        // Mostrar la sección de personas por defecto
        document.addEventListener('DOMContentLoaded', function() {
            showSection('personas');
        });
    </script>
</body>
</html>