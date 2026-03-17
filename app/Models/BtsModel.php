<?php
namespace App\Models;

use PDO;

class BtsModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getCompetences() {
        if ($this->conn === null) return [];
        $query = "SELECT * FROM bts_competences ORDER BY display_order ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRealisations() {
        if ($this->conn === null) return [];
        
        $query = "SELECT r.*, GROUP_CONCAT(m.competence_id) as competence_ids 
                  FROM bts_realisations r
                  LEFT JOIN bts_matrix m ON r.id = m.realisation_id
                  GROUP BY r.id
                  ORDER BY r.type ASC, r.display_order ASC";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $realisations = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Convert string competence_ids to array
        foreach ($realisations as &$r) {
            $r['competence_ids'] = $r['competence_ids'] ? explode(',', $r['competence_ids']) : [];
        }
        
        return $realisations;
    }

    public function getById($id) {
        if ($this->conn === null) return null;
        $query = "SELECT r.*, GROUP_CONCAT(m.competence_id) as competence_ids 
                  FROM bts_realisations r
                  LEFT JOIN bts_matrix m ON r.id = m.realisation_id
                  WHERE r.id = :id
                  GROUP BY r.id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $real = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($real) {
            $real['competence_ids'] = $real['competence_ids'] ? explode(',', $real['competence_ids']) : [];
        }
        return $real;
    }

    public function save($data, $competence_ids = []) {
        if ($this->conn === null) return false;

        if (isset($data['id']) && !empty($data['id'])) {
            // Update
            $query = "UPDATE bts_realisations SET title = :title, periode = :periode, type = :type, display_order = :display_order, project_id = :project_id WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $data['id']);
        } else {
            // Create
            $query = "INSERT INTO bts_realisations (title, periode, type, display_order, project_id) VALUES (:title, :periode, :type, :display_order, :project_id)";
            $stmt = $this->conn->prepare($query);
        }

        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':periode', $data['periode']);
        $stmt->bindParam(':type', $data['type']);
        $stmt->bindParam(':display_order', $data['display_order']);
        $stmt->bindValue(':project_id', !empty($data['project_id']) ? $data['project_id'] : null, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $id = isset($data['id']) && !empty($data['id']) ? $data['id'] : $this->conn->lastInsertId();
            return $this->syncMatrix($id, $competence_ids);
        }
        return false;
    }

    public function delete($id) {
        if ($this->conn === null) return false;
        $query = "DELETE FROM bts_realisations WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    private function syncMatrix($realisation_id, $competence_ids) {
        // Clear existing
        $query = "DELETE FROM bts_matrix WHERE realisation_id = :realisation_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':realisation_id', $realisation_id);
        $stmt->execute();

        // Insert new
        if (!empty($competence_ids)) {
            $query = "INSERT INTO bts_matrix (realisation_id, competence_id) VALUES (:realisation_id, :competence_id)";
            $stmt = $this->conn->prepare($query);
            foreach ($competence_ids as $comp_id) {
                $stmt->bindParam(':realisation_id', $realisation_id);
                $stmt->bindParam(':competence_id', $comp_id);
                $stmt->execute();
            }
        }
        return true;
    }
}
