<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Set your fisrtname :',
                'attr' => [
                    'placeholder' => 'Martin',
                    'class' => 'form-control mb-3',
                ],
                'constraints' => [
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Your firstname must be at least {{ limit }} characters long',
                        'max' => 25,
                        'maxMessage' => 'Your firstname cannot be longer than {{ limit }} characters',
                    ]),
                    new NotBlank([
                        'message' => 'Please enter your firstname'
                    ])
                ],
                    ])
                
            ->add('lastname', TextType::class, [
                'label' => 'Set your lastname :',
                'attr' => [
                    'placeholder' => 'Dupont',
                    'class' => 'form-control mb-3',
                ],
                'constraints' => [
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Your lastname must be at least {{ limit }} characters long',
                        'max' => 25,
                        'maxMessage' => 'Your lastname cannot be longer than {{ limit }} characters',
                    ]),
                    new NotBlank([
                        'message' => 'Please enter your firstname'
                    ])
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'What is your email ?',
                'attr' => [
                    'placeholder' => 'martin@mail.com',
                    'class' => 'form-control mb-3',
                ],
                'constraints' => [
                    new Email([
                        'message' => 'The email "{{ value }}" is not a valid email.',
                    ]),
                    new NotBlank([
                        'message' => 'Please enter your email'
                    ])
                ]
            ])
            ->add('subject', ChoiceType::class, [
                'label' => 'About what is your message ?',
                'choices'  => [
                    'General' => 'general case',
                    'Refund' => 'refund',
                    'Claim' => 'claim',
                    'Technical issue' => 'technical issue',
                    'Job/Hiring' => 'job',
                    'Other' => 'other',
                ],
                'attr' => [
                    'placeholder' => 'Martin Martine',
                    'class' => 'form-control mb-3',
                ],
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Your message :',
                'attr' => [
                    'placeholder' => 'Your message',
                    'class' => 'form-control mb-3',
                    'rows' => '5',
                ],
                'constraints' => [
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Your message must be at least {{ limit }} characters long',
                        ]),
                    new NotBlank([
                        'message' => 'Please write your message'
                    ])
                ],
            ])
            ->add('file', FileType::class, [
                'label' => 'You can add a file :',
                'required' => false,
                'attr' => [
                    'class' => 'form-control mb-3',
                ],
                
            ])
            ->add('Send', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
