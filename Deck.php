<?php

Class Deck{
	protected $_deck;
	
	public function __construct(){
		$this->Initialize();
		$this->Shuffle();
	}
	
	// カードを引く
	public function Draw(){
		return array_pop($this->_deck);
	}
	
	// 残り枚数
	public function GetNum(){
		return count($this->_deck);
	}
	
	protected function Initialize(){
		$suits		= array('s', 'c', 'h', 'd');
		$numbers	= array('A', '2', '3', '4', '5', '6', '7', '8', '9', 'T', 'J', 'Q', 'K');
		
		$deck	= array();
		
		foreach($suits as $suit){
			foreach($numbers as $number){
				$deck[] = $number.$suit;
			}
		}
		
		$this->_deck = $deck;
	}
	
	protected function Shuffle(){
		shuffle($this->_deck);
	}
}

?>