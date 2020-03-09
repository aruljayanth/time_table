<?php

declare(strict_types=1);

namespace UnitTestFiles\Test;

use PHPUnit\Framework\TestCase;



final class EmailTest extends TestCase

{

   public function testCanBeCreatedFromValidEmailAddress(): void

   {

       $this->assertInstanceOf(

           Email::class,

           Email::fromString('mallikasachin@gmail.com')

       );

   }

   public function testCannotBeCreatedFromInvalidEmailAddress(): void

   {

       $this->expectException(InvalidArgumentException::class);



       Email::fromString('invalid');

   }

   public function testCanBeUsedAsString(): void

   {

       $this->assertEquals(

           'mallikasachin@gmail.com',

           Email::fromString('mallikasachin@gmail.com')

       );

   }

}