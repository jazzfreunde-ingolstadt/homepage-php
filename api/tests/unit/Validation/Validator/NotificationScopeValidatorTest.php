<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Tests\Validation\Validator;

use Jazzfreunde\App\Service\Notification\Scope\CompiledScope;
use Jazzfreunde\App\Service\Notification\Scope\NotificationScopeCollection;
use Jazzfreunde\App\Service\Notification\Scope\NotificationScopeCollectionProviderInterface;
use Jazzfreunde\App\Service\Notification\Scope\NotificationScopeMatcher;
use Jazzfreunde\App\Service\Notification\Scope\Parameter\Number;
use Jazzfreunde\App\Type\Primitive\Uri;
use Jazzfreunde\App\Validation\Attribute\NotificationScope;
use Jazzfreunde\App\Validation\Validator\NotificationScopeValidator;
use stdClass;
use Symfony\Component\ObjectMapper\ObjectMapperInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;
use Symfony\Component\Validator\Test\ConstraintValidatorTestCase;

/**
 * Tests for the NotificationScopeValidator class.
 *
 * @covers \Jazzfreunde\App\Validation\Validator\NotificationScopeValidator
 *
 * @internal
 *
 * @extends ConstraintValidatorTestCase<NotificationScopeValidator>
 */
final class NotificationScopeValidatorTest extends ConstraintValidatorTestCase
{
    public function testValidScopeHasNoViolation(): void
    {
        $this->validator->validate('/events/42', new NotificationScope());

        $this->assertNoViolation();
    }

    public function testInvalidScopeRaisesViolationWithScopeParameter(): void
    {
        $scope = '/events/not-a-number';

        $this->validator->validate($scope, new NotificationScope(message: 'Invalid scope: {{ string }}'));

        $this->buildViolation('Invalid scope: {{ string }}')
            ->setParameter('{{ string }}', $scope)
            ->assertRaised();
    }

    public function testNullAndEmptyValuesAreIgnored(): void
    {
        $constraint = new NotificationScope();

        $this->validator->validate(null, $constraint);
        $this->validator->validate('', $constraint);

        $this->assertNoViolation();
    }

    public function testNonStringValueThrowsUnexpectedValueException(): void
    {
        $this->expectException(UnexpectedValueException::class);

        $this->validator->validate(42, new NotificationScope());
    }

    public function testUnexpectedConstraintThrowsUnexpectedTypeException(): void
    {
        $this->expectException(UnexpectedTypeException::class);

        $this->validator->validate('/events/42', new NotBlank());
    }

    protected function createValidator(): NotificationScopeValidator
    {
        $scopes = new NotificationScopeCollection();
        $scopes->add(new CompiledScope(
            '~^/events/(?P<id>\d+)$~',
            [new Number('id')],
            stdClass::class,
            Uri::from('/events/{id:number}'),
        ));

        $scopeProvider = $this->createStub(NotificationScopeCollectionProviderInterface::class);
        $scopeProvider->method('provide')->willReturn($scopes);

        return new NotificationScopeValidator(new NotificationScopeMatcher(
            $scopeProvider,
            $this->createStub(ObjectMapperInterface::class),
        ));
    }
}
