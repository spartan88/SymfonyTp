<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * appProdUrlGenerator
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes = array(
        'oc_platform_home' => array (  0 =>   array (    0 => '_locale',    1 => 'page',    2 => 'nbPerPage',  ),  1 =>   array (    '_controller' => 'OC\\PlatformBundle\\Controller\\AdvertController::indexAction',    'page' => 1,    'nbPerPage' => 1,  ),  2 =>   array (    'page' => '\\d*',    'nbPerPage' => '\\d*',    '_locale' => 'en|fr',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d*',      3 => 'nbPerPage',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d*',      3 => 'page',    ),    2 =>     array (      0 => 'text',      1 => '/platform',    ),    3 =>     array (      0 => 'variable',      1 => '/',      2 => 'en|fr',      3 => '_locale',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'oc_platform_view' => array (  0 =>   array (    0 => '_locale',    1 => 'advert_id',  ),  1 =>   array (    '_controller' => 'OC\\PlatformBundle\\Controller\\AdvertController::viewAction',  ),  2 =>   array (    'advert_id' => '\\d+',    '_locale' => 'en|fr',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'advert_id',    ),    1 =>     array (      0 => 'text',      1 => '/platform/advert',    ),    2 =>     array (      0 => 'variable',      1 => '/',      2 => 'en|fr',      3 => '_locale',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'oc_platform_add' => array (  0 =>   array (    0 => '_locale',  ),  1 =>   array (    '_controller' => 'OC\\PlatformBundle\\Controller\\AdvertController::addAction',  ),  2 =>   array (    '_locale' => 'en|fr',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/platform/add',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => 'en|fr',      3 => '_locale',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'oc_platform_edit' => array (  0 =>   array (    0 => '_locale',    1 => 'id',  ),  1 =>   array (    '_controller' => 'OC\\PlatformBundle\\Controller\\AdvertController::editAction',  ),  2 =>   array (    'id' => '\\d+',    '_locale' => 'en|fr',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/platform/edit',    ),    2 =>     array (      0 => 'variable',      1 => '/',      2 => 'en|fr',      3 => '_locale',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'oc_platform_delete' => array (  0 =>   array (    0 => '_locale',    1 => 'id',  ),  1 =>   array (    '_controller' => 'OC\\PlatformBundle\\Controller\\AdvertController::deleteAction',  ),  2 =>   array (    'id' => '\\d+',    '_locale' => 'en|fr',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '\\d+',      3 => 'id',    ),    1 =>     array (      0 => 'text',      1 => '/platform/delete',    ),    2 =>     array (      0 => 'variable',      1 => '/',      2 => 'en|fr',      3 => '_locale',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'oc_platform_test' => array (  0 =>   array (    0 => '_locale',  ),  1 =>   array (    '_controller' => 'OC\\PlatformBundle\\Controller\\AdvertController::testAction',  ),  2 =>   array (    '_locale' => 'en|fr',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/platform/test',    ),    1 =>     array (      0 => 'variable',      1 => '/',      2 => 'en|fr',      3 => '_locale',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'oc_platform_paramconverter' => array (  0 =>   array (    0 => '_locale',    1 => 'json',  ),  1 =>   array (    '_controller' => 'OC\\PlatformBundle\\Controller\\AdvertController::ParamConverterAction',  ),  2 =>   array (    '_locale' => 'en|fr',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'json',    ),    1 =>     array (      0 => 'text',      1 => '/platform/test',    ),    2 =>     array (      0 => 'variable',      1 => '/',      2 => 'en|fr',      3 => '_locale',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_security_login' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/login',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_security_check' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/login_check',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_security_logout' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/logout',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_profile_show' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/profile/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_profile_edit' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/profile/edit',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_registration_register' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/register/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_registration_check_email' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/register/check-email',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_registration_confirm' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/register/confirm',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_registration_confirmed' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/register/confirmed',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_resetting_request' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/resetting/request',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_resetting_send_email' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  ),  2 =>   array (    '_method' => 'POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/resetting/send-email',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_resetting_check_email' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  ),  2 =>   array (    '_method' => 'GET',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/resetting/check-email',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_resetting_reset' => array (  0 =>   array (    0 => 'token',  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'token',    ),    1 =>     array (      0 => 'text',      1 => '/resetting/reset',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'fos_user_change_password' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  ),  2 =>   array (    '_method' => 'GET|POST',  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/profile/change-password',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
    );

    /**
     * Constructor.
     */
    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
    }

    public function generate($name, $parameters = array(), $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
