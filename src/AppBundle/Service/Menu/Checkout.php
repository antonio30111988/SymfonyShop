<?php 

namespace AppBundle\Service\Menu;

class Checkout
{
	public function getItems()
	{
		// custom hard coded menu
		return array
		(
			array(
				'path' =>'cart',
				'label' =>'Cart (3)'
			),
			array(
				'path' =>'checkout',
				'label' =>'Checkout'
			),
		);
	}
}
