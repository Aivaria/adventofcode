<?php

class dir
{
    /**
     * @var dir[]
     */
    protected array $childs;
    /**
     * @var int
     */
    protected int $size;

    /**
     * @param string $name
     * @param ?dir $parent
     */
    public function __construct(
        protected string $name,
        protected ?dir   $parent)
    {
        $this->childs = [];
        $this->size = 0;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return dir
     */
    public function getParent(): dir
    {
        return $this->parent;
    }

    /**
     * @param $child
     * @return dir
     */
    public function addChild(dir $child): dir
    {
        $this->childs[] = $child;
        return $child;
    }

    /**
     * @param $size
     * @return dir
     */
    public function addSize($size): dir
    {
        $this->size += $size;
        if ($this->parent != null) {
            $this->parent->addSize($size);
        }
        return $this;
    }

    /**
     * @return int
     */
    public function getSizeSum($limit = 100000)
    {
        $forReturn = 0;
        foreach ($this->childs as $child) {
            $forReturn += $child->getSizeSum($limit);
        }
        if ($this->size <= $limit) {
            $forReturn += $this->size;
        }
        return $forReturn;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    public function getDirNearSize($size, dir $found = null)
    {
        if($found == null){
            $found = $this;
        }
        foreach ($this->getChilds() as $child) {
            $found = $child->getDirNearSize($size, $found);
        }
        if ($this->size > $size && $found->getSize() > $this->size) {
            $found = $this;
        }
        return $found;
    }


    /**
     * @return dir[]
     */
    public function getChilds(): array
    {
        return $this->childs;
    }


}