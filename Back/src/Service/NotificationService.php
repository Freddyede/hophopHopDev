<?php

// Url du dossier de service
namespace App\Service;

// Doctrine Entity ManagerInterface Interface de gestion de données de Doctrine
use App\Entity\Notification;
use Doctrine\ORM\EntityManagerInterface;

/**
 * NotificationService service :
 * Objectifs :
    * Afficher toutes les notifications
 * Obstacles mineurs :
    * Services Doctrine
    * Manager Doctrine
*/

class NotificationService {
    private $notifications;

    // Instancie l'objet EntityManagerInterface dans le constructeur
    public function __construct(EntityManagerInterface $entityManager)
    {
        // initialise $this->notifications avec l'entity Notifications
        $this->notifications = $entityManager->getRepository(Notification::class);
    }

    /**
     * @return array
     * Doit retourner l'objets notifications sous format de tableaux
     */

    public function allNotifications (): array {
        return $this->notifications->findAll();
    }
}