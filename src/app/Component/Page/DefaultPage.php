<?php

declare(strict_types=1);

namespace Jazzfreunde\App\Component\Page;

use Jazzfreunde\App\Component\ComponentInterface;
use Jazzfreunde\App\Component\DeferredLoading\FileComponent;
use Jazzfreunde\App\Component\Head\Head;
use Jazzfreunde\App\Component\Head\Link\ScriptLink;
use Jazzfreunde\App\Component\Head\Link\StylesheetLink;
use Jazzfreunde\App\Component\Head\Meta\Metadata;
use Jazzfreunde\App\Component\Layout\DefaultLayout;
use Jazzfreunde\App\Component\LocalStorage\Share\SharedStorageComponent;
use Jazzfreunde\App\Component\LocalStorage\Share\SharedStorageInterface;
use Jazzfreunde\App\Component\LocalStorage\Share\SharedStorageTrait;
use Jazzfreunde\App\Service\Content\LegacyStub;

/**
 * Standard Layout für alle Seiten.
 */
class DefaultPage implements ComponentInterface, SharedStorageInterface
{
    use SharedStorageTrait;

    /**
     * Includes Content Components
     *
     * @var ComponentInterface[]
     */
    private array $includes = [];

    private Head $head;
    private DefaultLayout $layout;

    /**
     * @param LegacyStub $legacyStub
     */
    public function __construct(SharedStorageComponent $sharedStorage, Head $head, DefaultLayout $layout)
    {
        // Wird hier direkt gerufen, damit der SharedStorage für alle Komponenten verfügbar ist.
        $this->setSharedStorage($sharedStorage);

        $this->head = $head
            ->setTitle('Jazzfreunde Ingolstadt e. V.')
            ->setFavicon('/assets/images/jicon.svg')
            ->addMetadata(
                new Metadata('author', 'Michael Mayer'),
                new Metadata('keywords', 'jazz, jazzfreunde, jazzmusik, ingolstadt, b&uuml;rgerhaus, alte post, summerjazz, kultur, jazztage, konzerte, diagonal, neue welt, jazzf&ouml;rderpreis, schule, literratur'),
                new Metadata('html-author', 'MicheMayer'),
                new Metadata('robots', 'index, follow'),
                new Metadata('viewport', 'width=device-width, initial-scale=1, shrink-to-fit=no'),
            )
            ->addStylesheet(
                new StylesheetLink('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', integrity: 'sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC'),
                new StylesheetLink('/assets/styles/theme.css'),
            )
            ->addScript(
                new ScriptLink('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', integrity: 'sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM'),
            );

        $this->layout = $layout;
    }

    /**
     * @inheritDoc
     */
    public function setSharedStorage(SharedStorageComponent $sharedStorage): void
    {
        $this->sharedStorage = $sharedStorage;
    }

    /**
     * @inheritDoc
     */
    public function registerSharedValues(): void
    {
    }

    /**
     * Fügt dem Content eine Komponente hinzu
     *
     * @param ComponentInterface $component
     * @return static
     */
    public function component(ComponentInterface $component): static
    {
        $this->includes[] = $component;

        return $this;
    }

    /**
     * Schleust variablen als Globale in den Code, damit die alte Logik weiterhin funktioniert.
     *
     * @param array $globals assoziatives Array mit allen globals ['name_im_skript' => 'value']
     * @return static
     * @throws \InvalidArgumentException
     */
    public function setGlobals(array $globals): static
    {
        if (!empty($globals) && !count(array_filter(array_keys($globals), \is_string(...))) > 0) {
            throw new \InvalidArgumentException(self::class.'::setGlobals erwartet übergebene Globalen als assoziatives Array.');
        }

        array_walk($globals, $this->sharedStorage->share(...));

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function render(): void
    {
        $this
            ->startDoc()
                ->renderHead()
                ->startBody()
                    ->renderBody()
                ->closeBody()
            ->closeDoc();
    }

    #region Rendering

    /**
     * Direkter Aufrufe um PHP-Skripte in der 'render'-Methode mit einzufinden.
     *
     * @param string $filePath
     * @return static
     */
    protected function renderScript(string $filePath): static
    {
        $component = new FileComponent($this->legacyStub, $filePath);
        $component->setSharedStorage($this->sharedStorage);
        $component->loadComponentFile();
        $component->render();

        return $this;
    }

    /**
     * Render den eigentlichen Inhalt der Seite.
     *
     * @return static
     */
    protected function renderBody(): static
    {
        $this->layout->render($this->renderIncludes(...));

        return $this;
    }

    /**
     * Rendert alle eingebundenen Komponenten.
     *
     * @return static
     */
    protected function renderIncludes(): static
    {
        array_walk($this->includes, fn(ComponentInterface $component) => $component->render());

        return $this;
    }

    /**
     * Rendert den Html Head.
     *
     * @return static
     */
    protected function renderHead(): static
    {
        $this->head->render();

        return $this;
    }

    /**
     * Beginn des Html Dokuments.
     *
     * @return static
     */
    protected function startDoc(): static
    {
        ?>
        <!DOCTYPE html>
        <html lang="de">
        <?php

        return $this;
    }

    /**
     * Beginn des Bodys.
     *
     * @return static
     */
    protected function startBody(): static
    {
        ?>
        <body>
            <div class="wrapper">
        <?php

        return $this;
    }

    /**
     * Schließt den Body.
     *
     * @return static
     */
    protected function closeBody(): static
    {
        ?>
            </body>
        </div>
        <?php

        return $this;
    }

    /**
     * Schließt den html Tag.
     *
     * @return static
     */
    protected function closeDoc(): static
    {
        ?>
        </html>
        <?php

        return $this;
    }

    #endregion
}
