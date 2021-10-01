<?php

declare(strict_types=1);

namespace Components\Styles;

use Components\Component;
use Closure;

final class StyledComponent extends Component
{
    public Component $children;

    public function __construct(
        private string $nodeName,
        protected array $style_attributes
    ) {
    }

    public function Render(): void
    {
?>
        <<?= $this->nodeName ?> style="<?= $this->Style() ?>">
            <?= $this->children ?>
        </<?= $this->nodeName ?>>
<?php
    }

    public static function __callStatic(string $name, array $style_attributes)
    {
        return new StyledComponent(
            nodeName: $name,
            style_attributes: $style_attributes ?? []
        );
    }

    public function __invoke(mixed $children)
    {
        assert($children instanceof Component | $children instanceof Closure);

        if ($children instanceof Closure) {
            $children = Component::FromClosure($children);
        }

        $this->children = $children;
        parent::__invoke($children);
    }

    private function Style(): string
    {
        return array_reduce(
            $this->style_attributes,
            function (string $attributesStyleList, string $attribute) {
                return $attributesStyleList . "{$attribute};";
            },
            ""
        );
    }
}
