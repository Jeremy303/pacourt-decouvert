<?php

namespace App\Security;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\PassportInterface;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;

class LoginFormAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app_login';

    private UrlGeneratorInterface $urlGenerator;
    private $entityManager;
    private $security;

    public function __construct(UrlGeneratorInterface $urlGenerator, EntityManagerInterface $entityManager, Security $security)
    {
        $this->urlGenerator = $urlGenerator;
        $this->entityManager = $entityManager;
        $this->security = $security;
    }

    public function authenticate(Request $request): PassportInterface
    {
        $email = $request->request->get('email', '');

        $request->getSession()->set(Security::LAST_USERNAME, $email);

        return new Passport(
            new UserBadge($email),
            new PasswordCredentials($request->request->get('password', '')),
            [
                new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
            ]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {

        //block pour check au login si l'utilisateur se connecte sur son compte la premiere fois, il passe le status a 3
        $repo = $this->entityManager->getRepository(User::class);
        /** @var User $user */
        $user = $this->security->getUser();
        if (!empty($user)) {
            $userId = $user->getId();
        }
        $user = $repo->find($userId);
        if ($user->getStatus() == 2) {
            $user->setStatus(3);
            $this->entityManager->persist($user);
            $this->entityManager->flush();
        }

        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }

        // For example:
        $user = $token->getUser();
        if (in_array('ROLE_ADMIN', $user->getRoles())) {
            return new RedirectResponse($this->urlGenerator->generate('accueil'));
        // } else if (in_array('ROLE_PRESCRIPTEUR', $user->getRoles())) {
        //     return new RedirectResponse($this->urlGenerator->generate('prescripteur'));
        // } else if (in_array('ROLE_ORGANISATEUR', $user->getRoles())) {
        //     return new RedirectResponse($this->urlGenerator->generate('organisateur'));
        } else {
            return new RedirectResponse($this->urlGenerator->generate('accueil'));
        }
        //return new RedirectResponse($this->urlGenerator->generate('accueil'));
        //throw new \Exception('TODO: provide a valid redirect inside '.__FILE__);
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}
