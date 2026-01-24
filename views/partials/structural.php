<!-- 
    Éléments structurels et esthétiques (Overlays, Curseurs, Grilles) 
    Ces éléments participent à l'expérience visuelle "Premium" du site.
-->
<div class="grain-overlay"></div>
<div class="bg-grid"></div>

<!-- Curseurs personnalisés interactifs -->
<div class="custom-cursor"></div>
<div class="custom-cursor-dot"></div>

<!-- Lignes structurelles d'arrière-plan (Design System) -->
<div class="fixed inset-0 pointer-events-none z-[-1]">
    <div class="container-main h-full flex justify-between pointer-events-none">
        <div class="relative h-full w-20 -mx-10 pointer-events-auto group">
            <div class="absolute left-1/2 -translate-x-1/2 w-[1px] h-full bg-gray-200/40 group-hover:bg-blue-600 transition-all duration-700 ease-out origin-top"></div>
            <div class="absolute inset-0 bg-blue-600/0 group-hover:bg-blue-600/[0.02] transition-colors duration-700"></div>
        </div>
        <div class="relative h-full w-20 -mx-10 pointer-events-auto group hidden md:block">
            <div class="absolute left-1/2 -translate-x-1/2 w-[1px] h-full bg-gray-200/40 group-hover:bg-blue-600 transition-all duration-700 ease-out origin-top"></div>
            <div class="absolute inset-0 bg-blue-600/0 group-hover:bg-blue-600/[0.02] transition-colors duration-700"></div>
        </div>
        <div class="relative h-full w-20 -mx-10 pointer-events-auto group hidden lg:block">
            <div class="absolute left-1/2 -translate-x-1/2 w-[1px] h-full bg-gray-200/40 group-hover:bg-blue-600 transition-all duration-700 ease-out origin-top"></div>
            <div class="absolute inset-0 bg-blue-600/0 group-hover:bg-blue-600/[0.02] transition-colors duration-700"></div>
        </div>
        <div class="relative h-full w-20 -mx-10 pointer-events-auto group">
            <div class="absolute left-1/2 -translate-x-1/2 w-[1px] h-full bg-gray-200/40 group-hover:bg-blue-600 transition-all duration-700 ease-out origin-top"></div>
            <div class="absolute inset-0 bg-blue-600/0 group-hover:bg-blue-600/[0.02] transition-colors duration-700"></div>
        </div>
    </div>
</div>
