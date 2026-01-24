<?php
namespace Controllers;

use Config\Database;
use Models\ProjectModel;
use Models\VeilleModel;
use Models\VeilleSourceModel;
use Models\TimelineModel;
use Models\BtsModel;
use Models\MessageModel;
use Services\EmailService;

class AdminController {
    private $db;
    private $base;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->base = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);
        if (!isset($_SESSION['admin'])) {
            header('Location: ' . $this->base . '/login');
            exit();
        }
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function index() {
        $btsModel = new BtsModel($this->db);
        $realisations = $btsModel->getRealisations();
        require_once 'views/admin/dashboard.php';
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
                'display_order' => $_POST['display_order'] ?? 0
            ];
            if ($btsModel->save($data, $_POST['competences'] ?? [])) {
                header('Location: ' . $this->base . '/admin');
                exit();
            }
        }
        $competences = $btsModel->getCompetences();
        require_once 'views/admin/bts_edit.php';
    }

    public function bts_delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            (new BtsModel($this->db))->delete($id);
        }
        header('Location: ' . $this->base . '/admin');
        exit();
    }

    // --- PROJECTS ---
    public function projects() {
        $projects = (new ProjectModel($this->db))->getAll();
        require_once 'views/admin/projects.php';
    }

    public function project_edit() {
        $id = $_GET['id'] ?? null;
        $model = new ProjectModel($this->db);
        $project = $id ? $model->getById($id) : null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            // Handle Image Upload
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $filename = uniqid() . '.' . $ext;
                move_uploaded_file($_FILES['image']['tmp_name'], 'assets/img/projects/' . $filename);
                $data['image_url'] = 'assets/img/projects/' . $filename;
            } elseif ($project) {
                $data['image_url'] = $project['image_url'];
            }

            if ($model->save($data)) {
                header('Location: ' . $this->base . '/admin/projects');
                exit();
            }
        }
        require_once 'views/admin/project_edit.php';
    }

    public function project_delete() {
        $id = $_GET['id'] ?? null;
        if ($id) (new ProjectModel($this->db))->delete($id);
        header('Location: ' . $this->base . '/admin/projects');
        exit();
    }

    // --- VEILLE ---
    public function veille() {
        $articles = (new VeilleModel($this->db))->getAll();
        require_once 'views/admin/veille.php';
    }

    public function veille_edit() {
        $id = $_GET['id'] ?? null;
        $model = new VeilleModel($this->db);
        $article = $id ? $model->getById($id) : null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $filename = uniqid() . '.' . $ext;
                move_uploaded_file($_FILES['image']['tmp_name'], 'assets/img/veille/' . $filename);
                $data['image_url'] = 'assets/img/veille/' . $filename;
            } elseif ($article) {
                $data['image_url'] = $article['image_url'];
            }

            if ($model->save($data)) {
                header('Location: ' . $this->base . '/admin/veille');
                exit();
            }
        }
        require_once 'views/admin/veille_edit.php';
    }

    public function veille_delete() {
        $id = $_GET['id'] ?? null;
        if ($id) (new VeilleModel($this->db))->delete($id);
        header('Location: ' . $this->base . '/admin/veille');
        exit();
    }

    public function veille_rss() {
        $articles = [];
        $feed_url = $_POST['feed_url'] ?? '';
        $sourceModel = new VeilleSourceModel($this->db);
        $saved_sources = $sourceModel->getAll();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['import'])) {
                // Handle Import
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
                        'opinion' => '', // Default empty for import
                        'published_at' => date('Y-m-d H:i:s', strtotime($_POST['dates'][$index]))
                    ];
                    if ($model->save($item)) $importedCount++;
                }
                header("Location: " . $this->base . "/admin/veille?imported=$importedCount");
                exit();
            } else {
                // Handle Fetch
                if ($feed_url) {
                    $xml = @simplexml_load_file($feed_url);
                    if ($xml) {
                        $source_title = (string)$xml->channel->title;
                        foreach ($xml->channel->item as $item) {
                            $image = '';
                            if (isset($item->enclosure) && strpos((string)$item->enclosure['type'], 'image') !== false) {
                                $image = (string)$item->enclosure['url'];
                            } elseif ($item->children('media', true)->content) {
                                $media = $item->children('media', true);
                                if ($media->content) {
                                    $attributes = $media->content->attributes();
                                    if (isset($attributes['url'])) $image = (string)$attributes['url'];
                                } elseif ($media->thumbnail) {
                                    $attributes = $media->thumbnail->attributes();
                                    if (isset($attributes['url'])) $image = (string)$attributes['url'];
                                }
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
            }
        }
        require_once 'views/admin/veille_rss.php';
    }

    public function veille_sources() {
        $model = new VeilleSourceModel($this->db);
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($model->save($_POST)) {
                header('Location: ' . $this->base . '/admin/veille/sources');
                exit();
            }
        }
        
        $sources = $model->getAll();
        require_once 'views/admin/veille_sources.php';
    }

    public function veille_source_delete() {
        $id = $_GET['id'] ?? null;
        if ($id) (new VeilleSourceModel($this->db))->delete($id);
        header('Location: /testportfolio/admin/veille/sources');
        exit();
    }

    // --- TIMELINE ---
    public function timeline() {
        $items = (new TimelineModel($this->db))->getAll();
        require_once 'views/admin/timeline.php';
    }

    public function timeline_edit() {
        $id = $_GET['id'] ?? null;
        $model = new TimelineModel($this->db);
        $item = $id ? $model->getById($id) : null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($model->save($_POST)) {
                header('Location: ' . $this->base . '/admin/timeline');
                exit();
            }
        }
        require_once 'views/admin/timeline_edit.php';
    }

    public function timeline_delete() {
        $id = $_GET['id'] ?? null;
        if ($id) (new TimelineModel($this->db))->delete($id);
        header('Location: ' . $this->base . '/admin/timeline');
        exit();
    }

    // --- CV ---
    public function cv() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_FILES['cv_pdf']) && $_FILES['cv_pdf']['error'] === 0) {
                move_uploaded_file($_FILES['cv_pdf']['tmp_name'], 'assets/CV_Martial_MAYAMOU.pdf');
            }
            if (isset($_FILES['cv_jpg']) && $_FILES['cv_jpg']['error'] === 0) {
                move_uploaded_file($_FILES['cv_jpg']['tmp_name'], 'assets/CV_Martial_MAYAMOU.jpg');
            }
            $success = "CV mis à jour !";
        }
        require_once 'views/admin/cv.php';
    }

    // --- MESSAGES ---
    public function messages() {
        $messages = (new MessageModel($this->db))->getAll();
        require_once 'views/admin/messages.php';
    }

    public function delete_message() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $query = "DELETE FROM messages WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        }
        header('Location: ' . $this->base . '/admin/messages');
        exit();
    }

    public function reply() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userEmail = $_POST['email'] ?? '';
            $subject = $_POST['subject'] ?? 'Réponse à votre message';
            $message = $_POST['message'] ?? '';

            if (!empty($userEmail) && !empty($message)) {
                $emailService = new EmailService();
                $emailService->sendReply($userEmail, $subject, $message);
                
                header('Location: ' . $this->base . '/admin/messages?replied=1');
                exit();
            }
        }
        header('Location: ' . $this->base . '/admin/messages?error=1');
        exit();
    }
}
