-- SQL Script to Create Author Accounts and Sync Artworks
-- Default Password for all: Password123! (Hashed)
-- Password Hash: $2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e

-- 1. Insert/Update Author Users
INSERT INTO users (full_name, email, password, role) VALUES 
('Chisa Evelyn', 'chisa@ski.sch.id', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'author'),
('Odin Madun', 'odin@ski.sch.id', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'author'),
('Viktor Wembu', 'viktor@ski.sch.id', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'author'),
('Daniel Caesar', 'daniel@ski.sch.id', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'author'),
('Faysal Pratama', 'faysal@ski.sch.id', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'author'),
('Depon Vintjai', 'depon@ski.sch.id', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'author'),
('Tang Yau Hoong', 'tang@ski.sch.id', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'author'),
('Marcello Adil', 'marcello@ski.sch.id', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'author'),
('Reyfan Andika', 'reyfan@ski.sch.id', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'author'),
('Felicia Chiao', 'felicia@ski.sch.id', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'author'),
('Nicholas Jo', 'nicholas@ski.sch.id', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'author'),
('Jo Halimawan', 'jo@ski.sch.id', '$2y$10$T2Va3ltk4qAEtCFafU0H2.JyZmpSXeUEu3wfiPdWdB4XEjyw.Rl.e', 'author')
ON DUPLICATE KEY UPDATE full_name = VALUES(full_name), role = 'author';

-- 2. Clear existing artworks (Optional, but safer for full sync)
-- TRUNCATE TABLE artworks;

-- 3. Insert Artworks with correct user mapping
-- Note: We use subqueries to find the correct user_id based on email
INSERT INTO artworks (user_id, title, description, file_path) VALUES 
((SELECT id FROM users WHERE email = 'chisa@ski.sch.id'), 'Claymonster', 'A creative clay monster sculpture.', 'Claymonster.png'),
((SELECT id FROM users WHERE email = 'odin@ski.sch.id'), 'Koi Pond', 'A serene view of a koi pond.', 'Koi-Pond.png'),
((SELECT id FROM users WHERE email = 'viktor@ski.sch.id'), 'Trash Hunt', 'An imaginative urban scene of a trash hunt.', 'Trash-Hunt.png'),
((SELECT id FROM users WHERE email = 'daniel@ski.sch.id'), 'Cherish the moment', 'A beautiful capture of a cherished moment.', 'Cherish-the-moment.png'),
((SELECT id FROM users WHERE email = 'faysal@ski.sch.id'), 'Ayo punya cita-cita', 'Inspirational art about having dreams.', 'Ayo-punya-cita-cita.png'),
((SELECT id FROM users WHERE email = 'depon@ski.sch.id'), 'Billie Eilish', 'A portrait of the famous singer.', 'Billie-Eilish.png'),
((SELECT id FROM users WHERE email = 'tang@ski.sch.id'), 'A positive spin on n...', 'Creative light bulb art.', 'A-positive-spin-on.png'),
((SELECT id FROM users WHERE email = 'marcello@ski.sch.id'), 'Menggapai Indonesia', 'Digital illustration about Indonesian dreams.', 'Menggapai-Indonesia.png'),
((SELECT id FROM users WHERE email = 'reyfan@ski.sch.id'), 'Vibrant River', 'A colorful and vibrant river landscape.', 'Vibrant-River.png'),
((SELECT id FROM users WHERE email = 'felicia@ski.sch.id'), 'Anonymous Protagonis', 'Unique character art by Felicia Chiao.', 'Anonymous-Protagonis.png'),
((SELECT id FROM users WHERE email = 'nicholas@ski.sch.id'), 'A Chill Doomsday', 'Atmospheric scene in a vehicle.', 'A-Chill-Doomsday.png'),
((SELECT id FROM users WHERE email = 'jo@ski.sch.id'), 'Melody in Guitar', 'Expressive sketch of a person with a guitar.', 'Melody-in-Guitar.png');
