<?php


namespace App\Form\Model;

use Symfony\Component\Validator\Constraints;
use App\Validator\UniqueUser;


class UserRegistrationFormModel
{

    /**
     * @Constraints\NotBlank(message="Please enter an email.")
     * @Constraints\Email(message="Not a valid email")
     * @UniqueUser()
     */
    public $email;

    /**
     * @Constraints\NotBlank(message="Choose a password!.")
     * @Constraints\Length(min=5, minMessage="Use a more than 5 characters")
     */
    public $plainPassword;

    /**
     * @Constraints\IsTrue(message="You must accept the terms.")
     */
    public $agreeTerms;

}