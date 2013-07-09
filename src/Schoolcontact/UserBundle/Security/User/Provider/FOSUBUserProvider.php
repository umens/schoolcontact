<?php
namespace Schoolcontact\UserBundle\Security\User\Provider;
 
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use HWI\Bundle\OAuthBundle\Security\Core\User\FOSUBUserProvider as BaseClass;
 
class FOSUBUserProvider extends BaseClass
{
 
    /**
     * {@inheritDoc}
     */
    public function connect($user, UserResponseInterface $response)
    {
        $property = $this->getProperty($response);
        $username = $response->getUsername();
 
        //on connect - get the access token and the user ID
        $service = $response->getResourceOwner()->getName();
 
        $setter = 'set'.ucfirst($service);
        $setter_id = $setter.'Id';
        $setter_token = $setter.'AccessToken';
 
        //we "disconnect" previously connected users
        if (null !== $previousUser = $this->userManager->findUserBy(array('username' => $username))) {
            $previousUser->$setter_id(null);
            $previousUser->$setter_token(null);
            $this->userManager->updateUser($previousUser);
        }
 
        //we connect current user
        $user->$setter_id($username);
        $user->$setter_token($response->getAccessToken());
 
        $this->userManager->updateUser($user);
    }
 
    /**
     * {@inheritdoc}
     */
    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        $username = $response->getUsername();
        $user = $this->userManager->findUserBy(array('username' => $response->getRealName()));
        //when the user is registrating
        if (null === $user) {
            $service = $response->getResourceOwner()->getName();
            $setter = 'set'.ucfirst($service);
            $setter_id = $setter.'Id';
            $setter_token = $setter.'AccessToken';
            // create new user here
            $user = $this->userManager->createUser();
            $user->$setter_id($username);
            $user->$setter_token($response->getAccessToken());
            //I have set all requested data with the user's username
            //modify here with relevant data

            switch ($service) {
                case 'facebook':
                    $data = $response->getResponse();
                    $user->setUsername($response->getRealName());
                    $user->setEmail($response->getEmail());
                    $user->setPicture($response->getProfilePicture());
                    $user->setFirstname($data['first_name']);
                    $user->setLastname($data['last_name']);
                    $user->setGender($data['gender']);
                    $user->setLocation($data['location']['name']);     
                    $user->setBirthday($data['birthday']);  
                    break;

                case 'twitter':
                    $data = $response->getResponse();
                    $user->setUsername($response->getRealName());
                    $user->setEmail($username);
                    $user->setPicture($response->getProfilePicture());
                    $name = split(' ', $response->getRealName());
                    $user->setFirstname($name[0]);
                    $user->setLastname($name[1]);
                    $user->setLocation($data['location']);
                    break;
                    
                default:
                    // do something smart !
                    $user->setUsername($username);
                    $user->setEmail($username);
                    break;
            }

            $user->setPassword($username);
            $user->setEnabled(true);
            $this->userManager->updateUser($user);
            return $user;
        }
 
        //if user exists - go with the HWIOAuth way
       
        //$user = parent::loadUserByOAuthUserResponse($response);
 
        $service = $response->getResourceOwner()->getName();
        $setter = 'set'.ucfirst($service);
        $setter_id = $setter.'Id';
        $setter_token = $setter.'AccessToken';
        // update user here
        
        //I have set all requested data with the user's username
        //modify here with relevant data

        switch ($service) {
            case 'facebook':
                $fb = $user->getFacebookId();
                if(!isset($fb) OR $fb == ''){
                    $data = $response->getResponse();
                    $user->setUsername($response->getRealName());
                    $user->setEmail($response->getEmail());
                    $user->setPicture($response->getProfilePicture());
                    $user->setFirstname($data['first_name']);
                    $user->setLastname($data['last_name']);
                    $user->setGender($data['gender']);
                    $user->setLocation($data['location']['name']);     
                    $user->setBirthday($data['birthday']);  
                }
                break;

            case 'twitter':
                $twitter = $user->getTwitterId();
                if(!isset($twitter) OR $twitter == ''){
                    $data = $response->getResponse();
                    $user->setUsername($response->getRealName());
                    $user->setEmail($username);
                    $user->setPicture($response->getProfilePicture());
                    $name = split(' ', $response->getRealName());
                    $user->setFirstname($name[0]);
                    $user->setLastname($name[1]);
                    $user->setLocation($data['location']);
                }
                break;
                
            default:
                // do something smart !
                
                break;
        }

        $user->$setter_token($response->getAccessToken());

        $this->userManager->updateUser($user);
 
        return $user;
    }
 
}