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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
        $article = $options['data'] ?? null;
        $isEdit = $article && $article->getId();

        $builder
        ->add('title')
        ->add('content', null, [
            'rows' => 15
        ])
        ->add('author', UserSelectTextType::class, [
                'disabled' => $isEdit
        ])
            ->add('location', ChoiceType::class, [
                'placeholder' => 'Choose a location',
                'choices' => [
                    'The Solar System' => 'solar_system',
                    'Near a star' => 'star',
                    'Interstellar Space' => 'interstellar_space'
                ],
                'required' => false
            ])
        ;

        if ($options['include_published_at']) {
            $builder->add('publishedAt', DateTimeType::class, [
                'widget' => 'single_text'
            ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Article::class,
            'include_published_at' => false,
        ]);
    }


}