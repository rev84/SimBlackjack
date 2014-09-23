<?php

require_once('./Deck.php');
require_once('./Utility.php');

$score = 0;

for($i = 0; $i < 100; i++){
	$deck = new Deck();
	
	// ディーラー
	$dealerHidden	= $deck->Draw();
	$dealerOpen		= $deck->Draw();
	
	// ディーラーがブラックジャックなら終了
	if(Utility::IsBlackJack(array($dealerHidden, $dealerOpen))){
		$score -= 1;
		continue;
	}
	
	// プレイヤー
	$playerCards = array();
	// プレイヤーに2枚配る
	$playerCards[] = $deck->Draw();
	$playerCards[] = $deck->Draw();
	
	// プレイヤーの行動
	Action($playerCards, $dealerHidden);
}

// プレイヤーの行動
function Action($mPlayerCards, $mDealerHidden, $mIsEnableDoubleDown, $mIsEnableSplit){
	
}







?>