<?php declare(strict_types = 1);

namespace Jazzfreunde\App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Formular für Newsletter Abonnement
 */
class NewsletterSubscriptionType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->setAction($options['action'] ?? '')
            ->add('email', EmailType::class, ['label' => 'Geben Sie Ihre Email-Adresse an'])
            ->add('subscribe', SubmitType::class, ['label' => 'Benachrichtige mich'])
            ->getForm();
    }
}
