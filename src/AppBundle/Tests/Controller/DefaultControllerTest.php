<?php 

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
	/**
	 * Test Hompegage content assertions
	 * @return [bool] [test pass or not]
	 */
	public function  testHomepage()
	{
		 // @var \Symfony\Bundle\FrameworkBundle\Client 
		 $client = static::createClient();
		 
		 /** @var \Symfony\Component\DomCrawler\Crawler */
		 $crawler = $client->request('GET', '/');

		 // Check if homepage loads OK
		 $this->assertEquals(200, $client->getResponse()->getStatusCode());
		 
		 // Check if top bar left menu is present
		 $this->assertNotEmpty($crawler->filter('.top-bar-left li')->count());
		 
		 // Check if top bar right menu is present
		 $this->assertNotEmpty($crawler->filter('.top-bar-right li')->count());
		 
		 // Check if footer is present
		 $this->assertNotEmpty($crawler->filter('.footer li')->children()->count());
	} 

	/**
	 * Testing of mulitple static pages
	 * @return bool Pass or fail
	 */
	public function testStaticPages()
	{
		// @var \Symfony\Bundle\FrameworkBundle\Client
		$client = static::createClient();

		/** @var \Symfony\Component\DomCrawler\Crawler */
		// Test About Us page
		$crawler = $client->request('GET', '/about');
		$this->assertEquals(200, $client->getResponse()->getStatusCode());
		$this->assertContains('About Us', $crawler->filter('h1')->text());

		// Test Customer Service page
		$crawler = $client->request('GET', '/customer-service');
		$this->assertEquals(200, $client->getResponse()->getStatusCode());
		$this->assertContains('Customer Service', $crawler->filter('h1')->text());

		// Test Privacy and Cookie Policy page
		$crawler = $client->request('GET', '/privacy-and-cookie-policy');
		$this->assertEquals(200, $client->getResponse()->getStatusCode());
		$this->assertContains('Privacy Policy', $crawler->filter('h1')->text());

		// Test Orders and Returns page 
		$crawler = $client->request('GET', '/orders-and-returns'); 
		$this->assertEquals(200, $client->getResponse()->getStatusCode());
		$this->assertContains('Orders Returns', $crawler->filter('h1')->text());

		// Test Contact Us page
		$crawler = $client->request('GET', '/contact');
		$this->assertEquals(200, $client->getResponse()->getStatusCode());
		$this->assertContains('Contact Us', $crawler->filter('h1')->text());
	}

	/**
	 * Test Contact form submission
	 * @return bool Pass or fail
	 */
	public function testContactFormSubmit()
	{
		// @var \Symfony\Bundle\FrameworkBundle\Client
		$client = static::createClient();
		
		/** @var \Symfony\Component\DomCrawler\Crawler */
		$crawler = $client->request('GET', '/contact');
		
		// Find a button "Reach Out!"
		$form = $crawler->selectButton('Send')->form();

		// tests against submission and response page
		$crawler = $client->submit($form);
		$this->assertEquals(200, $client->getResponse()->getStatusCode()); 
	}
} 