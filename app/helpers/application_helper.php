<?php

class Helper {
	
	public static function header_link ($link, $to, $state, $params = array() ) {
		// separarting dropdown.
		if (isset($params['dropdown'])) {
			$dropdown = $params['dropdown'];
			unset($params['dropdown']);
		}

		$return = '<div class="bubble_viewer">';
		if ($state == 'true') {
			$params['class'] = 'selected drop_down_menu';
			$return .= '<div class="bubble bgc_dark vv_imp"></div>';
			$return .= link_to($link, $to, $params);
		}
		else {
			$return .= '<div class="bubble bgc_gray"></div>';
			$return .= link_to($link, $to, $params);
		}
		$return .= $dropdown; // include dropdown in case if specified.
		$return .= '</div>';
		echo $return;
	}

	public static function drop_down ($links,$id,$width = NULL) {
		$margin = (($width+40)/2)-8;
		$return = '
		<div class="drop_down_container" id="'.$id.'">';
			$return .= '
			<div id="drop_down" class="pr">';
				$return .= '
				<div align="center">';
					$return .= '
					<div class="upArrow pa" style="top:-7px;margin-left:'.$margin.'px;"></div>';  //width, padding, border, image_width
				$return .= '
				</div>';
				
				$return .= '
				<div class="drop_down_links shadow_min rad10">';
					
					foreach ($links as $link => $href) {
						$return .= '<a class="dd_link" href="'.$href.'"';
						if (!empty($width)) { 
							$return .= ' style="width:'.$width.'px;"';
						}
						$return .= '>'.$link.'</a>';
					}
					$return .= '
					<div class="cbo"></div>
				</div>
			</div>
		</div>';

		return $return;
	}

	public static function portfolio_link($href, $image_class, $description, $class = null) {
		$return = "
		<a href='{$href}' target='_blank' class='item {$class}'>
			<div class='cover'>
				<div class='image {$image_class}'></div>
			</div>
			<div class='description'>{$description}</div>
		</a>";
		return $return;
	}

	public static function social_link($href, $image, $link) {
		$return = "
		<a href='{$href}' target='_blank'>".
			image_tag('social_icons/'.$image, array('class' => 'fl'))."
			<div class='link_text fl'>{$link}</div>
			<div class='clearfix'></div>
		</a>";
		return $return;
	}
}

function current_user() {
	if (!empty($_SESSION[USER_SESSION_KEY])) {
		$uid = $_SESSION[USER_SESSION_KEY];
		return User::find($uid);
	} else {
		return false;
	}
}

function render($options) {
	View::render($options);
}

function beautify_params($key, $value, $key_width = 200) {
	$item = "
	<div class='clearfix beautify_params'>
		<div class='fl fb' style='width: {$width}px;'>{$key}</div>
		<div style='margin-left: {$key_width}px;'>{$value}</div>
	</div>
	";
	return $item;
}
?>