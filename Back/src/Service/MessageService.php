<?php

// Url du dossier de service
namespace App\Service;

// Doctrine Entity ManagerInterface Interface de gestion de données de Doctrine
use App\Entity\Messages;
use Doctrine\ORM\EntityManagerInterface;

/**
 * NotificationService service :
 * Objectifs :
    * Afficher tous les messages
 * Obstacles mineurs :
    * Services Doctrine
    * Manager Doctrine
*/

class MessageService {
    public $messages;

    // Instancie l'objet EntityManagerInterface dans le constructeur
    public function __construct(EntityManagerInterface $entityManager)
    {
        // initialise $this->notifications avec l'entity Messages
        $this->messages = $entityManager->getRepository(Messages::class);
    }

    /**
     * @return array
     * Doit retourner l'objets messages sous format de tableaux
     */

    public function allMessages ($user): array {
        return $this->messages->findByUsers($user);
    }
}