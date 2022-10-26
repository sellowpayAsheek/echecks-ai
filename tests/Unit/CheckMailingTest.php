<?php

use Echeck\Echeck;
use Echeck\Exceptions\NetworkErrorException;
use Echeck\Tests\SampleData;
use PHPUnit\Framework\TestCase;

class CheckMailingTest extends TestCase
{   
    protected $echeck ;

    public function setUp(): void
    {
        // $echeck = new Echeck(getenv('ECHECK_TEST_kEY'));
        $this->echeck = new Echeck("68e3f0GqQLWoGqf0bNMRPr8gLwnPR6btOZx2t6UQdhnPHizDwjYztrKGeG23","SANDBOX");
    }

    public function testMailACheck()
    {   
        try {
            $mail_a_check = $this->echeck->mailAcheck(SampleData::mailData());
            $this->assertArrayHasKey("checkId",$mail_a_check);
        } catch (NetworkErrorException $e) {
            $this->assertStringStartsWith("Unauthenticated.",$e->getMessage());
        }

        // $this->expectException(NetworkErrorException::class);
        // $mail_a_check = $this->echeck->mailAcheck(SampleData::mailData());
      
        // $this->expectExceptionMessage("Bank account not found sadasds");
    }
}