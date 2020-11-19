<?php

/**
 * 
 * (c) Suurshater Gabriel <suurshater.ihyongo@st.futminna.edu.ng>
 *
 */

namespace Suurshater\Suurshater;

/**
 *
 * @author Avicii
 */
interface SuurshaterInterface
{

    /**
     * 
     * @param string $path
     * @return string
     */
    public function basePath($path = '');

    /**
     * 
     * @param string $path
     * @return string
     */
    public function configPath($path = '');

    /**
     * 
     * @param string $path
     * @return \Suurshater\Suurshater\SuurshaterInterface
     */
    public function setBasePath($path);
}
