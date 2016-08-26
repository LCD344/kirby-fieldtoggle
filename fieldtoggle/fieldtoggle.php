<?php
	
	class FieldToggleField extends CheckboxField {
		
		// Get JS and CSS files from the assets folder
		static public $assets = array(
			'js' => array(
				'f.js'
			),
			'css' => array(
				'style.css'
			)
		);
		
		public function input() {
			
			$wrapper = parent::input();
			$wrapper->removeClass('input-with-checkbox');
			$wrapper->addClass('input-with-fieldtoggle');
			
			if (isset($this->on)) {
				$wrapper->data('on', $this->on);
			}
			if (isset($this->off)) {
				$wrapper->data('off', $this->off);
			}
			
			$switch = new Brick('label', null);
			$switch->addClass('btn');
			$switch->attr('for', $this->id());
			$wrapper->append($switch);
			$wrapper->append($this->text(true));
			
			return $wrapper;
			
		}
		
		public function text($current = null) {
			
			if ($current === null) return;
			
			if (isset($this->texts)) {
				$texts = new Brick('span', null);
				$texts->addClass('txt');
				
				foreach (['on', 'off'] as $key => $state) {
					$text = new Brick('span', null);
					$text->addClass($state);
					$text->text($this->i18n($this->texts[$key]));
					$texts->append($text);
				}
				
				return $texts;
				
				
			} else {
				$text = parent::text();
				
				return empty($text) ? ' ' : $this->i18n($text);
			}
		}
	}