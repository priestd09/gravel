<?php
use \PHPUnit_Framework_TestCase;
use Ballen\Gravel\Gravatar;

/**
 * GravelMapper
 *
 * Gravatar Mapper provides a binding/class method aliases for Laravel to provide friendly syntax.
 *
 * @author Bobby Allen <ballen@bobbyallen.me>
 * @license http://opensource.org/licenses/MIT
 * @link https://github.com/bobsta63/gravel
 * @link http://www.bobbyallen.me
 *
 */
class GravelTest extends PHPUnit_Framework_TestCase
{

    /**
     * The test email address that we'll use in our test case.
     */
    const TEST_EMAIL_ADDRESS = "bobbyallen.uk@gmail.com";

    /**
     * Instantiate a new test instance.
     * @return Gravatar
     */
    private function getDefaultTestInstance()
    {
        return new Gravatar(GravelTest::TEST_EMAIL_ADDRESS);
    }

    /**
     * Tests simple instantiation and output using the constructor parameter and the __toString() method.
     */
    public function testSimpleAvatarRequest()
    {
        return $this->assertEquals(Gravatar::HTTPS_GRAVATAR_URL . 'avatar/f4e4a981ae664a57e37616d5d15931d7?s=120&r=g&d=404', $this->getDefaultTestInstance());
    }

    /**
     * Tests simple instantiation and output using the constructor parameter and the __toString() method.
     */
    public function testAvatarRequest()
    {
        $instance = new Gravatar();
        $instance->setEmail(GravelTest::TEST_EMAIL_ADDRESS);
        return $this->assertEquals(Gravatar::HTTPS_GRAVATAR_URL . 'avatar/f4e4a981ae664a57e37616d5d15931d7?s=120&r=g&d=404', $instance->buildGravatarUrl());
    }

    /**
     * Test setting a custom avatar size.
     */
    public function testCustomSizeAvatarRequest()
    {
        $instance = $this->getDefaultTestInstance()
            ->setSize(300);
        return $this->assertEquals(Gravatar::HTTPS_GRAVATAR_URL . 'avatar/f4e4a981ae664a57e37616d5d15931d7?s=300&r=g&d=404', $instance->buildGravatarUrl());
    }

    /**
     * Test setting a custom defalt avatar.
     */
    public function testCustomDefaultAvatarRequest()
    {
        $instance = $this->getDefaultTestInstance()
            ->setDefaultAvatar(Gravatar::DEFAULT_WAVATAR);
        return $this->assertEquals(Gravatar::HTTPS_GRAVATAR_URL . 'avatar/f4e4a981ae664a57e37616d5d15931d7?s=120&r=g&d=wavatar', $instance->buildGravatarUrl());
    }

    /**
     * Test requesting HTTP URL.
     */
    public function testUseHttpProtocol()
    {
        $instance = $this->getDefaultTestInstance()
            ->setUseHTTP();
        return $this->assertEquals(Gravatar::HTTP_GRAVATAR_URL . 'avatar/f4e4a981ae664a57e37616d5d15931d7?s=120&r=g&d=404', $instance->buildGravatarUrl());
    }

    /**
     * Test requesting HTTPS URL.
     */
    public function testUseHttpsProtocol()
    {
        $instance = $this->getDefaultTestInstance()
            ->setUseHTTPS();
        return $this->assertEquals(Gravatar::HTTPS_GRAVATAR_URL . 'avatar/f4e4a981ae664a57e37616d5d15931d7?s=120&r=g&d=404', $instance->buildGravatarUrl());
    }

    /**
     * Test setting a custom rating.
     */
    public function testSetRating()
    {
        $instance = $this->getDefaultTestInstance()
            ->setRating(Gravatar::RATING_X);
        return $this->assertEquals(Gravatar::HTTPS_GRAVATAR_URL . 'avatar/f4e4a981ae664a57e37616d5d15931d7?s=120&r=x&d=404', $instance->buildGravatarUrl());
    }
}
