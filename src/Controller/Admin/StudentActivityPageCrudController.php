<?php

namespace App\Controller\Admin;

use App\Entity\Page;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;

class StudentActivityPageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Page::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Student Activities Pages')
            ->setPageTitle('edit', 'Edit Student Activities Page')
            ->setPageTitle('new', 'Create Student Activities Page');
    }

    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        $qb = parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters);
        $qb->andWhere('entity.category = :category')->setParameter('category', 'Student Activities');
        return $qb;
    }

    public function createEntity(string $entityFqcn): object
    {
        $page = new Page();
        $page->setCategory('Student Activities');
        return $page;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('pageName', 'Page Name');
        yield TextField::new('slug', 'Slug');
        
        yield TextField::new('metaTitle', 'SEO Meta Title')->hideOnIndex();
        yield TextareaField::new('metaDescription', 'SEO Meta Description')->hideOnIndex();
        yield TextField::new('metaKeywords', 'SEO Meta Keywords')->hideOnIndex();
    }
}
