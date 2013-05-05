<?php
namespace Skel\Lib;

use Symfony\Component\Yaml\Yaml;

/**
 * Manages the version numbering scheme
 */
class Version
{
    protected $versionFile;
    protected $data;

    public function __construct($versionFile)
    {
        $this->versionFile = $versionFile;

        if (!file_exists($versionFile)) {
            throw new \Exception(sprintf('Version file not found: %s', $versionFile));
        }

        $this->data = Yaml::parse($this->versionFile);
    }

    public function getVersion()
    {
        return $this->data['parameters']['version']['current'];
    }

    public function incrementVersion()
    {
        $templateParts = explode('.', $this->data['parameters']['version']['template']);
        $versionParts = explode('.', $this->data['parameters']['version']['current']);

        foreach ($templateParts as $index => $part) {
            if ('*' == $part) {
                $versionParts[$index]++;
                break;
            } else {
                $versionParts[$index] = $part;
            }
        }

        $this->data['parameters']['version']['current'] = implode('.', $versionParts);

        file_put_contents($this->versionFile, Yaml::dump($this->data));
    }

}
