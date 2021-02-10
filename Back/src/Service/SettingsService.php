<?php

namespace App\Service;

// Entité de Settings
use App\Entity\Settings;
// Doctrine Entity ManagerInterface Interface de gestion de données de Doctrine
use Doctrine\ORM\EntityManagerInterface;


/**
 * SettingsService :
 * Objectifs :
    * Retourner tous les paramètres aux controllers
 * Obstacles mineurs :
    * Services Doctrine
    * Manager Doctrine
*/
class SettingsService {
    public $settings;

    // Instancie l'objet EntityManagerInterface dans le constructeur
    public function __construct(EntityManagerInterface $entityManager)
    {
        // initialise $this->notifications avec l'entity Messages
        $this->settings = $entityManager->getRepository(Settings::class);
    }

    /**
     * @return array
     * @param email
     * Doit retourner l'objets messages sous format de tableaux
     */
    public function returnSettings($email) {
        return $this->settings->findOneBy(['user'=>$email]);
    }
}