<?php
namespace App\Controllers;

require_once __DIR__ . '/../models/Art_model.php';

class ArtController {

    public function gallery()
    {
        $categoryId = $_GET['category'] ?? null;
        $artModel = new \Art_model();
        $artworks = $artModel->getAllArtworks($categoryId);
        $categories = $artModel->getCategories();
        require_once __DIR__ . '/../views/landing/gallery.php';
    }

    public function uploadArt()
    {
        // Pastikan user sudah login dan punya role author/admin
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'] ?? '';
            $description = $_POST['description'] ?? '';
            $category_id = $_POST['category_id'] !== '' ? $_POST['category_id'] : null;
            $user_id = $_SESSION['user_id'];

            // Handle File Upload
            if (isset($_FILES['art_image']) && $_FILES['art_image']['error'] === 0) {
                $file = $_FILES['art_image'];
                $fileName = $file['name'];
                $fileTmpName = $file['tmp_name'];
                
                // Buat nama file unik untuk menghindari duplikasi
                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));
                $allowed = ['jpg', 'jpeg', 'png'];

                if (in_array($fileActualExt, $allowed)) {
                    $newFileName = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = __DIR__ . '/../../public/img/gallery/' . $newFileName;

                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                        // Simpan ke Database
                        $artModel = new \Art_model();
                        $data = [
                            'user_id' => $user_id,
                            'category_id' => $category_id,
                            'title' => $title,
                            'description' => $description,
                            'file_path' => $newFileName
                        ];

                        if ($artModel->addArtwork($data)) {
                            header('Location: /gallery');
                            exit;
                        } else {
                            die("Gagal menyimpan ke database.");
                        }
                    } else {
                        die("Gagal mengupload file.");
                    }
                } else {
                    die("Format file tidak didukung (Hanya JPG, JPEG, PNG).");
                }
            } else {
                die("Pilih file gambar terlebih dahulu.");
            }
        }
    }

    public function detail($id)
    {
        $artModel = new \Art_model();
        $art = $artModel->getArtworkById($id);

        if (!$art) {
            die("Karya tidak ditemukan!");
        }

        $categories = $artModel->getCategories();
        $otherArtworks = $artModel->getOtherArtworks($id, 4);
        $comments = $artModel->getCommentsByArtworkId($id);
        require_once __DIR__ . '/../views/landing/detail.php';
    }

    public function postComment($artworkId)
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $commentText = $_POST['comment_text'] ?? '';
            if (!empty(trim($commentText))) {
                $artModel = new \Art_model();
                $data = [
                    'artwork_id' => $artworkId,
                    'user_id' => $_SESSION['user_id'],
                    'comment_text' => $commentText
                ];
                $artModel->addComment($data);
            }
            header('Location: /art/' . $artworkId);
            exit;
        }
    }

    public function updateArt($id)
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $artModel = new \Art_model();
        $art = $artModel->getArtworkById($id);

        // AUTHORIZATION: Only owner or admin can update
        if (!$art || ($art['user_id'] != $_SESSION['user_id'] && $_SESSION['user_role'] !== 'admin')) {
            die("Unauthorized! Anda bukan pemilik karya ini.");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'category_id' => $_POST['category_id'] !== '' ? $_POST['category_id'] : null
            ];

            // Handle New File Upload (Optional)
            if (isset($_FILES['art_image']) && $_FILES['art_image']['error'] === 0) {
                $file = $_FILES['art_image'];
                $fileName = $file['name'];
                $fileTmpName = $file['tmp_name'];
                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));
                $allowed = ['jpg', 'jpeg', 'png'];

                if (in_array($fileActualExt, $allowed)) {
                    $newFileName = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = __DIR__ . '/../../public/img/gallery/' . $newFileName;

                    if (move_uploaded_file($fileTmpName, $fileDestination)) {
                        // Delete old file if exists
                        $oldFilePath = __DIR__ . '/../../public/img/gallery/' . $art['file_path'];
                        if (file_exists($oldFilePath)) {
                            unlink($oldFilePath);
                        }
                        $data['file_path'] = $newFileName;
                    }
                }
            }

            if ($artModel->updateArtwork($id, $data)) {
                header('Location: /art/' . $id);
                exit;
            }
        }
    }

    public function deleteArt($id)
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit;
        }

        $artModel = new \Art_model();
        $art = $artModel->getArtworkById($id);

        // AUTHORIZATION: Only owner or admin can delete
        if (!$art || ($art['user_id'] != $_SESSION['user_id'] && $_SESSION['user_role'] !== 'admin')) {
            die("Unauthorized! Anda bukan pemilik karya ini.");
        }

        // Delete File
        $filePath = __DIR__ . '/../../public/img/gallery/' . $art['file_path'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        if ($artModel->deleteArtwork($id)) {
            header('Location: /gallery');
            exit;
        }
    }

    public function index()
    {
        require_once __DIR__ . '/../views/landing/home.php';
    }

    public function about()
    {
        require_once __DIR__ . '/../models/Art_model.php';
        $artModel = new \Art_model();
        $artworks = array_slice($artModel->getAllArtworks(), 0, 4);
        require_once __DIR__ . '/../views/landing/about.php';
    }
    
    public function contact()
    {
        require_once __DIR__ . '/../views/landing/contact.php';
    }
}
