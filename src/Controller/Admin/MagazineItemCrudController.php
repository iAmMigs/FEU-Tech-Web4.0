<?php

namespace App\Controller\Admin;

use App\Entity\MagazineItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Validator\Constraints\File;
use Doctrine\ORM\EntityManagerInterface;

class MagazineItemCrudController extends AbstractCrudController
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {}

    public static function getEntityFqcn(): string
    {
        return MagazineItem::class;
    }

    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            ->addJsFile('/flipbook/js/libs/pdf.min.js')
            ->addJsFile('/js/admin-list-pdf-preview.js');
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Manage Magazines')
            ->setPageTitle('edit', 'Edit Magazine')
            ->setPageTitle('new', 'Add Magazine')
            ->setDefaultSort(['sortOrder' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        /**
         * On the list index, render a thumbnail canvas placeholder.
         * The admin-list-pdf-preview.js script will then locate each
         * canvas element and render the first page of the PDF into it.
         */
        if ($pageName === Crud::PAGE_INDEX) {
            yield TextField::new('pdfPath', 'PDF Preview')
                ->formatValue(function ($value, $entity) {
                    if (empty($value)) {
                        return '<em style="color:#64748b;font-size:12px;">No PDF</em>';
                    }
                    $url = (str_starts_with($value, '/') || str_starts_with($value, 'uploads/') || str_starts_with($value, 'http'))
                        ? '/' . ltrim($value, '/')
                        : '/uploads/magazines/pdf/' . $value;
                    return sprintf(
                        '<canvas class="pdf-thumb-canvas" data-pdf-url="%s" width="80" height="110" style="border-radius:4px;border:1px solid #334155;background:#1e293b;display:block;"></canvas>',
                        htmlspecialchars($url)
                    );
                })
                ->renderAsHtml();
        }

        yield ImageField::new('pdfPath', 'Magazine PDF File')
            ->setBasePath('/uploads/magazines/pdf/')
            ->setUploadDir('public/uploads/magazines/pdf/')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->mimeTypes('.pdf')
            ->setFileConstraints(new File([
                'maxSize' => '40M',
                'mimeTypes' => ['application/pdf'],
                'mimeTypesMessage' => 'Please upload a valid PDF document',
            ]))
            ->setRequired($pageName === Crud::PAGE_NEW)
            ->onlyOnForms();

        yield IntegerField::new('sortOrder', 'Sort Order');
    }

    public function createEntity(string $entityFqcn): object
    {
        $entity = new MagazineItem();

        $maxSort = $this->entityManager->getRepository(MagazineItem::class)
            ->createQueryBuilder('m')
            ->select('MAX(m.sortOrder)')
            ->getQuery()
            ->getSingleScalarResult();

        $entity->setSortOrder($maxSort !== null ? (int)$maxSort + 1 : 1);

        return $entity;
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if ($entityInstance instanceof MagazineItem) {
            $this->handleSortOrder($entityManager, $entityInstance);
        }
        parent::persistEntity($entityManager, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if ($entityInstance instanceof MagazineItem) {
            $this->handleSortOrder($entityManager, $entityInstance);
        }
        parent::updateEntity($entityManager, $entityInstance);
    }

    private function handleSortOrder(EntityManagerInterface $entityManager, MagazineItem $entity): void
    {
        $repo = $entityManager->getRepository(MagazineItem::class);

        $maxSort = $repo->createQueryBuilder('m')
            ->select('MAX(m.sortOrder)')
            ->getQuery()
            ->getSingleScalarResult();
        $maxSort = $maxSort !== null ? (int)$maxSort : 0;

        $desiredSort = $entity->getSortOrder();

        if ($desiredSort === null) {
            $entity->setSortOrder($maxSort + 1);
            return;
        }

        $qb = $repo->createQueryBuilder('m')
            ->where('m.sortOrder = :sort')
            ->setParameter('sort', $desiredSort);

        if ($entity->getId() !== null) {
            $qb->andWhere('m.id != :id')
               ->setParameter('id', $entity->getId());
        }

        $conflictingMags = $qb->getQuery()->getResult();

        if (!empty($conflictingMags)) {
            $nextLastSort = ($entity->getId() === null) ? ($maxSort + 1) : $maxSort;

            foreach ($conflictingMags as $conflictingMag) {
                $conflictingMag->setSortOrder($nextLastSort);
                $entityManager->persist($conflictingMag);
            }
        }
    }
}
