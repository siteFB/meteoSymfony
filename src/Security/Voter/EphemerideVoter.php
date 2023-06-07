<?php

namespace App\Security\Voter;

use App\Entity\Ephemeride;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class EphemerideVoter extends Voter
{
    const EDIT = 'EPHEMERIDE_EDIT';
    const DELETE = 'EPHEMERIDE_DELETE';

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports(string $attribute, $ephemeride): bool  // paramètres "const" et objet modifiables ou supprimables? et  sont ils exactes?
    {

        // return in_array($attribute, [self::EDIT, self::DELETE]) && $product instanceof Ephemeride;  OU: syntaxe longue:
        if (!in_array($attribute, [self::EDIT, self::DELETE])) {
            return false;
        }

        if (!$ephemeride instanceof Ephemeride) {
            return false;
        }
        return true;
    }

    protected function voteOnAttribute(string $attribute, $ephemeride, TokenInterface $token): bool
    {
        $user = $token->getUser();  // récupérer l'user avec le token
        if (!$user instanceof UserInterface)  // user non connecté
        {
            return false;
        }

        if ($this->security->isGranted('ROLE_ADMIN'))  // user est l'admin ==> on valide
        {
            return true;
        }
        /*
        switch($attribute)   // user n'est pas l'admin: attribution des actions selon le statut
        {
            case self::EDIT:
                return $this->canEdit();
                break;
            case self::DELETE: 
                return $this->canDelete();
                break;  
        }
        */
    }
        /*
        private function canEdit(){
            return $this->security->isGranted('ROLE_PRODUCT_ADMIN');
        }
        private function canDelete(){
            return $this->security->isGranted('ROLE_PRODUCT_ADMIN');
        }
        */
}
