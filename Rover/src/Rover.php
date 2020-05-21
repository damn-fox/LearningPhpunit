<?php

/**
 * This file is part of `niccolo/learning-test`.
 */

declare(strict_types=1);

namespace Acme;

final class Rover
{
    private $position;

    public function __construct(Position $position)
    {
        $this->position = $position;
    }

    public function move(Destination $destination): void
    {
        if ($destination->getOrientation() === 'n') {
            if ($destination->getDirection() === 'f') {
                $this->position->setY($this->position->getY() + 1);
            }
            if ($destination->getDirection() === 'b') {
                $this->position->setY($this->position->getY() - 1);
            }
            if ($destination->getDirection() === 'r') {
                $this->position->setX($this->position->getX() + 1);
            }
            if ($destination->getDirection() === 'l') {
                $this->position->setX($this->position->getX() - 1);
            }
        }
        if ($destination->getOrientation() === 's') {
            if ($destination->getDirection() === 'f') {
                $this->position->setY($this->position->getY() - 1);
            }
            if ($destination->getDirection() === 'b') {
                $this->position->setY($this->position->getY() + 1);
            }
            if ($destination->getDirection() === 'r') {
                $this->position->setX($this->position->getX() - 1);
            }
            if ($destination->getDirection() === 'l') {
                $this->position->setX($this->position->getX() + 1);
            }
        }
        if ($destination->getOrientation() === 'e') {
            if ($destination->getDirection() === 'f') {
                $this->position->setX($this->position->getX() + 1);
            }
            if ($destination->getDirection() === 'b') {
                $this->position->setX($this->position->getX() - 1);
            }
            if ($destination->getDirection() === 'r') {
                $this->position->setY($this->position->getY() - 1);
            }
            if ($destination->getDirection() === 'l') {
                $this->position->setY($this->position->getY() + 1);
            }
        }
        if ($destination->getOrientation() === 'w') {
            if ($destination->getDirection() === 'f') {
                $this->position->setX($this->position->getX() - 1);
            }
            if ($destination->getDirection() === 'b') {
                $this->position->setX($this->position->getX() + 1);
            }
            if ($destination->getDirection() === 'r') {
                $this->position->setY($this->position->getY() + 1);
            }
            if ($destination->getDirection() === 'l') {
                $this->position->setY($this->position->getY() - 1);
            }
        }
    }

    public function getPosition(): array
    {
        return $this->position->get();
    }

    public function getFinalPosition(): array
    {
        $finalPosition = [$this->position->getX(), $this->position->getY()];

        return $finalPosition;
    }
} // end class Rover
