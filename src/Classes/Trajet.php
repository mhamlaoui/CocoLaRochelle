<?php


final class Trajet
{
    private readonly string $region;

    public function __construct(array $valeurs_dans_le_post)
    {
        $this->region = $valeurs_dans_le_post['region'];
    }

    public function getRegion()
    {
        return $this->region;
    }
}
