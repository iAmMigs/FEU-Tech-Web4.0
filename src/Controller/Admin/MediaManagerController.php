<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

#[Route('/admin/media')]
class MediaManagerController extends AbstractController
{
    #[Route('/list', name: 'admin_media_list', methods: ['GET'])]
    public function listMedia(Request $request): JsonResponse
    {
        $module = $request->query->get('module', 'general');
        // Map modules to folders
        $folderMap = [
            'Admissions' => 'admissions',
            'General' => 'general',
            'Student Support' => 'student_support',
        ];
        
        $folder = $folderMap[$module] ?? 'general';
        $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/' . $folder;

        if (!is_dir($uploadDir)) {
            return new JsonResponse([]);
        }

        $finder = new Finder();
        $finder->files()->in($uploadDir)->name('/\.(jpg|jpeg|png|gif|webp|svg)$/i')->sortByModifiedTime()->reverseSorting();

        $images = [];
        foreach ($finder as $file) {
            $images[] = [
                'filename' => $file->getFilename(),
                'url' => '/uploads/' . $folder . '/' . $file->getFilename(),
                'size' => round($file->getSize() / 1024, 2) . ' KB',
                'date' => date('Y-m-d H:i', $file->getMTime())
            ];
        }

        return new JsonResponse($images);
    }

    #[Route('/upload', name: 'admin_media_upload', methods: ['POST'])]
    public function uploadMedia(Request $request): JsonResponse
    {
        $file = $request->files->get('file');
        $module = $request->request->get('module', 'general');

        if (!$file) {
            return new JsonResponse(['error' => 'No file uploaded'], 400);
        }

        $folderMap = [
            'Admissions' => 'admissions',
            'General' => 'general',
            'Student Support' => 'student_support',
        ];
        
        $folder = $folderMap[$module] ?? 'general';
        $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/' . $folder;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Generate a unique name or keep original (maybe clean it)
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
        $newFilename = $safeFilename . '-' . uniqid() . '.' . $file->guessExtension();

        try {
            $file->move($uploadDir, $newFilename);
        } catch (FileException $e) {
            return new JsonResponse(['error' => 'Could not save file'], 500);
        }

        return new JsonResponse([
            'success' => true,
            'filename' => $newFilename,
            'url' => '/uploads/' . $folder . '/' . $newFilename,
        ]);
    }
}
