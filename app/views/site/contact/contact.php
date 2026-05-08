<section class="w-full min-h-[calc(100vh-80px)] flex items-center bg-gray-100 py-10 md:py-12">
    <div class="max-w-5xl mx-auto px-6 w-full">
        <div class="text-center mb-12 opacity-0 translate-y-6 transition-all duration-700" id="title">
            <h1 class="text-4xl md:text-5xl font-bold text-[#111D2D]">
                Contáctenos
            </h1>
            <div class="w-20 h-1 bg-[#111D2D] mx-auto mt-4 rounded-full"></div>
            <p class="mt-4 text-gray-500 max-w-2xl mx-auto">
                Estamos aquí para brindar la claridad financiera que su empresa necesita. Contáctenos hoy para una consulta profesional adaptada a sus objetivos.
            </p>
        </div>
        <div class="bg-white rounded-3xl shadow-xl p-8 md:p-10 opacity-0 translate-y-10 transition-all duration-700 delay-200" id="card">
            <form id="form" class="space-y-5">
                <div class="grid md:grid-cols-2 gap-5">
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">person</span>
                        <input type="text" id="c_nombre" name="nombre" required placeholder="Nombre y apellido" class="input-field w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#111D2D] focus:outline-none transition">
                    </div>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">mail</span>
                        <input type="email" id="c_email" name="email" required placeholder="Correo electrónico" class="input-field w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#111D2D] focus:outline-none transition">
                    </div>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">call</span>
                        <input type="tel" id="c_celular" name="celular" required placeholder="Celular" class="input-field w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#111D2D] focus:outline-none transition">
                    </div>
                    <div class="relative">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">business</span>
                        <input type="text" id="c_empresa" name="empresa" required placeholder="Empresa" class="input-field w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#111D2D] focus:outline-none transition">
                    </div>
                    <div class="relative md:col-span-2">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">badge</span>
                        <input type="text" id="c_ruc" name="ruc" required placeholder="RUC / DNI" class="input-field w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#111D2D] focus:outline-none transition">
                    </div>
                    <div class="relative md:col-span-2">
                        <span class="material-symbols-outlined absolute left-3 top-4 text-gray-400">edit</span>
                        <textarea id="c_mensaje" name="mensaje" rows="5" required placeholder="Mensaje" class="input-field w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#111D2D] focus:outline-none transition"></textarea>
                    </div>
                </div>
                
                <div class="text-sm text-gray-500 leading-tight">
                    <p>
                        Al enviar aceptas nuestra 
                        <a href="<?= BASE_URL ?>?url=privacy" class="font-medium underline hover:text-[#111D2D] transition cursor-pointer">
                            política de privacidad
                        </a>.
                    </p>
                </div>
                
                <div class="flex flex-col sm:flex-row gap-4 pt-2">
                    <button type="submit" id="btnSubmit"
                        class="group relative inline-flex items-center justify-center overflow-hidden 
                               bg-[#111D2D] hover:bg-black text-white font-semibold 
                               px-8 py-3 rounded-xl shadow-md hover:shadow-xl 
                               transform hover:scale-105 transition-all duration-300">
                        <span class="transition-all duration-300 group-hover:-translate-x-3" id="btnSubmitText">
                            Enviar
                        </span>
                        <span class="material-symbols-outlined absolute right-0 translate-x-10 opacity-0 transition-all duration-300 group-hover:-translate-x-4 group-hover:opacity-100">
                            send
                        </span>
                    </button>
                    <a href="#" id="btnWhatsapp"
                        class="group relative inline-flex items-center justify-center overflow-hidden 
                               border border-green-500 text-green-600 font-semibold 
                               px-8 py-3 rounded-xl 
                               hover:bg-green-500 hover:text-white 
                               transform hover:scale-105 transition-all duration-300 text-center cursor-pointer">
                        <span class="transition-all duration-300 group-hover:-translate-x-3">
                            WhatsApp
                        </span>
                        <span class="material-symbols-outlined absolute right-0 translate-x-10 opacity-0 transition-all duration-300 group-hover:-translate-x-4 group-hover:opacity-100">
                            chat
                        </span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>

<script src="public/assets/js/contact.js?v=1.0"></script>