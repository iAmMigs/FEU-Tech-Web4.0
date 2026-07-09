<?php

namespace App\Controller\Admin;

use App\Entity\TambayanVideo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;

class TambayanVideoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TambayanVideo::class;
    }

    public function configureAssets(Assets $assets): Assets
    {
        return $assets
            ->addJsFile('js/admin_cms.js');
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Manage TAMbayan Videos')
            ->setPageTitle('edit', 'Edit TAMbayan Video')
            ->setPageTitle('new', 'Add New TAMbayan Video')
            ->setDefaultSort(['sortOrder' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('youtubeId', 'YouTube Video ID (11 characters, e.g. d0a2jThLgx4)');
        yield TextField::new('title', 'Video Title');
        yield TextField::new('linkUrl', 'Full YouTube Watch URL');
        yield IntegerField::new('sortOrder', 'Sort Order');
    }
}
