-- Migration: Add display_order to projects table
ALTER TABLE projects ADD COLUMN IF NOT EXISTS display_order INT DEFAULT 0 AFTER cover_image;

-- Initialize display_order based on existing creation order
SET @row_number = 0;
UPDATE projects
SET display_order = (@row_number := @row_number + 1)
ORDER BY created_at ASC;
