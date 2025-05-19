<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Form;

use Override;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Formular für Newsletter Abonnement
 * @extends AbstractType<array>
 */
final class NewsletterSubscriptionType extends AbstractType
{
    /**
     * @inheritDoc
     */
    #[Override]
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->setAction((string) ($options['action'] ?? ''))
            ->add('email', EmailType::class, ['label' => 'Geben Sie Ihre Email-Adresse an'])
            ->add('subscribe', SubmitType::class, ['label' => 'Benachrichtige mich'])
            ->getForm();
    }

    /**
     * @inheritDoc
     */
    #[Override]
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // the name of the hidden HTML field that stores the token
            'csrf_field_name' => '_csrf_token',
        ]);
    }
}
