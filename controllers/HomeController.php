<?php
namespace Controllers;

use Config\Database;
use Models\ProjectModel;
use Models\StatsModel;
use Models\VeilleModel;
use Models\BtsModel;
use Models\TimelineModel;

class HomeController {
    public function index() {
        $database = new Database();
        $db = $database->getConnection();
        
        $projectModel = new ProjectModel($db);
        $projects = $projectModel->getAll() ?: [];

        $statsModel = new StatsModel($db);
        $stats = $statsModel->getAll() ?: [];

        $veilleModel = new VeilleModel($db);
        $veille = $veilleModel->getAll() ?: [];

        $btsModel = new BtsModel($db);
        $bts_competences = $btsModel->getCompetences() ?: [];
        $bts_realisations = $btsModel->getRealisations() ?: [];

        $timelineModel = new TimelineModel($db);
        $timeline = $timelineModel->getAll() ?: [];

        require_once 'views/home.php';
    }
}
