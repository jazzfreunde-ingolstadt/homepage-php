<?php declare(strict_types = 1);

namespace Jazzfreunde\App\DependencyInjection;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

use function Jazzfreunde\Function\Assertion\isAssociativeArray;

/**
 * Sammlung von Formularen für die Übergabe an ein Template.
 */
final class FormCollection
{
    private array $forms = [];

    /**
     * Initiiert neue Sammlung
     *
     * @param FormInterface ...$forms
     * @throws \LogicException
     */
    public function __construct(FormInterface ...$forms)
    {
        if (!isAssociativeArray($forms)) {
            throw new \LogicException("FormCollection erwartet ein assoziatives Array.");
        }

        $this->forms = array_map(fn(FormInterface $form): FormView => $form->createView(), $forms);
    }

    /**
     * Holt ein Formular anhand des Bezeichners.
     *
     * @param string $method
     * @return FormInterface
     * @throws \LogicException
     */
    public function __call(string $method, array $arguments): FormView
    {
        $formName = strtolower(preg_replace('/^get/i', '', $method));
        if (!isset($this->forms[$formName])) {
            throw new \LogicException("FormCollection enthält kein Formular mit der Referenz {$formName}.");
        }

        return $this->forms[$formName];
    }
}
