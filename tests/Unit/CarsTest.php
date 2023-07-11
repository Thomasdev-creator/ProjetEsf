<?php

namespace App\Tests\Unit;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Entity\Cars;

class CarsTest extends KernelTestCase
{
    public function getEntity(): Cars
    {
        return (new Cars())->setDescription('Description #1')
        ->setName('Cars #1')
        ->setIsFavorite(true)
        ->setCreatedAt(new \DateTimeImmutable())
        ->setUpdateAt(new \DateTimeImmutable());
    }
    public function testEntityCars(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $cars = $this->getEntity();
        $cars = new Cars();
        $cars->setName('Cars #')
            ->setDescription('Description #1')
            ->setIsFavorite(true)
            ->setCreatedAt(new \DateTimeImmutable())
            ->setUpdateAt(new \DateTimeImmutable());
        $errors = $container->get('validator')->validate($cars);

        $this->assertCount(0, $errors);
    }
}
