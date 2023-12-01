<?php
include 'dir.php';

class filehandling
{
    protected $commands;
    /**
     * @var dir
     */
    protected dir $dir;

    protected $mySize = 70000000;

    public function __construct()
    {
        $file = file_get_contents('inputfile.txt');
        $this->commands = explode(PHP_EOL, $file);
        $this->commands[] = '$ cd /';
        $this->buildDir();
    }

    protected function buildDir()
    {
        $dir = new dir('/', null);
        foreach ($this->commands as $command) {
            $lineparts = explode(' ', $command);
            switch ($lineparts[0]) {
                case '$':
                    switch ($lineparts[1]) {
                        case 'cd':
                            switch ($lineparts[2]) {
                                case '..':
                                    $dir = $dir->getParent();
                                    break;
                                case '/':
                                    while ($dir->getName() != '/') {
                                        $dir = $dir->getParent();
                                    }
                                    break;
                                default:
                                    $dir = $dir->addChild(new dir($lineparts[2], $dir));
                                    break;
                            }
                            break;
                        case 'ls':
                            break;
                    }
                    break;
                case 'dir':
                    break;
                default:
                    $dir->addSize($lineparts[0]);
                    break;
            }
        }
        $this->dir = $dir;
    }

    public function getDirSizeSumByMaxSize($size = 100000)
    {
        return $this->dir->getSizeSum($size);
    }

    public function freeDiskSpace($required = 30000000)
    {
        $freeSize = $this->mySize - $this->dir->getSize();
        $neededSpace = $required - $freeSize;
        $dir = $this->dir->getDirNearSize($neededSpace);
        return $dir->getSize();
    }

}