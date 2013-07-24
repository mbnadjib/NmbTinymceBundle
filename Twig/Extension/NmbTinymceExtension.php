<?php
namespace Nmb\TinymceBundle\Twig\Extension;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Twig Extension
 * @author Belkebir Nadjib <belkebir.nadjib@gmail.com>
 */
class NmbTinymceExtension extends \Twig_Extension
{
    /**
     * Container
     *
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Initialize tinymce helper
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }


    /**
     * Returns a list of functions to add to the existing list.
     *
     * @return array An array of functions
     */
    public function getFunctions()
    {
        return array(
            'nmb_tinymce_init' => new \Twig_Function_Method($this, 'tinymce_init', array('is_safe' => array('html')))
        );
    }

    /**
     * TinyMce initializations
     *
     * @return string
     */
    public function tinymce_init($config)
    {
        $bundleConfig  = $this->container->getParameter('nmb_tinymce');
        $tinyMceConfig  = $bundleConfig['configs'][$config];

        return $this->container->get('templating')->render('NmbTinymceBundle:Script:init.html.twig', array(
            'tinymce_config' => json_encode($tinyMceConfig),
        ));
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'nmb_tinymce';
    }

}
