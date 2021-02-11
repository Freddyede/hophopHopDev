<?php

// Url du dossier de service
namespace App\Service;

// Entité de Message
use App\Entity\Message;
// Doctrine Entity ManagerInterface Interface de gestion de données de Doctrine
use Doctrine\ORM\EntityManagerInterface;

/**
 * MessageService :
 * Objectifs :
    * Afficher tous les messages
 * Obstacles mineurs :
    * Services Doctrine
    * Manager Doctrine
*/

class MessageService {
    public $messages;
    private $em;
    // Instancie l'objet EntityManagerInterface dans le constructeur
    public function __construct(EntityManagerInterface $entityManager)
    {
        // initialise $this->em avec l'entityManager
        $this->em = $entityManager;
        // initialise $this->notifications avec l'entity Messages
        $this->messages = $entityManager->getRepository(Message::class);
    }

    /**
     * @return array
     * @param id
     * Doit retourner l'objets messages sous format de tableaux
     */

    public function allMessages ($id): array {
        return $this->messages->findAlls($id);
    }

    /**
     * @return array
     * @param id
     * Doit retourner un objet d'un seul message
    */
    public function message($id){
        return $this->messages->find($id);
    }

    /**
     * @return object
     * @param id
    */
    public function delete($id){
        $this->em->remove($id);
        return $this->em->flush();
    }
}