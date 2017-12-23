<?php

namespace Ecommerce\EcommerceBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Ecommerce\EcommerceBundle\Entity\Categories;
use Ecommerce\EcommerceBundle\Entity\Produits;
use Ecommerce\EcommerceBundle\Services\FileUploader;
use Proxies\__CG__\Ecommerce\EcommerceBundle\Entity\Media;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PictureUploadListener
{
    private $uploader;
    private $targetDir;

    public function __construct(FileUploader $uploader, $targetDir)
    {
        $this->uploader = $uploader;
        $this->targetDir = $targetDir;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->updateFile($entity);
    }

    private function updateFile($entity){
        if (!$entity instanceof Media) {
            return;
        }

        if($entity instanceof Media){
            $file = $entity->getFile();

            if ($file instanceof UploadedFile) {

                if($entity->getOldFile())
                    unlink($this->targetDir . '/' . $entity->getOldFile());

                $fileName = $this->uploader->upload($file);
                $entity->setFile($fileName);
            }
        }
    }

    private function uploadFile($entity)
    {
        if ((!$entity instanceof Produits) && (!$entity instanceof Categories)) {
            return;
        }

        if(($entity instanceof Produits) || ($entity instanceof Categories)){

            $file = $entity->getImage()->getFile();

            if ($file instanceof UploadedFile) {
                $fileName = $this->uploader->upload($file);
                $entity->getImage()->setFile($fileName);
            }
        }
    }


    public function preRemove(LifecycleEventArgs $args){
        $entity = $args->getEntity();

        dump($entity);

        if (!$entity instanceof Media) {
            return;
        }

        if($entity instanceof Media){
            unlink($this->targetDir . '/' . $entity->getFile());
        }
    }
}