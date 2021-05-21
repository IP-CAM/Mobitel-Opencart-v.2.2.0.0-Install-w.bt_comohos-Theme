<?php
class ModelBossthemesBossRevolutionSlider extends Model { 

	public function createdb(){
	
		$sql = " SHOW TABLES LIKE '".DB_PREFIX."btslider'";
		$query = $this->db->query( $sql );
		if( count($query->rows) > 0 ){
			
			$sql="DELETE FROM `".DB_PREFIX."btslider`";
			$query = $this->db->query( $sql );
		}
		
		$sql = " SHOW TABLES LIKE '".DB_PREFIX."btslider_slide'";
		$query = $this->db->query( $sql );
		if( count($query->rows) > 0 ){
			
			$sql="DELETE FROM `".DB_PREFIX."btslider_slide`";
			$query = $this->db->query( $sql );
		}
		
		$sql = array();
		$sql[]  = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "btslider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;";
		$setting =  $this->db->escape('{"slider_type":"fullscreen","slider_width":"1920","slider_height":"840","delay":"5000","startWithSlide":"0","stopslider":"on","stopafterloops":"-1","stopatslide":"-1","touchenabled":"on","onhoverstop":"on","timeline":"on","timerlineposition":"bottom","shadow":"0","navigationtype":"none","navigationarrow":"solo","navigationstyle":"round","navigationhalign":"center","navigationvalign":"bottom","navigationhoffset":"0","navigationvoffset":"20","soloarrowlefthalign":"left","soloarrowleftvalign":"center","soloarrowlefthoffset":"50","soloarrowleftvoffset":"8","soloarrowrighthalign":"right","soloarrowrightvalign":"center","soloarrowrighthoffset":"50","soloarrowrightvoffset":"8","timehidethumbnail":"10","thumbnailwidth":"50","thumbnailheight":"50","thumbamount":"4","hidecapptionatlimit":"500","hideallcapptionatlimit":"500","hideslideratlimit":"0"}');
		$sql[] = "INSERT INTO `" . DB_PREFIX . "btslider` (`id`, `setting`) VALUES
(28, '".$setting."');";
		
		//btslider_slide
		$sql[] = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "btslider_slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `sort_order` int(3) NOT NULL DEFAULT '0',
  `slideset` text COLLATE utf8_unicode_ci,
  `caption` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=38 ;";
		
		
		$slideset1 =  $this->db->escape('{"url":"#","enablelink":"1","type_background":"image_bg","background":"catalog/bt_comohos/slide_1.jpg","transitions":"flyin","slotamount":"7","masterspeed":"500","delay":"5000","target":"_self","kenburns":"off","enablefullvideo":"0"}');
		$caption1 =  $this->db->escape('[{"text_caption":{"1":"&lt;b&gt;Google&lt;\\/b&gt; Glass","2":"&lt;b&gt;Google&lt;\\/b&gt; Glass"},"datax":"1250","type_caption":"text","datay":"340","class_css":"bold_green_text","dataspeed":"300","datastart":"800","dataend":"4500","dataafterspeed":"300","incom_animation":"randomrotate","outgo_animation":"customout","easing":"easeInOutBack","endeasing":"easeOutBack"},{"text_caption":{"1":"HIGH TECHNOLOGY","2":"HIGH TECHNOLOGY"},"datax":"1385","type_caption":"text","datay":"480","class_css":"medium_white","dataspeed":"300","datastart":"1200","dataend":"4500","dataafterspeed":"300","incom_animation":"randomrotate","outgo_animation":"customout","easing":"easeInOutBack","endeasing":"easeOutBack"},{"text_caption":{"1":"SHOP NOW","2":"SHOP NOW"},"datax":"1510","type_caption":"text","datay":"550","class_css":"large_white_text","dataspeed":"300","datastart":"1600","dataend":"4500","dataafterspeed":"300","incom_animation":"randomrotate","outgo_animation":"customout","easing":"easeInOutBack","endeasing":"easeOutBack"}]');
		$slideset2 =  $this->db->escape('{"url":"#","enablelink":"1","type_background":"image_bg","background":"catalog/bt_comohos/slide_2.jpg","transitions":"3dcurtain-horizontal","slotamount":"7","masterspeed":"500","delay":"5000","target":"_self","kenburns":"off","enablefullvideo":"0"}');
		$caption2 =  $this->db->escape('[{"text_caption":{"1":"class brand","2":"class brand"},"datax":"1300","type_caption":"text","datay":"360","class_css":"very_big_white","dataspeed":"300","datastart":"800","dataend":"4500","dataafterspeed":"300","incom_animation":"randomrotate","outgo_animation":"customout","easing":"easeOutBack","endeasing":"easeOutBack"},{"text_caption":{"1":"The Sign of Design. With You in mind.","2":"The Sign of Design. With You in mind."},"datax":"1300","type_caption":"text","datay":"460","class_css":"medium_text","dataspeed":"300","datastart":"1200","dataend":"4500","dataafterspeed":"300","incom_animation":"randomrotate","outgo_animation":"customout","easing":"easeOutBack","endeasing":"easeOutBack"},{"text_caption":{"1":"SHOP NOW","2":"SHOP NOW"},"datax":"1303","type_caption":"text","datay":"550","class_css":"large_white_text","dataspeed":"300","datastart":"1600","dataend":"4500","dataafterspeed":"300","incom_animation":"randomrotate","outgo_animation":"customout","easing":"easeOutBack","endeasing":"easeOutBack"}]');
		$slideset3 =  $this->db->escape('{"url":"#","enablelink":"1","type_background":"image_bg","background":"catalog/bt_comohos/slide_3.jpg","transitions":"slideup","slotamount":"7","masterspeed":"500","delay":"5000","target":"_self","kenburns":"off","enablefullvideo":"0"}');
		$caption3 =  $this->db->escape('[{"text_caption":{"1":"BEST SOUND QUALITY","2":"BEST SOUND QUALITY"},"datax":"300","type_caption":"text","datay":"420","class_css":"large_text","dataspeed":"300","datastart":"1200","dataend":"4500","dataafterspeed":"300","incom_animation":"randomrotate","outgo_animation":"customout","easing":"easeOutBack","endeasing":"easeOutBack"},{"text_caption":{"1":"BEST &lt;b&gt;PHONE&lt;\\/b&gt;","2":"BEST &lt;b&gt;PHONE&lt;\\/b&gt;"},"datax":"300","type_caption":"text","datay":"300","class_css":"big_white","dataspeed":"300","datastart":"800","dataend":"4500","dataafterspeed":"300","incom_animation":"randomrotate","outgo_animation":"customout","easing":"easeOutBack","endeasing":"easeOutBack"},{"text_caption":{"1":"Shop now","2":"Shop now"},"datax":"303","type_caption":"text","datay":"500","class_css":"large_white_text","dataspeed":"300","datastart":"1600","dataend":"4500","dataafterspeed":"300","incom_animation":"randomrotate","outgo_animation":"customout","easing":"easeOutBack","endeasing":"easeOutBack"}]');
		
		$sql[] = "INSERT INTO `".DB_PREFIX."btslider_slide` (`id`, `slider_id`, `status`, `sort_order`, `slideset`, `caption`) VALUES
(28, 28, 1, 1, '".$slideset1."', '".$caption1."'),
(29, 28, 1, 3, '".$slideset2."', '".$caption2."'),
(37, 28, 1, 1, '".$slideset3."', '".$caption3."');";

		foreach( $sql as $q ){
			$query = $this->db->query( $q );
		}
	}

	public function addSlide($data){
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "btslider_slide SET slider_id = '" . (int)$data['slider_id'] . "', status = '" . (int)$data['status'] . "',slideset = '" . $data['slideset'] . "',caption = '" . $data['caption'] . "', sort_order = '" . (int)$data['sort_order'] . "'");
	}
	
	public function addSlide_New($slider_id,$data){
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "btslider_slide SET slider_id = '" . (int)$slider_id . "', status = '" . (int)$data['status'] . "',slideset = '" . json_encode($data['slideset']) . "',caption = '" . $this->db->escape(json_encode($data['caption'])) . "', sort_order = '" . (int)$data['sort_order'] . "'");
	}
	
	public function editSlide($slide_id,$slider_id,$data){
		$this->db->query("UPDATE " . DB_PREFIX . "btslider_slide SET slider_id = '" . (int)$slider_id . "', slideset = '" . json_encode($data['slideset']) . "',caption = '" . $this->db->escape(json_encode($data['caption'])) . "', status = '" . (int)$data['status'] . "', sort_order = '" . (int)$data['sort_order'] . "' WHERE id = '" . (int)$slide_id . "'");
	}
	
	public function addSlider($data){
		
		$this->db->query("INSERT INTO " . DB_PREFIX . "btslider SET setting = '" . json_encode($data['setting']) . "'");
		
		$slider_id = $this->db->getLastId();
		
		return $slider_id;
	}
	
	public function getLastId(){
		$sql = "SELECT * FROM " . DB_PREFIX . "btslider s";
		
		$query = $this->db->query($sql);
		
		$slider_id = $this->db->getLastId();
		
		return $slider_id;
	}
	
	public function editSlider($slider_id,$data){
		
		$this->db->query("UPDATE " . DB_PREFIX . "btslider SET setting = '" . json_encode($data['setting']) . "' WHERE id = '" . (int)$slider_id . "'");
	}
	
	public function getModules($group, $store_id = 0){
		$data = array(); 
		
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "setting WHERE store_id = '" . (int)$store_id . "' AND `group` = '" . $this->db->escape($group) . "'");
		
		foreach ($query->rows as $result) {
			if (!$result['serialized']) {
				$data[$result['key']] = $result['value'];
			} else {
				$data[$result['key']] = unserialize($result['value']);
			}
		}

		return $data;
	}
	
	public function getSliders(){
		$sql = "SELECT * FROM " . DB_PREFIX . "btslider s";
		
		$sql .= " GROUP BY s.id";
		
		$query = $this->db->query($sql);

		return $query->rows;
	}
	
	public function getSlider($slider_id){
		$sql = "SELECT * FROM " . DB_PREFIX . "btslider s WHERE s.id = '" . (int)$slider_id . "'";
		
		$sql .= " GROUP BY s.id";
		
		$query = $this->db->query($sql);

		return $query->row;
	}
	
	public function getSlide($slide_id){
		$sql = "SELECT * FROM " . DB_PREFIX . "btslider_slide ss WHERE ss.id = '" . (int)$slide_id . "'";
		
		$query = $this->db->query($sql);

		return $query->row;
	}
	
	public function getSlides($slider_id){
		$sql = "SELECT * FROM " . DB_PREFIX . "btslider_slide ss WHERE ss.slider_id = '" . (int)$slider_id . "'";
		
		$sql .= " GROUP BY ss.id";
		
		$sql .= " ORDER BY ss.sort_order";
		
		$query = $this->db->query($sql);

		return $query->rows;
	}
	
	public function copySlide($slide_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "btslider_slide WHERE id = '" . (int)$slide_id . "'");

		if ($query->num_rows) {
			$data = array();

			$data = $query->row;
			$this->addSlide($data);
		}
	}
	
	public function deleteSlider($slider_id){
		$this->db->query("DELETE FROM " . DB_PREFIX . "btslider WHERE id = '" . (int)$slider_id . "'");
	}
	
	public function deleteSlide($slide_id){
		$this->db->query("DELETE FROM " . DB_PREFIX . "btslider_slide WHERE id = '" . (int)$slide_id . "'");
	}
	
	public function updateSortSlide($data){
		$count = 1;
		foreach ($data as $slide_id) {
			$query = "UPDATE " . DB_PREFIX . "btslider_slide SET sort_order = " . $count . " WHERE id = " . $slide_id;
			$this->db->query($query);
			$count ++;	
		}
	}
	
	public function getTotalslidesBySliderId($slider_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "btslider_slide WHERE slider_id = '" . (int)$slider_id . "'");

		return $query->row['total'];
	}
}
?>