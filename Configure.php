<?php

/**
 * 
 * (c) Suurshater Gabriel <suurshater.ihyongo@st.futminna.edu.ng>
 *
 */

namespace Suurshater\Suurshater;

use RuntimeException;
use Illuminate\Config\Repository;
use Illuminate\Support\Collection;
use Symfony\Component\Finder\Finder;

class Configure extends Repository
{

    /**
     *
     * @var string 
     */
    protected $environment;

    /**
     * Loads configuration items from all files
     * 
     * 
     * @param string $path
     * @return void
     */
    public function loadConfigurationFiles($path)
    {
        $this->environment = (string) $path;

        foreach ( $this->getConfigurationFiles() as $name => $configs ) {
            $this->set($name, include $configs);
        }
    }

    /**
     * Get all the configuration files for the selected environment
     * 
     * @return array
     * @throws RuntimeException
     */
    protected function getConfigurationFiles()
    {
        $environment = $this->environment;

        if ( is_dir($environment) && ! is_readable($environment) ) {
            throw new RuntimeException();
        }

        if ( ! is_dir($environment) ) {
            return [];
        }

        $files = [];
        foreach ( Finder::create()->files()->name('*.php')->in($environment)->depth(0) as $file ) {
            $files[basename($file->getRealPath(), '.php')] = $file->getRealPath();
        }

        return $files;
    }

}
