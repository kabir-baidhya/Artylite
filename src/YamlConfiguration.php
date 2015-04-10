<?php namespace Gckabir\Arty;

use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Yaml\Yaml;

class YamlConfiguration extends Configuration
{
    protected $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;

        parent::__construct(array());
    }

    public function all()
    {
        $fs = new Filesystem();

        $contents = $fs->get($this->filename);

        $this->config = Yaml::parse($contents);

        return parent::all();
    }
}
