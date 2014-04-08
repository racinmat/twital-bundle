<?php
namespace Goetas\TwitalBundle\Translation;

use Symfony\Bridge\Twig\Translation\TwigExtractor;
use Goetas\Twital\TwitalLoader;
use Symfony\Component\Translation\MessageCatalogue;
use Symfony\Component\Finder\Finder;

class TwitalExtractor extends TwigExtractor
{

    protected $twital;

    public function __construct(\Twig_Environment $twig, TwitalLoader $twital)
    {
        parent::__construct($twig);
        $this->twital = $twital;
    }

    /**
     * {@inheritDoc}
     */
    public function extract($directory, MessageCatalogue $catalogue)
    {
        // load any existing translation files
        $finder = new Finder();
        $files = $finder->files()->name('*.twital')->in($directory);
        foreach ($files as $file) {
            if ($adapter = $this->twital->getSourceAdapter($file->getPathname())) {
                $source = $this->twital->getTwital()->compile($adapter, file_get_contents($file->getPathname()));
                $this->extractTemplate($source, $catalogue);
            }
        }
    }
}