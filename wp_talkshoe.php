<?php

/*
Plugin Name: WP Talkshoe
Plugin URI: http://www.nmpnetwork.com/wordpress-plugins/wp-talkshoe/
Description: A Wordpress Plugin version of the Talkshoe Dynamic Widget.  <a href="options-general.php?page=wp_talkshoe.php">Settings Configuration Panel</a> | <a href="http://wordpress.org/extend/plugins/wp-talkshoe/">Wordpress Repository Page</a> | <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=UKU4GLYTP2JD8">Donate</a> | <a href="http://newmediaanswers.com/bbpress/" >Support Forum</a>
Version: 3.0
Author: Dr. Robert White
Author URI: http://www.nmpnetwork.com
*/
/*  Copyright 2010  Dr. Robert White  (email : graitesites@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// WP_Talkshoe Version
$wptversion = "3.0";
update_option('wptversion',$wptversion);

// Wordpress Version check 
global $wp_version;
 
$exit_msg='WP_Talkshoe requires Wordpress 3.0 or newer. Please update!';
 
if (version_compare($wp_version,"3.0","<"))
{
	exit ($exit_msg);
}

// Wordpress Plugins Path
$pluginpath = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));

//WordPress Hooks 
    add_shortcode('wp_talkshoe', 'run_tw'); 
//Wordpress Plugin Code
    class WP_TalkshoeClass {

	function WP_TalkshoeClass() {
	
		add_action('widgets_init', array($this, 'init_WP_Talkshoe'));
		}
	
	function init_WP_Talkshoe() {
	
		if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') )
			return;	
		register_sidebar_widget(array('WP_Talkshoe','widgets'),array($this, 'widget_endView'));
		register_widget_control(array('WP_Talkshoe', 'widgets'), array($this, 'widget_controlView'));	
	}
	
	function widget_endView($args)
	{
		//You must include $before_widget $before_title $after_title and $after_widget otherwise the widget will not work
		$wgt_title=get_option('wgt_title');
		extract($args);
		echo $before_widget.$before_title.$wgt_title. $after_title;
		run_tw();
		echo $after_widget;	
	}
	
	function widget_controlView()
	{	
		echo "Set Options from Settings/WP_Talkshoe";	
	}
}
		
        add_action('admin_menu', 'wp_talkshoe_options_setup');
		
		function wp_talkshoe_options_setup() {
		$wp_talkshoe_data=get_plugin_data(__FILE__);
        add_options_page($wp_talkshoe_data['Name'], 'WP_Talkshoe', 8, basename(__FILE__), 'wp_talkshoe_page');
}
		
		function wp_talkshoe_page() {
		$wptversion=get_option('wptversion');
		if ( function_exists('current_user_can') && !current_user_can( 7 ) )  wp_die( __('You do not have sufficient permissions to access this page.') );
		
		$wpt_head="<p style='text-align:center;'>Home: <a href='http://www.nmpnetwork.com/wordpress-plugins/wp-talkshoe/'>WP_Talkshoe</a> - Version: <strong>$wptversion</strong> - Author: <a href='mailto:graitesites@gmail.com'>Dr. Robert White</a> - <a href='https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=UKU4GLYTP2JD8'>Donate</a></p><hr style='visibility:hidden;'>";
        
		if ($_POST['wgt_title']) {
			$option=$_POST['wgt_title'];
			update_option('wgt_title',$option);	
		}
		if ($_POST['showid']) {
			$option=$_POST['showid'];
			update_option('showid',$option);	
		}
		if ($_POST['bgclr']) {
			$option=$_POST['bgclr'];
			update_option('bgclr',$option);	
		}
		if ($_POST['hfclr']) {
			$option=$_POST['hfclr'];
			update_option('hfclr',$option);	
		}
		if ($_POST['pefclr']) {
			$option=$_POST['pefclr'];
			update_option('pefclr',$option);	
		}
		if ($_POST['npfclr']) {
			$option=$_POST['npfclr'];
			update_option('npfclr',$option);	
		}
		if ($_POST['snfclr']) {
			$option=$_POST['snfclr'];
			update_option('snfclr',$option);	
		}
		if ($_POST['hnfclr']) {
			$option=$_POST['hnfclr'];
			update_option('hnfclr',$option);	
		}
		if ($_POST['nefclr']) {
			$option=$_POST['nefclr'];
			update_option('nefclr',$option);	
		}
		if ($_POST['nedfclr']) {
			$option=$_POST['nedfclr'];
			update_option('nedfclr',$option);	
		}
		if ($_POST['netfclr']) {
			$option=$_POST['netfclr'];
			update_option('netfclr',$option);	
		}
		if ($_POST['petfclr']) {
			$option=$_POST['petfclr'];
			update_option('petfclr',$option);	
		}
		if ($_POST['npefclr']) {
			$option=$_POST['npefclr'];
			update_option('npefclr',$option);	
		}
		if ($_POST['brdclr']) {
			$option=$_POST['brdclr'];
			update_option('brdclr',$option);	
		}
		if ($_POST['blubrry']) {
			$option=$_POST['blubrry'];
			update_option('blubrry',$option);	
		}
		if ($_POST['llfclr']) {
			$option=$_POST['llfclr'];
			update_option('llfclr',$option);	
		}
		
		$pluginpath = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
		$wgt_title=get_option('wgt_title');
		if ($wgt_title == ""){
		$wgt_title = 'Talkshoe Dynamic Widget';
		update_option('wgt_title',$wgt_title);
		}
		$showid=get_option('showid');
		if ($showid == ""){
		$showid = "16829";
		update_option('showid',$showid);
		}
		$bgclr=get_option('bgclr');
		$hfclr=get_option('hfclr');
		$pefclr=get_option('pefclr');
		$npfclr=get_option('npfclr');
		$snfclr=get_option('snfclr');
		$hnfclr=get_option('hnfclr');
		$nefclr=get_option('nefclr');
		$nedfclr=get_option('nedfclr');
		$netfclr=get_option('netfclr');
		$petfclr=get_option('petfclr');
		$npefclr=get_option('npefclr');
		$brdclr=get_option('brdclr');
		if ($brdclr == ""){
		$brdclr = "#0000FF";
		update_option('brdclr',$brdclr);
		}
		$blubrry=get_option('blubrry');
		$llfclr=get_option('llfclr');
?>		
        
        <script language=JavaScript src="<?php echo "$pluginpath/picker.js"; ?>"></script>
		<form method="post" action="options.php" name="options">
		<?php wp_nonce_field('update-options'); ?>
		<center><b>WP_Talkshoe Options</center></b>
		<?php _e($wpt_head); ?>
		<center><?php run_tw(); ?><br>
		<b>Instructions:</b> Click the <img width="15" height="13" border="0" alt="Click Here to Pick up the color" src="<?php echo "$pluginpath/sel.gif"; ?>"> to select a color or input the color code in Hex.<br>This opens in a Popup Window, so make sure your browser allows for popup windows to open for this page.<br>
		Leave the field blank to use the default color scheme.</center>
		<table class="form-table" border="0">
		<tr valign="top">
        <th>Widget Title</th>
		<td><input type="text" name="wgt_title" value="<?php echo get_option('wgt_title'); ?>" /></td>
		<th>Talkshoe Show ID</th>
		<td><input type="text" name="showid" value="<?php echo get_option('showid'); ?>" /></td>
        </tr>
		<tr valign='top'>
        <th scope="row">Background Color</th>
        <td><input type="text" name="bgclr" value="<?php echo get_option('bgclr'); ?>" /><a href="javascript:TCP.popup(document.forms['options'].elements['bgclr'])"><img width="15" height="13" border="0" alt="Click Here to Pick up the color" src="<?php echo "$pluginpath/sel.gif"; ?>"></a><br>ex. #000000</td>
        <th scope="row">Show Name Font Color</th>
        <td><input type="text" name="snfclr" value="<?php echo get_option('snfclr'); ?>" /><a href="javascript:TCP.popup(document.forms['options'].elements['snfclr'])"><img width="15" height="13" border="0" alt="Click Here to Pick up the color" src="<?php echo "$pluginpath/sel.gif"; ?>"></a><br>ex. #000000</td>
        </tr>
		<tr valign='top'>
        <th scope="row">Host Heading Font Color</th>
        <td><input type="text" name="hfclr" value="<?php echo get_option('hfclr'); ?>" /><a href="javascript:TCP.popup(document.forms['options'].elements['hfclr'])"><img width="15" height="13" border="0" alt="Click Here to Pick up the color" src="<?php echo "$pluginpath/sel.gif"; ?>"></a><br>ex. #000000</td>
        <th scope="row">Host Name Font Color</th>
        <td><input type="text" name="hnfclr" value="<?php echo get_option('hnfclr'); ?>" /><a href="javascript:TCP.popup(document.forms['options'].elements['hnfclr'])"><img width="15" height="13" border="0" alt="Click Here to Pick up the color" src="<?php echo "$pluginpath/sel.gif"; ?>"></a><br>ex. #000000</td>
        </tr>
		<tr valign='top'>
        <th scope="row">Past Episodes Heading Font Color</th>
        <td><input type="text" name="pefclr" value="<?php echo get_option('pefclr'); ?>" /><a href="javascript:TCP.popup(document.forms['options'].elements['pefclr'])"><img width="15" height="13" border="0" alt="Click Here to Pick up the color" src="<?php echo "$pluginpath/sel.gif"; ?>"></a><br>ex. #000000</td>
        <th scope="row">Past Episodes Title Font Color</th>
        <td><input type="text" name="petfclr" value="<?php echo get_option('petfclr'); ?>" /><a href="javascript:TCP.popup(document.forms['options'].elements['petfclr'])"><img width="15" height="13" border="0" alt="Click Here to Pick up the color" src="<?php echo "$pluginpath/sel.gif"; ?>"></a><br>ex. #000000</td>
        </tr>
		<tr valign='top'>
        <th scope="row">Now Playing Heading Font Color</th>
        <td><input type="text" name="npfclr" value="<?php echo get_option('npfclr'); ?>" /><a href="javascript:TCP.popup(document.forms['options'].elements['npfclr'])"><img width="15" height="13" border="0" alt="Click Here to Pick up the color" src="<?php echo "$pluginpath/sel.gif"; ?>"></a><br>ex. #000000</td>
		<th scope="row">Now Playing Episode Title Font Color</th>
        <td><input type="text" name="npefclr" value="<?php echo get_option('npefclr'); ?>" /><a href="javascript:TCP.popup(document.forms['options'].elements['npefclr'])"><img width="15" height="13" border="0" alt="Click Here to Pick up the color" src="<?php echo "$pluginpath/sel.gif"; ?>"></a><br>ex. #000000</td>
        </tr>
		<tr valign='top'>
        <th scope="row">Next Episode Heading Font Color</th>
        <td><input type="text" name="nefclr" value="<?php echo get_option('nefclr'); ?>" /><a href="javascript:TCP.popup(document.forms['options'].elements['nefclr'])"><img width="15" height="13" border="0" alt="Click Here to Pick up the color" src="<?php echo "$pluginpath/sel.gif"; ?>"></a><br>ex. #000000</td>
        <th scope="row">Next Episode Date Font Color</th>
        <td><input type="text" name="nedfclr" value="<?php echo get_option('nedfclr'); ?>" /><a href="javascript:TCP.popup(document.forms['options'].elements['nedfclr'])"><img width="15" height="13" border="0" alt="Click Here to Pick up the color" src="<?php echo "$pluginpath/sel.gif"; ?>"></a><br>ex. #000000</td>
        </tr>
		<tr valign='top'>
        <th scope="row">Next Episode Title Font Color</th>
        <td><input type="text" name="netfclr" value="<?php echo get_option('netfclr'); ?>" /><a href="javascript:TCP.popup(document.forms['options'].elements['netfclr'])"><img width="15" height="13" border="0" alt="Click Here to Pick up the color" src="<?php echo "$pluginpath/sel.gif"; ?>"></a><br>ex. #000000</td>
		<th scope="row">Widget Border Color</th>
        <td><input type="text" name="brdclr" value="<?php echo get_option('brdclr'); ?>" /><a href="javascript:TCP.popup(document.forms['options'].elements['brdclr'])"><img width="15" height="13" border="0" alt="Click Here to Pick up the color" src="<?php echo "$pluginpath/sel.gif"; ?>"></a><br>ex. #000000</td>
        </tr>
		<tr valign='top'>
        <th scope="row">BluBrry Media Redirect URL</th>
        <td><input type="text" name="blubrry" value="<?php echo get_option('blubrry'); ?>" /><br>ex. http://media.blubrry.com/mypodcast/ <br> Leave Blank if you do not have a BluBrry Account.<br><a href="http://www.blubrry.com/createaccount.php" target="_blank">Get a BluBrry Account Here</a></td>
		<th scope="row">Listen Live Font Color</th>
        <td><input type="text" name="llfclr" value="<?php echo get_option('llfclr'); ?>" /><a href="javascript:TCP.popup(document.forms['options'].elements['llfclr'])"><img width="15" height="13" border="0" alt="Click Here to Pick up the color" src="<?php echo "$pluginpath/sel.gif"; ?>"></a><br>ex. #000000</td>
        </tr>
		</table>
		<br><br>
		<img src="<?php echo "$pluginpath/colorchart1.jpg"; ?>">
		<img src="<?php echo "$pluginpath/colorchart2.jpg"; ?>">
        <br><br>
		
		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="page_options" value="wgt_title,showid,bgclr,hfclr,pefclr,npfclr,snfclr,hnfclr,nefclr,nedfclr,netfclr,petfclr,npefclr,brdclr,blubrry,llfclr" />
		<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></form>
		
		<style>
#cws-wpt-donate {
	float: left;
	width: 250px;
	padding: 0 10px;
	background: #464646;
	color: #fff;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
}
#cws-wpt-donate img {
	float: left;
	margin-right: 5px;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
}
#cws-wpt-donate a {
	color: #ff0;
}
#cws-wpt-donate a:hover {
	color: #fff;
}

</style>
<div id="cws-wpt-donate">
<p><img src="http://www.gravatar.com/avatar/92c23366564ee2e60bbbde9aebf9100f.png" height="64" width="64" /><?php esc_html_e( 'Hi there! If you enjoy this plugin, consider showing your appreciation by making a small donation to its author!', 'WP_Talkshoe' ); ?></p>
<p style="text-align: center"><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=UKU4GLYTP2JD8" target="_new"><?php esc_html_e( 'Click here to donate using PayPal' ); ?></a></p>
</div>
</div>
<?php

		$wpt_main='<div class="wrap"><h2>'.$wp_talkshoe_data['Name'].'</h2><a href="http://www.nmpnetwork.com/wordpress-plugins/wp-talkshoe/">WP_Talkshoe Details Page</a>';
        
		
        _e($wpt_main);
		}
        register_activation_hook(__FILE__, 'wp_talkshoe_activate');
		
		function wp_talkshoe_activate(){
        global $wp_talkshoe_data;
        $wp_talkshoe_data=get_plugin_data(__FILE__);
		$wgt_title=get_option('wgt_title');
        if ($wgt_title == ""){
		$wgt_title="Talkshoe Dynamic Widget";
		update_option('wgt_title',$wgt_title);
		}else{
		update_option('wgt_title',$wgt_title);
		}
		$showid=get_option('showid');
		if ($showid == ""){
		$showid="16829";
		update_option('showid',$showid);
		}else{
		update_option('showid',$showid);
		}
		$bgclr=get_option('bgclr');
		update_option('bgclr',$bgclr);
		$hfclr=get_option('hfclr');
		update_option('hfclr',$hfclr);
		$pefclr=get_option('pefclr');
		update_option('pefclr',$pefclr);
		$npfclr=get_option('npfclr');
		update_option('npfclr',$npfclr);
		$snfclr=get_option('snfclr');
		update_option('snfclr',$snfclr);
		$hnfclr=get_option('hnfclr');
		update_option('hnfclr',$hnfclr);
		$nefclr=get_option('nefclr');
		update_option('nefclr',$nefclr);
		$nedfclr=get_option('nedfclr');
		update_option('nedfclr',$nedfclr);
		$netfclr=get_option('netfclr');
		update_option('netfclr',$netfclr);
		$petfclr=get_option('petfclr');
		update_option('petfclr',$pettfclr);
		$npefclr=get_option('npefclr');
		update_option('npefclr',$npefclr);
		$brdclr=get_option('brdclr');
		if ($brdclr == ""){
		$brdclr="#0000FF";
		update_option('brdclr',$brdclr);
		}else{
		update_option('brdclr',$brdclr);
		}
		$blubrry=get_option('blubrry');
		update_option('blubrry',$blubrry);
		$llfclr=get_option('llfclr');
		update_option('llfclr',$llfclr);
		}


$newWidget = new WP_TalkshoeClass ();

// Begin Talkshoe Parser Class
class Talkcast {
	var $id;
	var $customStatus;
	var $name;
	var $hostName;
	var $rssUrl;
}

class Episode {
	var $id;
	var $talkcastId;
	var $startTime;
	var $name;
	var $isLive;
	var $isNext;
	var $isPast;
	var $phone;
	var $recordingUrl;	
}

// PARSER CLASSES:
class TalkShoeParser {
	function xmlDeclaration() {
		return '<?xml version="1.0"?>';
	}

	// strings tyecasting as boolean values:
	function bool($var) {
	    switch (strtolower($var)) {
	        case ("true"):
	            return true;
	            break;
	        case ("false"):
	            return false;
	            break;
	        default:
	            die("<br />\n<b>Warning:</b> Invalid argument supplied for ".__FUNCTION__." function in <b>".__FILE__."</b> on line <b>".__LINE__."</b>: the argument can contain only 'true' or 'false' values as a string.<br />\n");
	    }
	}	

	// manually add the xml declaration to the beginning of the xml document
	function makeValidXML($xml) {
		if (substr($xml, 0, strlen($this->xmlDeclaration())) != $this->xmlDeclaration()) {
			$xml = $this->xmlDeclaration() . $xml;
		}
		return $xml;
	}

	function parse($xml) {
		$xml = $this->makeValidXML($xml);
		$this->result = simplexml_load_string($xml);
		return $this->result;
	}

	// check if this xml document is valid
	function validate($xml)
	{
		libxml_use_internal_errors(true);
		$doc = new DOMDocument('1.0', 'utf-8');
		$doc->loadXML($xml);	
		$errors = libxml_get_errors();
		if (empty($errors))
		{
			return true;
		}

		$error = $errors[ 0 ];

		if ($error->level < 3)
		{
			return true;
		}

		$lines = explode("r", $xml);
		$line = $lines[($error->line)-1];
		$message = $error->message.' at line '.$error->line.':<br />'.htmlentities($line);
		return $message;
	}
}

class TalkcastInformationParser extends TalkShoeParser {
	function parse($xml)
	{

		$xml = $this->makeValidXML($xml);
		if ($this->validate($xml))
		{					
			$sxe = simplexml_load_string($xml);
			$sxe = new SimpleXMLElement($xml, NULL, false, 'http://service.axis2.pcs.com/xsd');
			$this->result = new Talkcast;
			$this->result->episodes = array();

			foreach ($sxe->return as $talkcastItems) {
				$this->result->customStatus  = $talkcastItems->customStatus;
				$this->result->hostName = $talkcastItems->hostName;
				$this->result->rssURL = $talkcastItems->rssURL;
				$this->result->name = $talkcastItems->talkcastName;
				$this->result->id = $talkcastItems->talkcastId;			
			}	

			return $this->result;
		}
		else
		{
			die($message);			
		}
	}	
}

class EpisodeListParser extends TalkShoeParser {
	function parse($xml)
	{
		$xml = $this->makeValidXML($xml);
		if ($this->validate($xml))
		{				
			$sxe = simplexml_load_string($xml);
			$this->result = array();		
			foreach ($sxe->return as $episode) {
				array_push($this->result, new Episode);
				$ep = end($this->result);							
        $full_time = getdate(strtotime($episode->episodeDate));       
        $ep->startTime = $full_time["0"];
				$ep->id = $episode->episodeId;
				$ep->name = $episode->episodeName;
				$ep->recordingUrl = $episode->recordingUrl;
				$ep->isLive = $this->bool($episode->live);
				if ($episode->next != "")
					$ep->isNext = $this->bool($episode->next);
				$ep->isPast = $this->bool($episode->past);	
				$ep->phone = $episode->phone;				
				$ep->talkcastId = $episode->talkcastId;								
			}	
			return $this->result;
		}
		else
		{
			die($message);			
		}		
	}	
}


// Begin Talkshoe Connection Class
class TalkShoeConnection {

	//disallow instantiation
	function TalkShoeConnection() {
	}

	//easier to override than a constant
	function serverPrefix() {
		return 'http://api.talkshoe.com/TalkShoeServices/services/';
	}

	//only currently-allowed value: 'TalkcastService'
	function serviceName() {
		return '';
	}

	//currently allowed values: ['getLiveShows', 'getUpcomingShows', 'getTalkcastInformation', 'getEpisodes']
	function methodName() {
		return '';
	}

	function arguments() {
		return '';
	}

	function url() {
		return $this->serverPrefix() . $this->serviceName() . '/' . $this->methodName() . '?' . $this->arguments();
	}

	function xml() {
		return file_get_contents($this->url());
	}
}

class LiveShowsConnection extends TalkShoeConnection {

	function serviceName() {
		return 'TalkcastService';
	}

	function methodName() {
		return 'getLiveShows';
	}

}

class UpcomingShowsConnection extends TalkShoeConnection {
	function UpcomingShowsConnection($count = 10, $userName = NULL) {
		$this->count = $count;
	}

	function serviceName() {
		return 'TalkcastService';
	}

	function methodName() {
		return 'getUpcomingShows';
	}

	function arguments() {		
		if (!is_null($this->count))
			return "count={$this->count}";

		return "";
	}
}

class TalkcastConnection extends TalkShoeConnection {

	function TalkcastConnection($talkcastId) {
		$this->talkcastId = $talkcastId;
	}

	function serviceName() {
		return 'TalkcastService';
	}

	function methodName() {
		return 'getTalkcastInformation';
	}

	function arguments() {
		return  "talkcastId={$this->talkcastId}";
	}
}

class EpisodesConnection extends TalkShoeConnection {
	function EpisodesConnection($talkcastId) {
		$this->talkcastId = $talkcastId;
	}

	function serviceName() {
		return 'TalkcastService';
	}

	function methodName() {
		return 'getEpisodes';
	}

	function arguments() {
		return  "talkcastId={$this->talkcastId}";
	}
}

// Begin Talkshoe Widget Code
	function run_tw() 
	{ 
    $pluginpath = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
	$showid = get_option('showid');
	$bgclr = get_option('bgclr');
	$hfclr = get_option('hfclr');
	$pefclr = get_option('pefclr');
	$npfclr = get_option('npfclr');
	$snfclr = get_option('snfclr');
	$hnfclr = get_option('hnfclr');
	$nefclr = get_option('nefclr');
	$nedfclr = get_option('nedfclr');
	$netfclr = get_option('netfclr');
	$petfclr = get_option('petfclr');
	$npefclr = get_option('npefclr');
	$brdclr = get_option('brdclr');
	$blubrry = get_option('blubrry');
	$llfclr = get_option('llfclr');

	
	$conn = new LiveShowsConnection();
	$parser = new EpisodeListParser;
	$episodes = $parser->parse($conn->xml());
	$episode = $episodes[0];
	$parser1 = new TalkcastInformationParser;
	$talkcast = $parser1->parse($conn->xml());
		    			
			$addr = 'http://api.talkshoe.com/TalkShoeServices/services/TalkcastService/getLiveShows';
			
			$ch = curl_init();
            curl_setopt ($ch, CURLOPT_URL, $addr);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 0);
            curl_setopt ($ch, CURLOPT_TIMEOUT, 1200);
            $contents = curl_exec($ch);
            curl_close($ch);
			
			preg_match_all ("'<talkcastId>(.*?)</talkcastId>'si", $contents, $tcid);
            preg_match_all ("'<talkcastName>(.*?)</talkcastName>'si", $contents, $tctitle);
            preg_match_all ("'<episodeName>(.*?)</episodeName>'si", $contents, $epname);
            preg_match_all ("'<streaming>(.*?)</streaming>'si", $contents, $sstream);
            preg_match_all ("'<playlistUrl>(.*?)</playlistUrl>'si", $contents, $playlisturl);
            preg_match_all ("'<episodeId>(.*?)</episodeId>'si", $contents, $epid);
            preg_match_all ("'<hostName>(.*?)</hostName>'si", $contents, $hostname);
            preg_match_all ("'<rssURL>(.*?)</rssURL>'si", $contents, $rssurl);
			preg_match_all ("'<streamUrl>(.*?)</streamUrl>'si", $contents, $streamurl);
            $tcid = $tcid[1];
            $tctitle = $tctitle[1];
            $epname = $epname[1];
            $sstream = $sstream[1];
            $playlisturl = $playlisturl[1];
            $epid = $epid[1];
            $hostname = $hostname[1];
            $rssurl = $rssurl[1];
			$streamurl = $streamurl[1];
            $count = count($tcid);
            			
			$addr1 = 'http://api.talkshoe.com/TalkShoeServices/services/TalkcastService/getTalkcastInformation?talkcastId='.$showid;

            $ch1 = curl_init();
            curl_setopt ($ch1, CURLOPT_URL, $addr1);
            curl_setopt ($ch1, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt ($ch1, CURLOPT_CONNECTTIMEOUT, 0);
            curl_setopt ($ch1, CURLOPT_TIMEOUT, 1200);
            $contents1 = curl_exec($ch1);
            curl_close($ch1);

            preg_match_all ("'<ns:talkcastName>(.*?)</ns:talkcastName>'si", $contents1, $showname);
			preg_match_all ("'<ns:hostName>(.*?)</ns:hostName>'si", $contents1, $hostname);
			preg_match_all ("'<ns:talkcastImage>(.*?)</ns:talkcastImage>'si", $contents1, $tcimg);
            preg_match_all ("'<ns:talkcastId>(.*?)</ns:talkcastId>'si", $contents1, $tcid3);
            $showname = $showname[1][0];
			$hostname = $hostname[1][0];
			$tcimg = $tcimg[1][0];
			$tcid3 = $tcid3[1][0];
			
			$addr2 = 'http://api.talkshoe.com/TalkShoeServices/services/TalkcastService/getUpcomingShows';
			
			$ch2 = curl_init();
            curl_setopt ($ch2, CURLOPT_URL, $addr2);
            curl_setopt ($ch2, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt ($ch2, CURLOPT_CONNECTTIMEOUT, 0);
            curl_setopt ($ch2, CURLOPT_TIMEOUT, 1200);
            $contents2 = curl_exec($ch2);
            curl_close($ch2);
			
			preg_match_all ("'<talkcastId>(.*?)</talkcastId>'si", $contents2, $tcid2);
            preg_match_all ("'<talkcastName>(.*?)</talkcastName>'si", $contents2, $tctitle2);
            preg_match_all ("'<episodeName>(.*?)</episodeName>'si", $contents2, $epname2);
            preg_match_all ("'<streaming>(.*?)</streaming>'si", $contents2, $sstream2);
            preg_match_all ("'<playlistUrl>(.*?)</playlistUrl>'si", $contents2, $playlisturl2);
            preg_match_all ("'<episodeId>(.*?)</episodeId>'si", $contents2, $epid2);
            preg_match_all ("'<hostName>(.*?)</hostName>'si", $contents2, $hostname2);
            preg_match_all ("'<rssURL>(.*?)</rssURL>'si", $contents2, $rssurl2);
			preg_match_all ("'<episodeDate>(.*?)</episodeDate>'si", $contents2, $epdate2);
            $tcid2 = $tcid2[1];
            $tctitle2 = $tctitle2[1];
            $epname2 = $epname2[1];
            $sstream2 = $sstream2[1];
            $playlisturl2 = $playlisturl2[1];
            $epid2 = $epid2[1];
            $hostname2 = $hostname2[1];
            $rssurl2 = $rssurl2[1];
			$epdate2 = $epdate2[1];
            $count = count($tcid2);
			
			$tweet = "http://twitter.com/home?status=";
			
			if (in_array($showid,$tcid)){
			$tcas = array_search($showid,$tcid);
			$showeid = $epid[$tcas];
			$showen = $epname[$tcas];
			$streamurl1 = $streamurl[$tcas];
			}
			
			if (in_array($showid,$tcid2)){
			$tcas2 = array_search($showid,$tcid2);
			$showeid2 = $epid2[$tcas2];
			$showen2 = $epname2[$tcas2];
			$epdate = $epdate2[$tcas2];
			}
			
			if (in_array($showid,$sstream)){
			$tcas3 = array_search($showid,$sstream);
			}
			
			$addr3 = 'http://recordings.talkshoe.com/rss'.$showid.'.xml';
			
			$ch3 = curl_init();
            curl_setopt ($ch3, CURLOPT_URL, $addr3);
            curl_setopt ($ch3, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt ($ch3, CURLOPT_CONNECTTIMEOUT, 0);
            curl_setopt ($ch3, CURLOPT_TIMEOUT, 1200);
            $contents3 = curl_exec($ch3);
            curl_close($ch3);
			
			preg_match_all ("'<url>(.*?)</url>'si", $contents3, $url3);
            preg_match_all ("'<$addr3->channel->item->title>(.*?)</title>'si", $contents3, $itst3);
            preg_match_all ("'<guid>(.*?)</guid>'si", $contents3, $guid3);
			preg_match_all ("'<itunes:author>(.*?)</itunes:author>'si", $contents3, $ita3);
			preg_match_all ("'<link>(.*?)</link>'si", $contents3, $link3);
            $url3 = $url3[1];
            $itst3 = $itst3[1];
            $guid3 = $guid3[1];
			$ita3 = $ita3[1];
            $count = count($url3);
			$maxEpisodes = 5;
			
			$xml = simplexml_load_file($addr3, 'SimpleXMLElement', LIBXML_NOCDATA);
			$result["title"] = $xml->xpath("/rss/channel/item/title");
			
			list ($xguid1,$xguid2,$xguid3,$xguid4,$xguid5) = $guid3;
			list ($xtitle1,$xtitle2,$xtitle3,$xtitle4,$xtitle5) = $result["title"];
			list ($xurl1) = $url3;
			
			// Add BluBrry Tracking Code if available to Past Episodes
			
			$nowplaying = "http://recordings.talkshoe.com:8000/TS-$showeid.mp3&as=0";
			$nowstreaming = "http://recordings.talkshoe.com:8000/TS-$showeid.mp3.m3u";
			
			if ($blubrry == ""){
			$nowstreaming1 = $nowstreaming1;
			$nowplaying1 = $nowplaying1;
			$xguide1 = $xguid1;
			$xguide2 = $xguid2;
			$xguide3 = $xguid3;
			}else{
			$nowstreaming1 = substr_replace($nowstreaming, $blubrry, 0, 7);
			$nowplaying1 = substr_replace($nowplaying, $blubrry, 0, 7);
			$xguide1 = substr_replace($xguid1, $blubrry, 0, 7);
			$xguide2 = substr_replace($xguid2, $blubrry, 0, 7);
			$xguide3 = substr_replace($xguid3, $blubrry, 0, 7);
			}
			$wptversion=get_option('wptversion');
			
			//Show the streaming widget badge:
			
			echo "<table border='0' align='center' cellspacing='0' bordercolor='$brdclr'>";
			echo "<tr align='center'><td style='background-color: $brdclr;'><font color='$brdclr'>| </font></td><td style='background-color: $brdclr;'></td><td style='background-color: $brdclr;'><a href='http://recordings.talkshoe.com/rss$showid.xml'><b>RSS Feed </b></a><a href='itpc://recordings.talkshoe.com/rss$showid.xml'><b>and iTunes</b></a></td><td style='background-color: $brdclr;'></td><td style='background-color: $brdclr;'><font color='$brdclr'>| </font></td></tr>";
			if (in_array($showid,$tcid)){
			echo "<tr align='center'><td style='background-color: $brdclr;'> </td><td style='background-color: $bgclr;'></td><td style='background-color: $bgclr;'><a href='http://www.talkshoe.com/tc/$showid' target='_blank'><img src='$xurl1' height='50' width='50'><br><b><font color='$snfclr'>".$showname."</b></font></a></td><td style='background-color: $bgclr;'></td><td style='background-color: $brdclr;'> </td></tr>";
			echo "<tr align='center'><td style='background-color: $brdclr;'> </td><td style='background-color: $bgclr;'></td><td style='background-color: $bgclr;'><b><font color='$hfclr'>Host: </b></font><font color='$hnfclr'>$hostname</font></td><td style='background-color: $bgclr;'> </td><td style='background-color: $brdclr;'> </td></tr>";
			echo "<tr align='center'><td style='background-color: $brdclr;'> </td><td style='background-color: $bgclr;'></td><td style='background-color: $bgclr;'><b><font color='$npfclr'>Now Playing:</b></font></td><td style='background-color: $bgclr;'></td><td style='background-color: $brdclr;'> </td></tr>";
			echo "<tr align='center'><td style='background-color: $brdclr;'> </td><td style='background-color: $bgclr;'></td><td style='background-color: $bgclr;'><font color='$npefclr'>".$showen."</font></td><td style='background-color: $bgclr;'></td><td style='background-color: $brdclr;'> </td></tr>";
			echo "<tr align='center'><td style='background-color: $brdclr;'> </td><td style='background-color: $bgclr;'></td><td style='background-color: $bgclr;'><font color='$llfclr'><b>Listen Live via Flash Player!  </b></font><br><object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0' width='165' height='38' id='niftyPlayer1' align=''><param name=movie value='$pluginpath/niftyplayer.swf?file=$nowplaying1'><param name=quality value=high><param name=bgcolor value=#000000><embed src='$pluginpath/niftyplayer.swf?file=$nowplaying1' quality=high bgcolor=#000000 width='165' height='38' name='niftyPlayer1' align='' type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/go/getflashplayer'></embed></object></td><td style='background-color: $bgclr;'></td><td style='background-color: $brdclr;'> </td></tr>";
			echo "<tr align='center'><td style='background-color: $brdclr;'> </td><td style='background-color: $bgclr;'></td><td style='background-color: $bgclr;'>";
			$showname = urlencode(urlencode($showname));
			$message = $showname." is Live NOW! ";
			$message .= "Dial 724-444-7444 Call ID ".$showid;
			$message .= " and http://www.talkshoe.com/tc/".$showid;
			$message = urldecode($message);
			echo "<tr align='center'><td style='background-color: $brdclr;'> </td><td style='background-color: $bgclr;'></td><td style='background-color: $bgclr;'><b>Listen Live via Media Player!</b><br><a href='$nowstreaming1'><img src='$pluginpath/windowsmediaplayer.gif' alt='Powered by TalkShoe' width='75' height='75' border='0'/></a></td><td style='background-color: $bgclr;'></td><td style='background-color: $brdclr;'> </td></tr>";
			echo "<tr align='center'><td style='background-color: $brdclr;'> </td><td style='background-color: $bgclr;'></td><td style='background-color: $bgclr;'><a href='$tweet$message' target='_blank'><img src='$pluginpath/tt-twitter-big3.png' border='0'></a></td><td style='background-color: $bgclr;'></td><td style='background-color: $brdclr;'> </td></tr>";
			echo "<tr align='center'><td style='background-color: $brdclr;'> </td><td style='background-color: $bgclr;'></td><td style='background-color: $bgclr;'><b>Join The Chat Room!</b><br><a href='http://www.talkshoe.com/talkshoe/web/go2prot/tscmd/tsl/$showid/$showeid' target='_blank'><img src='$pluginpath/LaunchTSLiveClassicTR.gif' border='0'/></a><br></td><td style='background-color: $bgclr;'></td><td style='background-color: $brdclr;'> </td></tr>";
			}else{
			if ($sstream[$tcas3]='false'){
            echo "<tr align='center'><td style='background-color: $brdclr;'> </td><td style='background-color: $bgclr;'></td><td style='background-color: $bgclr;'><object width='160' height='317' data='http://www.talkshoe.com/badges/badgeSm160.swf?domainId=api.talkshoe.com&masterId=$showid&colorId=blue' id='W46e01640976f216c' allowScriptAccess='always' allowNetworking='all' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash'><param name='wmode' value='transparent' /><param name='movie' value='http://www.talkshoe.com/badges/badgeSm300.swf?domainId=api.talkshoe.com&masterId=$showid&colorId=blue' /><param name='allowScriptAccess' value='always' /></object></td><td style='background-color: $bgclr;'></td><td style='background-color: $brdclr;'> </td></tr>";
			echo "<tr align='center'><td style='background-color: $brdclr;'> </td><td style='background-color: $bgclr;'></td><td style='background-color: $bgclr;'>WP-Talkshoe v$wptversion</td><td style='background-color: $bgclr;'></td><td style='background-color: $brdclr;'> </td></tr>";
			}}
			echo "<tr align='center'><td style='background-color: $brdclr;'><font color='$brdclr'>| </font> </td><td style='background-color: $brdclr;'> </td><td style='background-color: $brdclr;'><a href='http://www.talkshoe.com/tc/$showid' target='_blank'><b>Visit Site </b></a><a href='http://www.talkshoesupport.com' target='_blank'><b>or Get Support</b></a></td><td style='background-color: $brdclr;'> </td><td style='background-color: $brdclr;'> </td></tr>";
			echo "</table>";


}
			

?>