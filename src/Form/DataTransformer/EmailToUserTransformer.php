<?php


namespace App\Form\DataTransformer;


use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class EmailToUserTransformer implements DataTransformerInterface
{
    /**
     * @var UserRepository
     */
    private $userRepo;
    /**
     * @var callable
     */
    private $finderCallback;

    public function __construct(UserRepository $userRepo, callable $finderCallback)
    {
        $this->userRepo = $userRepo;
        $this->finderCallback = $finderCallback;
    }


    public function transform($value)
    {
        if (!$value) {
            return '';
        }

        if (!($value instanceof User)) {
            throw new \LogicException('It should be a user');
        }

        return $value->getEmail();
    }

    public function reverseTransform($value)
    {

        if (!$value) {
            return;
        }

        $callback = $this->finderCallback;
        $user = $callback($this->userRepo, $value);

        if (!$user) {
            throw new TransformationFailedException(sprintf(
                'No user found with %s',
                $value
            ));
        }

        return $user;
    }

}