<?php

Class Utility{
	// ブラックジャックか判定
	public static function IsBlackJack($mCards){
		// 正しいカード配列でない
		if(!self::IsCards($mCards)) return false;
		// 2枚でない
		if(count($mCards) != 2) return false;
		// スコアが21でない
		if(self::GetCardScore($mCards) != 21) return false;
		
		return true;
	}
	
	// 正しいカード配列か判定
	public static function IsCards($mCards){
		// 配列でない
		if(!is_array($mCards)) return false;
		
		// いずれかの要素がカードでない
		foreach($mCards as $card){
			if(!self::IsCard($card)) return false;
		}
		
		return true;
	}
	
	// 正しいカード形式か判定
	public static function IsCard($mCard){
		if(preg_match('@^[A23456789TJQK][schd]$@', $mCard)) return true;
		
		return false;
	}
	
	// カード配列のスコアを返す
	public static function GetCardScore($mCards){
		// 正しいカード配列でない
		if(!self::IsCards($mCards)) return false;
		
		$pattern = array(array());
		
		// 全組み合わせ
		foreach($mCards as $card){
			list($num, $suit) = str_split($card);
			
			if($num == 'A'){
				$count = count($pattern);
				for($i = 0; $i < $count; $i++){
					$pattern[$count+$i] = $pattern[$i];
					$pattern[$count+$i][] = 11;

					$pattern[$i][] = 1;
				}
			}
			elseif(preg_match('@^[TJQK]$@', $num)){
				for($i = 0; $i < count($pattern); $i++){
					$pattern[$i][] = 10;
				}
			}
			else{
				for($i = 0; $i < count($pattern); $i++){
					$pattern[$i][] = (int)$num;
				}
			}
		}
		
		// 最もよい数値を探す
		$bestScore = -1;
		foreach($pattern as $p){
			$score = 0;
			foreach($p as $num){
				$score += $num;
			}
			
			// バーストは-1
			if($score > 21){
				$score = -1;
			}
			
			// よりよければ採用
			if($bestScore < $score){
				$bestScore = $score;
			}
		}
		
		return $bestScore;
	}
	
}

$cards = array(
	'As',
	'Qd',
);

$r = Utility::IsBlackJack($cards);

var_dump($r);

?>