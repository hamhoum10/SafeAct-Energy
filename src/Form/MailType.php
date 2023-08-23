<?php

namespace App\Form;

use App\Entity\Mail;
use Karser\Recaptcha3Bundle\Form\Recaptcha3Type;
use Karser\Recaptcha3Bundle\Validator\Constraints\Recaptcha3;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => ['placeholder' => 'Your Name'],
                'required' => true,
            ])
            ->add('email', EmailType::class, [
                'attr' => ['placeholder' => 'Your Email'],
                'required' => true,
            ])
            ->add('subject', TextType::class, [
                'attr' => ['placeholder' => 'Subject'],
                'required' => true,
            ])
            ->add('message', TextareaType::class, [
                'attr' => ['placeholder' => 'Message', 'rows' => 5,],
                'required' => true,
            ])
            ->add('send',SubmitType::class)
            ->add('captcha', Recaptcha3Type::class, [
                'constraints' => new Recaptcha3(),
                'action_name' => 'homepage',

            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Mail::class,
        ]);
    }
}
