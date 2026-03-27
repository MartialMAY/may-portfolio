<?php
namespace App\Controllers;

use App\Core\Database;
use App\Models\ProjectModel;
use App\Models\VeilleModel;
use App\Models\VeilleSourceModel;
use App\Models\TimelineModel;
use App\Models\BtsModel;
use App\Models\MessageModel;
use App\Services\EmailService;
use App\Services\LoggerService;
use App\Services\UploadService;

class AdminController {
    private $db;
    private $base;
    private $logger;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        // Auth is now handled by Router Middleware
        $database = new Database();
        $this->db = $database->getConnection();
        $this->logger = new LoggerService();
    }

    public function index() {
        $statsModel = new \App\Models\StatsModel($this->db);
        $logModel = new \App\Models\AuditLogModel($this->db);
        
        $stats = $statsModel->getSummary();
        $recentLogs = $logModel->getRecent(5);
        $messageModel = new MessageModel($this->db);
        $recentMessages = $messageModel->getAll(3); // Assuming MessageModel has getAll with limit

        require_once __DIR__ . '/../../views/admin/dashboard.php';
    }

    public function bts() {
        $btsModel = new BtsModel($this->db);
        $realisations = $btsModel->getRealisations();
        require_once __DIR__ . '/../../views/admin/bts.php';
    }

    public function logs() {
        $logModel = new \App\Models\AuditLogModel($this->db);
        $logs = $logModel->getAll(50);
        require_once __DIR__ . '/../../views/admin/logs.php';
    }

    // --- BTS SIO ---
    public function bts_edit() {
        $id = $_GET['id'] ?? null;
        $btsModel = new BtsModel($this->db);
        $realisation = $id ? $btsModel->getById($id) : null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id' => $_POST['id'] ?? null,
                'title' => $_POST['title'] ?? '',
                'periode' => $_POST['periode'] ?? '',
                'type' => $_POST['type'] ?? 'formation',
                'display_order' => $_POST['display_order'] ?? 0,
                'project_id' => $_POST['project_id'] ?? null
            ];
            if ($btsModel->save($data, $_POST['competences'] ?? [], $_POST['sous_competences'] ?? [], $_POST['justifications'] ?? [])) {
                $this->logger->log($id ? 'UPDATE_BTS' : 'CREATE_BTS', 'BTS_SIO', "Title: " . $data['title']);
                \App\Core\ViewHelper::redirect('/admin');
            }
        }
        $competences = $btsModel->getCompetences();
        $sous_competences = $btsModel->getSousCompetences();
        $projects = (new ProjectModel($this->db))->getAll();
        require_once __DIR__ . '/../../views/admin/bts_edit.php';
    }

    public function bts_delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            (new BtsModel($this->db))->delete($id);
            $this->logger->log('DELETE_BTS', 'BTS_SIO', "ID: $id");
        }
        \App\Core\ViewHelper::redirect('/admin');
    }

    // --- PROJECTS ---
    public function projects() {
        $projects = (new ProjectModel($this->db))->getAll();
        require_once __DIR__ . '/../../views/admin/projects.php';
    }

    public function project_edit() {
        $id = $_GET['id'] ?? null;
        $model = new ProjectModel($this->db);
        $project = $id ? $model->getById($id) : null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            
            if ($model->save($data)) {
                $this->logger->log($id ? 'UPDATE_PROJECT' : 'CREATE_PROJECT', 'PROJECTS', "Title: " . $data['title']);
                \App\Core\ViewHelper::redirect('/admin/projects');
            }
        }
        require_once __DIR__ . '/../../views/admin/project_edit.php';
    }

    public function upload_ajax() {
        header('Content-Type: application/json');
        try {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                 throw new \Exception("Méthode non autorisée");
            }
            if (!isset($_FILES['file'])) {
                 throw new \Exception("Aucun fichier reçu");
            }
            
            $uploadService = new UploadService('uploads/projects');
            $result = $uploadService->upload($_FILES['file']);
            
            if ($result['success']) {
                echo json_encode([
                    'success' => true,
                    'url' => url('/uploads/projects/' . $result['path'])
                ]);
            } else {
                echo json_encode(['success' => false, 'message' => $result['message']]);
            }
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
        exit;
    }

    public function project_reorder() {
        header('Content-Type: application/json');
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false]);
            exit;
        }
        $body = json_decode(file_get_contents('php://input'), true);
        $ids = $body['ids'] ?? [];
        if (empty($ids)) {
            echo json_encode(['success' => false, 'message' => 'No ids']);
            exit;
        }
        $model = new ProjectModel($this->db);
        $model->updateOrder($ids);
        $this->logger->log('REORDER_PROJECTS', 'PROJECTS', 'New order: ' . implode(',', $ids));
        echo json_encode(['success' => true]);
        exit;
    }

    public function project_delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            (new ProjectModel($this->db))->delete($id);
            $this->logger->log('DELETE_PROJECT', 'PROJECTS', "ID: $id");
        }
        \App\Core\ViewHelper::redirect('/admin/projects');
    }

    // --- VEILLE ---
    public function veille() {
        $articles = (new VeilleModel($this->db))->getAll();
        require_once __DIR__ . '/../../views/admin/veille.php';
    }

    public function veille_edit() {
        $id = $_GET['id'] ?? null;
        $model = new VeilleModel($this->db);
        $article = $id ? $model->getById($id) : null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $uploadService = new UploadService('uploads/veille');
                $result = $uploadService->upload($_FILES['image']);
                
                if ($result['success']) {
                    $data['image_url'] = 'uploads/veille/' . $result['path'];
                } else {
                    $error = $result['message'];
                }
            } elseif ($article) {
                $data['image_url'] = $article['image_url'];
            }

            if (!isset($error) && $model->save($data)) {
                $this->logger->log($id ? 'UPDATE_VEILLE' : 'CREATE_VEILLE', 'VEILLE', "Title: " . $data['title']);
                \App\Core\ViewHelper::redirect('/admin/veille');
            }
        }
        require_once __DIR__ . '/../../views/admin/veille_edit.php';
    }

    public function veille_delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            (new VeilleModel($this->db))->delete($id);
            $this->logger->log('DELETE_VEILLE', 'VEILLE', "ID: $id");
        }
        \App\Core\ViewHelper::redirect('/admin/veille');
    }

    public function veille_rss() {
        $articles = [];
        $feed_url = $_POST['feed_url'] ?? '';
        $sourceModel = new VeilleSourceModel($this->db);
        $saved_sources = $sourceModel->getAll();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['import'])) {
            $model = new VeilleModel($this->db);
            $importedCount = 0;
            foreach ($_POST['selected_articles'] as $index) {
                $item = [
                    'title' => $_POST['titles'][$index],
                    'category' => !empty($_POST['category']) ? $_POST['category'] : 'TECH',
                    'source_name' => $_POST['source_names'][$index],
                    'image_url' => $_POST['image_urls'][$index] ?? '',
                    'article_url' => $_POST['links'][$index],
                    'summary' => $_POST['descriptions'][$index],
                    'opinion' => '',
                    'published_at' => date('Y-m-d H:i:s', strtotime($_POST['dates'][$index]))
                ];
                if ($model->save($item)) $importedCount++;
            }
            $this->logger->log('IMPORT_VEILLE_RSS', 'VEILLE', "Count: $importedCount");
            \App\Core\ViewHelper::redirect("/admin/veille?imported=$importedCount");
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && $feed_url) {
            $xml = @simplexml_load_file($feed_url);
            if ($xml) {
                $source_title = (string)$xml->channel->title;
                foreach ($xml->channel->item as $item) {
                    $image = '';
                    if (isset($item->enclosure) && strpos((string)$item->enclosure['type'], 'image') !== false) {
                        $image = (string)$item->enclosure['url'];
                    }
                    $articles[] = [
                        'title' => (string)$item->title,
                        'description' => strip_tags((string)$item->description),
                        'link' => (string)$item->link,
                        'pubDate' => (string)$item->pubDate,
                        'source' => $source_title,
                        'image_url' => $image
                    ];
                }
            }
        }
        require_once __DIR__ . '/../../views/admin/veille_rss.php';
    }

    public function veille_sources() {
        $model = new VeilleSourceModel($this->db);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($model->save($_POST)) {
                $this->logger->log('UPDATE_VEILLE_SOURCE', 'VEILLE', "Name: " . $_POST['name']);
                \App\Core\ViewHelper::redirect('/admin/veille/sources');
            }
        }
        $sources = $model->getAll();
        require_once __DIR__ . '/../../views/admin/veille_sources.php';
    }

    public function veille_source_delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            (new VeilleSourceModel($this->db))->delete($id);
            $this->logger->log('DELETE_VEILLE_SOURCE', 'VEILLE', "ID: $id");
        }
        \App\Core\ViewHelper::redirect('/admin/veille/sources');
    }

    // --- TIMELINE ---
    public function timeline() {
        $items = (new TimelineModel($this->db))->getAll();
        require_once __DIR__ . '/../../views/admin/timeline.php';
    }

    public function timeline_edit() {
        $id = $_GET['id'] ?? null;
        $model = new TimelineModel($this->db);
        $item = $id ? $model->getById($id) : null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($model->save($_POST)) {
                $this->logger->log($id ? 'UPDATE_TIMELINE' : 'CREATE_TIMELINE', 'TIMELINE', "Title: " . $_POST['title']);
                \App\Core\ViewHelper::redirect('/admin/timeline');
            }
        }
        require_once __DIR__ . '/../../views/admin/timeline_edit.php';
    }

    public function timeline_delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            (new TimelineModel($this->db))->delete($id);
            $this->logger->log('DELETE_TIMELINE', 'TIMELINE', "ID: $id");
        }
        \App\Core\ViewHelper::redirect('/admin/timeline');
    }

    // --- SETTINGS ---
    public function settings() {
        $model = new \App\Models\SettingsModel($this->db);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            foreach ($_POST as $key => $value) {
                $model->set($key, $value);
            }
            $this->logger->log('UPDATE_SETTINGS', 'SETTINGS', 'Profile settings updated');
            \App\Core\ViewHelper::redirect('/admin/settings?saved=1');
        }
        $settings = $model->getAll();
        require_once __DIR__ . '/../../views/admin/settings.php';
    }

    // --- CV ---
    public function cv() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $uploadService = new UploadService('assets');
            
            if (isset($_FILES['cv_pdf']) && $_FILES['cv_pdf']['error'] === 0) {
                // Ensure specific filename for CV
                $tmp = $_FILES['cv_pdf']['tmp_name'];
                move_uploaded_file($tmp, __DIR__ . '/../../public/assets/CV_Martial_MAYAMOU.pdf');
                $this->logger->log('UPDATE_CV_PDF', 'CV', "Uploaded new PDF");
            }
            if (isset($_FILES['cv_jpg']) && $_FILES['cv_jpg']['error'] === 0) {
                $tmp = $_FILES['cv_jpg']['tmp_name'];
                move_uploaded_file($tmp, __DIR__ . '/../../public/assets/images/CV_Martial_MAYAMOU.jpg');
                $this->logger->log('UPDATE_CV_JPG', 'CV', "Uploaded new JPG");
            }
            $success = "CV mis à jour !";
        }
        require_once __DIR__ . '/../../views/admin/cv.php';
    }

    // --- MESSAGES ---
    public function messages() {
        $messages = (new MessageModel($this->db))->getAll();
        require_once __DIR__ . '/../../views/admin/messages.php';
    }

    public function delete_message() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $query = "DELETE FROM messages WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->execute([':id' => $id]);
            $this->logger->log('DELETE_MESSAGE', 'MESSAGES', "ID: $id");
        }
        \App\Core\ViewHelper::redirect('/admin/messages');
    }

    public function reply() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userEmail = $_POST['email'] ?? '';
            $subject = $_POST['subject'] ?? 'Réponse à votre message';
            $message = $_POST['message'] ?? '';

            if (!empty($userEmail) && !empty($message)) {
                $emailService = new EmailService();
                $emailService->sendReply($userEmail, $subject, $message);
                $this->logger->log('REPLY_MESSAGE', 'MESSAGES', "To: $userEmail");
                \App\Core\ViewHelper::redirect('/admin/messages?replied=1');
            }
        }
        \App\Core\ViewHelper::redirect('/admin/messages?error=1');
    }
}
