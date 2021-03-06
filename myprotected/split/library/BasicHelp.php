<?php
	/*	MIRACLE WEB TECHNOLOGIES	*/
	/*	***************************	*/
	/*	Author: Sivkovich Maxim		*/
	/*	***************************	*/
	/*	Developed: from 2013		*/
	/*	***************************	*/
	
	// Core system
	
require_once("BasicPrinter.php");
	
class BasicHelp extends BasicPrinter
{
   		public $dbh;
		
		public $table;
		public $id;
		public $item;
		
		public function __construct($dbh)
		{
			$this->dbh = $dbh;
		} 
		
		/////////////////////////////////////////////////////////////////////////////////////////////
		
		// Headers
		
		/////////////////////////////////////////////////////////////////////////////////////////////
		
		
		// Return Landing page header
		
		public function getLandingHeader($params=array(), $lpx='-1'){
			$parent		= $params['parent'];
			$alias		= $params['alias'];
			$id			= $params['id'];
			$appTable	= $params['appTable'];
			$type		= (isset($params['type']) ? $params['type'] : false);
			
			$nonactiveMsg = "Опция не активна, для активации необходимо отметить элементы из списка.";
			
			if($appTable=='none')
			{
				return "<div class='head-app' id='head-app-1'></div>";
			}
			
			$result = "
			<div class='head-app' id='head-app-1'>
		
            	<div class='r-z-h-filter'> 
            		<button class='r-z-h-f-search but-sort' id='but-sort-1' type='button' onclick='open_filtr(1);'></button>
            	    <button class='r-z-h-f-filling but-sort' id='but-sort-2' type='button' onclick='open_filtr(2);'></button>
            	    <button class='r-z-h-f-sorting but-sort' id='but-sort-3' type='button' onclick='open_filtr(3);'></button>
            	</div>
            
            	<div class='r-z-h-saving'>";
            	
			if($type)
			{
				switch($type)
				{
					case 'home_sections':
					case 'homesection3':
					case 'homesection4':
					{
						$result .= "";
						break;
					}
					case 'cf': {
						$result .= "
						<button class='rzh r-z-h-s-delete nonactive first-actives' alt='r-z-h-s-delete' type='button' title='$nonactiveMsg' 
						id='delete-checked-button' onclick=\"show_is_delete_items('$appTable');\"></button>";
						break;
					}
					case 'tasks':
					{
						$result .= "
				    		<button class='rzh r-z-h-s-create' alt='r-z-h-s-create' type='button' onclick=\"loadPage('$parent','$alias',$id,0,'cardCreate',{});\" title='Создать'>Создать &nbsp;&nbsp;&nbsp;<span>+</span></button>
							
							<button class='rzh r-z-h-s-delete nonactive first-actives' alt='r-z-h-s-delete' type='button' title='$nonactiveMsg' 
            	    		id='delete-checked-button' onclick=\"show_is_delete_items('$appTable');\"></button>
							";
						break;
					}
					case 'messages':
					{
						$result .= "
				    		<button class='rzh r-z-h-s-create' alt='r-z-h-s-create' type='button' onclick=\"loadPage('$parent','$alias',$id,0,'cardCreate',{});\" title='Создать'>Создать &nbsp;&nbsp;&nbsp;<span>+</span></button>
							
							<button class='rzh r-z-h-s-delete nonactive first-actives' alt='r-z-h-s-delete' type='button' title='$nonactiveMsg' 
            	    		id='delete-checked-button' onclick=\"show_is_delete_items('$appTable');\"></button>
							";
						break;
					}
					case 'quickOrders':
					{
						$result .= "
				    		 <button class='rzh r-z-h-s-delete nonactive first-actives' alt='r-z-h-s-delete' type='button' title='$nonactiveMsg' 
            	    		id='delete-checked-button' onclick=\"show_is_delete_items('$appTable');\"></button>
            	    
            	  			  <button class='rzh r-z-h-s-close nonactive first-actives' alt='r-z-h-s-close' type='button' title='$nonactiveMsg'
            	    		id='disactivate-checked-button' onclick=\"disactivate_items('$appTable');\"></button>
            	    
            	   			 <button class='rzh r-z-h-s-save nonactive first-actives' alt='r-z-h-s-save' type='button' title='$nonactiveMsg'
            	    		id='activate-checked-button' onclick=\"activate_items('$appTable');\"></button>
							";
						break;
					}
					case 'serv_orders_landing':
					{
						$result .= "
				    		<button class='rzh r-z-h-s-delete nonactive first-actives' alt='r-z-h-s-delete' type='button' title='$nonactiveMsg' 
            	    		id='delete-checked-button' onclick=\"show_is_delete_items('$appTable');\"></button>
							";
						break;
					}
					case 'menuLandingHeader':
					{
						$result .= "
				    		<button class='rzh r-z-h-s-close nonactive first-actives' alt='r-z-h-s-close' type='button' title='$nonactiveMsg'
            	    		id='disactivate-checked-button' onclick=\"disactivate_items('$appTable');\"></button>
            	    
            	    	<button class='rzh r-z-h-s-save nonactive first-actives' alt='r-z-h-s-save' type='button' title='$nonactiveMsg'
            	    		id='activate-checked-button' onclick=\"activate_items('$appTable');\"></button>
							";
						break;
					}
					case 'languages': {
						$result .= "
						    <button class='rzh r-z-h-s-create' alt='r-z-h-s-create' type='button' onclick=\"loadPage('$parent','$alias',$id,0,'cardCreate',{});\" title='Создать'>Создать &nbsp;&nbsp;&nbsp;<span>+</span></button>
		            		
		            	    <button class='rzh r-z-h-s-delete nonactive first-actives' alt='r-z-h-s-delete' type='button' title='$nonactiveMsg' 
		            	    		id='delete-checked-button' onclick=\"show_is_delete_items('$appTable');\"></button>
		            	    
		            	    <button class='rzh r-z-h-s-close nonactive first-actives' alt='r-z-h-s-close' type='button' title='$nonactiveMsg'
		            	    		id='disactivate-checked-button' onclick=\"disactivate_items('$appTable');\"></button>
		            	    
		            	    <button class='rzh r-z-h-s-save nonactive first-actives' alt='r-z-h-s-save' type='button' title='$nonactiveMsg'
		            	    		id='activate-checked-button' onclick=\"activate_items('$appTable');\"></button>
            			";
            			break;
					}
					case 'privacy_h': {
						$result .= "
						    <button class='rzh r-z-h-s-create' alt='r-z-h-s-create' type='button' onclick=\"loadPage('$parent','$alias',$id,0,'cardCreate',{});\" title='Создать'>Создать &nbsp;&nbsp;&nbsp;<span>+</span></button>
		            		
		            	    <button class='rzh r-z-h-s-delete nonactive first-actives' alt='r-z-h-s-delete' type='button' title='$nonactiveMsg' 
		            	    		id='delete-checked-button' onclick=\"show_is_delete_items('$appTable');\"></button>
		            	    
		            	    <button class='rzh r-z-h-s-close nonactive first-actives' alt='r-z-h-s-close' type='button' title='$nonactiveMsg'
		            	    		id='disactivate-checked-button' onclick=\"disactivate_items('$appTable');\"></button>
		            	    
		            	    <button class='rzh r-z-h-s-save nonactive first-actives' alt='r-z-h-s-save' type='button' title='$nonactiveMsg'
		            	    		id='activate-checked-button' onclick=\"activate_items('$appTable');\"></button>
            			";
            			break;
					}
					case 'gall_h': {
						$result .= "
						    <button class='rzh r-z-h-s-create' alt='r-z-h-s-create' type='button' onclick=\"loadPage('$parent','$alias',$id,0,'cardCreate',{});\" title='Создать'>Создать &nbsp;&nbsp;&nbsp;<span>+</span></button>
		            		
		            	    <button class='rzh r-z-h-s-delete nonactive first-actives' alt='r-z-h-s-delete' type='button' title='$nonactiveMsg' 
		            	    		id='delete-checked-button' onclick=\"show_is_delete_items('$appTable');\"></button>
		            	    
		            	    <button class='rzh r-z-h-s-close nonactive first-actives' alt='r-z-h-s-close' type='button' title='$nonactiveMsg'
		            	    		id='disactivate-checked-button' onclick=\"disactivate_items('$appTable');\"></button>
		            	    
		            	    <button class='rzh r-z-h-s-save nonactive first-actives' alt='r-z-h-s-save' type='button' title='$nonactiveMsg'
		            	    		id='activate-checked-button' onclick=\"activate_items('$appTable');\"></button>
            			";
            			break;
					}
					case 'translate_land':{
						$result .= "";
						break;
					}
					case 'us_data':{
						$result .= "<button class='rzh r-z-h-s-create' alt='r-z-h-s-create' type='button' onclick=\"usDataExc();\" title='Выгрузить в Excel'>Выгрузить в Excel &nbsp;&nbsp;&nbsp;<span>&darr;</span></button>";
						break;
					}
					case 'art_land':{
						$result .= "
						    <button class='rzh r-z-h-s-create' alt='r-z-h-s-create' type='button' onclick=\"loadPage('$parent','$alias',$id,0,'cardCreate',{});\" title='Создать'>Создать &nbsp;&nbsp;&nbsp;<span>+</span></button>
		            		
		            	    <button class='rzh r-z-h-s-delete nonactive first-actives' alt='r-z-h-s-delete' type='button' title='$nonactiveMsg' 
		            	    		id='delete-checked-button' onclick=\"show_is_delete_items('$appTable');\"></button>
		            	    
		            	    <button class='rzh r-z-h-s-close nonactive first-actives' alt='r-z-h-s-close' type='button' title='$nonactiveMsg'
		            	    		id='disactivate-checked-button' onclick=\"disactivate_items('$appTable');\"></button>
		            	    
		            	    <button class='rzh r-z-h-s-save nonactive first-actives' alt='r-z-h-s-save' type='button' title='$nonactiveMsg'
		            	    		id='activate-checked-button' onclick=\"activate_items('$appTable');\"></button>
            			";
						break;
					}
					// case 'events_land':{
					// 	$result .= "
					// 	    <button class='rzh r-z-h-s-create' alt='r-z-h-s-create' type='button' data-remodal-target='selectEventType' title='Создать'>Создать &nbsp;&nbsp;&nbsp;<span>+</span></button>
            		
		   //          	    <button class='rzh r-z-h-s-delete nonactive first-actives' alt='r-z-h-s-delete' type='button' title='$nonactiveMsg' 
		   //          	    		id='delete-checked-button' onclick=\"show_is_delete_items('$appTable');\"></button>
		            	    
		   //          	    <button class='rzh r-z-h-s-close nonactive first-actives' alt='r-z-h-s-close' type='button' title='$nonactiveMsg'
		   //          	    		id='disactivate-checked-button' onclick=\"disactivate_items('$appTable');\"></button>
		            	    
		   //          	    <button class='rzh r-z-h-s-save nonactive first-actives' alt='r-z-h-s-save' type='button' title='$nonactiveMsg'
		   //          	    		id='activate-checked-button' onclick=\"activate_items('$appTable');\"></button>
     //        			";
					// 	break;
					// }
					case 'flatRoomsLand':{
						$result .= "
						    
            			";
						break;
					}
					case 'reasonsLand':{
						$result .= "
						    
            			";
						break;
					}
					case 'homaBland':{
						$result .= "
						    
            			";
						break;
					}
					case 'homeMapItemsland':{
						$result .= "
						    
            			";
						break;
					}
					
					case 'th_block':{
						$result .= "
						    
            			";
						break;
					}
					
					default: break;
				}
			}else
			{
				$result .= "
				    <button class='rzh r-z-h-s-create' alt='r-z-h-s-create' type='button' onclick=\"loadPage('$parent','$alias',$id,0,'cardCreate',{});\" title='Создать'>Создать &nbsp;&nbsp;&nbsp;<span>+</span></button>
            		
            	    <button class='rzh r-z-h-s-delete nonactive first-actives' alt='r-z-h-s-delete' type='button' title='$nonactiveMsg' 
            	    		id='delete-checked-button' onclick=\"show_is_delete_items('$appTable');\"></button>
            	    
            	    <button class='rzh r-z-h-s-close nonactive first-actives' alt='r-z-h-s-close' type='button' title='$nonactiveMsg'
            	    		id='disactivate-checked-button' onclick=\"disactivate_items('$appTable');\"></button>
            	    
            	    <button class='rzh r-z-h-s-save nonactive first-actives' alt='r-z-h-s-save' type='button' title='$nonactiveMsg'
            	    		id='activate-checked-button' onclick=\"activate_items('$appTable');\"></button>
            	    
            	    
            	";
			}
			
			if($appTable=='shop_products')
			{
				$result .= "<button class='rzh r-z-h-s-create' type='button' onclick=\"export_products_to_excel();\" title='Export to Excel'>Exp Products</button>";
				$result .= "<button class='rzh r-z-h-s-create' type='button' onclick=\"export_products_dinamic_chars_to_excel();\" title='Export Dinamic Chars to Excel'>Exp Chars</button>";
			}
			
			$result .= "
            	</div>	
			</div> 
			";
			
			return $result;
		}
		
		// Return card view header
		
		public function getCardViewHeader($params=array(), $lpx='-1')
		{
			$parent		= $params['parent'];
			$alias		= $params['alias'];
			$id			= $params['id'];
			$item_id	= $params['item_id'];
			$appTable	= $params['appTable'];
			
			$result = "";
			
			$viewReturn = "
					<div class='r-z-h-return'>
            	    	<a href='javascript:void(0);' onclick=\"loadPage('$parent','$alias',$id,0,'landingPage',{});\">
            	    		<div class='return-header-icon'></div>
            	    	</a>
            		</div>
						";
						
			if(isset($params['params']['backTask']) && $params['params']['backTask'])
			{
				$viewReturn = "
					<div class='r-z-h-return'>
            	    	<a href='javascript:void(0);' onclick=\"loadPage('personal','profile-in-orders',38,0,'landingPage',{start:'1'});\">
            	    		<div class='return-header-icon'></div>
            	    	</a>
            		</div>
						";
			}
			
			if(isset($params['type']))
			{
				if($params['type'] == 'global-settings' || $params['type'] == 'shopManage') $viewReturn = "";
			}
			
			$returnIcon = "
				<div class='r-z-h-filter'> 
            		$viewReturn
            	</div>
						";
			
			if(isset($params['type']))
			{
				$pt = $params['type'];
				if($pt=='profile')
				{
					$returnIcon = "";
				}
			}
			
			$result .= "
			<div class='head-app' id='head-app-1'>
				
				$returnIcon;
				
            	<div class='r-z-h-saving'>";
            	
            if(isset($params['type']))
			{
				switch($params['type'])
				{
					case 'shopOrder':
					{
						$result .= "<button class='rzh r-z-h-s-create' type='button' onclick=\"loadPage('$parent','$alias',$id,$item_id,'cardEdit',{});\" title='Редактировать'>Редактировать &nbsp;&nbsp;&nbsp;<span></span></button>";
						if($params['params']['cancel']) $result .= "<button class='rzh r-z-h-s-create' type='button' onclick=\"open_new_modal('confirmOrderCancel',{orderId:$item_id});\" title='Отменить заказ'>Отменить заказ &nbsp;&nbsp;&nbsp;<span></span></button>";
						if($params['params']['confirm']) $result .= "<button class='rzh r-z-h-s-create' type='button' onclick=\"change_order_status($item_id,2);\" title='Подтвердить заказ'>Подтвердить заказ &nbsp;&nbsp;&nbsp;<span></span></button>";
						break;
					}
					case 'shopQuickOrder':
					{
						if($params['params']['cancel']) $result .= "<button class='rzh r-z-h-s-create' type='button' onclick=\"open_new_modal('confirmQuickOrderCancel',{orderId:$item_id});\" title='Отменить заказ'>Отменить заказ &nbsp;&nbsp;&nbsp;<span></span></button>";
						if($params['params']['confirm']) $result .= "<button class='rzh r-z-h-s-create' type='button' onclick=\"change_quick_order_status($item_id,2);\" title='Подтвердить заказ'>Подтвердить заказ &nbsp;&nbsp;&nbsp;<span></span></button>";
						// $result .= "<button class='rzh r-z-h-s-create' type='button' onclick=\"open_new_modal('sendQuickProps',{orderId:$item_id});\" title='Отправить реквизиты'>
						// 	Отправить реквизиты &nbsp;&nbsp;&nbsp;<span></span></button>";
						break;
					}
					case 'shopManage':
					{
						// <button class='rzh r-z-h-s-create' type='button' onclick=\"$('#check_import_file1').click(); $('#check_import_file2').click();\" title='Import from Excel files'>Import workabox prices</button>
						/*
						 * <button class='rzh r-z-h-s-create' type='button' onclick=\"update_data_from_workabox();\" title='Import from Excel files'>Update workabox data</button>
								<button class='rzh r-z-h-s-create' type='button' onclick=\"update_users_from_workabox();\" title='Import from Excel files'>Update workabox users</button>
						 * */
						$result .= "
								<button class='rzh r-z-h-s-create' type='button' onclick=\"loadPage('$parent','$alias',$id,$item_id,'cardEdit',{});\" title='Редактировать'>Редактировать &nbsp;&nbsp;&nbsp;<span></span></button>
						
				    			<button class='rzh r-z-h-s-create' type='button' onclick=\"export_products_to_excel();\" title='Export to Excel'>Экспорт всех товаров</button>
								
								<form name='import-products-form' id='import-products-form' action='split/excel_reader/products-import.php' method='POST' enctype='multipart/form-data' class='hidden'>
									<input type='file' name='import_file' id='check_import_file' onchange=\"$('body').css('cursor', 'progress'); $('#import-products-form').submit();\">
								</form>
								
								<button class='rzh r-z-h-s-create' type='button' onclick=\"$('#check_import_file').click();\" title='Import from Excel'>Импорт товаров</button>
								
								<form name='import-products-chars-form' id='import-products-chars-form' action='split/excel_reader/products-chars-import.php' method='POST' enctype='multipart/form-data' class='hidden'>
									<input type='file' name='import_chars_file' id='check_import_chars_file' onchange=\"$('body').css('cursor', 'progress'); $('#import-products-chars-form').submit();\">
								</form>
								
								<button class='rzh r-z-h-s-create' type='button' onclick=\"$('#check_import_chars_file').click();\" title='Import from Excel'>Импорт динамичных цен</button>
								
								<form name='import-workabox-form' id='import-workabox-form' action='split/excel_reader/workabox-import.php' method='POST' enctype='multipart/form-data' class='hidden'>
									<input type='file' name='import_file_1' id='check_import_file1' onchange=\"$('body').css('cursor', 'progress'); \">
									<input type='file' name='import_file_2' id='check_import_file2' onchange=\"$('body').css('cursor', 'progress'); $('#import-workabox-form').submit();\">
								</form>
								";
						break;
					}
					case 'messages':
					{
						break;
					}
					case 'serv_orders_view':
					{
						break;
					}
					case 'article_cat_view':
					{
						break;
					}
					case 'us_data':{
						$result .= "";
						break;
					}
					case 'global-settings':{

						$result .= "<button class='rzh r-z-h-s-create' type='button' onclick=\"loadPage('$parent','$alias',$id,$item_id,'cardEdit',{});\" title='Редактировать'>Редактировать &nbsp;&nbsp;&nbsp;<span></span></button>";

						$result .= "<button class='rzh r-z-h-s-create' type='button' onclick=\"refreshSitemap();\" title='Обновить Sitemap'>Обновить Sitemap &nbsp;&nbsp;&nbsp;<span></span></button>";
						break;
					}
					
					default:
					{
						$result .= "<button class='rzh r-z-h-s-create' type='button' onclick=\"loadPage('$parent','$alias',$id,$item_id,'cardEdit',{});\" title='Редактировать'>Редактировать &nbsp;&nbsp;&nbsp;<span></span></button>";
						
						
						break;
					}
				}
			}else
			{
				if($lpx!='-1'){
					$result .= "<button class='rzh r-z-h-s-create' type='button' onclick=\"loadPage('$parent','$alias',$id,$item_id,'cardEdit',{lpx:'$lpx'});\" title='Редактировать'>Редактировать &nbsp;&nbsp;&nbsp;<span></span></button>";
				}else{
					$result .= "<button class='rzh r-z-h-s-create' type='button' onclick=\"loadPage('$parent','$alias',$id,$item_id,'cardEdit',{});\" title='Редактировать'>Редактировать &nbsp;&nbsp;&nbsp;<span></span></button>";
				}
			}
            
			$result .= 	
				"</div>
				
			</div>
			";
			
			return $result;
		}
		
		// Return card edit header
		
		public function getCardEditHeader($params=array())
		{
			$parent		= $params['parent'];
			$alias		= $params['alias'];
			$id			= $params['id'];
			$item_id	= $params['item_id'];
			$appTable	= $params['appTable'];
			
			$result = "";
			
			$editBack = "loadPage('$parent','$alias',$id,$item_id,'cardView',{});";
			
			if($alias != "global-settings" && $alias != "shop-manage" && $alias != "profile")
			{
				$editBack = "loadPage('$parent','$alias',$id,0,'landingPage',{start:1});";
			}
			
			$result .= "
				<div class='head-app' id='head-app-1'>
			
        	    	<div class='r-z-h-filter'> 
        	    		<div class='r-z-h-return'>
        	    	    	<a href='javascript:void(0);' onclick=\"$editBack\">
        	    	    		<div class='return-header-icon'></div>
        	    	    	</a>
        	    		</div>
        	    	</div>
        	    
        	    	<div class='r-z-h-saving'>";
        	
			if(isset($params['type']))
			{
				switch($params['type'])
				{
					case 'shopOrder':
					{
						$result .= "<button class='rzh r-z-h-s-create' type='button' onclick=\"submit_save_form(1);\" title='Сохранить и перейти к просмотру'>Сохранить &nbsp;&nbsp;&nbsp;<span></span></button>";
						if($params['params']['cancel']) $result .= "<button class='rzh r-z-h-s-create' type='button' onclick=\"open_new_modal('confirmOrderCancel',{orderId:$item_id});\" title='Отменить заказ'>Отменить заказ &nbsp;&nbsp;&nbsp;<span></span></button>";
						if($params['params']['confirm']) $result .= "<button class='rzh r-z-h-s-create' type='button' onclick=\"change_order_status($item_id,2);\" title='Подтвердить заказ'>Подтвердить заказ &nbsp;&nbsp;&nbsp;<span></span></button>";
						break;
					}
					case 'users-levels':
					{
						$result .=	"<button class='rzh r-z-h-s-create' type='button' onclick=\"submit_save_form(3);\" title='Сохранить и редактировать'>Сохранить &nbsp;&nbsp;&nbsp;<span></span></button>";
						break;
					}
					case 'profile':
					{
						$result .=	"<button class='rzh r-z-h-s-create' type='button' onclick=\"submit_save_form(3);\" title='Сохранить и редактировать'>Сохранить &nbsp;&nbsp;&nbsp;<span></span></button>";
						break;
					}
					case 'global-settings':
					{
						$result .=	"<button class='rzh r-z-h-s-create' type='button' onclick=\"submit_save_form(1);\" title='Сохранить и перейти к просмотру'>Сохранить &nbsp;&nbsp;&nbsp;<span></span></button>";
						break;
					}
					case 'menuEditHeader':
					{
						$result .=	"
							<button class='rzh r-z-h-s-create' type='button' onclick=\"submit_save_form(1);\" title='Сохранить и перейти к просмотру'>Сохранить &nbsp;&nbsp;&nbsp;<span></span></button>
						
						<button class='rzh r-z-h-s-close' type=\"button\" title='Сохранить и вернуться к списку' onclick=\"submit_save_form(2);\"></button>
        	    		<button class='rzh r-z-h-s-save' type='button' title='Сохранить и редактировать' onclick=\"submit_save_form(3);\"></button>
						";
						break;
					}
					case 'translate_edit':
					{
						$result .=	"
							<button class='rzh r-z-h-s-create' type='button' onclick=\"submit_save_form(1);\" title='Сохранить и перейти к просмотру'>Сохранить &nbsp;&nbsp;&nbsp;<span></span></button>
						
						<button class='rzh r-z-h-s-close' type=\"button\" title='Сохранить и вернуться к списку' onclick=\"submit_save_form(2);\"></button>
        	    		<button class='rzh r-z-h-s-save' type='button' title='Сохранить и редактировать' onclick=\"submit_save_form(3);\"></button>
						";
						break;
					}
					case 'art_land':{
						$result .=	"
        	    	    <button class='rzh r-z-h-s-create' type='button' onclick=\"submit_save_form(1);\" title='Сохранить и перейти к просмотру'>Сохранить &nbsp;&nbsp;&nbsp;<span></span></button>
						
						<button class='rzh r-z-h-s-close' type=\"button\" title='Сохранить и вернуться к списку' onclick=\"submit_save_form(2);\"></button>
        	    		<button class='rzh r-z-h-s-save' type='button' title='Сохранить и редактировать' onclick=\"submit_save_form(3);\"></button>
        	    		
            			";
						break;
					}
					case 'privacy_h':{
						$result .=	"
	        	    	    <button class='rzh r-z-h-s-create' type='button' onclick=\"submit_save_form(1);\" title='Сохранить и перейти к просмотру'>Сохранить &nbsp;&nbsp;&nbsp;<span></span></button>
							
							<button class='rzh r-z-h-s-close' type=\"button\" title='Сохранить и вернуться к списку' onclick=\"submit_save_form(2);\"></button>
	        	    		<button class='rzh r-z-h-s-save' type='button' title='Сохранить и редактировать' onclick=\"submit_save_form(3);\"></button>
	            	";
						break;
					}
					case 'gall_h':{
						$result .=	"
	        	    	    <button class='rzh r-z-h-s-create' type='button' onclick=\"submit_save_form(1);\" title='Сохранить и перейти к просмотру'>Сохранить &nbsp;&nbsp;&nbsp;<span></span></button>
							
							<button class='rzh r-z-h-s-close' type=\"button\" title='Сохранить и вернуться к списку' onclick=\"submit_save_form(2);\"></button>
	        	    		<button class='rzh r-z-h-s-save' type='button' title='Сохранить и редактировать' onclick=\"submit_save_form(3);\"></button>
	            	";
						break;
					}
					default: break;
				}
			}else
			{
				$result .=	"
        	    	    <button class='rzh r-z-h-s-create' type='button' onclick=\"submit_save_form(1);\" title='Сохранить и перейти к просмотру'>Сохранить &nbsp;&nbsp;&nbsp;<span></span></button>
						
						<button class='rzh r-z-h-s-close' type=\"button\" title='Сохранить и вернуться к списку' onclick=\"submit_save_form(2);\"></button>
        	    		<button class='rzh r-z-h-s-save' type='button' title='Сохранить и редактировать' onclick=\"submit_save_form(3);\"></button>
            	";
			}
			$resilt .= 		"</div>
				
				</div>
			";
			
			return $result;
		}
		
		// Return card create header
		
		public function getCardCreateHeader($params=array())
		{
			$parent		= $params['parent'];
			$alias		= $params['alias'];
			$id			= $params['id'];
			$item_id	= $params['item_id'];
			$appTable	= $params['appTable'];
			
			$result = "";
			
			$result .= "
				<div class='head-app' id='head-app-1'>
		
            		<div class='r-z-h-filter'> 
            			<div class='r-z-h-return'>
                			<a href='javascript:void(0);' onclick=\"loadPage('$parent','$alias',$id,0,'landingPage',{});\">
                				<div class='return-header-icon'></div>
                			</a>
            			</div>
            		</div>
            
            		<div class='r-z-h-saving'>
            		";
					if(isset($params['type']))
					{
						switch($params['type'])
						{
							case 'users-levels':
							{
								$result .= "<button class='rzh r-z-h-s-create' type='button' onclick=\"submit_create_form(2);\" title='Создать и вернуться к списку'>Сохранить &nbsp;&nbsp;&nbsp;<span></span></button>";
								break;
							}
							case 'messages':
							{
								$result .= "<button class='rzh r-z-h-s-create' type='button' onclick=\"submit_create_form(2);\" title='Создать и вернуться к списку'>Отправить &nbsp;&nbsp;&nbsp;<span></span></button>";
								break;
							}
							case 'shopOrder':
							{
								$result .= "<button class='rzh r-z-h-s-create' type='button' title='Создать и перейти к просмотру' onclick=\"submit_create_form(3);\">Сохранить &nbsp;&nbsp;&nbsp;<span></span></button>";
								break;
							}
							case 'art_land':
							{
								$result .= "
								<button class='rzh r-z-h-s-create' type='button' onclick=\"submit_create_form(1);\" title='Создать и очистить форму'>Сохранить &nbsp;&nbsp;&nbsp;<span></span></button>
		            			
		                		<button class='rzh r-z-h-s-close' type=\"button\" title='Создать и вернуться к списку' onclick=\"submit_create_form(2);\"></button>
		            			<button class='rzh r-z-h-s-save' type='button' title='Создать и редактировать' onclick=\"submit_create_form(3);\"></button>
		            			
								";
								break;
							}
							case 'languages': {
								$result .= "
								<button class='rzh r-z-h-s-create' type='button' onclick=\"submit_create_form(1);\" title='Создать и очистить форму'>Сохранить &nbsp;&nbsp;&nbsp;<span></span></button>
		            			
		                		<button class='rzh r-z-h-s-close' type=\"button\" title='Создать и вернуться к списку' onclick=\"submit_create_form(2);\"></button>
		            			<button class='rzh r-z-h-s-save' type='button' title='Создать и редактировать' onclick=\"submit_create_form(3);\"></button>
		            			
								";
		            			break;
							}
							case 'privacy_h': {
								$result .= "
								<button class='rzh r-z-h-s-create' type='button' onclick=\"submit_create_form(1);\" title='Создать и очистить форму'>Сохранить &nbsp;&nbsp;&nbsp;<span></span></button>
		            			
		                		<button class='rzh r-z-h-s-close' type=\"button\" title='Создать и вернуться к списку' onclick=\"submit_create_form(2);\"></button>
		            			<button class='rzh r-z-h-s-save' type='button' title='Создать и редактировать' onclick=\"submit_create_form(3);\"></button>
		            			
								";
		            			break;
							}
							case 'gall_h': {
								$result .= "
								<button class='rzh r-z-h-s-create' type='button' onclick=\"submit_create_form(1);\" title='Создать и очистить форму'>Сохранить &nbsp;&nbsp;&nbsp;<span></span></button>
		            			
		                		<button class='rzh r-z-h-s-close' type=\"button\" title='Создать и вернуться к списку' onclick=\"submit_create_form(2);\"></button>
		            			<button class='rzh r-z-h-s-save' type='button' title='Создать и редактировать' onclick=\"submit_create_form(3);\"></button>
		            			
								";
		            			break;
							}
							default: break;
						}
					}
					else
					{
						$result .= "
						<button class='rzh r-z-h-s-create' type='button' onclick=\"submit_create_form(1);\" title='Создать и очистить форму'>Сохранить &nbsp;&nbsp;&nbsp;<span></span></button>
            			
                		<button class='rzh r-z-h-s-close' type=\"button\" title='Создать и вернуться к списку' onclick=\"submit_create_form(2);\"></button>
            			<button class='rzh r-z-h-s-save' type='button' title='Создать и редактировать' onclick=\"submit_create_form(3);\"></button>
            			
						";
					}
					$result .= "
					</div>
				</div>
			";
			
			return $result;
		}
		
		
		/////////////////////////////////////////////////////////////////////////////////////////////
		
		// Content
		
		/////////////////////////////////////////////////////////////////////////////////////////////
		
		// Return filter form for Landing page
		
		public function getLandingFilterForm($params=array())
		{
			$result = "";
			
			$result .= "
				<div class='r-z-c-filter' id='filtr-wrap'>
            		<form name='wp-filtr-form' id='wp-filtr-form' action='#' method='POST'>
				
					<input type='hidden' name='start' value='1'>
				
            		<div class='r-z-c-f-search top-filtr' id='filtr-1'>
                	
                    	<input id='on-materials' class='filtr-form-group' type='text' placeholder='Search key' name='filtr_search_key' 
								value='".( (isset($params['params']['filtr']['filtr_search_key']) && trim($params['params']['filtr']['filtr_search_key']) != "") ? $params['params']['filtr']['filtr_search_key'] : "" )."' />
                        <div class='styled-select filtr-form-group'>
                            <select class='sampling_changed' name='filtr_search_field' >";
                        foreach($params['filter1_options'] as $header => $value)
						{
							$curr_selected = ( (isset($params['params']['filtr']['filtr_search_field']) && $params['params']['filtr']['filtr_search_field']==$value) ? "selected" : "");
							$result .= "<option $curr_selected value='$value'>$header</option>";
						}
						
			$result .= "
							</select>
                        </div>
                        <button class='r-z-h-s-create-sm filtr-form-group' type='button' onclick=\" 
										loadPage('".$params['headParams']['parent']."','".$params['headParams']['alias']."',".$params['headParams']['id'].",0,'landingPage',{start:'1',filtr:$('#wp-filtr-form').serialize()});\">Поиск</button>
                        
                        <button class='r-z-h-s-close-sm filtr-form-group' id='close-filter' type='reset' onclick='reset_filter_params();'></button>
                        
                </div><!-- r-z-c-f-search -->
                
                <div class='r-z-c-f-filling top-filtr' id='filtr-2'>";
                	foreach($params['filter2_options'] as $header => $field)
					{
						$style1 = "";
						$style2 = "";
						
						if($field['type']=='allCatalog')
						{
							$style1="width:400px;";
							$style2="width:100%;";
						}
						
						$result .= "
						<div class='r-z-c-f-fil-select-item' style='$style1'>
                        	<label for='r-z-c-f-fil-category'>$header</label>
                            <br>
                            <div class='styled-select' style='$style2'>               	
                                <select  style='$style2' class='sampling_changed' id='r-z-c-f-fil-category-".$field['fieldName']."' name='massive[".$field['fieldName']."]' onchange=\"$.cookie('local_filtr_".md5($field['fieldName'])."',$(this).val());  
										loadPage('".$params['headParams']['parent']."','".$params['headParams']['alias']."',".$params['headParams']['id'].",0,'landingPage',{start:'1',filtr:$('#wp-filtr-form').serialize()});\">
                                	<option ".( (isset($params['params']['filtr']['massive'][$field['fieldName']]) && $params['params']['filtr']['massive'][$field['fieldName']]==(-1)) ? "selected" : "")." value='-1' data-skip='1'>Все варианты</option>
						";
						
						if(isset($field['top_include']) && $field['top_include'])
						{
							$curr_selected = "";
							
							if(isset($_COOKIE["local_filtr_".md5($field['fieldName'])]) && $_COOKIE["local_filtr_".md5($field['fieldName'])]==0)
									{
										$curr_selected = "selected";
									}
							
							$result .= "<option $curr_selected ".( (isset($params['params']['filtr']['massive'][$field['fieldName']]) && $params['params']['filtr']['massive'][$field['fieldName']]==0) ? "selected" : "")." value='0'>Верхняя категория</option>";
						}
						
						if(isset($field['type']) && $field['type']=='brandTree')
						{
							foreach($field['params'] as $paramHeader => $value)
							{
								$result .= "<optgroup label='".$value['name']."' value='".$value['id']."'></optgroup>";
								foreach($value['childs'] as $child)
								{
									if(isset($_COOKIE["local_filtr_".md5($field['fieldName'])]) && $_COOKIE["local_filtr_".md5($field['fieldName'])]==$child['id'])
									{
										$curr_selected = "selected";
									}else
									{
										$curr_selected = ( (isset($params['params']['filtr']['massive'][$field['fieldName']]) && $params['params']['filtr']['massive'][$field['fieldName']]==$child['id']) ? "selected" : "");
									}
									
									$result .= "<option $curr_selected value='".$child['id']."'> - ".$child['name']."</option>";
								}
							}
						}elseif(isset($field['type']) && $field['type']=='allCatalog')
						{
							$curr_val = (isset($_COOKIE["local_filtr_".md5($field['fieldName'])]) ? $_COOKIE["local_filtr_".md5($field['fieldName'])] : 0);
							
							$result .= $this->convTreeToSecelt($field['params'],0,$curr_val);
						}else
						{
							foreach($field['params'] as $paramHeader => $value)
							{
								if(isset($_COOKIE["local_filtr_".md5($field['fieldName'])]) && $_COOKIE["local_filtr_".md5($field['fieldName'])]==$value)
								{
									$curr_selected = "selected";
								}else
								{
									$curr_selected = ( (isset($params['params']['filtr']['massive'][$field['fieldName']]) && $params['params']['filtr']['massive'][$field['fieldName']]==$value) ? "selected" : "");
								}
								$result .= "<option $curr_selected value='$value'>$paramHeader</option>";
							}
						}
						
						$result .= "
								</select>
                            </div><!-- styled-select -->
                        </div><!-- r-z-c-f-fil-select-item -->
						";
					}
                                
					
                $result .= " 
				
				</div><!-- r-z-c-f-filling -->
                	
                <div class='r-z-c-f-sorting top-filtr' id='filtr-3'>
                
                        <div class='r-z-c-f-fil-select-item'>
                        	<label for='r-z-c-f-sort-by'>Сортировать по</label>
                            <br>
                            <div class='styled-select'>               	
                                <select id='r-z-c-f-sort-by' name='sort_filtr' onchange=\" $.cookie('local_filtr_".md5('sort_on')."',$(this).val());
										loadPage('".$params['headParams']['parent']."','".$params['headParams']['alias']."',".$params['headParams']['id'].",0,'landingPage',{start:'1',filtr:$('#wp-filtr-form').serialize()});\">";
                        foreach($params['filter3_options']['sort'] as $header => $value)
						{
							if(isset($_COOKIE["local_filtr_".md5('sort_on')]) && $_COOKIE["local_filtr_".md5('sort_on')]==$value)
								{
									$curr_selected = "selected";
								}else
								{
									$curr_selected = ( (isset($params['params']['filtr']['sort_filtr']) && $params['params']['filtr']['sort_filtr']==$value) ? "selected" : "");
								}
							$result .= "<option $curr_selected name='sort_filtr' value='$value'>$header</option>";
						}
								
                            $result .= "  
								</select><!-- r-z-c-f-fil-category -->
                            </div>
                        </div><!-- r-z-c-f-fil-select-item 1-->
                        
                        <div class='r-z-c-f-fil-select-item'>
                        	<label for='r-z-c-f-sort-order'>Порядок отображения</label>
                            <br>
                            <div class='styled-select'>                	
                                <select id='r-z-c-f-sort-order' name='order_filtr' onchange=\" $.cookie('local_filtr_".md5('sort_by')."',$(this).val());
										loadPage('".$params['headParams']['parent']."','".$params['headParams']['alias']."',".$params['headParams']['id'].",0,'landingPage',{start:'1',filtr:$('#wp-filtr-form').serialize()});\">";
                        foreach($params['filter3_options']['order'] as $header => $value)
						{
							if(isset($_COOKIE["local_filtr_".md5('sort_by')]) && $_COOKIE["local_filtr_".md5('sort_by')]==$value)
								{
									$curr_selected = "selected";
								}else
								{
									$curr_selected = ( (isset($params['params']['filtr']['order_filtr']) && $params['params']['filtr']['order_filtr']==$value) ? "selected" : "");
								}
							$result .= "<option $curr_selected value='$value'>$header</option>";
						}
                            $result .= "    
								</select><!-- r-z-c-f-fil-category -->
                            </div>
                        </div><!-- r-z-c-f-fil-select-item 2-->
                        
                        <div class='r-z-c-f-fil-select-item'>
                        	<label for='r-z-c-f-sort-amount'>Выводить по</label>
                            <br>
                            <div class='styled-select'>                	
                                <select id='r-z-c-f-sort-amount' name='quant_filtr' onchange=\"$.cookie('global_on_page',$(this).val()); 
										loadPage('".$params['headParams']['parent']."','".$params['headParams']['alias']."',".$params['headParams']['id'].",0,'landingPage',{start:'1',filtr:$('#wp-filtr-form').serialize()});\">
                                    <option ".($params['on_page'] == 10 ? "selected" : "")." data-skip='1' value='10'>10</option>
									<option ".($params['on_page'] == 15 ? "selected" : "")." data-skip='1' value='15'>15</option>
									<option ".($params['on_page'] == 30 ? "selected" : "")." data-skip='1' value='30'>30</option>
									<option ".($params['on_page'] == 45 ? "selected" : "")." data-skip='1' value='45'>45</option>
									<option ".($params['on_page'] == 60 ? "selected" : "")." data-skip='1' value='60'>60</option>
									<option ".($params['on_page'] == 75 ? "selected" : "")." data-skip='1' value='75'>75</option>
                                </select><!-- r-z-c-f-fil-category -->
                            </div>
                        </div><!-- r-z-c-f-fil-select-item 3-->
                </div><!-- r-z-c-f-sorting -->
                
                </form>
            </div><!-- r-z-c-filter -->
			";
			
			return $result;
		}
		
		// Return Items Table for Landing page
		
		public function getItemsTable($params=array())
		{
			$result = "";
			
			$result .=  "<div class='ipad-20 hidden' id='upper-table-ajax-inform'></div>
						<div class='r-z-c-table'>
            				<table class='maintable' id='main-table'>
                    			<div class='head-tr'>
						";
            foreach($params['tableColumns'] as $columnHeader => $columnParams)
			{
				switch($columnParams['type'])
				{
					case 'checkbox':
					{
						$result .= "
						<th class='main-t-th check-col' style='line-height:37px; padding-left:4px;'>
                        	<input	type='checkbox' 
                            		name='checkerAll' 
                                    class='table-checkbox' 
                                    id='checkAll'
                                    value='null' 
                                    onclick='select_all_checked();'>
                             <label	class='tab-check-lab' 
                            		for='checkAll'>&nbsp;&nbsp;</label>
                        </th>
						";
						break;
					}
					default:
					{
						$result .= "<th class='main-t-th'>$columnHeader</th>";
					} break;
				}
			}        	
			
			$result .= "
						</div>
                	<tbody>
					";	
					
			$icnt = 0;
			
			foreach($params['itemsList'] as $item)
			{
				$icnt++;
				$iid = $item['id'];

				$fixed_type = (isset($item['fixed']) && $item['fixed'] ? $item['fixed'] : 0);
				$iclass = ($icnt%2==1 ? "trcolor" : "");
		
				$result .= "
						<tr class='$iclass' id='$iid'>
						";
				foreach($params['tableColumns'] as $columnHeader => $columnParams)
				{
					switch($columnParams['type'])
					{
						case 'firstColumn':
						{
							$result .= "<td class='check-col'>&nbsp;</td>";
							break;
						}
						case 'update_cat_pos':
						{
							$result .= "<td class='main-t-td-name'><input style='width:50px; text-align:center;' name='cat_pos' id='cat_pos_$iid' value='".$item['pos']."' onchange='update_cat_pos($iid,$(this).val());' /></td>";
							break;
						}
						case 'checkbox':
						{
							if ($columnParams['fixed_cb_id'] == 1) {
								$fixed_id = $columnParams['fixed_cb_id'];
							}else{
								$fixed_id = 9999989;
							}
							if ($fixed_id == $fixed_type) {
								$result .= "
									<td class='check-col'>
		        	    				
		        	    			</td>
							   ";
							}else{	
								$result .= "
									<td class='check-col'>
		        	    				<input	type='checkbox' 
		        	    	    			name='checker$iid' 
		        	    	        	    class='table-checkbox' 
		        	    	        	    id='check$iid'
		        	    	        	    value='$iid'
		        	    	        	    onchange=\"scan_active_checked();\">
		        	    	    		<label	class='tab-check-lab' 
		        	    	    			for='check$iid'>&nbsp;&nbsp;</label>
		        	    			</td>
							   ";
							}
							break;
						}
						case 'block':
						{
							if(isset($columnParams['params']['reverse'])){
								$result .= "<td class='publication'>
									<div class='".($item[$columnParams['field']] ? "published" : "not-published")."'></div>
                    				<span>".($item[$columnParams['field']] ? "Yes" : "No")."</span>
								</td>";
							}elseif(isset($columnParams['params']['reverse2'])){
								$result .= "<td class='publication'>
									<div class='".($item[$columnParams['field']] ? "not-published" : "published")."'></div>
                    				<span>".($item[$columnParams['field']] ? "Yes" : "No")."</span>
								</td>";
							}elseif(isset($columnParams['params']['rev_fix'])){
								$result .= "<td class='publication'>
									<div class='".($item[$columnParams['field']] ? "published" : "not-published")."'></div>
                    				<span>".($item[$columnParams['field']] ? "Yes" : "No")."</span>
								</td>";
							}else{
								$result .= "<td class='publication'>
									<div class='".(!$item[$columnParams['field']] ? "published" : "not-published")."'></div>
                    				<span>".(!$item[$columnParams['field']] ? "Yes" : "No")."</span>
								</td>";
							}
							break;
						}
						case 'text_type':
						{


							if(isset($item[$columnParams['field']]) && $item[$columnParams['field']] == 1){
								$result .= "<td>
									<div>Планировка квартиры</div>
								</td>";
							}elseif(isset($item[$columnParams['field']]) && $item[$columnParams['field']] == 2){
								$result .= "<td>
									<div>Планировка таунхауса</div>
								</td>";
							}
							break;
						}

						
						case 'cardView':
						{
							if(isset($columnParams['lpx']))
							{
								if($columnParams['lpx'])
								{
									$result .= "<td class='main-t-td-name'>
											<a class='view-link'	href='javascript:void(0);' onclick=\"loadPage('".$params['headParams']['parent']."','".$params['headParams']['alias']."',".$params['headParams']['id'].",$iid,'cardView',{lpx:''});\"><img title='Детальный просмотр' src='split/img/glaz.png'></a>
                            			</td>";
								}else{
									$result .= "<td class='main-t-td-name'>
											<a class='view-link'	href='javascript:void(0);' onclick=\"loadPage('".$params['headParams']['parent']."','".$params['headParams']['alias']."',".$params['headParams']['id'].",$iid,'cardView',{});\"><img title='Детальный просмотр' src='split/img/glaz.png'></a>
                            			</td>";
								}
							}
							elseif(isset($columnParams['params']))
							{
								if(isset($columnParams['params']['type']))
								{
									switch($columnParams['params']['type'])
									{
										case 'orderView':
										{
											$result .= "<td class='main-t-td-name'>
											<a class='view-link'	href='javascript:void(0);' onclick=\"loadPage('shop','order-form',20,$iid,'cardView',{});\"><img title='Детальный просмотр' src='split/img/glaz.png'></a>
                            			</td>";
											break;
											// $columnParams['field']
										}
										case 'orderViewTask':
										{
											$result .= "<td class='main-t-td-name'>
											<a class='view-link'	href='javascript:void(0);' onclick=\"loadPage('shop','order-form',20,$iid,'cardView',{backTask:'1'});\"><img title='Детальный просмотр' src='split/img/glaz.png'></a>
                            			</td>";
											break;
										}
										case 'quickOrderViewTask':
										{
											$result .= "<td class='main-t-td-name'>
											<a class='view-link'	href='javascript:void(0);' onclick=\"loadPage('shop','quick-order-form',45,$iid,'cardView',{backTask:'1'});\"><img title='Детальный просмотр' src='split/img/glaz.png'></a>
                            			</td>";
											// loadPage('shop','shop-quick-orders',44,1,'cardView',{});
											break;
										}
										default:
										{
											$result .= "<td class='main-t-td-name'>-</td>";
											break;
										}
									}
								}else{
									$result .= "<td class='main-t-td-name'>-</td>";
									}
							}else
							{
								$result .= "<td class='main-t-td-name'>
											<a class='view-link'	href='javascript:void(0);' onclick=\"loadPage('".$params['headParams']['parent']."','".$params['headParams']['alias']."',".$params['headParams']['id'].",$iid,'cardView',{});\"><img title='Детальный просмотр' src='split/img/glaz.png'></a>
                            			</td>";
							}
							break;
						}
						case 'cardEdit':
						{
							if(isset($columnParams['lpx']))
							{
								if($columnParams['lpx'])
								{
									$result .= "<td class='main-t-td-name'>
											<a class='view-edit'	href='javascript:void(0);' onclick=\"loadPage('".$params['headParams']['parent']."','".$params['headParams']['alias']."',".$params['headParams']['id'].",$iid,'cardEdit',{lpx:''});\"><img title='Редактировать' src='split/img/edit.png'></a>
                            			</td>";
								}else{
									$result .= "<td class='main-t-td-name'>
											<a class='view-edit'	href='javascript:void(0);' onclick=\"loadPage('".$params['headParams']['parent']."','".$params['headParams']['alias']."',".$params['headParams']['id'].",$iid,'cardEdit',{});\"><img title='Редактировать' src='split/img/edit.png'></a>
                            			</td>";
								}
							}
							else
							{
								$result .= "<td class='main-t-td-name'>
											<a class='view-edit'	href='javascript:void(0);' onclick=\"loadPage('".$params['headParams']['parent']."','".$params['headParams']['alias']."',".$params['headParams']['id'].",$iid,'cardEdit',{});\"><img title='Редактировать' src='split/img/edit.png'></a>
                            			</td>";
							}
							break;
						}
						case 'parent':
						{
							$result .= "<td>".($item[$columnParams['field']] ? $item[$columnParams['field']] : "Верхняя категория")."</td>";
							break;
						}
						case 'date':
						{
							//$result .= "<td>".date($columnParams['params']['format'],strtotime($item[$columnParams['field']]))."</td>";
							if(isset($columnParams['params']) && isset($columnParams['params']['function']) && $columnParams['params']['function']=="long")
							{
								$result .= "<td>".$this->deformat_long_date($item[$columnParams['field']])."</td>";
							}else
							{
								$result .= "<td>".$this->deformat_date($item[$columnParams['field']])."</td>";
							}
						}
						default:
						{
							if(isset($columnParams['params']))
							{
								if(isset($columnParams['params']['secondField']))
								{
									if(isset($columnParams['params']['type']))
									{
										switch($columnParams['params']['type'])
										{
											case 'dialog':
											{
												$mess_vector = ($item['from_id']==ADMIN_ID ? "to_" : "from_");
												$result .= "<td class='main-t-td-name'>
															<a	href='javascript:void(0);' onclick=\"loadPage('".$params['headParams']['parent']."','".$params['headParams']['alias']."',".$params['headParams']['id'].",$iid,'cardView',{});\">
															".$item[$mess_vector.$columnParams['field']].$columnParams['params']['separate'].$item[$mess_vector.$columnParams['params']['secondField']]."
															</a>
															</td>";
												break;
											}
											default:
											{
												$result .= "<td>-</td>";
												break;
											}
										}
									}else
									{
										$result .= "<td>".$item[$columnParams['field']].$columnParams['params']['separate'].$item[$columnParams['params']['secondField']]."</td>";
									}
								}
								if(isset($columnParams['params']['math']))
								{
									$math_val = $columnParams['params']['value'];
									$math_res = 0;
									
									switch($columnParams['params']['math'])
									{
										case '+':{ $math_res = $item[$columnParams['field']] + $math_val; break; }
										
										case '-':{ $math_res = $item[$columnParams['field']] - $math_val; break; }
										
										case '*':{ $math_res = $item[$columnParams['field']] * $math_val; break; }
										
										case '/':{ $math_res = $item[$columnParams['field']] / $math_val; break; }
										
										default: break;
									}
									
									$result .= "<td>".$math_res."</td>";
								}
								if(isset($columnParams['params']['replace']))
								{
									$sovpalo = false;
									foreach($columnParams['params']['replace'] as $rep_header => $rep_value)
									{
										if($item[$columnParams['field']] == $rep_header)
										{
											$sovpalo = true;
											
											$status_light = "";
											
											if($columnParams['field']=='status')
											{
												if($item['status']==0){ $status_light = "<div class='not-published'></div> "; }
												if($item['status']==1){ $status_light = "<div class='rev-published'></div> "; }
												if($item['status']==2){ $status_light = "<div class='published'></div> "; }
											}
											
											$result .= "<td class='publication'>$status_light<span>".$rep_value."</span></td>";
											break;
										}
									}
									if(!$sovpalo)
									{
										$result .= "<td>".$item[$columnParams['field']]."</td>";
									}
								}
							}else
							{
								if(trim($item[$columnParams['field']])=="")
								{
									$result .= "<td>[пусто]</td>";
								}else
								{ 
									$result .= "<td>".$item[$columnParams['field']]."</td>";
								}
							}
							break;
						}
					}
				}
								
                $result .= "</tr>";
			}
	
			$result .= "
						</tbody>
                	</table>
            	</div>
				";
				
			return $result;			
		}
		
		// Return pagination for Landing page
		
		public function getLandingPagination($params=array())
		{
			$result = "";
			
			$countRelatedPages = 4;
			
			$result .= "
			<div class='manage-pages'>
				<div class='page-navigation'>
                	";
                    if($params['start_page'] > 2)
					{
						$result .= "
						<button id='leap-back' class='page-nav-step' type='button' onclick=\"loadPage('".$params['headParams']['parent']."','".$params['headParams']['alias']."',".$params['headParams']['id'].",0,'landingPage',{start:'1',filtr:$('#wp-filtr-form').serialize()});\"> << </button>
                    	<button id='step-back' class='page-nav-step' type='button' onclick=\"loadPage('".$params['headParams']['parent']."','".$params['headParams']['alias']."',".$params['headParams']['id'].",0,'landingPage',{start:'".($params['start_page']-1)."',filtr:$('#wp-filtr-form').serialize()});\"> < </button>
						";
					}
					
					$result .= "<ul id='page-nav-left-items' class='page-nav-items'>";
					
					for($i=1; $i<=$params['pages']; $i++)
					{
						if($i < $params['start_page']-$countRelatedPages) continue;
						if($i > $params['start_page']+$countRelatedPages) break;
		
						$result .= "<li class='".($params['start_page']==$i ? "active" : "")."' onclick=\"loadPage('".$params['headParams']['parent']."','".$params['headParams']['alias']."',".$params['headParams']['id'].",0,'landingPage',{start:'".$i."',filtr:$('#wp-filtr-form').serialize()});\"><a href='javascript:void(0);'>$i</a></li>";
					}
					
					$result .= "</ul>"; // closeNavItems
					
                    if($params['start_page'] < $params['pages']-1)
					{
						$result .= "
						<button id='step-forward' class='page-nav-step' type='button' onclick=\"loadPage('".$params['headParams']['parent']."','".$params['headParams']['alias']."',".$params['headParams']['id'].",0,'landingPage',{start:'".($params['start_page']+1)."',filtr:$('#wp-filtr-form').serialize()});\"> > </button>
                    	<button id='leap-forward' class='page-nav-step' type='button' onclick=\"loadPage('".$params['headParams']['parent']."','".$params['headParams']['alias']."',".$params['headParams']['id'].",0,'landingPage',{start:'".$params['pages']."',filtr:$('#wp-filtr-form').serialize()});\"> >> </button>
						";
					}
					
					
					$result .= "</div>"; // closePageNavigation
					
					$result .= "<div class='number-of-items'>"; // openNumberOfItems
					
					$result .= "
					<label class='hidden' for='numb-of-items'>Элементов на странице:</label>
                    <div class='styled-select styled-select-sm hidden'>
                        <select id='numb-of-items' onchange=\"$.cookie('global_on_page',$(this).val()); 
								loadPage('".$params['headParams']['parent']."','".$params['headParams']['alias']."',".$params['headParams']['id'].",0,'landingPage',{start:'1',filtr:$('#wp-filtr-form').serialize()});\">
                            <option ".($params['on_page'] == 10 ? "selected" : "")." data-skip='1' value='10'>10</option>
							<option ".($params['on_page'] == 15 ? "selected" : "")." data-skip='1' value='15'>15</option>
							<option ".($params['on_page'] == 30 ? "selected" : "")." data-skip='1' value='30'>30</option>
							<option ".($params['on_page'] == 45 ? "selected" : "")." data-skip='1' value='45'>45</option>
							<option ".($params['on_page'] == 60 ? "selected" : "")." data-skip='1' value='60'>60</option>
							<option ".($params['on_page'] == 75 ? "selected" : "")." data-skip='1' value='75'>75</option>
                        </select>
                    </div>";
			
			$result .= "</div>"; // closeNumberOfItems
					
			$result .= "</div>"; // closeManagePages
			
			return $result;
		}
		
		// Return info table for Card View Page
		
		public function getCardViewTable($params=array())
		{
			$tabsManager = false;
			if(isset($params['lpx']))
			{
				$tabsManager = true;
				$lpx = $params['lpx']; // empty = en
				$langs = $params['langs']; // langs list
			}
			$result = "";
			if($tabsManager)
			{
				$_parent 	= $params['headParams']['parent'];
				$_alias 	= $params['headParams']['alias'];
				$_id 		= $params['headParams']['id'];
				$_item_id 	= $params['headParams']['item_id'];
				$result = "<div class='tabsManager'>";
				$result .= "<ul>";
				$result .= "<li class='".(!$lpx ? "active" : "")."' onclick=\"playSound();\">
								<button type='button' onclick=\"loadPage('$_parent','$_alias',$_id,$_item_id,'cardView',{lpx:''});\">".DEF_LANG."</button>
							</li>";
				foreach($langs as $lang){
					$result .= "<li class='".($lpx==$lang['alias'] ? "active" : "")."' onclick=\"playSound();\">
									<button type='button' onclick=\"loadPage('$_parent','$_alias',$_id,$_item_id,'cardView',{lpx:'".$lang['alias']."'});\">".strtoupper($lang['name'])."</button>
								</li>";
				}
				$result .= "</ul>";
				$result .= "<div class='clear'></div>";
				$result .= "</div><!-- Tabs Manager -->";
			}
			
			$result .= "<div class='ipad-20 hidden' id='upper-table-ajax-inform'></div>
				<table class='cardViewTable'>
				";
	
			$rowCnt = 0;
			foreach($params['cardTmp'] as $header => $tmp)
			{
				$rowCnt++;
				$trClass = ($rowCnt%2==1 ? "trcolor" : "");
				if($tmp['type'] == "header"){
					$result .= " 
					<tr class='$trClass'>
						<td class='fieldName' colspan='2' style='font-weight: 700; font-size: 20px;'>$header</td>
					";
					continue;
				}else{
					$result .= " 
					<tr class='$trClass'>
						<td class='fieldName'>$header</td>
					";
				}
				
		
				switch($tmp['type'])
				{
					case 'image':
					{
						$filePath = $tmp['params']['path'].$params['cardItem'][$tmp['field']];
						$result .= "<td>".( (file_exists("../../../../".$filePath) && trim($params['cardItem'][$tmp['field']]) != "" ) ? "
							<a class='theater' href='".$filePath."' title='Modal view' rel='group'>
								<img class='previewImage' alt='Image not found.' src='".$filePath."' />
							</a>
							" : "No image")."</td>";
						break;
					}
					case 'images':
					{
						$result .= "<td>";
						
						foreach($params['cardItem'][$tmp['field']] as $currImg)
						{
							$filePath = $tmp['params']['path'].$currImg[$tmp['params']['field']];
							
							$path_to_file = $filePath;
							$path_to_file_crop = $path_to_file;
				
							if($tmp['params']['path']==RSF."/split/files/shop/products/")
							{
								$path_to_file_crop  = $tmp['params']['path'].$currImg[$tmp['params']['field']];
							}
							
							$result .= ( (file_exists("../../../../".$filePath) && trim($currImg[$tmp['params']['field']]) != "" ) ? "
							<a class='theater' href='".$filePath."' title='Изображение' rel='group'>
								<img class='previewImage' alt='Image not found.' src='".$path_to_file_crop."' />
							</a>
							" : "<span>No image :".$currImg[$tmp['params']['field']])."</span>";
						}
						
						$result .= "</td>";
						break;
					}
					case 'frame':
					{
						if ($params['cardItem'][$tmp['field']]) {
							$result .= "<td><div>".$params['cardItem'][$tmp['field']]."</div></td>";
						}else{
							$result .= "<td><div>empty</div></td>";
						}

						
						break;
					
					}
					// case 'header':
					// {
					// 	if ($tmp['params'] && $tmp['params']['val']) {
					// 		$val = $tmp['params']['val'];
					// 		$result .= "<td><div>".$params['cardItem'][$tmp['field']]."</div></td>";
					// 	}else{
					// 		$result .= "<td><div>empty</div></td>";
					// 	}

						
					// 	break;
					
					// }
					case 'date':
					{
						$result .= "<td>".$this->deformat_long_date($params['cardItem'][$tmp['field']])."</td>";
						break;
					}
					case 'arr_mono':
					{
						if(!$params['cardItem'][$tmp['field']])
						{
							$result .= "<td>-</td>";
							break;
						}
						if(isset($tmp['params']['link']))
						{
							$lp = $tmp['params']['link'];
					
							$result .= "<td class='main-t-td-name'>&rsaquo; <a href='javascript:void(0);' onclick=\"loadPage('".$lp['parent']."','".$lp['alias']."',".$lp['id'].",".$params['cardItem'][$tmp['field']]['id'].",'cardView',{})\">";
							$result .= $params['cardItem'][$tmp['field']][$tmp['params']['field']];
							$result .= "</a></td>";
						}else
						{
							if(isset($tmp['params']['fields']))
							{
								$result .= "<td>";
								foreach($tmp['params']['fields'] as $fieldName)
								{
									$result .= $params['cardItem'][$tmp['field']][$fieldName]." / ";
								}
								$result .= "</td>";
							}else
							{
								$result .= "<td>".$params['cardItem'][$tmp['field']][$tmp['params']['field']]."</td>";
							}
						}
						break;
					}
					case 'arr_mult':
					{
						if(!$params['cardItem'][$tmp['field']])
						{
							$result .= "<td>-</td>";
							break;
						}
						$result .= "<td class='main-t-td-name'><ul>";
						foreach($params['cardItem'][$tmp['field']] as $child)
						{
							if(isset($tmp['params']['link']))
							{
								$lp = $tmp['params']['link'];
						
								$result .= "<li>&rsaquo; <a href='javascript:void(0);' onclick=\"loadPage('".$lp['parent']."','".$lp['alias']."',".$lp['id'].",".$child['id'].",'cardView',{})\">";
								$result .= $child[$tmp['params']['field']];
								$result .= "</a></li>";
							}else
							{
								if(isset($tmp['params']['type']))
								{
									switch($tmp['params']['type'])
									{
										case 'chars':
										{
											$pf = $tmp['params']['fields'];
											
												$result .= "<li>&rsaquo; ";
												$result .= $child[$pf['header']].": ".$child[$pf['val']]." <i>".$child[$pf['m']]."</i> ";
												$result .= "</li>";
											
											break;
										}
										default: break;
									}
								}else
								{
									$result .= "<li>&rsaquo; ".$child[$tmp['params']['field']]."</li>";
								}
							}	
						}
						$result .= "</ul></td>";
						break;
					}
					case 'usersExtraFields':
					{
						$eField = $tmp['field'];
						$eData = $tmp['params']['data'];
						
						$result .= "<td>";
						foreach($eData as $eItem)
						{
							$result .= "<h3>".$eItem['name']."</h3>";
							$result .= "<table class='intotal'>";
							foreach($eItem['values'] as $eValue)
							{
								$result .= "
										<tr>
											<td>".$eValue['name']."</td>
											<td>".$eValue['value']."</td>
										</tr>";
							}
							$result .= "</table>";
						}
						$result .= "</td>";
						
						break;
					}
					default:
					{
						if(isset($tmp['params']['replace']))
						{
							$result .= "<td>".$tmp['params']['replace'][$params['cardItem'][$tmp['field']]]."</td>";
						}else
						{
							$result .= "<td>".$params['cardItem'][$tmp['field']]."</td>";
						}
						break;
					}
				}
		
				$result .= "	
						</tr>
		 				";
			}
				
			$result .= "
				</table>
				";
			
			return $result;
		}
		
		// Return form for Card Edit and Create Page
		
		public function getCardEditForm($params=array(), $showSaveButton=false)
		{
			$tabsManager = false;
			$clickUpdate = "cardEdit";
			if(isset($params['lpx']))
			{
				$tabsManager = true;
				$lpx = $params['lpx']; // empty = en
				$langs = $params['langs']; // langs list
				
				$clickUpdate = (isset($params['clickUpdate']) ? $params['clickUpdate'] : "cardEdit");
			}
			$result = "";
			if($tabsManager)
			{
				$_parent 	= $params['headParams']['parent'];
				$_alias 	= $params['headParams']['alias'];
				$_id 		= $params['headParams']['id'];
				$_item_id 	= $params['headParams']['item_id'];
				$result = "<div class='tabsManager'>";
				$result .= "<ul>";
				$result .= "<li class='".(!$lpx ? "active" : "")."' onclick=\"playSound();\">
								<button type='button' onclick=\"loadPage('$_parent','$_alias',$_id,$_item_id,'".$clickUpdate."',{lpx:''});\">".DEF_LANG."</button>
							</li>";
				foreach($langs as $lang){
					$result .= "<li class='".($lpx==$lang['alias'] ? "active" : "")."' onclick=\"playSound();\">
									<button type='button' onclick=\"loadPage('$_parent','$_alias',$_id,$_item_id,'".$clickUpdate."',{lpx:'".$lang['alias']."'});\">".strtoupper($lang['name'])."</button>
								</li>";
				}
				$result .= "</ul>";
				$result .= "<div class='clear'></div>";
				$result .= "</div><!-- Tabs Manager -->";
			}
			// End of Tabs Manager
			//=========================================================
			$item = $params['cardItem'];
			
			$item_id = (isset($item['id']) ? (int)$item['id'] : 0);
			
			$appTable = $params['appTable'];
			
			$actionName = $params['actionName'];
			
			$ajaxFolder = $params['ajaxFolder'];
			
			$result .= "
				<form class='cardEditForm' name='cardEditForm' action='split/ajax/".$ajaxFolder."/".$ajaxFolder."Heandler.php' method='POST' enctype='multipart/form-data' target='_blank'>
				
				<input type='hidden' name='action' value='$actionName'>
				
				<input type='hidden' name='appTable' value='$appTable'>
				
				<input type='hidden' name='item_id' value='$item_id'>
				
				<input type='hidden' name='choice' value='1' id='formSaveChoice'>
				
				";
				
			$curr_tab_id = 0;
				
			foreach($params['cardTmp'] as $fieldHeader => $tmp)
			{
				if(isset($tmp['hidden'])) $result .= "<span style=\"".($tmp['hidden']==true ? "display:none;" : "")."\" class=\"hidden-relation\" id=\"hidden-".$tmp['field']."\">";
				
				switch($tmp['type'])
				{
					case 'div-open':
					{
						$visible = $tmp['params']['visible'];
						
						$result .= "<div class='toggleDiv ".(!$visible ? "dinone" : "")."' id='".$tmp['params']['id']."'>";
						break;
					}
					case 'div-close':
					{
						$result .= "</div><!-- div close -->";
						break;
					}
					case 'clear':
					{
						$result .= $this->clear();
						break;
					}
					case 'prod_access_script':
					{
						$result .= $this->clear();
						$result .= $this->prod_access_script($item_id,$tmp['access_list']);
						break;
					}
					case 'prod_complect_script':
					{
						$result .= $this->clear();
						$result .= $this->prod_complect_script($item_id,$tmp['access_list']);
						break;
					}
					case 'header':
					{
						$class_hide = ($params['actionName']=="createShopProductsItem" ? "" : "hidden");
						
						$curr_tab_id++;
						
						if($curr_tab_id>1) $result .= "</div> <!-- tab-wrapper-".($curr_tab_id-1)." END -->";
						
						$result .= "<div class='tab-button' id='tab-button-$curr_tab_id' onclick=\"$('#tab-wrapper-$curr_tab_id').slideToggle(400);\">".$this->hr($fieldHeader)."</div>";
						
						$result .= "<div class='tab-wrapper $class_hide' id='tab-wrapper-$curr_tab_id'>";
						
						break;
					}
					case 'hidden':
					{
						// $value = (isset($tmp['params']['val']) ? $item[$tmp['params']['field']][$tmp['params']['val']] : $item[$tmp['field']]);
						$value = (isset($tmp['params']['val']) ? $tmp['params']['val'] : "");

						if(isset($tmp['value'])) $value = $tmp['value'];
						
						if($tmp['field']=='productsJsData')
						{
							if(isset($item['products'])) $value = $item['products'];
						}
						
						$result .= $this->print_hidden($tmp['field'], $value);
						
						break;
					}
					case 'post_array':
					{
						
						$value = (isset($tmp['params']['arr_field']) ? $tmp['params']['arr_field'] : "");
						
						$result .= $this->print_hidden($tmp['field'], $value);
						
						break;
					}
					case 'text':
						$value = (isset($tmp['params']['value']) ? $tmp['params']['value'] : "");
						$result .= $this->print_txt($value);
						break;
					case 'input':
					{
						$inputType = (isset($tmp['params']['type']) ? $tmp['params']['type'] : "text");
						
						$inputDisabled = (isset($tmp['params']['disabled']) && $tmp['params']['disabled'] ? true : false);
						$inputReadonly = (isset($tmp['params']['readonly']) && $tmp['params']['readonly'] ? true : false);
						$inputValue = (isset($tmp['params']['value']) ? $tmp['params']['value'] : "");
						
						if($inputValue=="") $inputValue = $item[$tmp['field']];
						
						$result .= $this->print_input($fieldHeader, $tmp['field'], $tmp['params']['hold'], $inputValue, $tmp['params']['size'], $tmp['params']['onchange'],$inputType,$inputDisabled,$inputReadonly);
						break;
					}
					case 'autocomplete':
					{
						$result .= $this->print_autocomplete($fieldHeader, $tmp['field'], $tmp['params']['hold'], $item[$tmp['field']], $tmp['params']['size'], $tmp['params']['value']);
						break;
					}
					case 'chars_list':
					{
						$result .= $this->print_chars_list($fieldHeader, $item[$tmp['field']]);
						break;
					}
					case 'number':
					{
						$result .= $this->print_input($fieldHeader, $tmp['field'], $tmp['params']['hold'], $item[$tmp['field']], $tmp['params']['size'], $tmp['params']['onchange'],"number");
						break;
					}
					case 'user_sale':
					{
						$result .= $this->print_us_sale_input($fieldHeader, $tmp['field'], $tmp['params']['hold'], $item[$tmp['field']], $tmp['params']['size'], $tmp['params']['uid'], $tmp['params']['onchange'],"number");
						break;
					}
					case 'area':
					{
						$areaValue = (isset($tmp['params']['value']) ? $tmp['params']['value'] : "");
						
						if($areaValue=="") $areaValue = $item[$tmp['field']];
						$result .= $this->print_area($fieldHeader, $tmp['field'], $tmp['params']['hold'], $areaValue );
						break;
					}
					case 'block':
					{
						$yes = (isset($tmp['params']['yes']) ? $tmp['params']['yes'] : "Да");
						$no = (isset($tmp['params']['no']) ? $tmp['params']['no'] : "Нет");
						$replace = (isset($tmp['params']['replace']) ? $tmp['params']['replace'] : false);
						
						$selfType = false;
						$selfValue = false;
						$selfId = false;
						
						$pValue = $item[$tmp['field']];
						
						if(isset($tmp['params']['type']))
						{
							$selfType = $tmp['params']['type'];
						}
						if(isset($tmp['params']['value']))
						{
							$selfValue = $tmp['params']['value'];
							$pValue = $selfValue;
						}
						if(isset($tmp['params']['id']))
						{
							$selfId = $tmp['params']['id'];
						}
						
						$result .= $this->print_rotator($fieldHeader, $tmp['field'],$pValue,$tmp['params']['reverse'],$yes,$no,$replace,$selfType,$selfValue,$selfId);
						break;
					}
					case 'select':
					{
						$currValue = $tmp['params']['currValue'];
						
						$typeValue = (isset($tmp['params']['type']) ? $tmp['params']['type'] : false);
						
						$result .= $this->print_select($fieldHeader, $currValue, $tmp['params']['list'], $tmp['params']['fieldValue'], $tmp['params']['fieldTitle'], $tmp['field'], $tmp['params']['onChange'], $tmp['params']['first'],$typeValue); 
						break;
					}
					case 'multiselect':
					{
						$currValue = $tmp['params']['currValue'];
						
						$typeValue = (isset($tmp['params']['type']) ? $tmp['params']['type'] : false);
						
						$result .= $this->print_multiselect($fieldHeader, $currValue, $tmp['params']['list'], $tmp['params']['fieldValue'], $tmp['params']['fieldTitle'], $tmp['field'], $tmp['params']['onChange'], $tmp['params']['first'],$typeValue, $tmp['params']['cust']); 
						break;
					}
					case 'redactor':
					{
						$result .= $this->print_redactor($fieldHeader, $tmp['field'], $item[$tmp['field']]);
						break;
					}
					case 'summernote':{
						$result .= $this->print_summernote($fieldHeader, $tmp['field'], $item[$tmp['field']]);
						break;
					}
					case 'date':
					{
						$result .= $this->print_date($fieldHeader, $tmp['field'], $item[$tmp['field']]);
						break;
					}
					case 'image_mono':
					{
						$result .= $this->print_image_mono($fieldHeader, $tmp['field'], $item[$tmp['field']], $tmp['params']['path'], $tmp['params']['appTable'], $tmp['params']['id']);
						break;
					}
					case 'image_mult':
					{

						$method = (isset($tmp['params']['method']) ? $tmp['params']['method'] : 'edit');

						$ev_type = (isset($tmp['params']['ev_type']) ? $tmp['params']['ev_type'] : '');

						$shotam = (isset($tmp['params']['shotam']) ? $tmp['params']['shotam'] : '');

						$result .= $this->print_image_mult($fieldHeader, $tmp['field'], $item[$tmp['field']], $tmp['params']['path'], $tmp['params']['appTable'], $tmp['params']['id'], $tmp['params']['field'], $method, $ev_type, $shotam);
						break;
					}
					case 'shopProductChars':
					{
						$result .= $this->print_shopProductChars($fieldHeader,$tmp['field'],$tmp['params']['chars'],$tmp['params']['has_chars']);
						break;
					}
					case 'shopProductDinamicChars':
					{
						$result .= $this->print_shopProductDinamicChars($fieldHeader,$tmp['field'],$tmp['params']['chars'],$tmp['params']['has_chars']);
						break;
					}
					case 'cartProducts':
					{
						$type = (isset($tmp['params']['type']) ? $tmp['params']['type'] : false);
						$discount = (isset($tmp['params']['discount']) ? $tmp['params']['discount'] : 0);
						
						$result .= $this->print_cart_products($item_id,$tmp['params']['items'],$tmp['params']['node_list'],$tmp['params']['delivery_price'],$type,$discount);
						break;
					}
					case 'usersExtraFields':
					{
						$eField = $tmp['field'];
						$eData = $item[$eField];
						
						$result .= "<div id='usersExtraFields'>";
						foreach($eData as $eGroup)
						{
							$result .= $this->hr($eGroup['name']);
							foreach($eGroup['values'] as $eValue)
							{
								$result .= $this->print_input($eValue['name'],"ef[".$eValue['ef_id']."]",$eValue['name'],$eValue['value'],25,"text");
							}
						}
						$result .= "</div>";
						break;
					}
					case 'notes':
					{
						$result .= $this->print_notes($fieldHeader,$tmp['params']['notes']);
						break;
					}
					case 'deleteOrder':
					{
						$result .= "<button class='r-z-h-s-close' type='button' onclick=\"$('#delete_order_answer').slideToggle(200);\" style='margin:10px;' title=''Удалить заказ></button>
										<div id='delete_order_answer' class='hidden'>
											<p>Вы действительно хотите удалить этот заказ? 
												<a href='javascript:void(0);' onclick=\"delete_shop_order($item_id);\" class='red'>Да</a> 
												<a href='javascript:void(0);' onclick=\"$('#delete_order_answer').hide(200);\" class='green'>Нет</a>
											</p>
										</div>
									";
						break;
					}

					default: break;
				}
				if(isset($tmp['hidden'])) $result .= "</span>"; // End of current hidden
			}
			
			if($curr_tab_id) $result .= "</div> <!-- tab-wrapper-$curr_tab_id END -->";
				
			if($showSaveButton)
			{
				$result .= "
					<div class='clear'></div>
					 <button class='submit' type='button' onclick=\"submit_save_form(0);\" title='Сохранить'>Сохранить</button>
				";
			}
				
			$result .= "
				</form>
				";
			
			return $result;
		}
		
		public function __destruct(){}
}