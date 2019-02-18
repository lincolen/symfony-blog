<?php
/**
 * Created by PhpStorm.
 * User: lincolen
 * Date: 2/18/2019
 * Time: 5:22 PM
 */

namespace App\DataFixtures\ORM;

use App\Entity\Author;
use App\Entity\BlogPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\persistence\ObjectManager;

class Fixtures extends Fixture{
    public function load(ObjectManager $manager){
        $author = new Author();
        $author
            ->setName('Eliram Barak')
            ->setTitle('developer')
            ->setUsername('auth0-username')
            ->setCompany('Nagoya University')
            ->setShortBio('this is my life now')
            ->setPhone('000314134')
            ->setFacebook('elirambarak')
            ->setTwitter('gglincolen')
            ->setGithub('lincolen');

        $manager->persist($author);

        $blogPost = new BlogPost();
        $blogPost
            ->setTitle('your first blog post example')
            ->setSlug('first-post')
            ->setDescription('this is the first blog post')
            ->setAuthor($author)
            ->setBody('there once was a man in kansas');
        $manager->persist($blogPost);
        $manager->flush();

    }
}