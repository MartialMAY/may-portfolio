<?php
namespace App\Controllers;

use App\Core\Database;
use App\Models\ProjectModel;
use App\Models\StatsModel;
use App\Models\VeilleModel;
use App\Models\BtsModel;
use App\Models\TimelineModel;

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

        require_once __DIR__ . '/../../views/home.php';
    }
}
