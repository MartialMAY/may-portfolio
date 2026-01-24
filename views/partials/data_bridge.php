<!-- 
    Passerelle de données PHP vers JavaScript 
    Permet d'injecter les données dynamiques de la base de données 
    dans les scripts front-end de manière sécurisée.
-->
<script>
    window.PHP_PROJECTS = <?php echo \App\Core\ViewHelper::json($projects); ?>;
    window.PHP_STATS = <?php echo \App\Core\ViewHelper::json($stats); ?>;
    window.PHP_VEILLE = <?php echo \App\Core\ViewHelper::json($veille ?? []); ?>;
    window.PHP_TIMELINE = <?php echo \App\Core\ViewHelper::json($timeline ?? []); ?>;
</script>
