<?php
/**
 * Created by PhpStorm.
 * User: nmoller
 * Date: 29/03/19
 * Time: 7:30 AM
 */

namespace App\Form;


use App\Repository\UserRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use App\Entity\Article;
use App\Entity\User;


class ArticleFormType extends AbstractType
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('title')
        ->add('content', null, [
            'rows' => 15
        ])
        ->add('publishedAt', DateTimeType::class, [
            'widget' => 'single_text'
        ])
            ->add('author', UserSelectTextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Article::class
        ]);
    }


}