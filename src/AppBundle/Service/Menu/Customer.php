<?php 

namespace AppBundle\Service\Menu;

class Customer
{ 
	public function getItems()
	{
		// hardcoded menu values
		return array(
			array(
				'path' =>'account',
				'label' =>'Antonio Lolic'
			),
			array(
				'path' =>'logout',
				'label' =>'Logout'
			),
		);
	}
}