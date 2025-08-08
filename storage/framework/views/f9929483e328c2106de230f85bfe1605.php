<footer class="bg-[#1e355e] text-white py-8 mt-8">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="flex items-center mb-4 md:mb-0">
                <img src="/logos/ItoLogo.png" alt="Logo ITEO" width="60" height="60" class="mr-4" />
                <div>
                    <h3 class="text-lg font-semibold">Departamento de Ciencias Económico-Administrativas</h3>
                    <p class="text-sm">Instituto Tecnológico de Oaxaca</p>
                </div>
            </div>

            <div class="flex flex-col items-center md:items-end">
                <a href="http://www.itoaxaca.edu.mx/" target="_blank" rel="noopener noreferrer" class="text-white hover:text-gray-300 transition-colors mb-2 flex items-center">
                    <span class="mr-2">🔗</span>
                    Instituto Tecnológico de Oaxaca
                </a>
                <div class="flex space-x-4">
                    <a href="https://twitter.com/TecNM_MX" target="_blank" rel="noopener noreferrer" class="text-white hover:text-gray-300 transition-colors">
                        <img src="<?php echo e(asset('svg/twitter.svg')); ?>" width="24px" height="24px" alt="">
                        <span class="sr-only">Twitter</span>
                    </a>
                    <a href="https://www.facebook.com/TecNMmx" target="_blank" rel="noopener noreferrer" class="text-white hover:text-gray-300 transition-colors">
                        <img src="<?php echo e(asset('svg/facebook.svg')); ?>" width="24px" height="24px" alt="">
                        <span class="sr-only">Facebook</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="mt-8 text-center text-sm">
            <p id="copyright"></p>
        </div>
    </div>
</footer>

<script>
    document.getElementById("copyright").innerHTML = `&copy; ${new Date().getFullYear()} Instituto Tecnológico de Oaxaca. Todos los derechos reservados.`;
</script><?php /**PATH C:\Users\Blady\Desktop\Proyecto_ABD\resources\views\layouts\footer.blade.php ENDPATH**/ ?>