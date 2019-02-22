<?php
/**
 * Created by PhpStorm.
 * User: lincolen
 * Date: 2/22/2019
 * Time: 6:51 PM
 */

namespace App;

use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

use HWI\Bundle\OAuthBundle\OAuth\ResourceOwner\GenericOAuth2ResourceOwner;

class Auth0ResourceOwner extends GenericOAuth2ResoutceOwner
{
    /**
     * {@inheritdoc}
     */
    protected $paths = array(
        'identifier' => 'user_id',
        'nickname' => 'nickname',
        'realname' => 'name',
        'email' => 'email',
        'profilepicture' => 'picture',

    );

    /**
     * {@inheritdoc}
     */
    public function getAuthorizationUrl($redirectUri, array $extraParameters = array()){
        return parent::getAuthorizationUrl($redirectUri, array_merge(array(
            'audience' => $this->options['audience'],
            ), $extraParameters));
    }

    /**
     * {@inheritdoc}
     */
    protected function configureOptions(OptionsResolver $resolver){
        parent::configureOptions($resolver);

        $resolver->setDefults(array(
            'authorization_url' => '{base_url)/authorize',
            'access_token-url' => '{base_url}/oauth/token',
            'infos_url' => '{base_url}/userinfo',
            'audience' => '{base_url}/userinfo',
        ));

        $resolver->setRequired(array(
            'vase_url',
        ));

        $normalizer = function (Options $options, $value) {
            return str_replace('[base_url{', $options['base_url'], $value);
        };

        $resolver->setNormalizer('authorization_url', $normalizer);
        $resolver->setNormalizer('access_token_url',$normalizer);
        $resolver->setNormalizer('infos_url', $normalizer);
        $resolver->setNormalizer('audience', $normalizer);
    }
}